## PHP MVC web framework
### 前期准备
- 操作系统均可
- 安装 php (要求 7.4 版本)
- MySQL(xampp) 推荐安装 xampp 环境
- 安装 composer 这个 php 项目管理工具

### 目的
- 了解当下流行框架实现的基本过程

### 涵盖内容
- 自定义路由
- composer 工具管理项目以及项目发布
- 控制器
- 视图/布局
- 数据模型
- Migrations
- 表单
- 处理请求数据
- 表单验证
- 登录/注册
- Session Flash message 

### 分享
#### 创建项目
初始一个 php MVC 项目
#### 自动加载
通过 composer 管理项目，初始化项目后配置自动加载来实现项目中文件引入

### 启动服务
创建一个项目，在项目下创建 public 文件夹，创建 index.php


```php
hello world
```
在 public 文件夹下，开启终端运行下面的
```shell
php -S localhost:8080
```

在导航栏输入了 `http://localhost:8080/users` 接下来我们解析，url
url 包含很多信息，根据自己定义规则去解析 url，可以命令好

```php
// Application 应用类会来持有路由(route)的实例(对象)
$app = new Application();
// 路由，会将 url 作为 key 而对应调用方法作为 value

$app->router.get('/',function(){
    return '页面'
})

$app->run();
```

- 创建 Application 和 Route 类

### core package
- 在项目目录下创建 core 文件，作为 core package
- 创建一个 Application 和 Router 类，对于 php 类文件通常文件名首字母大写

```php
require_once "../core/Application.php";
require_once "../core/Router.php";
```

### index 文件
- 首先实例化 Application 应用
- 注册路由调用 Application 实例中 Router 实例 get 或 post 方法来对 get 和 post 方法进行处理
- 然后运行实例的 run 方法，在 run

### composer 初始化
```shell
composer init
```
初始化项目

```json
"autoload": {
    "psr-4": {
        "app\\": "./"
    }
},
```
将根目录对应到 app 命名空间上，以后整个项目管理

### Application 类
在 Application 持有 Router 和 Request 的实例
#### 属性
- Router 
- Request
#### 方法
- run

### Router 类

```php
 class Router
 {
    protected array $routes = [];
    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }
 }
 ```
关于 `$routes` 路由定义格式

```php
[
    'get'=>[
        '/'=> callback function,
        '/contact'=>callback function
    ],
    'post'=>[

    ]
]

```

### Request 类
对于 url 解析，提供 `getPath` 和 `method` 方法，其中 `getPaht` 获取路径
`method` 解析为 get 或者 post 方法


### 处理未注册页面(unregistpage)
返回 状态码为 200

### 定义控制器(Controller)



### TODO
return 出现外部调用输出 rec