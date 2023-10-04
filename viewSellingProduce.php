<?php 
include("header.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM product WHERE product_id='$_GET[deleteid]'";
		if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('Failed to delete record'); </script>";
	}
	else
	{
		if(mysqli_affected_rows($con)  >= 1)
		{
         echo "<script>alert('This record deleted successfully..'); </script>";
		}
	}
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br><br>
          <h3>View Farmers Selling Products</h3>
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
							$sql = "SELECT * FROM product";
							  if(isset($_SESSION['sellerid']))
							  {
								  $sql = $sql . " WHERE seller_id='$_SESSION[sellerid]'";
							  }
							  $qsql = mysqli_query($con,$sql);
							if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no product to display!!</center>";
									}
									else
									{
										?>
							<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
								<THEAD>
							  <tr>
						      <th >Seller Name</th>
						      <th >Category</th>
						      <th>Product Type</th>
						      <th >Product Name</th>
						      <th >Images</th>
						      <th>Quantity</th>
						      <th>Upload Date</th>
						      <th>Status</th>
                              				<th>Action</th>
						      </tr>
								</THEAD>
								<TBODY>
                              <?php
							  while($rs = mysqli_fetch_array($qsql))
							  { 
								$sql1 = "SELECT * FROM category WHERE category_id='$rs[category_id]'";
								  $qsql1 = mysqli_query($con,$sql1);
								  $rs1 = mysqli_fetch_array($qsql1);
								  
								   $sql2 = "SELECT * FROM produce WHERE produce_id='$rs[produce_id]'";
								  $qsql2 = mysqli_query($con,$sql2);
								  $rs2= mysqli_fetch_array($qsql2);
								  
								  
								$sqlseller = "SELECT * FROM seller WHERE seller_id='$rs[seller_id]'";
								$qsqlseller = mysqli_query($con,$sqlseller);
								$rsseller = mysqli_fetch_array($qsqlseller);
								  
							  echo "
						    <tr>
						      <td>$rsseller[seller_name]</td>
						      <td> $rs1[category] </td>							  
						      <td>$rs2[produce]</td>
						      <td>$rs[title]</td>
						       <td><img src='imgproduct/$rs[img_1]' width='25' height='25'></td>
						      <td>$rs[quantity]  $rs[quantity_type]</td>
						      <td>$rs[uploaded_date]</td>
						      <td>$rs[status]</td>
						      <td> 
						      <a href='Product.php?editid=$rs[product_id]' CLASS='btn btn-info my-2'>Edit</a> 
                                                      <a href='viewProduct.php?deleteid=$rs[product_id]' onclick='return delconfirm()' CLASS='btn btn-danger'>Delete</a>
						      </td>
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