<?php 
include("header.php");
if(isset($_GET['deleteid']))
{
	$sql = "DELETE FROM seller WHERE seller_id='$_GET[deleteid]'";
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
          <h3>View Farmer</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-12">
            <div class="info mt-4 ">
			
		<center><h4>Registered Farmers list...</h4></center><hr>

<?php
$sql = "SELECT * FROM seller";
$qsql = mysqli_query($con,$sql);
if(mysqli_num_rows($qsql)  == 0)
{
 echo "<center>There is no Seller to display!!</center>";
}
else
{
?>
 <table ID="datatable" class="table table-striped table-bordered"  style="width:100%">
 <tr style="text-align:center;" >
 <th>Name </th>
 <th width="20%">Address </th>
 <th>Contact No. </th>
 <th>Email ID</th>
 <th>Bank Details</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
<?php							 
 while($rs = mysqli_fetch_array($qsql))
{
$sql2 = "SELECT * FROM state WHERE state_id='$rs[state_id]'";
$qsql2 = mysqli_query($con,$sql2);
$rs12 = mysqli_fetch_array($qsql2);							 
$sql3 = "SELECT * FROM city WHERE city_id='$rs[city_id]'";
 $qsql3 = mysqli_query($con,$sql3);
 $rs13 = mysqli_fetch_array($qsql3);
echo "<tr>
<td>$rs[seller_name]</td>
<td>$rs[seller_address],$rs13[city],$rs12[state],<br>
PIN Code:$rs[pincode].</td>
<td>$rs[contact_number]</td>
<td>$rs[email_id]</td>
<td><strong>Bank A/c No:</strong>$rs[bank_acno],<br>"."
 <strong>IFSC Code:</strong>$rs[bank_IFSC],<br>"."
 <strong>Bank Name:</strong>$rs[bank_name],<br>"."
 <strong>Branch:</strong>$rs[bank_branch].
 </td>
 <td>$rs[status]</td>
<td>  <a href='seller.php?editid=$rs[seller_id]' class='btn btn-info my-2'>Edit</a>  
<a href='viewseller.php?deleteid=$rs[seller_id]' onclick='return delconfirm()' class='btn btn-danger'>Delete</a></td>
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