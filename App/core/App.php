<?php

namespace app\App\core;

use app\App\core\Database;

class App {

    public static string$ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    public static App $app;
    public Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this ->request = new Request();
        $this ->response = new Response();
        $this ->router = new Router($this->request, $this->response);

    }

    public function run() {
       echo $this->router->resolve();
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}