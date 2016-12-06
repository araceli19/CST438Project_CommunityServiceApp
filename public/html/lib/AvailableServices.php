<?php
//will test the Volunteer Organization table

include_once("Database.php"); //connects to the database
class AvailableServices{
  /*
  CREATE TABLE Available_Services(
  ID INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Organization_ID INT(6),
  Category_ID smallint(6) NOT NULL,
  Hours_Available DOUBLE(10,2) NOT NULL,
  Volunteers_Needed INT(3) NOT NULL,
  Description VARCHAR(200) NOT NULL,
  Name_Of_Service VARCHAR(50) NOT NULL,
  Phone_Num VARCHAR(13) NOT NULL,
  FOREIGN KEY (Category_ID) REFERENCES Categories (Category_ID),
  FOREIGN KEY (Organization_ID) REFERENCES Volunteer_Organization (ID)
  )ENGINE=MyISAM DEFAULT CHARSET=utf8;
*/

    public static $ID;
    public static $Organization_ID;
    public static $Category_ID;
    public static $Hours_Available;
    public static $Volunteers_Needed;
    public static $Description;
    public static $Phone_Num;
    public static $Name_Of_Service;



//testing begins with inserting data to Volunteer Organization
    public static function insertDataServices($Organization_ID,$Category_ID,$Hours_Available,$Volunteers_Needed,$Description,$Phone_Num,$Name_Of_Service )
    {
        $db = Database::setConnection();
            $sql = "INSERT INTO Available_Services(Organization_ID, Category_ID, Hours_Available, Volunteers_Needed, Description,Phone_Num, Name_Of_Service)
            VALUES('$Organization_ID','$Category_ID','$Hours_Available','$Volunteers_Needed','$Description','$Phone_Num','$Name_Of_Service');";


            $val = $db->prepare($sql);

            if($val->execute()){ //if it was executed
                return true;
            }
            else{
                return false;
            }

    }
    //test removal of organizaion
    public static function removeAvailableServices($Organization_ID,$Category_ID,$Hours_Available,$Volunteers_Needed,$Description,$Phone_Num,$Name_Of_Service){
  $db = Database::setConnection();

                $sql = "DELETE FROM Available_Services WHERE Name_Of_Service = '$Name_Of_Service'";

                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }
    //selects only one organizaion
    public static function selectAvailableService($Name_Of_Service){

      $db = Database::setConnection();


        $sql = "SELECT Name FROM Available_Services WHERE Name_Of_Service ='$Name_Of_Service'";

        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetch();

        if($Name_Of_Service == $retrieval['Name_Of_Service']){

            return $retrieval['Name_Of_Service'];
        }
        else{
            return "";
        }
    }
    //retrieves all organization
    public static function getAllAvailableServices(){
      $db = Database::setConnection();

        $sql = "SELECT * FROM Available_Services";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($retrieval);
    }
}
?>
