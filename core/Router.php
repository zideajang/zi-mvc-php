<?php

/**
 * Class Router
 * 
 * @author zidea <github zideajang>
 * @package app\core
 */

namespace app\core;


 class Router
 {

    public Request $request;
    protected array $routes = [];
    
    public function __construct($request){
        $this->request = $request;
    }
    //get 方法提供对 get 请求的路由
    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    //
    public function resolve(){
        //获取 url 的路径
        $path = $this->request->getPath();
        //获取 url 的请求方式包括 get 和 post
        $method = $this->request->getMethod();

        //获取请求 url 对应的回调函数
        $callback = $this->routes[$method][$path] ?? false;

        // 判断回调函数是否存在
        if($callback === false){
            echo "Not found";
            exit;
        }
        //执行回调函数
        echo call_user_func($callback);

    }
 }