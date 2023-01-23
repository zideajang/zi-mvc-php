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
    //需要 php 7.4 以上版本支持类型
    public Router $router;
    public Request $request;
    
    public function __construct()
    {
        //初始化 Request 对象
        $this->request = new Request;
        //初始化 Router 对象
        $this->router = new Router($this->request);
    }

    public function run(){
        $this->router->resolve();
    }
    
 }