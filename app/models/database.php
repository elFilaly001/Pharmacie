<?php

namespace App\Models;

require_once __DIR__ . '../../config/config.php';

use PDO;

final class Database
{
    private static $instance;
    private $PDO;

    private function __construct()
    {
        $dbHost = DB_HOST;
        $dbUser = DB_USERNAME;
        $dbPass = DB_PASSWORD;
        $dbName = DB_NAME;

        $DNS = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
        $this->PDO = new PDO($DNS, $dbUser, $dbPass);
        $this->PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getInstance()
    {
        /*"if propertier instance is empty creaate a new object else return the intance "*/

        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->PDO;
    }
}
