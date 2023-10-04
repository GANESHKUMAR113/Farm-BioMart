<?php
include("header.php");
if(isset($_SESSION['customerid']))
{
	echo "<script>window.location='customerpanel.php';</script>";
}
if(isset($_SESSION['sellerid']))
{
	echo "<script>window.location='sellerpanel.php';</script>";
}
if(isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminpanel.php';</script>";
}
?>

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Farmer Login/Register</h2>
              <hr>
              <p>Online platform links farmers to buyers Buy and sell your Agriculture produce online free (Buyers meet Farmers) - sell or buy agriculture product online....<br></p>
            </div>
          </div>
          <div class="col-lg-8 mr-auto ml-auto">
            <div class="row">
              <div class="col-md-6 d-flex align-items-stretch">
                <div class="icon-box" style="width: 100%;">
                  <div class="icon"><i class="bx bx-lock"></i></div>
                  <h4><a href="sellerloginpanel.php">Existing Farmer</a></h4>
				        
				  <button type="button" class="btn btn-info btn-lg btn-block" onclick="window.location='sellerloginpanel.php'">Sign In  & Get Started</button>
                </div>
              </div>
              <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box" style="width: 100%;">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="seller.php">New User</a></h4>
				  <button type="button" class="btn btn-warning btn-lg btn-block"  onclick="window.location='seller.php'" >Sign Up (It's Free)</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

<hr>
  </main><!-- End #main -->
  
<?php
include("footer.php");
?>