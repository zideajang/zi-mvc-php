<?php
use app\core\Utility;

/**
 * Class Request
 * 
 * @author zidea <github zideajang>
 * @package app\core
 */

namespace app\core;

 class Request{
    public function getPath()
    {
        //获取路由地址 /users?id=1
        $path = $_SERVER['REQUEST_URI'] ?? false;
        // 获取 url 中问号的位置
        $position = strpos($path, '?');
        // Utility::show($position);
        if($position === false){
            return $path;
        }

        $path = substr($path, 0, $position);
        return $path;
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody()
    {
        $body = [];

        if($this->method() === 'get'){
            foreach($_GET as $key => $value)
            {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->method() === 'post'){
            foreach($_POST as $key => $value){
                // INPUT_POST 指定输入类型
                // $key 执行输入变量 $key=>$value
                // 指定过滤器
                // Utility::show(INPUT_POST);
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        Utility::show($body);
        return $body;

        // Utility::show($body);

    }
 }