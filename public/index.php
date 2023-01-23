<?php

// echo __DIR__;

// 自动加载问价
require_once __DIR__ . '/../vendor/autoload.php';


use app\core\Application;
use app\core\Utility;

// Utility::show(dirname(__DIR__));

// Application 应用类会来持有路由(route)的实例(对象)
$app = new Application(dirname(__DIR__));
// 路由，会将 url 作为 key 而对应调用方法作为 value
// $app->router.get('/',function(){
//     return '页面'
// })

//设置路由
$app->router->get('/','home');

$app->router->get('/contact','contact');
$app->router->post('/contact', function () {
    return '处理表单提交';
});


$app->run();