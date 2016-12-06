<?php
//getcategories.php
//this will receive the request from javascript and upload it from the database

include("../includes/database.php");
//this will send query to get data from the database
$query= "SELECT * FROM categories";
$result = $connection->query($query);
$categories = array();
  if ($result->num_rows>0){
    while($category = $result->fetch_assoc()){
      array_push($categories,$category);
    }
    //this will get the json data from the database and echo it
    echo json_encode($categories);
  }
 ?>
