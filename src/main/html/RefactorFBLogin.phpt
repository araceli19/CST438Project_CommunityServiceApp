//Refactor 1 and 2: Encapsulate/Invert boolean
--TEST--
establishConnection() function to ensure FB connection
--FILE--
<?php
include login.php;
establishConnection();
 ?>
--EXCPECT--
true

//Refactor 3: inline
--TEST--
establishConnection() function should be executed before others
--FILE--
<?php
include login.php
establishConnection();
?>
--EXPECT--
"We are connected."

//Refactor 4: Remove middleman
--TEST--
login() function now logins in and retrives data
--FILE--
<?php
include login.php
login();
?>
--EXCEPT--
first_name,last_name,name,id
