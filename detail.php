<?php
include("includes/database.php");

$productid = $_GET["id"];
//use $query and $result for name because it's already used in nav.php to call the menu
$query = "SELECT * FROM books WHERE book_id='$productid'";
$result = $connection->query($query);
$row=$result->fetch_assoc();
$status = $row["status"];
$id=$row["book_id"];
$title=$row["title"];
$description = $row["long_description"];
$short_description = $row["book_description"];
$category = $row["category_id"];
$picture = $row["picture"];
$author = $row["author"];

$query3 = "SELECT * FROM loan WHERE title='$title'";
$result3 = $connection->query($query3);
$row2= $result3->fetch_assoc();
$titlecheck = $row2["title"];
?>


<?php include("head.php");?>
<?php include("nav.php");?>
<div class="container">
  <div class="row">
    <br>
    <div class="row">
      <?php


      if($result3->num_rows==0){


          echo "
          <div class='col-sm-4'>
          <img class='col-xs-12' src='$picture'>
          </div>
          <div class='col-sm-8'>
          <h1>$title</h1>
          <br>
          <p>$description</p>
          <form id=\"item-$id\" method=\"post\" action=\"addtobasket.php\">
          <input type=\"hidden\" name=\"productid\" value=\"$id\">
          <input type=\"hidden\" name=\"title\" value=\"$title\">
          <input type=\"hidden\" name=\"picture\" value=\"$picture\">
          <input type=\"hidden\" name=\"author\" value=\"$author\">
          <input type=\"hidden\" name=\"description\" value=\"$description\">
          <input type=\"hidden\" name=\"short_description\" value=\"$short_description\">
          <div class=\"form-group\">
          </div>
          <button class=\"btn btn-primary\" type=\"submit\" role=\"submit\">Add to Basket</button>
          </form>
          <a href='index.php'>Back</a>
          </div>
          ";
        }else{
          echo "
          <div class='col-sm-4'>
          <img class='col-xs-12' src='$picture'>
          </div>
          <div class='col-sm-8'>
          <h1>$title</h1>
          <br>
          <p>$description</p>
          <form id=\"item-$id\" method=\"post\" action=\"addtobasket.php\">
          <input type=\"hidden\" name=\"productid\" value=\"$id\">
          <input type=\"hidden\" name=\"title\" value=\"$title\">
          <input type=\"hidden\" name=\"picture\" value=\"$picture\">
          <input type=\"hidden\" name=\"author\" value=\"$author\">
          <input type=\"hidden\" name=\"description\" value=\"$description\">
          <input type=\"hidden\" name=\"short_description\" value=\"$short_description\">
          <div class=\"form-group\">
          </div>
          <br>
          <div class='alert alert-danger'>
          <strong>This book is out on loan</strong>.
          </div>
          </form>
          <a href='index.php'>Back</a>
          </div>
          ";
        };


      ?>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
