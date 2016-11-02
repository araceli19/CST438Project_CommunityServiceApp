<?php

//connects to volunter database
include_once("Database.php");
class dbConnection{
   public static $ID;
    public static $Name;
    public static $DOB;
    public static $School;
    public static $School_ID;
    public static $Hours;
    public static $Phone_Num;
    public static $volunteer1;


    public function __construct(){
    //  $this->volunteer1 = new

    }
    public static function insertData( $Name, $DOB, $School, $School_ID, $Hours, $Phone_Num){
        $db = Database::setConnection();
            $sql = "INSERT INTO Volunteer(Name, DOB, School, School_ID, Hours, Phone_Num)
            VALUES('$Name', '$DOB', '$School', '$School_ID', '$Hours', '$Phone_Num');";


            $val = $db->prepare($sql);

            if($val->execute()){
                return true;
            }
            else{
                return false;
            }

    }
    public static function removeVolunteer($Name, $DOB, $School, $School_ID, $Hours, $Phone_Num){
  $db = Database::setConnection();

                $sql = "DELETE FROM Volunteer WHERE Name = '$Name'";

                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }
    public static function selectVolunteer($Name){

      $db = Database::setConnection();


        $sql = "SELECT Name FROM Volunteer WHERE Name ='$Name'";

        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetch();

        if($Name == $retrieval['Name']){

            return $retrieval['Name'];
        }
        else{
            return "";
        }
    }
    public static function getAll(){
      $db = Database::setConnection();


        $sql = "SELECT * FROM Volunteer";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($retrieval);
    }
}
?>
