<?php



 /*local*/
$db_host = "localhost";
$db_username = "root"; 
$db_pass = ""; 
$db_name = "test";
 


$conn = mysql_connect("$db_host","$db_username","$db_pass") or die ("Connection to MySQL database failed!!!");
$var = mysql_select_db("$db_name") or die ("No such database exists!!!");             

?>