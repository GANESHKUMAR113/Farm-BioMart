<?php 
include("header.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM state WHERE state_id='$_GET[deleteid]'";
	if(!mysqli_query($con,$sql))
	{
		echo "<script>alert('Failed to delete record'); </script>";
	}
	else
	{
		if(mysqli_affected_rows($con)  >= 1)
		{
		echo "<script>alert('This record deleted successfully..'); </script>";
		echo "<script>window.location='viewstate.php';</script>";
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
          <h3>View state</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-10 mr-auto ml-auto">
            <div class="info mt-4 ">
			
		<center><h4>View state records...</h4></center><hr>

<?php
							$sql = "SELECT * FROM state";
							  $qsql = mysqli_query($con,$sql);
							if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no State to display!!</center>";
									}
									else
									{
										?>
<table ID="datatable" class="table table-striped table-bordered " >
<thead>
<tr style="text-align:center;">
	<th>State</th>
	<th>Description</th>
	<th>Status</th>
	<th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
 
  while($rs = mysqli_fetch_array($qsql))
  {
  echo "
  <tr>
	<td>$rs[state]</td>
	<td>$rs[description]</td>
	<td>$rs[status]</td>
	 <td> <a href='state.php?editid=$rs[state_id]' CLASS='btn btn-info'>Edit</a>  <a href='viewstate.php?deleteid=$rs[state_id]' onclick='return delconfirm()' CLASS='btn btn-danger'>Delete</a></td>
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