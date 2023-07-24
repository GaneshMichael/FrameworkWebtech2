<?php

require_once 'database.php';

use app\App\core\Database;

$db = new Database();
$db->connect();

$sqlFile = 'database.sql';
$sql = file_get_contents($sqlFile);
$db->executeStatements($sql);