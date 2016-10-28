<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Portfolio, 2 Column</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="home.css">

</head>
  <a href= "login.php">Home</a>




<?php
//load database connection
    $host = "127.0.0.1";
    $user = "root";
    $password = "123";
    $database_name = "Community_Service_Finder";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from Volunteer");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display search result
         if (!$query->rowCount() == 0) {
		 		echo "Search found :<br/>";
				echo "<table style=\"font-family:arial;color:#333333;\">";
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Name</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">DOB</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">School</td></tr>";
            while ($results = $query->fetch()) {
				echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Name'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['DOB'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['School'];
				echo "</td></tr>";
            }
				echo "</table>";
        } else {
            echo 'Nothing found';
        }
?>
<br>
<br>
<div class="row">
    <div class="col-md-6 portfolio-item">
        <a href="#">

        </a>
        <h3>
            <a href="#">Community Service Finder</a>
        </h3>

    </div>
