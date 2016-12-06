<?php


include("../includes/database.php");

$query7 = "SELECT * FROM books";

if(isset($_GET["search"]) && $_GET["search"]!=""){
  $search_query = filter_var($_GET["search"],FILTER_SANITIZE_STRING);
  $query7 = $query7." "."WHERE title LIKE '%$search_query%' OR book_description LIKE '%$search_query%' OR author LIKE '%$search_query%' OR category_id LIKE '%$search_query%'";
  }
  $books = array();
  // $books[0]=$query7;
  // $books[1]=$_GET["search"];

  $result7 = mysqli_query($connection, $query7);
  if($result7->num_rows>0){
    while($row = $result7->fetch_assoc()){
      array_push($books,$row);
    }
  }else{
    echo 'data not found';
  }

echo json_encode($books);


// backup
// OR description LIKE '%$search_query%'
// OR author LIKE '%$search_query%'
// OR category_id LIKE '%$search_query%'
  ?>
