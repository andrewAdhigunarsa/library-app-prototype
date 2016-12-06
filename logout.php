<?php
include("head.php");
unset($_SESSION["email"]);
unset($_SESSION["basket"]);
session_destroy();
?>

<?php

include("nav.php"); ?>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3><?php echo "You have been logged out, thank you for visiting";?></h3>
          </div>

        </div>

      </div>
<?php include("footer.php") ?>
