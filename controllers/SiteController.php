<?php


namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Utility;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name' => 'zidea'
        ];

        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render(('contact'));
    }

    public function handleContact($request)
    {
        $body = $request->getBody();
        // Utility::show($body);
        return "处理提交数据";
    }

}

