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

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
 }