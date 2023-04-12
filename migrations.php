<?php

use app\controllers\AuthenticationController;
use app\controllers\mainController;
use app\core\App;

require_once __DIR__ . '/vendor/autoload.php';

$app = new App(__Dir__);

$app->db->applyMigrations();