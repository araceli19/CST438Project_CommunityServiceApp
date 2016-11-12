<?php

//this file is called for conneciton to database
include('include/database.php');
$dbConnection = getDatabaseConnection();

function getServices(){
  global $dbConnection; //use global variable to call it anywhere in function

    $sql = "SELECT * FROM Available_Services";
    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $records;
}

 ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="home.css">
  <a href= "login.php">Home</a>

<title> Community Service Finder </title>
</head>
<body>
<form name="search" method="post">
Search: <input type="text" name="search" placeholder="Services"/>
<input type="submit" name="searchForm" value="Search" />
</form>

  <?php
  if(isset($_POST['searchForm'])){
    //if statement checks if user made any calls to search
      $services= getServices();
        echo "Search found :<br/>";
        echo "<table style=\"font-family:arial;color:#333333;\">";
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;
                background:#98bf21;\">Name</td><td style=\"border-style:solid;border-width:1px;
                border-color:#98bf21;background:#98bf21;\">DOB</td><td style=\"border-style:solid;
                border-width:1px;border-color:#98bf21;background:#98bf21;\">School</td></tr>";
                //adata is displayed in table format
          foreach($services as $service){
            echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $service['Name_Of_Service'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $service['Description'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $service['Hours_Available'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $service['Volunteers_Needed'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $service['Phone_Num'];
            echo "</td></tr>";
          }
          echo "</table>";

  }


   ?>

</body>
</html>
