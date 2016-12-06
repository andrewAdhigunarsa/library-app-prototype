<?php
//making a database connection
$database = "library_database";
$databasehost = "localhost";
$databaseuser= "user";
$databasepassword = "password";
$connection = mysqli_connect($databasehost,$databaseuser,$databasepassword,$database);
if(!$connection){
  echo "connection error";
}
?>
