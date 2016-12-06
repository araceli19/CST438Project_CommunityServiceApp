<?php
//file for deleting Category
session_start();
  try{

    include 'include/database.php';
    $dbConnection = getDatabaseConnection('Categories');

    $Category_ID = $_GET['Category'];
    $sql = "DELETE FROM product WHERE Category = :Category";
    $statement = $dbConnection->prepare($sql);
    $statement->execute(array(":Category"=>$Category));

    echo "Category has been deleted.";
  }
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }

  function errorMessage() {
      //error message
      $errorMsg = 'Error!';
      return $errorMsg;
    }

?>
