<?php 
include("header.php");
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminloginpanel.php'; </script>";
}
if($_SESSION['randnumber']  == $_POST['randnumber'])
{
	if(isset($_POST['submit']))
	{
		$imgname1 = rand() . $_FILES['imge']['name'];
		move_uploaded_file($_FILES['imge']['tmp_name'],"imgcategory/" . $imgname1);
		
		if(isset($_GET['editid']))
		{
			$sql ="UPDATE category SET  `category`='$_POST[category]', `category_type`='$_POST[categorytype]', `description`='" .  mysqli_real_escape_string($con,$_POST['description']) . "', `img`='$imgname1', `status`='$_POST[status]' where category_id='$_GET[editid]'";
			if(!mysqli_query($con,$sql))
			{
				echo "Error in mysqli query";
			}
			else
			{
				echo "<script>alert('Category record updated successfully...');</script>";
			}
		}
		else
		{
		$sql="INSERT INTO `category`( `category`, `category_type`, `description`, `img`, `status`) VALUES ('$_POST[category]','$_POST[categorytype]','" .  mysqli_real_escape_string($con,$_POST['description']) . "','$imgname1','$_POST[status]')";
		if(!mysqli_query($con,$sql))
			{
				echo "Error in mysqli query";
			}
			else
			{
				echo "<script>alert(' Category record inserted successfully...');</script>";
			}	
		}
	}
}
$randnumber = rand();
$_SESSION['randnumber'] = $randnumber;
if(isset($_GET['editid']))
{
	$sql = "SELECT * FROM category WHERE category_id='$_GET[editid]'";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br><br>
          <h3><?php
			if(isset($_GET['cattype']))
			{
				$cattype =  $_GET['cattype'];
			}
			else
			{
				$cattype =  $rsedit['category_type'];
			}
			?></h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
		

          <div class="col-lg-8 mr-auto ml-auto">
            <div class="info mt-4 ">
			
		<center><?php
								 if($_GET['cattype']=="Produce")
								 {
									 
				echo " <h4>Add or Edit Products Category</h4>";
								 }
								 else
								 {
                                    echo " <h4>Add or Edit Products Category</h4>";
								 }
								 ?></center><hr>

<form method="post" action="" enctype="multipart/form-data" name="frmcategory" onSubmit="return validatecategory()">
<input type="hidden" name="categorytype" id="categorytype" value="<?php echo $cattype; ?>" autofocus>
<input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
				  
<div class="form-row">
	<div class="col-md-12 form-group">
	Category <font color="#FF0000">*</font>
	  <input type="text" name="category" id="category" value="<?php echo $rsedit['category']; ?>" class="form-control">
	</div>	
	
	<div class="col-md-12 form-group">
	Image <font color="#FF0000">*</font>
	  <input type="file" name="imge" id="imge" class="form-control">
	</div>	
	
	<div class="col-md-12 form-group">
	Description <font color="#FF0000">*</font>
	  <textarea  name="description" id="description" class="form-control" ><?php echo $rsedit['description']; ?></textarea>
	</div>	
	
	<div class="col-md-12 form-group">
	Status <font color="#FF0000">*</font>
	  <select name="status" id="status" class="form-control">
			<option value="">Select Status</option>
		  <?php
		  $arr= array("Active","Inactive");
		  foreach($arr as $val)
		  {
			  if($rsedit['status'] == $val)
			  {
			  echo "<option value='$val' selected >$val</option>";
			  }
			  else
			  {
			  echo "<option value='$val'>$val</option>";
			  }
		  }
		  ?>
	  </select>
	</div>	
	
</div>

<hr>
<div class="text-center">
	<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg px-5 " >Submit</button>
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
	
    function validatecategory()
    {
		
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space


	if(document.frmcategory.category.value == "")
	{
		alert("Category should not be empty..");
		document.frmcategory.category.focus();
		return false;
	}
	else if(!document.frmcategory.category.value.match(alphaspaceExp))
	{
		alert("Please enter only letters for Category..");
		document.frmcategory.category.focus();
		return false;
	}
	else if(document.frmcategory.imge.value == "")
	{
		alert("Kindly select an image..");
		document.frmcategory.imge.focus();
		return false;
	}
	else
	{
		return true;
	}
	}
    </script>