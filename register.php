<?php
include("head.php");


  include("passwordLib.php");
  include("includes/database.php");
  if(count($_POST)>0){
    $email = $_POST["email"];
    if(empty($email)||empty($_POST["password"])){
      echo "fields cannot be blank";
      exit();
    }

    // check if the user already exists
    if(checkEmail($email,$connection)){
      echo "Email already exists";
    } else {
      $password = $_POST["password"];
      $first_name = $_POST["first_name"];
      $last_name = $_POST["last_name"];
      // add salt
      // generate random id using uniqid()
      // $email is prefix to add more security for the uniqid
      // the problem with uniqid is if a user register at the same micro second they will have the same id

      // $salt = uniqid($email);
      //
      // //we add salt to the password
      // $password=$password.$salt;
      //
      // $hashed = md5($password);
      // include("database.php");
      //to input the data into the mysql database

      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $query2 = "INSERT INTO borrower (first_name, last_name, email, password) VALUES ('$first_name','$last_name','$email','$hashed');";
      if($connection->query($query2)){
        echo "success";
        header("Location: login.php");
      } else {
        echo "registration failed";
      }
    }
  }
  // fuction check if user is already registered
  function checkEmail($email_address,$connection){
    $query = "SELECT email FROM borrower WHERE email='$email_address';";
    $result= $connection->query($query);
    if($result->num_rows>0){
      //user exists
      return true;
    } else {
      //user does not exists
      return false;
    }
  }


include("nav.php");


?>

<div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <h1>Sign up for an account</h1>

        <form class="" id="sign-up" action="register.php" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="first_name" placeholder="Firstname" id="firstname" style="margin-bottom:10px;">
            <input class="form-control" type="text" name="last_name" placeholder="Lastname" id="lastname">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="you@domain.com" id="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <button role="submit" class="btn btn-default">Sign me up</button>
        </form>

      </div>

    </div>

  </div>

<?php include("footer.php") ?>
