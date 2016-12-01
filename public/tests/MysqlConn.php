<?php
ini_set('memory_limit', '256M');
//copy of db connection
//same as Database.php
class MysqlConn{
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
              self::$pdo = new PDO("mysql:host=127.0.0.1;dbname=Community_Service_Finder", "root", "123");
          }
        }
    return self::$pdo;
    }
}
?>
