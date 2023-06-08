<?php

namespace app\Database;

use PDO;

class Database
{
    public PDO $pdo;

    public function __construct()
    {
        $user = 'u125010p150230_framework';
        $pass = 'm5VPhml6VF';
        $this->pdo = new PDO('mysql:host=web0155.zxcs.nl;port=3306;dbname=u125010p150230_framework', $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


}
