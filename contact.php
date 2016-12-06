<?php
include("head.php");
?>

<?php

include("nav.php"); ?>

    
      <!-- This is the Forms-->
          <div class="container">

              <div class="col-sm-6">
                  <h3>Customer Service</h3>
                  <p><a href="#">Order Status</a></p>
                  <p><a href="#">FAQ</a></p>
                  <p><a href="#">Warranty</a></p>

                  <h3>Quick Links</h3>
                  <p><a href="#">View Recent Orders</a></p>
                  <p><a href="#">Track By Order Number</a></p>
                  <p><a href="#">Forgot Password?</a></p>
                  <p><a href="#">Find Our Stores</a></p>

                  <h3>Contacts</h3>
                  <p>
                  United States
                  Email: Send Us A Message
                  Customer Service Hours of Operation:
                  Phone: (800) 622-6953
                  M-F 5am - 8pm PST
                  Memorial Day 5/30
                  6am - 6pm
                  </p>
                  <p>
                  Warranty Service Hours of Operation:
                  Phone: (800) 622-6953 - press 3
                  M-F: 8am - 5pm PST
                  Memorial Day 5/30
                  CLOSED
                  </p>
              </div>

              <div class="col-sm-6">
                  <form action="mailto:andrew.adhigunarsa@gmail.com" method="post" id="contactform" enctype="text/plain">
                      <div class="form-group">
                          <label for="formfullname" class="control-label">Full Name:</label>
                          <input type="text" class="form-control" name="fullname" id="formfullname">
                      </div>
                      <div class="form-group">
                          <label for="email" class="control-label">E-mail address:</label>
                          <input type="email" class="form-control" name="email" id="email">
                      </div>
                       <div class="form-group">
                          <label for="subject" class="control-label">Subject:</label>
                          <input type="text" class="form-control" name="subject" id="subject">
                      </div>
                      <div class="form-group">
                          <label for="message" class="control-label">Message:</label>
                          <textarea class="form-control" name="message" id="message" rows="10"> </textarea>
                      </div>
                      <div class="form-group">
                          <input type="submit" value="Send" class="btn btn-default">
                      </div>
                  </form>
              </div>

          </div>
          <div class="col-sm-12"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4002.1622219306623!2d38.203711441156514!3d44.42003640570356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDI1JzA5LjMiTiAzOMKwMTInMTkuMCJF!5e0!3m2!1sen!2sau!4v1458621797588" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe></div>

<?php include("footer.php") ?>
