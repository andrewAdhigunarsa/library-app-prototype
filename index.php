

<?php

include("head.php");
include("nav.php"); ?>

<div class="jumbotron bg">
  <div class="container">
    <div class="col-sm-10 jumbobox">


      <h1>Hello!</h1>
      <p>
        Find the knowledge of the world here.
      </p>
      <form id="search" method="get">
        <div class=" ">
          <div class="input-group">
            <input type="text" name="search" id="search_text" class="form-control input-lg" placeholder="Search for...">
            <span class="input-group-btn">
              <button id="seachbutton" class="btn btn-info btn-lg" type="submit" role="submit" style="font-weight:bold;">Search <span class="glyphicon glyphicon-search icon-lg"></span></button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </form>
    </div>
  </div>
</div>
<main>
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <h4>categories</h4>
        <nav>
          <ul class="nav nav-pills nav-stacked" id="categories">

          </ul>
        </nav>


      </div>
      <div class="col-sm-10">
        <div class="row" id="products">

        </div>
      </div>

    </div>

  </div>
</main>

<?php include("footer.php"); ?>
