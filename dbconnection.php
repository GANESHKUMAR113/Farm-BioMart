<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
// Create connection
$con=mysqli_connect("localhost","root","","farm-biomart");
echo mysqli_connect_error();
?>