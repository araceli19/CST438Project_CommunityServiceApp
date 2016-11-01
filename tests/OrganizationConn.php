<?php

include 'Database.php';
class OrganizationConn{


   public static $ID;
    public static $Contact_name;
    public static $Org_Name;
    public static $Phone_Num;
    public static $Email;
    public static $Password;

    
    public static function insertDataOrg($Contact_name, $Org_Name, $Phone_Num, $Email, $Password)
    {
        $db = Database::setConnection();
            $sql = "INSERT INTO Volunteer_Organization(Contact_name, Org_Name, Phone_Num, Email, Password)
            VALUES('$Contact_name', '$Org_Name', '$Phone_Num', '$Email', '$Password');";


            $val = $db->prepare($sql);

            if($val->execute()){
                return true;
            }
            else{
                return false;
            }

    }
    public static function removeVolunteerOrg($Contact_name, $Org_Name, $Phone_Num, $Email, $Password){
  $db = Database::setConnection();

                $sql = "DELETE FROM Volunteer_Organization WHERE Contact_name = '$Contact_name'";

                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }
    public static function selectVolunteerOrg($Contact_name){

      $db = Database::setConnection();


        $sql = "SELECT Name FROM Volunteer_Organization WHERE Contact_name ='$Contact_name'";

        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetch();

        if($Contact_name == $retrieval['Contact_name']){

            return $retrieval['Contact_name'];
        }
        else{
            return "";
        }
    }
    public static function getAllOrg(){
      $db = Database::setConnection();

        $sql = "SELECT * FROM Volunteer_Organization";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($retrieval);
    }
}
?>
