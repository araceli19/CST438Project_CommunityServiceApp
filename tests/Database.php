<?php
class Database{
        private static $pdo = NULL;
        private function __construct() {}
        private function __clone() {}


public static function setConnection() {

        if(!isset($pdo)){

          $host = "127.0.0.1";
          $user = "root";
          $password = "123";
          $dbname = "Community_Service_Finder";
          //$conn = new mysqli($host, $user, $password, $dbname);

          if(!isset(self::$pdo)){
              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              self::$pdo = new PDO("mysql:host=127.0.0.1;dbname=circle_test", "ubuntu", "");
          }
        }
    return self::$pdo;
    }
}
?>