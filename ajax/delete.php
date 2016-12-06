<?php
session_start();

include("../includes/database.php");
$success = array();
if(isset($_POST['returnid'])){
  $returnid = filter_var($_POST["returnid"],FILTER_SANITIZE_NUMBER_INT);
  $query8 = "DELETE FROM loan WHERE book_id='$returnid'";
  if($result8 = $connection->query($query8)){
    $success["delete"]=true;
  }
  else{
    $success["delete"]=false;
  }
}
echo json_encode($success);

?>
