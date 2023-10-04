<?php 
include("header.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM city WHERE city_id='$_GET[deleteid]'";
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
          <h3>View Cities</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-10 mr-auto ml-auto">
            <div class="info mt-4 ">
			
		<center><h4>View City records...</h4></center><hr>

<?php
							$sql = "SELECT * FROM city";
							  $qsql = mysqli_query($con,$sql);
							if(mysqli_num_rows($qsql)  == 0)
									{
										echo "<center>There is no city to display!!</center>";
									}
									else
									{
										?>
<table ID="datatable" class="table table-striped table-bordered " >
<thead>
<tr style="text-align:center;">
							    <th>State</th>
							    <th>City</th>
							    <th>Description</th>
                                <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
 
  while($rs = mysqli_fetch_array($qsql))
  {
		$sqlstate = "SELECT * FROM state WHERE state_id='$rs[state_id]'";
	  $qsqlstate = mysqli_query($con,$sqlstate);
	  $rsstate = mysqli_fetch_array($qsqlstate);
							  echo "
							  <tr>
							    <td>$rsstate[state]</td>
							    <td>$rs[city]</td>
							    <td>$rs[description]</td>
								<td> <a href='city.php?editid=$rs[city_id]'  CLASS='btn btn-info'>Edit</a> <a href='viewcity.php?deleteid=$rs[city_id]' onclick='return delconfirm()' CLASS='btn btn-danger'>Delete</a></td>
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