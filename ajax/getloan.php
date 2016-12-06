<?php
//getproducts.php
//this will receive the request from javascript and upload it from the database
session_start();
include("../includes/database.php");
//this will send query to get data from the database
if(isset($_SESSION["email"])){
  $email = $_SESSION["email"];
  $query2 = "SELECT * FROM loan WHERE email='$email'";
}

$loan = array();
$result2 = $connection->query($query2);
if($result2->num_rows>0){
  while($row2=$result2->fetch_assoc()){
    array_push($loan,$row2);
  }
}
echo json_encode($loan);
?>
