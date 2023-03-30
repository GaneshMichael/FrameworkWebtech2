<?php

require_once __DIR__.'/vendor/autoload.php';
use app\core\Application;

$app = new Application();

$app->router->get('/', function (){
    return 'Test';
});

$app->router->get('/cijfers', function (){
    return 'cijfers';
});

$app->run();