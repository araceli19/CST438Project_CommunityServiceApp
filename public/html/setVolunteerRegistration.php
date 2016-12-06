<?php
function getGoogleUser(){
  try{
    $dbConnection = getDatabaseConnection();
    //global $dbConnection; //use global variable to call it anywhere in function
    $sql = "SELECT * FROM google_users WHERE google_id = :google_id";
    $namedParameters = array(":google_id"=>$_SESSION['userId']);
    $statement =  $dbConnection->prepare($sql);
    $statement->execute($namedParameters);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }

}

function getServices(){
  $dbConnection = getDatabaseConnection();//use global variable to call it anywhere in function

  try{


    $sql = "SELECT * FROM Available_Services WHERE Volunteers_Needed > 0";

    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
          return $records;
    }
        //catch exception
      catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
      }
}

function getVolunteerInfo(){
  try{
    $dbConnection = getDatabaseConnection();
  //global $dbConnection; //use global variable to call it anywhere in function
    $sql = "SELECT * FROM Volunteer WHERE ID = :ID";
    $namedParameters = array(":ID"=>$_SESSION['userId']);
    $statement =  $dbConnection->prepare($sql);
    $statement->execute($namedParameters);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }


}

function insertIntoVolunteer($id, $dob, $school, $phoneNum, $name, $gender){
  //echo $orgId;
  $dbConnection = getDatabaseConnection();
  try{

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
   catch(Exception $e) {
     echo 'Message: ' .$e->getMessage();
   }



 }

function volunteerFormSubmition($googleId, $avId){


    $dbConnection = getDatabaseConnection();
    $sql = "SELECT Organization_ID FROM Available_Services WHERE ID = :ID";
    $statement =  $dbConnection->prepare($sql);
    $namedParameters = array("ID"=>$avId);

    $statement->execute($namedParameters);
    $result =  $statement->fetch(PDO::FETCH_ASSOC);
    $orgaID = $result['Organization_ID'];
  //  echo $avId;
    $sql3 = "UPDATE Available_Services set Volunteers_Needed = Volunteers_Needed - 1 WHERE ID = :ID";

                $namedParameters3 = array("ID"=>$avId);
                $statement3 = $dbConnection->prepare($sql3);
                $statement3->execute($namedParameters3);


              $namedParameters2 = array();
                $sql2 = "INSERT INTO Pending_Volunteers
                  (Volunteer_ID, Organization_ID, Available_ID)
                  VALUES(:Volunteer_ID, :Organization_ID, :Available_ID)";

                  $namedParameters2[':Volunteer_ID'] = $googleId; //caming from form
                  $namedParameters2[':Organization_ID'] = $orgaID;
                  $namedParameters2[':Available_ID'] = $avId;
                  $statement2 = $dbConnection->prepare($sql2);
                  $statement2->execute($namedParameters2);

}

function errorMessage() {
    //error message
    $errorMsg = 'Error!';
    return $errorMsg;
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
