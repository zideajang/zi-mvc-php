<?php

/**
 * Class Application
 * 
 * @author zidea <github zideajang>
 * @package app\core
 */

namespace app\core;

 class Application
 {

    public static string $ROOT_DIR;
    //需要 php 7.4 以上版本支持类型
    public Router $router;
    public Request $request;

    public Response $response;

    public static Application $app;
    
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        //初始化 Request 对象
        $this->request = new Request;
        $this->response = new Response;
        //初始化 Router 对象
        $this->router = new Router($this->request,$this->response);
    }

    public function run(){
        echo $this->router->resolve();
    }
    
 }