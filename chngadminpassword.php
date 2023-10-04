<?php 
if(!isset($_SESSION)) { session_start(); }
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if($_SESSION['randnumber']  == $_POST['randnumber'])
{
if(isset($_POST['submit']))
{
	$sql = "UPDATE admin SET password='$_POST[newpassword]' WHERE admin_id='$_SESSION[adminid]' AND password='$_POST[oldpassword]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password updated successfully...');</script>";
	}
	else
	{
		echo "<script>alert('Failed to update password...');</script>";
	}
}
}
$randnumber = rand();
$_SESSION['randnumber'] = $randnumber;
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br><br>
          <h3>Change Password</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mr-auto ml-auto">
            <div class="info mt-3">
			
		<center><h4>Change your password...</h4></center><hr>

<form method="post" action="" name="frmcstchngpasswrd" onSubmit="return validatecstchngpasswrd()">
<input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
				  
<div class="form-row px-5">
	<div class="col-md-8 form-group py-3" >
	Old password <font color="#FF0000">*</font>
	  <input type="password" name="oldpassword" id="oldpassword" class="form-control" >
	</div>	
	
	<div class="col-md-8 form-group">
	New Password <font color="#FF0000">*</font>
	  <input type="password" name="newpassword" id="newpassword" class="form-control" >
	</div>	
	
	<div class="col-md-8 form-group">
		Confirm Password <font color="#FF0000">*</font>
		<input type="password" name="password3" id="password3" class="form-control" >
	</div>	

</div>

<hr>
<div class="text-center">
	<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg  " >Change Password</button>
</div>

</form>
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
	function validatecstchngpasswrd()
	{
		if(document.frmcstchngpasswrd.oldpassword.value == "")
		{
			alert(" Enter your old password....");
			document.frmcstchngpasswrd.oldpassword.focus();
			return false;
		}	
		 else if(document.frmcstchngpasswrd.newpassword.value == "")
		{
			alert("Enter a new password..");
			document.frmcstchngpasswrd.newpassword.focus();
			return false;
		}	
		else if(document.frmcstchngpasswrd.newpassword.value.length < 8)
		{
			alert("Password length should be more than 8 characters...");
			document.frmcstchngpasswrd.newpassword.focus();
			return false;
		}
		else if(document.frmcstchngpasswrd.newpassword.value.length > 16)
		{
			alert("Password length should be less than 16 characters...");
			document.frmcstchngpasswrd.newpassword.focus();
			return false;
		}		
		else if(document.frmcstchngpasswrd.password3.value == "")
		{
			alert("Confirm password should not be empty..");
			document.frmcstchngpasswrd.password3.focus();
			return false;
		}		
		else if(document.frmcstchngpasswrd.newpassword.value != document.frmcstchngpasswrd.password3.value)
		{
			alert("Password and confirm password not matching...");
			document.frmcstchngpasswrd.password3.focus();
			return false;
		}	
		else
		{
			return true;
		}
	}
	</script>