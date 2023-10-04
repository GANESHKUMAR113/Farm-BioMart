<?php 
include("header.php");
include("dbconnection.php");
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


$sql1 = "update product set status='Inactive' WHERE quantity='0'";
$qsql1 = mysqli_query($con,$sql1);

$sql1 = "SELECT * FROM category WHERE category_id='$rs[category_id]'";
$qsql1 = mysqli_query($con,$sql1);
$rs1 = mysqli_fetch_array($qsql1);
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br><br>
          <h3>View Product Details</h3>
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
						$sql = "SELECT * FROM product ";
							  if(isset($_SESSION['sellerid']))
							  {
								  $sql = $sql . " WHERE seller_id='$_SESSION[sellerid]'";
							  }
							  $sql = $sql . " ORDER BY product_id DESC";
							  $qsql = mysqli_query($con,$sql);
							if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no Farm Product to display!!</center>";
									}
									else
									{
										?>
							<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
								<THEAD>
							  <tr>
						      <th width="103">Category</th>
						      <th width="89">Product</th>
						      <th width="83">Images</th>
						      <th width="97">Quantity</th>
						      <th width="92">Upload Date</th>
						      <th width="57">Status</th>
                              			      <th width="102">Action</th>
						      </tr>
								</THEAD>
								<TBODY>
                              <?php
							  $sql = "SELECT * FROM product";
							  if(isset($_SESSION['sellerid']))
							  {
								  $sql = $sql . " WHERE seller_id='$_SESSION[sellerid]'";
							  }
							  $qsql = mysqli_query($con,$sql);
							  while($rs = mysqli_fetch_array($qsql))
							  {
								   $sql1 = "SELECT * FROM category WHERE category_id='$rs[category_id]'";
								  $qsql1 = mysqli_query($con,$sql1);
								  $rs1 = mysqli_fetch_array($qsql1);
								  
								   $sql2 = "SELECT * FROM produce WHERE produce_id='$rs[produce_id]'";
								  $qsql2 = mysqli_query($con,$sql2);
								  $rs2= mysqli_fetch_array($qsql2);
								  
								  
							  echo "
						    <tr>
						      <td>$rs1[category]</td>
						      <td>$rs2[produce]</td>
						       <td><img src='imgproduct/$rs[img_1]' width='35' height='35'></td>
								
						      <td>$rs[quantity]$rs[quantity_type]</td>
						      <td>" . date("d-M-Y",strtotime($rs['uploaded_date'])) . "</td>
						      <td>$rs[status]</td>
							   <td><a href='Product.php?editid=$rs[product_id]' class='btn btn-info'>Edit</a> 
								 <a href='viewProduct.php?deleteid=$rs[product_id]' onclick='return delconfirm()' class='btn btn-danger'>Delete</a></td>
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
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	