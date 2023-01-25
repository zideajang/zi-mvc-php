<?php

// echo __DIR__;

// 自动加载问价
require_once __DIR__ . '/vendor/autoload.php';


use app\core\Application;
use app\core\Utility;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

// Application 应用类会来持有路由(route)的实例(对象)
$app = new Application(__DIR__,$config);
$app->db->applyMigrations();