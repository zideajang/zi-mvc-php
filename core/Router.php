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
    public Response $response;
    
    protected array $routes = [];
    
    public function __construct($request,$response){
        $this->request = $request;
        $this->response = $response;
    }
    //get 方法提供对 get 请求的路由
    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    //
    public function resolve(){
        //获取 url 的路径
        $path = $this->request->getPath();
        //获取 url 的请求方式包括 get 和 post
        $method = $this->request->method();

        //获取请求 url 对应的回调函数
        $callback = $this->routes[$method][$path] ?? false;

        // 判断回调函数是否存在
        if($callback === false){
            // Utility::show($_SERVER);
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
            // return "Not found";
        }
        
        //判断如果返回字符串
        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            // 通过$callback 方法实际上是一个 controller 实例
        
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        //执行回调函数
        return call_user_func($callback,$this->request);

    }

    public function renderView($view,$params = [])
    {
        $layoutContent = $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view,$params);
        return str_replace('{{content}}', $viewContent,$layoutContent);
        //根据指定视图名称在 views 文件夹下找到对应 php 文件来加载
        // include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent,$layoutContent);
        //根据指定视图名称在 views 文件夹下找到对应 php 文件来加载
        // include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        //获取布局的 php 文件
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view,$params)
    {
        // Utility::show($params);
        foreach($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        //获取布局的 php 文件
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
 }