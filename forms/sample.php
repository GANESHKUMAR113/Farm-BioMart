<?php
$servername = "localhost";
$username = "root";
$password ="";
$db="students";

$sql=mysqli_connect($servername,$username,"",$db);
$conn=mysqli_select_db($sql,$db);

if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
    echo "<script>alert('connected successfully...');</script>";
  }
?>
<html>
<body>
    <form action="" method="POST">
        <center>
        <h1>Student Details</h1>
        <label>Student ID</label>
        <input type="text" name="sid"  required><br><br>
        <label>Student Name</label>
        <input type="text" name="name"><br><br>
        <label>Class</label>
        <input type="text" name="class"><br><br>
        <label>Phone</label>
        <input type="text" name="phone"><br><br>
        <button name="insert">Insert</button>
        <button name="delete">Delete</button>
 	<button name="view">view</button>
        <button name="update">Update</button>
	
        </center>
    </form>

    <?php
    if(isset($_POST["insert"]))
    {
    mysqli_query($sql,"insert into info values('$_POST[sid]','$_POST[name]','$_POST[class]','$_POST[phone]')");
    echo "<script>alert('Student record Inserted successfully...');</script>";
    }
    if(isset($_POST["delete"]))
    {
    mysqli_query($sql,"delete from info where s_id='$_POST[sid]'");
    echo "<script>alert('Student record Deleted successfully...');</script>";
    }

if(isset($_POST["view"]))
{
$res=mysqli_query($sql,"select * from info");
echo" <table border=1>";
echo"<tr>";
echo"<th>";echo"StudentId"; echo"</th>";
echo"<th>";echo"StudentName"; echo"</th>";
echo"<th>";echo"Class"; echo"</th>";
echo"<th>";echo"Phone"; echo"</th>";
echo"</tr>";
while($row=mysqli_fetch_array($res))
{
echo"<center>";
echo"<tr>";
echo"<td>";echo$row["s_id"]; echo"</td>";
echo"<td>";echo$row["name"]; echo"</td>";
echo"<td>";echo$row["class"]; echo"</td>";
echo"<td>";echo$row["phone"]; echo"</td>";
echo"</tr>";
echo"</center>";}
echo"</table>";
}

?>
