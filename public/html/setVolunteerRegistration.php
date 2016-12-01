<?php
 
function getGoogleUser(){
    $dbConnection = getDatabaseConnection();
    //global $dbConnection; //use global variable to call it anywhere in function
    $sql = "SELECT * FROM google_users WHERE google_id = :google_id";
    $namedParameters = array(":google_id"=>$_SESSION['userId']);
    $statement =  $dbConnection->prepare($sql);
    $statement->execute($namedParameters);
    return $statement->fetch(PDO::FETCH_ASSOC);

}

function getVolunteerInfo(){
    $dbConnection = getDatabaseConnection();
  //global $dbConnection; //use global variable to call it anywhere in function
    $sql = "SELECT * FROM Volunteer WHERE ID = :ID";
    $namedParameters = array(":ID"=>$_SESSION['userId']);
    $statement =  $dbConnection->prepare($sql);
    $statement->execute($namedParameters);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function insertIntoVolunteer($id, $dob, $school, $phoneNum, $name, $gender){
  //echo $orgId;
  $dbConnection = getDatabaseConnection();
  $namedParameters = array();
    if(!empty($school)){
        $sql = "INSERT INTO Volunteer
          (ID, Name, DOB, Gender, School, Phone_Num)
          VALUES(:ID, :Name, :DOB, :Gender, :School, :Phone_Num)";
          $namedParameters[':School'] = $school;
        }
    else {
        $sql = "INSERT INTO Volunteer
         (ID, Name, DOB, Gender, Phone_Num)
         VALUES(:ID, :Name, :DOB, :Gender, :Phone_Num)";
       }

     $namedParameters[':ID'] = $id; //caming from form
     $namedParameters[':Name'] = $name;
     $namedParameters[':DOB'] = $dob;
     $namedParameters[':Gender'] = $gender;
     $namedParameters[':Phone_Num'] = $phoneNum;

     $statement = $dbConnection->prepare($sql);
     $statement->execute($namedParameters);


 }

function volunteerFormSubmition($orgId, $googleId){
  $dbConnection = getDatabaseConnection();
  //global $dbConnection; //use global variable to call it anywhere in function
  $sql = "SELECT ID FROM Available_Services WHERE Organization_ID =:Organization_ID";
  $statement =  $dbConnection->prepare($sql);
  $namedParameters = array("Organization_ID"=>$orgId);

  $statement->execute($namedParameters);
  $result =  $statement->fetch(PDO::FETCH_ASSOC);
  $avId = $result['ID'];

     //print_r($statement);
}

?>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

</html>
