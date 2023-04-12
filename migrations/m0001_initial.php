<?php

namespace app\migrations;

class m0001_initial
{
    public function up()
    {
        $db = \app\core\App::$app->db;
        $SQL = "CREATE TABLE users(
                id INT AUTO-INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdp->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\App::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdp->exec($SQL);
    }
}