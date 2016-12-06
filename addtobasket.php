<?php
//add items to  shopping cart
session_start();
include("includes/database.php");




if(isset($_SESSION["email"]))
{$email = $_SESSION["email"];
}

if(count($_POST)>0){

  $productid = filter_var($_POST["productid"],FILTER_SANITIZE_NUMBER_INT);
  $title = $_POST["title"];
  $picture = filter_var($_POST["picture"],FILTER_SANITIZE_STRING);
  $author = filter_var($_POST["author"],FILTER_SANITIZE_STRING);
  $description = filter_var($_POST["description"],FILTER_SANITIZE_STRING);
  $short_description = filter_var($_POST["short_description"],FILTER_SANITIZE_STRING);
}


//check if cart already exists
if(!isset($_SESSION["basket"])){
  $_SESSION["basket"] = array();
}
array_push($_SESSION["basket"],array("product_id"=>$productid,
                                    "title"=>$title,
                                    "picture"=> $picture,
                                    "author"=> $author,
                                    "description"=> $description,
                                    "short_description"=>$short_description));

//put cart into the database
$query = "INSERT INTO loan (book_id,title,picture,author,short_description,email,loan_date,date_due)
          VALUES ('$productid','$title','$picture','$author','$short_description','$email', NOW(), (NOW() + INTERVAL 14 DAY))";

// $query = $query." "."UPDATE books SET status='1' WHERE title='$title'";

//run the query
if($connection->query($query) && isset($_SESSION["email"])){
  //success
  header('location:account.php');
} else{
  //fail
  header('location:login.php');
}


?>
