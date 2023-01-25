<?php

namespace app\core;

class Database
{
    public \PDO $pdo;
    public function __construct($config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        //这个模式需要配合 try 使用 ,通过捕获异常 $e 对象调用 $e->getMessage() 获取错误信息
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    //创建 applyMigrations 读取 migrations 文件然后应用到数据库来做数据迁移
    public function applyMigrations()
    {
        //需要跟踪已经完成的迁移，避免重复应用迁移
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];

        //扫描目录下文件
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files,$appliedMigrations);
        foreach ($toApplyMigrations as $migration){
            if($migration === '.' || $migration === '..'){
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $calssName = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $calssName();
            $this->log("Apply migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");

            $newMigrations[] = $migration;
            // Utility::show($calssName);
        }

        if(!empty($newMigrations)){
            $this->saveMigrations($newMigrations);
        }else{
            $this->log("所有数据库迁移已经完成");
        }
    }
    
    //为此避免重复执行数据库迁移脚本，将执行过 migration 更新到数据表中
    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            create_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations($migrations)
    {
        // Utility::show($migrations);
        $str = implode(",",array_map(fn($m) => "('$m')", $migrations));
        // Utility::show($migrations);
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
        $statement->execute();
    }


    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }
}

