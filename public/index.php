<?php

// echo __DIR__;

// 自动加载问价
require_once __DIR__ . '/../vendor/autoload.php';


use app\controllers\SiteController;
use app\controllers\AuthController;
use app\core\Application;
use app\core\Utility;

// Utility::show(dirname(__DIR__));

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

// Application 应用类会来持有路由(route)的实例(对象)
$app = new Application(dirname(__DIR__),$config);
// 路由，会将 url 作为 key 而对应调用方法作为 value
// $app->router.get('/',function(){
//     return '页面'
// })

//设置路由
$app->router->get('/',[SiteController::class,'home']);

$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->get('/contact',[SiteController::class,'contact']);

$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);

$app->run();