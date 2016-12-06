<?php
// print_r(get_defined_vars());
?>

<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">TheLibrary</a>
    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">

      <?php
      include("includes/database.php");


      $query1 = "SELECT*FROM pages WHERE active='1' ";
      if(!isset($_SESSION["email"])){
        $query1 = $query1."AND needlogin='0'";
      }
      if(isset($_SESSION["email"])){
        $query1 = $query1."AND hideonlogin='0'";
      }
      // if($this->user->admin==false){
      //   $query = $query."AND needadmin=0";
      // }
      //trun query and get pages from "pages" table
      $result1 = mysqli_query($connection, $query1);
      if($result1->num_rows>0){
        //get the result as an associative array using fetch_assoc
        while($subject = mysqli_fetch_assoc($result1)){
          ?>
          <li><a href="<?php echo $subject['link'] ?>"><?php echo $subject["title"]; ?>
          </a></li>
          <?php }
        }
        ?>


      </ul>

      <?php
      if(isset($_SESSION["email"])){

      $sessionemail = $_SESSION["email"];
      $querybasket = "SELECT * FROM loan WHERE email='$sessionemail'";
      $resultbasket = mysqli_query($connection, $querybasket);
      $subjectrow = mysqli_fetch_assoc($result1);
      if(isset($_SESSION["email"])){
        ?>
        <span id="badge" class="badge" style="margin-top:15px;">
        </span>
        <?php } }?>

        <ul class="nav navbar-nav navbar-right" >
          <?php
          // if(!isset($_SESSION["email"])){
          //   echo "<li><a href=\"admin.php\">Admin login</a></li>";
          // }else{
          //   echo "<li><a href=\"logout.php\">Admin logout</a></li>";
          // }


          ?>
        </ul>

      </div>
    </nav>

    <?php
    //isset is to set the session
    // if(isset($_SESSION["email"])){
    // echo "hello".$_SESSION["email"];
    // }

    // if(!isset($_SESSION["id"])){
    //   $_SESSION["id"] = uniqid();
    // }

    ?>
