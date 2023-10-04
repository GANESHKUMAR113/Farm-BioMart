<?php 
include("header.php");
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM customer WHERE customer_id='$_GET[deleteid]'";
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
          <h3>View Registered Customers</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12">
            <div class="info mt-2 ">
			
		<center><h4>View Registered Customer list...</h4></center><hr>

<?php
$sql = "SELECT * FROM customer";
$qsql = mysqli_query($con,$sql);
if(mysqli_num_rows($qsql)  == 0)
{
echo "<center>There is no customer to display!!</center>";
}
else
{
?>
<table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
<tr  style="text-align:center;">
<th>Customer Name</th>
<th>Address</th>
<th>Contact Number</th>
<th>Customer Type</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php
while($rs = mysqli_fetch_array($qsql))
{
$sql2 = "SELECT * FROM state WHERE state_id='$rs[state_id]'";
$qsql2 = mysqli_query($con,$sql2);
$rs2 = mysqli_fetch_array($qsql2);
$sql3 = "SELECT * FROM city WHERE city_id='$rs[city_id]'";
$qsql3 = mysqli_query($con,$sql3);
$rs3 = mysqli_fetch_array($qsql3);
echo "
<tr>
<td>$rs[customer_name]</td>
<td>$rs[address],<br>
$rs2[state],<br>
$rs3[city]<br>
PIN code: $rs[pincode]</td>
<td>$rs[contact_no]</td>
<td>$rs[customer_type]</td>
 <td>$rs[status]</td>
<td><a href='customerReg.php?editid=$rs[customer_id]' class='btn btn-info'>Edit</a>
<a href='viewcustomerReg.php?deleteid=$rs[customer_id]' onclick='return delconfirm()' class='btn btn-danger'>Delete</a></td>
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