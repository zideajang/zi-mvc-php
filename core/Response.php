<?php


namespace app\core;
class Response{
    // 设置返回的状态 
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
}