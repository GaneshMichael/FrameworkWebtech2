<?php
namespace app\App\core;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }


        $authorized = $this->applyAuthorizationMiddleware();
        if (!$authorized) {
            $this->response->setStatusCode(401);
            return $this->renderView("_401");
        }

        if (is_array($callback)) {
            App::$app->controller = new $callback[0];
            $callback[0] = App::$app->controller;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback, $this->request);
    }

    protected function applyAuthorizationMiddleware(): bool
    {
        return true;
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = App::$app->controller->layout;
        ob_start();
        include_once App::$ROOT_DIR."/App/Views/Layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT_DIR."/App/Views/$view.php";
        return ob_get_clean();
    }
}
