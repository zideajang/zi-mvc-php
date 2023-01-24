<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
    public function render($view,$params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    //设置布局
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
}