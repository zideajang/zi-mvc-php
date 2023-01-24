<?php

namespace app\controllers;
use app\core\Controller;


class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register($request)
    {
        $this->setLayout('auth');
        if($request->isPost()){
            return "处理提交数据";
        }
        return $this->render('register');
    }

    
}