

//Test case for refactors 1 and 2
--TEST--
createSearchTable($parameter) function - for value of needed object
--FILE--
<?php
include volunteerSearch.php;
$para = getVolunteers();
createSearchTable($para);
if($vol['School']!=NULL) die ($vol['School'])
?>
--EXCPECT--
$vol['School']



//Test case for refactor 3: inline method
--TEST--
createSearchTable($parameter) function - make sure line is called
--FILE--
<?php
include volunteerSearch.php;
createSearchTable($para);
?>
--EXPECT--
True



//Test case for refactor 4: introduce parameter object
--TEST--
createSearchTable($parameter) function - make sure correct parameter is passed
--FILE--
<?php
include volunteerSearch.php;
$para = getVolunteers();
createSearchTable($para);
if($para != getVolunteers()) die(False);
?>
--EXPECT--
True
