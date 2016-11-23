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

function insertIntoVolunteer($id, $dob, $school, $phoneNum, $name){
  //echo $orgId;
  $dbConnection = getDatabaseConnection();
  $namedParameters = array();
    if(!empty($school)){
        $sql = "INSERT INTO Volunteer
          (ID, Name, DOB, School, Phone_Num)
          VALUES(:ID, :Name, :DOB, :School, :Phone_Num)";
          $namedParameters[':School'] = $school;
        }
    else {
        $sql = "INSERT INTO Volunteer
         (ID, Name, DOB,Phone_Num)
         VALUES(:ID, :Name, :DOB, :Phone_Num)";
       }

     $namedParameters[':ID'] = $id; //caming from form
     $namedParameters[':Name'] = $name;
     $namedParameters[':DOB'] = $dob;
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
