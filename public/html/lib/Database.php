<?php

//conection to database with user name and password
class Database{
        private static $pdo = NULL;
        private function __construct() {}
        private function __clone() {}


public static function setConnection() {

        if(!isset($pdo)){

          //$conn = new mysqli($host, $user, $password, $dbname);

          if(!isset(self::$pdo)){
              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              self::$pdo = new PDO("mysql:host=sedatabases.clgz1qavgh08.us-west-2.rds.amazonaws.com:3306;dbname=test", "seclass", "sedb1234");
          }
        }
    return self::$pdo;
    }
}
?>
