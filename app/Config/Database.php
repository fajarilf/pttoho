<?php

namespace fajarilham\Config;

use PDO;

class Database 
{
    private static ?PDO $pdo = null;

    public static function getConnection(string $env = "test"):PDO
    {
        if(self::$pdo == null)
        {
            //create new PDO
            require_once __DIR__ . "/../../config/database.php";

            $config = getDatabaseInfo();

            self::$pdo = new PDO(
                dsn: $config["database"][$env]["url"],
                username: $config["database"][$env]["username"],
                password: $config["database"][$env]["password"]
            );
        }

        return self::$pdo;
    }

    public static function beginTransaction()
    {
        self::$pdo->beginTransaction();
    }

    public static function commitTransaction()
    {
        self::$pdo->commit();
    }

    public static function rollbackTransaction()
    {
        self::$pdo->rollBack();
    }
}