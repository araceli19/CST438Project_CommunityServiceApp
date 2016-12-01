<?php
session_start(); //session start
//this file is called for conneciton to database
include('include/database.php');
include('gmailDB.php');
$_SESSION['getId'] = $_POST['getId'];

$dbConnection = getDatabaseConnection();

function getServices(){
  global $dbConnection; //use global variable to call it anywhere in function

    $sql = "SELECT * FROM Available_Services";
    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $records;
}
function getCategories(){
  global $dbConnection; //use global variable to call it anywhere in function

    $sql = "SELECT * FROM Categories";
    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $records;
}

function getSearch(){
  global $dbConnection;

   $sql = "SELECT *
           FROM Available_Services";

   if(isset($_POST['search']))
   {
       $query = $_POST['search'];
       $sql .= " WHERE Name_Of_Service
                LIKE '%$query%'";
   }

   if(!empty($_POST['categories']) && $_POST['categories'] !== "All")
   {
       $catID = $_POST['categories'];
       $sql .= " AND Category_ID = $catID";
   }

   $statement = $dbConnection->prepare($sql);
   $statement->execute();
   $records = $statement->fetchAll(PDO::FETCH_ASSOC);

   return $records;

}

 ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="home.css">
<title> Community Service Finder </title>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"><h3>Community Service Finder</h3></a>
            </div>
        <ul align="right" class="nav navbar-nav">
            <li ><a href="../index.php" ><h5>Home</h5></a></li>
            <li class="active"> <a href= "Search.php" id="currentPage"><h5>Services</h5></a></li>
            <li><a href= "volunteer_profile.html"><h5>My Profile</h5></a></li>
            <li><a href= "contactUs.html"><h5>Contact Us</h5></a></li>
        </ul>
      </div>
    </nav>


    <form name="search" method="post">
      Search: <input type="text" name="search" placeholder="All Available"/>
      <?php
      $categories = getCategories();
      $select= '<select name="categories">';
              $select.='<option value="All">ALL</option>';
      foreach($categories as $cat){
            $select.='<option value="'.$cat['Category_ID'].'">'.$cat['Category'].'</option>';
        }

      $select.='</select>';
      echo $select;

      ?>
      <input type="submit" name="searchForm" value="Search" />

    </form>

      <?php


  if(isset($_POST['searchForm'])){
    //if statement checks if user made any calls to search
      $services= getSearch();
        echo "Search found :<br/>";
        echo "<table style=\"font-family:arial;color:#333333;\">";
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;
                background:#98bf21;\">Name of Serivice
                </td><td style=\"border-style:solid;border-width:1px;
                border-color:#98bf21;background:#98bf21;\">Description
                </td><td style=\"border-style:solid;
                border-width:1px;border-color:#98bf21;background:#98bf21;\">Hours Available
                </td><td style=\"border-style:solid;border-width:1px;
                border-color:#98bf21;background:#98bf21;\">Volunteers Needed
                </td><td style=\"border-style:solid;border-width:1px;
                border-color:#98bf21;background:#98bf21;\">Phone Number
                </td><td style=\"border-style:solid;border-width:1px;
                border-color:#98bf21;background:#98bf21;\">Sign Up
                </td></tr>";
                //adata is displayed in table format


          foreach($services as $service){
              $_SESSION['orgId'] = $service['Organization_ID'];

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

                    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {


                      echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";

                      echo  '<form action="volunteerRegister.php" method="post">';

                      echo '<input  type="radio"  name="getId" onclick="javascript: submit()" value="', $service['ID'],'">';

                      echo"</form>";

                    }

            echo "</td></tr>";
          }

          echo "</table>";
  }

   ?>


</body>
</html>
