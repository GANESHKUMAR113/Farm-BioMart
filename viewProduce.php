<?php 
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM produce WHERE produce_id='$_GET[deleteid]'";
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
          <h3>View Products</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12 mr-auto ml-auto">
            <div class="info mt-4 ">
			
		<center><h4> <?php echo "View or Delete Product record"; ?></h4></center><hr>

<?php
$sql = "SELECT * FROM produce";
$qsql = mysqli_query($con,$sql);
if(mysqli_num_rows($qsql)  == 0)
{
echo "<center>There is no produce to display!!</center>";
}
else
{
										?>
<table ID="datatable" class="table table-striped table-bordered " >
<tr style="text-align:center;">
<th>Category</th>
<th>Product Name</th>
<th>Description</th>
<th>Image</th>
<th>Status</th>
 <th>Action</th>
  </tr>
  <?php
 
  while($rs = mysqli_fetch_array($qsql))
  {
$sql1 = "SELECT * FROM category WHERE category_id='$rs[category_id]'";
$qsql1 = mysqli_query($con,$sql1);
$rs1 = mysqli_fetch_array($qsql1);						 
echo "<tr>
<td>$rs1[category]</td>
<td>$rs[produce]</td>
<td>$rs[description]</td>
<td>
<img src='imgproduce/$rs[img]' width='35' height='35'>
</td>
 <td>$rs[status]</td>
<td><a href='Produce.php?editid=$rs[produce_id]'  CLASS='btn btn-info mb-2'>Edit</a>
 <a href='viewProduce.php?deleteid=$rs[produce_id]' onclick='return delconfirm()'  CLASS='btn btn-danger'>Delete</a></td>
</tr>";
  }
  ?>
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