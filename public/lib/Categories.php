
<?php
//connects to volunter database
include_once("Database.php");

class Categories{
   public static $Category_ID;
    public static $Category;

    public function __construct(){
    //  $this->volunteer1 = new

    }
    public static function insertDataCategory($Category){
        $db = Database::setConnection();
            $sql = "INSERT INTO Categories(Category)
            VALUES('$Category');";


            $val = $db->prepare($sql);

            if($val->execute()){
                return true;
            }
            else{
                return false;
            }

    }
    public static function removeCategory( $Category){
  $db = Database::setConnection();

                $sql = "DELETE FROM Categories WHERE Category = '$Category'";

                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }
    public static function selectCategory($Category){

      $db = Database::setConnection();


        $sql = "SELECT Name FROM Categories WHERE Category ='$Category'";

        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetch();

        if($Category == $retrieval['Category']){

            return $retrieval['Category'];
        }
        else{
            return "";
        }
    }
    public static function getAllCategories(){
      $db = Database::setConnection();


        $sql = "SELECT * FROM Categories";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($retrieval);
    }
}
?>
