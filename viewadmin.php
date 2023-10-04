<?php 
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM admin WHERE admin_id='$_GET[deleteid]'";
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
          <h3>View Admins</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-10 mr-auto ml-auto">
            <div class="info mt-4 ">
			
		<center><h4>View Admins records...</h4></center><hr>

<?php
							$sql = "SELECT * FROM admin";
							  $qsql = mysqli_query($con,$sql);
							if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no admin to display!!</center>";
									}
									else
									{
										?>
<table ID="datatable" class="table table-striped table-bordered " >
<tr style="text-align:center;">
							    <th>Admin</th>
							    <th>Login ID</th>
							    <th>Status</th>
							    <th>Action</th>
  </tr>
  <?php
 
							  while($rs = mysqli_fetch_array($qsql))
							  {
								  
							  echo "
							  <tr>
							    <td>&nbsp;$rs[admin_name]</td>
							    <td>&nbsp;$rs[login_id]</td>
							    <td>&nbsp;$rs[status]</td>
								 <td>&nbsp; <a href='admin.php?editid=$rs[admin_id]' CLASS='btn btn-info'>Edit</a> <a href='viewadmin.php?deleteid=$rs[admin_id]' onclick='return delconfirm()'  CLASS='btn btn-danger' >Delete</a></td>
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