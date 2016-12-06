<?php
include("head.php");

  include("passwordLib.php");
  if(count($_POST)>0){
    $email = $_POST["email"];
    $password = $_POST["password"];
    include("includes/database.php");
    //to input the data into the mysql database
    $query = "SELECT * FROM borrower WHERE email='$email'";
    $result = $connection->query($query);
    $user = $result->fetch_assoc();
    $id = $user["borrower_id"];
    $stored_password = $user["password"];

    if(password_verify($password,$stored_password)){
      //echo "Success";
      $_SESSION["id"]= $id;
      $_SESSION["email"] = $email;
      //this code is to redirect it to the location written which in this case the homepage
      header('location: index.php');

    } else {
      $message="Wrong password or email";

    }
  }

include("nav.php");
?>

<div class="loginbackground">



<div class="loginbox">


<div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 whitebox">
          <h1>Login</h1>

          <form class="" id="login" action="login.php" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" placeholder="you@domain.com" id="email">
            </div>
            <div class="form-group">

              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password">
              <?php
              if(count($_POST)>0){
                $email = $_POST["email"];
                $password = $_POST["password"];
              $query = "SELECT * FROM borrower WHERE email='$email'";
              $result = $connection->query($query);
              $user = $result->fetch_assoc();

              if(!password_verify($_POST["password"],$user["password"])){

                echo"
                <br>
                <div class='alert alert-danger'>
                <strong>Wrong password or email mate</strong>.
                </div>
                ";
              }}
               ?>
            </div>
            <button role="submit" class="btn btn-default">Sign in</button>
          </form>

        </div>

      </div>

    </div>
</div>
</div>
<?php include("footer.php") ?>
