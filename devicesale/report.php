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
	margin: auto;
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
td{
	text-align: center;
}

</style>

</head>
<body>

<div class="a"><center><h1 style="color:white;">PRODUCT INFO -ADMIN PAGE</h1></center><br>
<a href="admin.php">Home</a>
<a href="product.php">Product</a>
<a href="report.php">Report</a>
<a href="logout.php">Logout</a>
</div>

<div class="b">


	<fieldset style="width: 80%; height: auto; margin-left: 10%; background-color: rgba(0, 0, 0, 0.9); ">
	

	
					<center>
						<h1>List of Ordered (not approved)</h1>
				<table style="color: white; width: 80%;">		
					<tr><th>NAME</th>
					<th>Quantity</th>
					<th>Mobile</th>
					<th>Date</th></tr>


	<?php
				$sel=mysqli_query($con,"SELECT * FROM ordered WHERE approval='not approved'");
				while ($row=mysqli_fetch_array($sel)) {
					?>

<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['quantity'];?></td>
					<td><?php echo $row['mobile'];?> </td>
					<td><?php echo $row['date'];?> </td>
					</tr>
		<?php
				}

		?>
</table>


		<h1>List of Approved</h1>
				<table style="color: white; width: 80%;">		
					<tr><th>NAME</th>
					<th>Quantity</th>
					<th>Mobile</th>
					<th>Date</th></tr>


	<?php
				$se=mysqli_query($con,"SELECT * FROM ordered WHERE approval='approved'");
				while ($ro=mysqli_fetch_array($se)) {
					?>

<tr>
					<td><?php echo $ro['name'];?></td>
					<td><?php echo $ro['quantity'];?></td>
					<td><?php echo $ro['mobile'];?> </td>
					<td><?php echo $ro['date'];?> </td>
					</tr>
		<?php
				}

		?></table>

				<h1>List of Product</h1>
				<table style="color: white; width: 80%;">		
					<tr><th>NAME</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Date</th></tr>


	<?php
				$s=mysqli_query($con,"SELECT * FROM product");
				while ($r=mysqli_fetch_array($s)) {
					?>

<tr>
					<td><?php echo $r['name'];?></td>
					<td><?php echo $r['quantity'];?></td>
					<td><?php echo $r['price'];?></td>
					<td><?php echo $r['date'];?> </td>
					</tr>
		<?php
				}

		?>
</table>

</center>
	</fieldset>

	

</div>


</body>
</html>