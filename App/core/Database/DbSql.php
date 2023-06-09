<?php

require_once 'database.php';

$db = new Database();
$db->connect();

$sqlFile = 'database.sql';
$sql = file_get_contents($sqlFile);
$db->executeStatements($sql);
