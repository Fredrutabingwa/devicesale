<?php
$con=mysqli_connect("localhost","root","","db");
$id=$_GET['id'];
$del=mysqli_query($con,"DELETE FROM product WHERE id='$id'");
if ($del) {
	echo "<script>alert('product deleted');</script>";
	header("location:product.php");
}else{
	echo "not deleted";
}



?>