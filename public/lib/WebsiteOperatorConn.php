
<?php
//testing Website Operator, back en query connection
//connect to database
include_once("Database.php");
class WebsiteOperatorConn{


    public static $ID;
    public static $Name;
    public static $Phone_Num;
    public static $Email;
    public static $Password;


//insert data, using query
    public static function insertDataWebsiteOp($Name, $Phone_Num, $Email, $Password)
    {
        $db = Database::setConnection();
            $sql = "INSERT INTO Website_Operator(Name,Phone_Num, Email, Password)
            VALUES('$Name', '$Phone_Num', '$Email', '$Password');";


            $val = $db->prepare($sql);

            if($val->execute()){
                return true;
            }
            else{
                return false;
            }

    }
    //remove one operator
    public static function removeWebsiteOp($Name, $Phone_Num, $Email, $Password){
  $db = Database::setConnection();

                $sql = "DELETE FROM Website_Operator WHERE Name = '$Name'";

                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }
    //select only one
    public static function selectWebsiteOp($Name){

      $db = Database::setConnection();


        $sql = "SELECT Name FROM Website_Operator WHERE Name ='$Name'";

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
    //retrieve all
    public static function getAllWebsiteOp(){
      $db = Database::setConnection();

        $sql = "SELECT * FROM Website_Operator";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($retrieval);
    }
}
?>
