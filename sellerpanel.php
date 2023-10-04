<?php
include("header.php");
if(!isset($_SESSION['sellerid']))
{
	echo "<script>window.location='sellerloginpanel.php';</script>";
}
if(isset($_SESSION['sellerid']))
{
	$sql = "SELECT * FROM seller WHERE seller_id='$_SESSION[sellerid]'";
	$qsql = mysqli_query($con,$sql);
	$rsdisp = mysqli_fetch_array($qsql);
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br><br>
          <h3>Farmer Dashboard</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-10 mr-auto ml-auto">
            <div class="info mt-2">
	<form method="post" action="" name="frmcstview">
	<table class="table table-striped table-bordered" style="width:100%" class="datatable">
	  <tbody>
		<tr>
		<th width="236" height="34" align="right">Your Name:</th>
		<td width="874"><?php echo $rsdisp['seller_name']; ?></td>
		</tr>
		 <tr>
		<th height="48" align="right">Your Address:</th>
                                 <?php								  
		$sql2 = "SELECT * FROM state WHERE state_id='$rsdisp[state_id]'";
		$qsql2 = mysqli_query($con,$sql2);
		$rs2 = mysqli_fetch_array($qsql2);								  
		$sql3 = "SELECT * FROM city WHERE city_id='$rsdisp[city_id]'";
		$qsql3 = mysqli_query($con,$sql3);
		$rs3 = mysqli_fetch_array($qsql3); 
		?>
		<td>
		<?php echo $rsdisp['seller_address']; ?><br />
                <?php echo $rs3['city']; ?><br />
                <?php echo $rsdisp['pincode']; ?><br />
                 <?php echo $rs2['state']; ?>
                </td>
		 </tr>  
		<tr>
		<th height="39" align="left">Contact Number:</th>
		<td><?php echo $rsdisp['contact_number']; ?></td>
						        </tr>
		<tr>
		<th height="39" align="left">Email ID:</th>
		<td><?php echo $rsdisp['email_id']; ?></td>
		</tr>
		<tr>
		<th height="33" align="left">Bank Details:</th>
		<td>
		Account No.: <?php echo $rsdisp['bank_acno']; ?><br />
                Bank IFSC Code: <?php echo $rsdisp['bank_IFSC']; ?><br />
                Bank Name: <?php echo $rsdisp['bank_name']; ?><br />
                Branch: <?php echo $rsdisp['bank_branch']; ?> <br />
		</td>
		 </tr>
	  </table>
  </form>
            </div>
		  </div>
		  
        </div>
	 </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>