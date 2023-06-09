<?php

namespace app\App\core;

class Controller
{
    public string $layout = 'base';
    public function chooseLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = []) {
        return App::$app->router->renderView($view, $params);
    }
}
