<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
$dt = date("Y-m-d");
$rupeesymbol= "₹";
include("dbconnection.php");
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Farm-BioMart</title>
  <meta content="" name="Farm-BioMart">
  <meta content="Farm-BioMart" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!--Bootstrap CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"          crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container-fluid">
      <div class="header-container d-flex align-items-center">
        <div class="logo">
          <a href="index.php"><img src="img/logo.png" alt="logo" width=200px></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
		  
            <li class="<?php
                            if(basename($_SERVER['PHP_SELF']) == "index.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="index.php">Home</a></li>

			<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "displaysales.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="displaysales.php" onclick='window.location=`displaysales.php`'>Farmer's Market</a>
              <ul>
<?php
$sqlcategoryfm = "SELECT * FROM category where status='Active' AND category_type='Produce'";
$qsqlcategoryfm =mysqli_query($con,$sqlcategoryfm);
echo mysqli_error($con);
while($rscategoryfm = mysqli_fetch_array($qsqlcategoryfm))
{
echo "<li><a href='displaysales.php?category_id=$rscategoryfm[category_id]&category=$rscategoryfm[category]'  onclick='window.location=`displaysales.php?category_id=$rscategoryfm[category_id]&category=$rscategoryfm[category]`'>$rscategoryfm[category]</a></li>";
}
?>
              </ul>
            </li>
			
			
	
	<li class="drop-down"><a href="#">News & Articles</a>
	  <ul>
			<li><a href="displaynews.php?articletype=News">News</a></li>
			<li><a href="displayarticles.php?articletype=Blog">Articles</a></li>
	  </ul>
	</li>
	

<?php
if(isset($_SESSION['customerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "customerpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchaserequest.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchaseorder.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php"  )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="customerpanel.php">Customer Panel</a></li>					
    <li><a href="viewpurchaserequest.php">View Farm Product Purchase request</a></li>
    <li><a href="viewcstpurchaseorder.php">View Farm Product Purchase Orders</a></li>
    <li><a href="viewpurchasereport.php">View Billing Report</a></li>
	<li><a href="customerUpdate.php">Update Profile</a></li>
	<li><a href="Customerchngpassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else if(isset($_SESSION['sellerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewpurchaseorder.php" || basename($_SERVER['PHP_SELF']) == "sellerpanelchart.php" || basename($_SERVER['PHP_SELF']) == "Product.php" || basename($_SERVER['PHP_SELF']) == "viewProduct.php" || basename($_SERVER['PHP_SELF']) == "sellerprofile.php" || basename($_SERVER['PHP_SELF']) == "Sellerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "sellerpanel.php" || basename($_SERVER['PHP_SELF']) == "article.php" || basename($_SERVER['PHP_SELF']) == "viewarticle.php")
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="sellerpanel.php">Farmer Panel</a></li>
		
	<li class="drop-down"><a href="#">My Profile</a>
	  <ul>
			<li><a href="sellerprofile.php">Update Profile</a></li>
			<li><a href="Sellerchngpassword.php">Change Password</a></li>
	  </ul>
	</li>
	
	<li class="drop-down"><a href="#">Selling Products</a>
	  <ul>
			<li><a href="Product.php">Put Your Products On Sale</a></li>
			<li><a href="viewProduct.php">View Your Products On Sale</a></li>
	  </ul>
	</li>
			
	<li class="drop-down"><a href="#">Farm Sales Report</a>
	  <ul>
			<li><a href="sellerpanelchart.php">Progress Chart</a></li>
          	<li><a href="viewsellerpurchaserequest.php">View Purchase Request</a></li>
         	<li><a href="viewpurchaseorder.php">View Purchase Orders</a></li>
          	<li><a href="viewpurchasereport.php">Purchase Billing Report</a></li>
	  </ul>
	</li>
	<li class="drop-down"><a href="#">Article</a>
	  <ul>
<li><a href="article.php">Publish News & Articles</a></li>
<li><a href="viewarticle.php">View News & Articles</a></li>
	  </ul>
	</li>
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else if(isset($_SESSION['adminid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "adminpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "adminpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "viewcustomerReg.php" || basename($_SERVER['PHP_SELF']) == "viewadminpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewadminpurchaserequest.php" || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "admin.php" || basename($_SERVER['PHP_SELF']) == "viewadmin.php" || basename($_SERVER['PHP_SELF']) == "chngadminpassword.php" || basename($_SERVER['PHP_SELF']) == "city.php" || basename($_SERVER['PHP_SELF']) == "viewcity.php" || basename($_SERVER['PHP_SELF']) == "state.php" || basename($_SERVER['PHP_SELF']) == "viewstate.php" || basename($_SERVER['PHP_SELF']) == "country.php" || basename($_SERVER['PHP_SELF']) == "viewcountry.php" || basename($_SERVER['PHP_SELF']) == "category.php" || basename($_SERVER['PHP_SELF']) == "viewcategory.php" || basename($_SERVER['PHP_SELF']) == "Produce.php" || basename($_SERVER['PHP_SELF']) == "viewProduce.php" || basename($_SERVER['PHP_SELF']) == "variety.php" || basename($_SERVER['PHP_SELF']) == "viewvariety.php" || basename($_SERVER['PHP_SELF']) == "sellingproduce.php" || basename($_SERVER['PHP_SELF']) == "viewSellingProduce.php" || basename($_SERVER['PHP_SELF']) == "viewseller.php" || basename($_SERVER['PHP_SELF']) == "sellingproduct.php" || basename($_SERVER['PHP_SELF']) == "viewsellingproduct.php" || basename($_SERVER['PHP_SELF']) == "article.php" || basename($_SERVER['PHP_SELF']) == "viewarticle.php" )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="adminpanel.php">Admin Panel</a></li>
		
	<li class="drop-down"><a href="#">Report</a>
	  <ul>
		<li><a href="viewcustomerReg.php">Customer Details</a></li>      
		<li><a href="viewseller.php">Farmers Details</a></li>
		<li><a href="viewSellingProduce.php">Selling Product Details</a></li>
		<li><a href="viewadminpurchaserequest.php">Product Purchase Reports</a></li>
		<li><a href="viewpurchasereport.php">Product Billing Reports</a></li>
	  </ul>
	</li>

	
		
	<li class="drop-down"><a href="#">Farmer Settings</a>
	  <ul>
<li><a href="category.php?cattype=Produce">Add Product category</a></li>
<li><a href="viewcategory.php?cattype=Produce">View Product category</a></li>   
<li><a href="Produce.php">Add Product types</a></li>
<li><a href="viewProduce.php">View Product types</a></li>
	  </ul>
	</li>
			
	<li class="drop-down"><a href="#">Article</a>
	  <ul>
<li><a href="article.php">Publish News & Articles</a></li>
<li><a href="viewarticle.php">View News & Articles</a></li>
	  </ul>
	</li>

	<li class="drop-down"><a href="#">Settings</a>
	  <ul>    
		<li><a href="city.php">Add City</a></li>
		<li><a href="viewcity.php">View City</a></li>
		<li><a href="state.php">Add State</a></li>
		<li><a href="viewstate.php">View State</a></li>
		<li><a href="chngadminpassword.php">Change My Password</a></li>
	  </ul>
	</li>
	
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else
{
?>
<li class="drop-down"><a href="">My Account</a>
  <ul>
	<li><a href="customerreglogin.php">Customer Account</a></li>
	<li><a href="farmerreglogin.php">Farmer Account</a></li>
  </ul>
</li>
<?php
}
?>	
			<li><a href="contact.php">Contact</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->