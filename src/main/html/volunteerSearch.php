<?php

include('include/database.php');
$dbConnection = getDatabaseConnection(); //use database connection from the database file

function getVolunteers(){
  //funcion that connects to database
  global $dbConnection;

  $sql = "SELECT * FROM Volunteer";

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
Search: <input type="text" name="search" placeholder="Users"/>
<input type="submit" name="searchForm" value="Search" />
</form>

  <?php

  if(isset($_POST['searchForm'])){
    //if statement checks if the user called for a search, then searches for the data
      $volunteer = getVolunteers();
        echo "Search found :<br/>";
        echo "<table style=\"font-family:arial;color:#333333;\">";
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;
                background:#98bf21;\">Name</td><td style=\"border-style:solid;border-width:1px;
                border-color:#98bf21;background:#98bf21;\">DOB</td><td style=\"border-style:solid;
                border-width:1px;border-color:#98bf21;background:#98bf21;\">School</td></tr>";

          foreach($volunteer as $vol){
            echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $vol['Name'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $vol['DOB'];
            echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                    echo $vol['School'];
            echo "</td></tr>";
          }
          echo "</table>";

      }


   ?>

</body>
</html>
