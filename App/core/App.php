<?php
namespace app\App\core;

use app\App\core\Database;
use app\App\Models\UserModel;

class App {

    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public ?UserModel $user;

    public static App $app;
    public ?Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }

    public function getController(): ?Controller
    {
        return $this->controller;
    }

    public function setController(?Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function getUser(): ?UserModel
    {
        return $this->user;
    }

    public function setUser(?UserModel $user): void
    {
        $this->user = $user;
    }

}
