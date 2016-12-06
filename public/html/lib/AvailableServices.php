<?php
//will test the Volunteer Organization table

include_once("Database.php"); //connects to the database
class AvailableServices{
  
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
