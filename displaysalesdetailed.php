<?php
include("header.php");

if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE purchase_request SET customer_id='$_SESSION[customerid]', product_id='$_POST[product]', quantity='$_POST[quantity]', request_date='$_POST[requestdate]', request_date_expire='$_POST[expirydate]', note='$_POST[note]', status='$_POST[status]' WHERE purchase_request_id='$_GET[editid]'";
		if(!mysqli_query($con,$sql))
		{
			echo "Error in mysqli query";
		}
		else
		{
			echo "<script>alert('Purchase Request Updated Successfully...');</script>";
		}
	}
	else
	{	
$sql="INSERT INTO purchase_request( customer_id, product_id, quantity, request_date, request_date_expire, note, status) VALUES ('$_SESSION[customerid]','$_POST[productid]','$_POST[quantity]','$_POST[requestdate]','$_POST[expirydate]','$_POST[note]','Pending')";

	if(!mysqli_query($con,$sql))
		{
			echo "Error in mysqli query" . mysqli_error($con);
		}
		else
		{
			echo "<script>alert('Purchase Request Sent Successfully...');</script>";
$sqlproduct = "SELECT * FROM product WHERE product_id='$_POST[productid]'";
$qsqlproduct = mysqli_query($con,$sqlproduct);
$rsproduct = mysqli_fetch_array($qsqlproduct);

$sqlseller = "SELECT * FROM seller WHERE seller_id='$rsproduct[seller_id]'";
$qsqlseller = mysqli_query($con,$sqlseller);
$rsseller = mysqli_fetch_array($qsqlseller);

$sqlcustomer = "SELECT * FROM customer WHERE customer_id='$_SESSION[customerid]'";
$qsqlcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer = mysqli_fetch_array($qsqlcustomer);
$sql2state = "SELECT * FROM state WHERE state_id='$rsseller[state_id]'";
$qsql2state = mysqli_query($con,$sql2state);
$rs12state = mysqli_fetch_array($qsql2state);
$sql3city = "SELECT * FROM city WHERE city_id='$rsseller[city_id]'";
$qsql3city = mysqli_query($con,$sql3city);
$rs13city = mysqli_fetch_array($qsql3city);
$msgtoseller = "You have got purchase request for your produce $rsproduct[title]. You can contact your customer $rscustomer[customer_name] at $rscustomer[contact_no].";
$msgtocustomer = "You have sent purchase request for - $rsproduct[title]. To check the quality of the produce, you can contact $rsseller[seller_name] at $rsseller[contact_number]. Farmer's Address: $rsseller[seller_address], $rs13city[city], $rs12state[state].  ";


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
include("smsapi.php");
if($smsstatus == "Enabled")
{
	//msgtoseller
	$mobno=$rsseller['contact_number'];
	$msg= str_replace(" ","%20",$msgtoseller);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
	curl_setopt($ch,CURLOPT_URL,  "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=" . $smsapi . "&senderid=" . $senderid ."&channel=2&DCS=0&flashsms=0&number=$mobno&text=$msg&route=21");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	$buffer = curl_exec($ch);
	if(empty ($buffer))
	{
		//echo " buffer is empty ";
	}
	else
	{
		//echo $buffer; 
	}
	curl_close($ch);
	//msgtocustomer
	$mobno=$rscustomer['contact_no'];
	$msg= str_replace(" ","%20",$msgtocustomer);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
	curl_setopt($ch,CURLOPT_URL,  "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=" . $smsapi . "&senderid=" . $senderid ."&channel=2&DCS=0&flashsms=0&number=$mobno&text=$msg&route=21");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	$buffer = curl_exec($ch);
	if(empty ($buffer))
	{
		//echo " buffer is empty ";
	}
	else
	{
		//echo $buffer; 
	}
	curl_close($ch);
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		}
	}
}

?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Farmer's Market  Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="col-lg-12">
				<?php		  
				$sqlproduct = "SELECT * FROM product WHERE product_id='$_GET[prodid]'";
				$qsqlproduct = mysqli_query($con,$sqlproduct);
				$rsproduct = mysqli_fetch_array($qsqlproduct);
				$sql = "SELECT * FROM product WHERE product_id='$_GET[productid]'";
				$qsql = mysqli_query($con,$sql);
				$rs = mysqli_fetch_array($qsql);
					
				$sqlseller = "SELECT * FROM seller WHERE seller_id='$rs[seller_id]'";
				$qsqlseller = mysqli_query($con,$sqlseller);
				$rsseller = mysqli_fetch_array($qsqlseller);
				
				$sqlcategory = "SELECT * FROM category WHERE category_id='$rs[category_id]'";
				$qsqlcategory = mysqli_query($con,$sqlcategory);
				$rscategory = mysqli_fetch_array($qsqlcategory);
				
				$sqlproduce = "SELECT * FROM produce WHERE produce_id='$rs[produce_id]'";
				$qsqlproduce = mysqli_query($con,$sqlproduce);
				$rsproduce = mysqli_fetch_array($qsqlproduce);
				
				$sqlslider = "SELECT * FROM product WHERE product_id='$_GET[productid]'";
				$qsqlslider = mysqli_query($con,$sqlslider);
				$rsslider = mysqli_fetch_array($qsqlslider);
				?>
        <img src="<?php echo "imgproduct/".$rsslider['img_1']; ?>" class="img-fluid-img" alt="" style="height: 250px;" >
          <div class="portfolio-info">
            <h3>Product details</h3>
            <ul>
              <li>Product name: <?php echo $rs['title']; ?></li>
              <li>Seller name: <?php echo $rsseller['seller_name']; ?></li>
              <li>Category: <?php echo $rscategory['category']; ?></li>
              <li>Total Quantity: <?php echo $rs['quantity']; ?> <?php echo $rs['quantity_type']; ?></li>
            </ul>
		  </div>
        </div>

		<hr>
		<h4>Send a Purchase Request</h4>

  <?php
				if(isset($_POST['submit']))
				{
					echo "<h2>Purchase request sent successfully..</h2><h3><a href='viewpurchaserequest.php'>View purchase request</a></h3>";
				}
				else
				{
				if(isset($_SESSION['customerid']))
				{						   				   
	?>


	<form method="post" action="" name="frmpurchaserequest" onSubmit="return validatepurchaserequest()">
	<input type="hidden" name="productid" value="<?php echo $rs['product_id']; ?>" />

	<div class="form-row">
	<div class="col-lg-10 mr-auto ml-auto">
	<div class="col-md-6 form-group">
	Purchase Quantity<font color="#FF0000">*</font> <font color="#FF0000">  (in <?php echo $rs['quantity_type']; ?> ) </font>
	  <input type="number" max="<?php echo $rs['quantity']; ?>" name="quantity" id="quantity" value="<?php echo $rsedit['quantity']; ?>" autofocus class="form-control"> 
	</div>
	
	<div class="col-md-6 form-group"></div>
	
	<div class="col-md-6 form-group">
		Request Date
		<input type="date" name="requestdate" id="requestdate" readonly value="<?php echo date("Y-m-d"); ?>" class="form-control">
	</div>
	
	<div class="col-md-6 form-group">
		Expiry Date
		<input type="date" name="expirydate" id="expirydate" readonly value="<?php echo date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 day')); ?>" class="form-control" >
	</div>
	
	<div class="col-md-6 form-group">
	<b>Any notes:</b>
	<textarea name="note" id="note" class="form-control" ><?php echo $rsedit['note']; ?></textarea>
	</div>
	<div class="text-center">
	<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg px-5 " >Click Here to send purchase request..</button>
	</div>
	</div>
	
	</div>
	</form>
							<?php
						   }
						   else
						   {
							?>
                             <h2><a href='customerloginpanel.php?pagename=<?php echo basename($_SERVER['PHP_SELF']); ?>&productid=<?php echo $rs['product_id']; ?>'  class="btn btn-info">Login to send purchase request..</a></h2>  
                           <?php
						   }
				}
						   ?>

</div>
</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?php
include("footer.php");
?>


<script type="application/javascript">
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
function validatepurchaserequest()
{
	if(document.frmpurchaserequest.quantity.value == "")
	{
		alert("Kindly enter quantity..");
		document.frmpurchaserequest.quantity.focus();
		return false;
	}	
	else if(document.frmpurchaserequest.requestdate.value == "")
	{
		alert("Select the request date..");
		document.frmpurchaserequest.requestdate.focus();
		return false;
	}
	else if(document.frmpurchaserequest.expirydate.value == "")
	{
		alert("Select the expiry date..");
		document.frmpurchaserequest.expirydate.focus();
		return false;
	}	
	else
	{
		return true;
	}
}
</script>