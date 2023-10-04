<?php 
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM article WHERE article_id='$_GET[deleteid]'";
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
          <h3>View Articles</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12">
            <div class="info mt-4 ">
			
		<center><h4>View Published Articles...</h4></center><hr>

<?php
$sql = "SELECT * FROM article";
$qsql = mysqli_query($con,$sql);
if(mysqli_num_rows($qsql)  == 0)
{
echo "<center>There is no article to display!!</center>";
}
else
{
?>
							<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
							  <tr style="text-align:center;"> 
							    <th>Article Type</th>
							    <th>Publish Date</th>
							    <th>Title</th>
							    <th>Image1</th>
                               	<th>Action</strong></th>
						      </tr>
                              <?php
							  
							  while($rs = mysqli_fetch_array($qsql))
							  {
							  echo "
							  <tr>
							    <td>$rs[article_type]</td>
							    <td>" . date("d-m-Y",strtotime($rs['publish_date'])) . "</td>
							    <td>$rs[title]</td>
							    <td>
								<img src='imgarticle/$rs[article_img1]' width='35' height='35'>
								</td>
							    
								<td><a href='article.php?editid=$rs[article_id]' CLASS='btn btn-info'>Edit</a>  <a href='viewarticle.php?deleteid=$rs[article_id]' onclick='return delconfirm()' CLASS='btn btn-danger'>Delete</a></td>
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