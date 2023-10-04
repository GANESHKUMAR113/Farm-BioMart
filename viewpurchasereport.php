<?php 
include("header.php");
include("dbconnection.php");
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br><br>
          <h3>Farm Products Purchase Bill Report</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12">
            <div class="info mt-4 ">
			

	<?php
	$sqlbill = "SELECT * FROM purchase_order_bill INNER JOIN purchase_order ON purchase_order.purchase_order_id = purchase_order_bill.purchase_order_id ";
	if(isset($_SESSION['sellerid']))
	{
		$sqlbill = $sqlbill . " WHERE purchase_order.seller_id='$_SESSION[sellerid]' ORDER BY purchase_order_bill_id DESC";
	}
	if(isset($_SESSION['customerid']))
	{
		$sqlbill = $sqlbill . " WHERE purchase_order.customer_id='$_SESSION[customerid]' ORDER BY purchase_order_bill_id DESC";
	}
	//echo $sqlbill;
	$qsqlbill = mysqli_query($con,$sqlbill);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsqlbill)  == 0)
	{
		echo "<center>There is no Purchase Report to display!!</center>";
	}
	else
	{
	?>
	<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
	<THEAD>
	<tr>
	<th height="35">Bill No.</th>
	<th>Product</th>
	<th>Payment Type</th>
	<th>Paid Date</th>
        <th>Quantity</th>
	<th>Paid Amount</th>
	<th>Action</th>
	</tr>
	</THEAD>
	<TBODY>
        <?php
							  
							  while($rsbill = mysqli_fetch_array($qsqlbill))
							  {
											$sqlproduct = "SELECT * FROM product WHERE product_id='$rsbill[8]'";
											$qsqlproduct = mysqli_query($con,$sqlproduct);									
									 		$rsproduct = mysqli_fetch_array($qsqlproduct);
										  echo "
										<tr>
										  <td>$rsbill[0]</td>
										  <td>$rsproduct[title]</td>
										  <td>$rsbill[payment_type]</td>
										  <td>$rsbill[paid_date]</td>
										  <td>$rsbill[15] $rsproduct[quantity_type]</td>
										  <td>$rupeesymbol $rsbill[paid_amt]</td>
										  <td><a href='salesprintbill.php?purchase_order_bill_id=$rsbill[0]'>Print</a></td>
										</tr>";
							  }
							  ?>
								</TBODY>
						  </table>
						<?php
						 }
						?>
            </div>
		  </div>
		  
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
<script type="application/javascript">
function delconfirm()
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>