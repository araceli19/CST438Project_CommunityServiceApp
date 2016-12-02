<?php
//this file connects to database
    function getDatabaseConnection(){
    $host= "sedatabases.clgz1qavgh08.us-west-2.rds.amazonaws.com:3306";
    $username = "seclass";
    $password = "sedb1234";
    $dbname = "Community_Service_Finder";
    //$host = "127.0.0.1";
    //$username = "root";
    //$password = "123";
    try{
        //create new connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      }
      catch(PDOException $error){
                echo $error->getMessage();
        }
        //setting errorhndling
        //$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }



?>
