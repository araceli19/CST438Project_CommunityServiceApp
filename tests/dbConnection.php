<?php

    include 'MysqlConn.php';
class dbConnection{
   public static $ID;
    public static $Name;
    public static $DOB;
    public static $School;
    public static $School_ID;
    public static $Hours;
    public static $Phone_Num;

    public function __construct(){
      $this->Name = "Noemi";

    }
    public static function insertData( $Name, $DOB, $School, $School_ID, $Hours, $Phone_Num){
        $db = MysqlConn::setConnection();
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
                $sql = "DELETE FROM Volunteer WHERE Name = '$Name'";
                $db = MysqlConn::setConnection();
                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }
    public static function selectVolunteer($Name){

        $db = MysqlConn::setConnection();

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
      $db = MysqlConn::setConnection();

        $sql = "SELECT * FROM Volunteer";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($retrieval);
    }
}
?>
