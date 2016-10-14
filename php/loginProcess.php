<?php
session_start();

if (isset($_POST['loginForm'])) {  //login form has been submitted
    include 'connection.php';
    $sql = "SELECT * FROM admin " .
              " WHERE username = '" . $_POST['username'] . "' " .
               " AND password = '" . hash("sha1", $_POST['password']) . "'";
   $stmt = $dbConn->query($sql);
   $record = $stmt->fetch();
 
  if (!empty($record)) { //if record with username and password was found
        $_SESSION['username'] = $record['username'];
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header("Location: main.php");
    } else {
        $errorArray = array("Wrong username/password");  
    }
} //endIf loginForm was submitted
