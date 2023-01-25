<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Utility;
use app\models\RegisterModel;


class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register($request)
    {
        $registerModel = new RegisterModel();
        
        if($request->isPost()){
            
            //数据加载
            $registerModel->loadData($request->getBody());
            //数据校验

            // Utility::show($registerModel);
       
            if($registerModel->validate() && $registerModel->register()){
                return 'Success';
            }

            // Utility::show($registerModel->errors);
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}