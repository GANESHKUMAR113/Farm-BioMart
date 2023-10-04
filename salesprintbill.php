<?php
include("header.php");
?>
  <main id="main">

   
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br>
		<br>
		<br>
          <h3>Bill Receipt</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="info">
              <div class="logo mr-auto ml-auto">
          <center><h1 class="text-light"><a href="index.php"><img src="img/logo.png" alt="logo" width=300px></a></h1></center>
		  
        </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="info mt-4">
		<i class="fa-solid fa-file-invoice" style="color: #ffffff;"></i>
                  <h4>Payment Bill:</h4>
 <?php
$sqlbill = "SELECT * FROM purchase_order_bill where purchase_order_bill_id='$_GET[purchase_order_bill_id]'";
$qsqlbill = mysqli_query($con,$sqlbill);
$rsbill = mysqli_fetch_array($qsqlbill);
$sqlpurchase_order = "SELECT * FROM purchase_order WHERE purchase_order_id='$rsbill[purchase_order_id]'";
$qsqlpurchase_order = mysqli_query($con,$sqlpurchase_order);
$rspurchase_order = mysqli_fetch_array($qsqlpurchase_order);
$sqlcustomer = "SELECT * FROM customer WHERE customer_id='$rspurchase_order[customer_id]'";
$qsqlcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer = mysqli_fetch_array($qsqlcustomer);
$sqlcststate = "SELECT * FROM state WHERE state_id='$rscustomer[state_id]'";
$qcststate  = mysqli_query($con,$sqlcststate);
$rscststate  = mysqli_fetch_array($qcststate);
$sqlcstcity = "SELECT * FROM city WHERE city_id='$rscustomer[city_id]'";
$qsqlcstcity = mysqli_query($con,$sqlcstcity);
$rscstcity = mysqli_fetch_array($qsqlcstcity);
$sqlseller = "SELECT * FROM seller WHERE seller_id='$rspurchase_order[seller_id]'";
$qsqlseller = mysqli_query($con,$sqlseller);
$rsseller = mysqli_fetch_array($qsqlseller);
$sqlselstate = "SELECT * FROM state WHERE state_id='$rsseller[state_id]'";
$qselstate  = mysqli_query($con,$sqlselstate);
$rsselstate  = mysqli_fetch_array($qselstate);
$sqlselcity = "SELECT * FROM city WHERE city_id='$rsseller[city_id]'";
$qsqlselcity = mysqli_query($con,$sqlselcity);
$rsselcity = mysqli_fetch_array($qsqlselcity);
?>				  
				  
<p><b>Order Bill Number:</b> <?php echo $rsbill['purchase_order_bill_id']; ?></p>	
<p><b>Paid Date:</b> <?php echo $rsbill['paid_date']; ?></p>
<p ><b>Customer Name:</b> <?php echo $rscustomer['customer_name']; ?></p>
<p ><b>Seller Name:</b> <?php echo $rsseller['seller_name']; ?></p>
</div>
</div>
              <div class="col-md-4 mt-4">
                <div class="info">
                  <i class="fa-regular fa-envelope"> </i>   
		<h4>Customer address:</h4>     
                  <p><?php echo $rscustomer['address']; ?><br>
					  <?php echo $rscstcity['city']; ?> <br>
					  <?php echo $rscststate['state']; ?> <br>
					  PIN Code:<?php echo $rscustomer['pincode']; ?><br>
					  Ph. No. <?php echo $rscustomer['contact_no']; ?>
					  </p>
                </div>
              </div>
              <div class="col-md-4 mt-4">
                <div class="info">
                  <i class="fa-regular fa-envelope"></i>
                  <h4>Seller Address:</h4>
                  <p><?php echo $rsseller['seller_address']; ?> <br>
                                    <?php echo $rsselcity['city']; ?> <br>
                                    <?php echo $rsselstate['state']; ?> <br>
PIN Code: <?php echo $rsseller['pincode']; ?><br>
					  Ph. No. <?php echo $rsseller['contact_number']; ?></p>
                </div>
              </div>
            </div>

            <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
              <div class="form-row">
                <div class="col-md-12 form-group">
<h2>Product Details</h2>
<table width="755" border="0" class="table table-bordered">
  <tbody>
    <tr>
      <th>Image</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
      <?php
	  		$i=1;
			$tot=0;
			$sqlproduct = "SELECT * FROM product WHERE product_id='$rspurchase_order[product_id]'";
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			$rsproduct = mysqli_fetch_array($qsqlproduct);
			
			  echo "
					<tr>
					<td><img src='imgproduct/$rsproduct[img_1]' width='40' height='40'></td>
					  <td>$rsproduct[title]</td>
					  <td>$rupeesymbol $rspurchase_order[quantity] $rsproduct[quantity_type]</td>
					  <td><span id='calccost$i'>$rupeesymbol " . $rspurchase_order['purchase_amt'] ."</span></td>					  
					</tr>";
	  ?>
    <tr>
      <th height="33" scope="row"></th>
      <th></th>
      <th>Grand total</th>
      <th> <?php echo $rupeesymbol; ?> <?php echo $rspurchase_order['purchase_amt']; ?></th>

    </tr>
  </tbody>
</table>
<hr>
<table width="755" border="0" class="table table-bordered">
				            <tbody>
				              <tr>
				                <th width="231" height="31" scope="row" align="right">Payment type:</th>
				                <th width="514" height="31" scope="row" align="left"><?php echo $rsbill['payment_type']; ?></th>
			                  </tr>
				              
				              <tr>
				                <th height="33" scope="row" align="right">Paid Date:</th>
				                <th align="left"> <?php echo $rsbill['paid_date']; ?></th>
			                  </tr>
                              
                              
				              <tr>
				                <th height="33" scope="row" align="right">Seller Bank Account detail:</th>
				                <th align="left">
								<?php
                                echo " Bank Name:  ". $rsseller['bank_name'] . "<br>";
                                echo " Bank Account number:  " .$rsseller['bank_acno'] . "<br>";
                                echo " Branch:  ".$rsseller['bank_branch'] . "<br>";
                                echo " IFSC Code:  ". $rsseller['bank_IFSC'] . "<br>";																							
								?>
                                </th>
			                  </tr>
			                </tbody>
			              </table>
<hr>
<center><button onclick="myFunction()" autofocus class="btn btn-primary">Print Bill</button></center>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
<script>
function myFunction() {
    window.print();
}
</script>