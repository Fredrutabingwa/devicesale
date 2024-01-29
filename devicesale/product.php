<?php
$con=mysqli_connect("localhost","root","","db");


?>

<html>
<head><title></title>

<style>
.a{
	width:100%;
	height:100px;
	background-color: darkblue;
}

.b{
	width:80%;
	height:600px;
	box-shadow:10 30 0 10px;
}

body{
	background-image: url('/devicesale/backi.jpg');
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;


}
th{
	font: white;
}

fieldset{
	border-radius:10px;
	color: white;
}

a{
	margin: 8%;
	color: white;
	font-size: 20px;
	text-decoration: none;
}
a:hover{
	color: red;
	transition: 2s;
}

input{
	border-radius: 10px;
	height: 30px;
	margin: 5%;
}
</style>

</head>
<body>

<div class="a"><center><h1 style="color:white;">PRODUCT INFO - ADMIN PAGE</h1></center><br>
<a href="admin.php">Home</a>
<a href="product.php">Product</a>
<a href="report.php">Report</a>
<a href="logout.php">Logout</a>
</div>

<div class="b">

<br><br>
	<fieldset style="width: 50%; height: 400px; background-color: rgba(0, 0, 0, 0.9);">
		<h1><center>ADD PRODUCTS</center></h1>
		<form action="product.php" method="post">
		<center><table style="color:white;width: 50%;">
	<tr><td>NAME </td><td><input type="text" name="n" required> </td></tr>
	<tr><td>Quantity</td><td><input type="number" name="q" required> </td></tr>
	<tr><td>Price</td><td><input type="number" name="p" required> </td></tr>
	<tr><td> <input type="submit" name="ok" value="add"> </td></tr>
</table>
<?php
if (isset($_POST['ok'])) {
	$n=$_POST['n'];
	$q=$_POST['q'];
	$p=$_POST['p'];

$check=mysqli_query($con,"INSERT INTO product(name,quantity,price) VALUES('$n','$q','$p') ");
if($check){
		echo "<script>alert('PRODUCT ADDED');</script>";
}else{
	echo "product not added";
}
}

?>

	</form>
</center>

	</fieldset>

	<fieldset style="width: 60%; height: auto; color:white; background-color: rgba(0, 0, 0, 0.9); margin-left: 60%; margin-top: -420px; ">
		
				<table style="color: white; width: 100%; text-align: center;">
				<h1>LIST OF PRODUCT</h1>		
					<th>NAME</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Date</th>
					<th>Delete</th>


	<?php
				$sel=mysqli_query($con,"SELECT * FROM product");
				while ($row=mysqli_fetch_array($sel)) {
					?>

<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['quantity'];?></td>
					<td><?php echo $row['price'];?></td>
					<td><?php echo $row['date'];?> </td>
					<td><?php echo "<a href='delete.php?id=$row[id]'>delete</a>" ?></td>
					</tr>
		<?php
				}

		?>
</table>


	</fieldset>

</div>


</body>
</html>