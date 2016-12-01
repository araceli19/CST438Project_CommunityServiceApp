<?php

include('include/database.php');
$dbConnection = getDatabaseConnection(); //use database connection from the database file


function getCategory(){
    global $dbConnection;
    $sql = "SELECT * FROM Categories WHERE Category_ID = :Category_ID";
    $statement = $dbConnection->prepare($sql);
    $statement->execute(array(":Category_ID"=>$_GET['Category_ID']));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}



function getCategoryTypes() {
    global $dbConnection;
    
    $sql = "SELECT Category
            FROM Categories";
    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    
    return $records;
    
}



function getAllCategories() {
    global $dbConnection;
    
    $sql = "SELECT Category FROM Categories ORDER BY Category";
    
    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}



 if (isset($_POST['addForm'])) {
     
     //ADD NEW CATEGORY
     $sql = "INSERT INTO 
            (Category) 
            VALUES (:Category)";
     $namedParameters = array();
     $namedParameters[':Category'] = $_POST['Category'];
     $statement = $dbConnection->prepare($sql);
     $statement->execute($namedParameters);
     echo "Category has been successfully added!";
     
 }


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Community Service Finder </title>
        
        <script>
        
            function confirmDeletion(Category){
                
                return confirm("Are you sure you want to delete " + Category + "?");
                
            }    
            
        </script>
    </head>
    <body>
        <h1>Community Service Finder</h1
        <h2>Website Operator-Manage Categories</h2>
        
        <br/>
        <b>Categories</b>
        <br/>
        
        <ul>
          <li>Environmental Science</li>
                <ul>
                <li>Description: Related to environmental science</li>
                    <ul>
                        <li>Example: Beach clean up, Plant trees</li>
                    </ul>
                </ul>
          
          
        </ul>
    </body>
    
    
<style type="text/css">


/*----- Tabs -----*/
.tabs {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});
</script>

<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">Add Category</a></li>
        <li><a href="#tab2">Remove Category</a></li>

        
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <div id="Info">
               <?php 
            
                $category = getCategory();
            
            ?>
                <form method="post">
        <p>
            <strong>Name:</strong>
            <input type="text" name="Category" value="<?=$category['Category']?>" />
            
        </p>

         
           <input type="submit" value="Add Category" name="addForm" />
           </form>
       
            </div>

        </div>
 
        <div id="tab2" class="tab">
            <p>Remove Category</p>
            <?php
        
                $allCategories = getAllCategories();
                    foreach ($allCategories as $category) {
             
                    
                     echo $category['Category'] . "</a>";
                     
                     echo "<form action='deleteCategory.php' onsubmit='return confirmDeletion()>";
                     echo  "<input type='hidden' name='Category_ID' value=".$category['Category_ID'].">";
                     echo  "<input type='submit' value='Delete Category'>";
                     echo "</form>";
                     echo "<br />";
                     
                 }
                
                ?>

            <form method="post">
            </form>
            
            
        </form>
        </div>
 
        
 
        
    </div>
</div>

<div id="ProfilePage">
    <div id="LeftCol">


        
    </div>

    
    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>
</html>