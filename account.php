<?php
include("head.php");

?>

<?php

include("nav.php");

$email = $_SESSION["email"];
$query = "SELECT * FROM borrower WHERE email='$email'";
$result = $connection->query($query);


?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#personal">Personal information</a></li>
        <li><a data-toggle="tab" href="#loan">Loan</a></li>
      </ul>

      <div class="tab-content">
        <div id="personal" class="tab-pane fade in active">
          <div class="cos-xs-12 col-sm-4">
            <h3>HOME</h3>
            <div class="col-xs-12 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="fullwidth center-block img-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>


          <div class="col-xs-12 col-sm-8">

            <table class="table table-striped">
              <h3>Details</h3>
              <?php
              if($result->num_rows>0){
                $row=$result->fetch_assoc();
                $firstname= $row["first_name"];
                $lastname=$row["last_name"];
                $email1=$row["email"];
                $password=$row["password"];
                echo "
                <tr>
                <td>Firstname</td>
                <td>$firstname</td>
                </tr>
                <tr>
                <td>Lastname</td>
                <td>$lastname</td>
                </tr>
                <tr>
                <td>Email</td>
                <td>$email1</td>
                </tr>

                ";

              }
              ?>

            </table>

          </div>
        </div>
        <div id="loan" class="tab-pane fade">
          <table class="table table-striped">
            <h3>My Loan</h3>
            <thead>
              <tr>
                <th>ID</th>
                <th>Pic</th>
                <th>Title</th>
                <th class='hidden-xs'>Author</th>
                <th class='hidden-xs'>Description</th>
                <th>Date due</th>
                <th>Return</th>
              </tr>
            </thead>
              <tbody id="loanbox">
            <?php
            // $query2 = "SELECT * FROM loan WHERE email='$email'";
            // $result2 = $connection->query($query2);
            //
            //
            // if($result2->num_rows>0){
            //   while($row2=$result2->fetch_assoc()){
            //     $picture=$row2["picture"];
            //     $title=$row2["title"];
            //     $author=$row2["author"];
            //     $short_description=$row2["short_description"];
            //     $datedue=$row2["date_due"];
            //     $id=$row2["book_id"];
            //
            //     echo "
            //     <form id='formreturn' method='post'>
            //     <tr>
            //     <td id='bookid'>$id</td>
            //     <td><img class='col-xs-12' src='$picture'></td>
            //     <td>$title</td>
            //     <td class='hidden-xs'>$author</td>
            //     <td class='hidden-xs'>$short_description</td>
            //     <td>$datedue</td>
            //     <td>
            //     <input type='hidden' value='$id' name='returnid'>
            //     <button class='btn btn-info' id='returnButton' type='submit' role='submit'>RETURN</button></td>
            //     </tr>
            //     </form>
            //     ";}
            //
            //   }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
  <?php include("footer.php") ?>
