<?php
//this file connects to database
    function getDatabaseConnection(){
    $host = "127.0.0.1";
    //$host= "localhost";
    $dbname = "Community_Service_Finder";
    $username = "root";
    $password = "123";

        //create new connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        //setting errorhndling
        //$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }



?>
