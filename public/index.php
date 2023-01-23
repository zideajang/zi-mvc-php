<?php

// echo __DIR__;

// 自动加载问价
require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\core\common;

// Application 应用类会来持有路由(route)的实例(对象)
$app = new Application();
// 路由，会将 url 作为 key 而对应调用方法作为 value
// $app->router.get('/',function(){
//     return '页面'
// })

//设置路由
$app->router->get('/',function(){
    return 'Hello World';
});

$app->router->get('/contact', function () {
    return 'Contact';
});


$app->run();