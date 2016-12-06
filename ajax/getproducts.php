<?php
//getproducts.php
//this will receive the request from javascript and upload it from the database

include("../includes/database.php");
//this will send query to get data from the database
$query = "SELECT * FROM books";

if(isset($_GET["category"]) && $_GET["category"]!=0){
  $category = filter_var($_GET["category"],FILTER_SANITIZE_NUMBER_INT);
  $query = $query." "."WHERE category_id='$category'";
  }
  $books = array();
  $result = $connection->query($query);
    if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
      array_push($books,$row);
    }
  }
echo json_encode($books);
?>
