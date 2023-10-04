<?php 
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM category WHERE category_id='$_GET[deleteid]'";
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
          <h3><?php
			if($_GET['cattype']=="Produce")
			{
				echo "Products Category";
				}
				else
				{
				echo "Products Category";
				}
				?></h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mr-auto ml-auto">
            <div class="info mt-3">
			
		<center><h4> <?php
				if($_GET['cattype']=="Produce")
				{
				echo "<h4>View or Delete Products Category</h4>";
                                }
                                else
                                {
                                echo "<h4>View or Delete Products Category</h4>";
                                }
                                ?>
		</h4></center><hr>

<?php
$sql = "SELECT * FROM category where category_type='$_GET[cattype]'";
$qsql = mysqli_query($con,$sql);
if(mysqli_num_rows($qsql)  == 0)
{
echo "<center>There is no category to display!!</center>";
}
else
{
?>

<table ID="datatable" class="table table-striped table-bordered " >
<tr style="text-align:center;">
<th>Category</th>
<th>Description</th>
<th>Image</th>
<th>Status</th>
<th>Action</th>
  </tr>
  <tbody>
  <?php
 
  while($rs = mysqli_fetch_array($qsql))
  {
	echo "<tr>
	<td>$rs[category]</td>
	<td>$rs[description]</td>
	<td>
	<img src='imgcategory/$rs[img]' width='35' height='35'>
	</td>
	<td>$rs[status]</td>
	<td> <a href='category.php?editid=$rs[category_id]&cattype=$rs[category_type]&cattype=$_GET[cattype]' CLASS='btn btn-info mb-2'>Edit</a> 
<a href='viewcategory.php?deleteid=$rs[category_id]&cattype=$_GET[cattype]' onclick='return delconfirm()' CLASS='btn btn-danger'>Delete</a></td> 
	
</tr>";
  }
  ?>
  </tbody>
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