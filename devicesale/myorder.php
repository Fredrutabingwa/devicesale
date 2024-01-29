<?php
$con=mysqli_connect("localhost","root","","db");


?>

<html>
<head><title></title>

<style>
.a{
	width:80%;
	margin: auto;
	height:105px;
	background-color: #4169E1;
	border-radius: 10px;
	 text-align: center;
	 color: white;
	 
}



.b{
	width:80%;
	margin: auto;
	height:600px;
	box-shadow:10 30 0 10px;
	text-align: center;
	color: white;
}

body{
	background-image: url('/devicesale/backi.jpg');
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
color: white;

}

fieldset{
	border-radius:10px;
	color: white;
}
input{
	width: 100%;
	height: 30px;
	border-radius: 10px;
	text-align: center;
}

select{

	width: 100%;
	height: 30px;
	border-radius: 10px;
	text-align: center;
}

a{
	margin: 12%;
	color: white;
	font-size: 20px;
	text-decoration: none;
}
a:hover{
	color: red;
	transition: 2s;
}

</style>

</head>
<body>

<div class="a"><center><h1 style="color:white;">Rwanda online laptop store</h1></center><br>
<a href="home.php">Home</a>
<a href="myorder.php">Cart</a>
<a href="logout.php">Logout</a>
</div>
<div class="b">
<br><br>
	<fieldset style="width: 80%; height: 400px; margin-left: 20%; background-color: rgba(0, 0, 0, 0.9);">
		<h1>NOT APPROVED ORDERS</h1>
	<table style="color: white; width: 100%; height: auto; text-align: center;">

	
					
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>QUANTITY</th>
					<th>Price</th>
					<th>APPROVAL</th>
					<th>DATE</th>
				</tr>

					<?php
				$sel=mysqli_query($con,"SELECT * FROM ordered WHERE approval='not approved' ");
				while ($row=mysqli_fetch_array($sel)) {
					?>

				
<tr>				<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['quantity'];?></td>
					<td><?php echo $row['price'];?></td>
					<td><?php echo $row['approval'];?></td>
					<td><?php echo $row['date'];?></td>
					</tr>
		<?php
				}
		?>
</table>


<h1>APPROVED ORDERS</h1>
	<table style="color: white; width: 100%; height: auto; text-align: center;">

	
					
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>QUANTITY</th>
					<th>Price</th>
					<th>APPROVAL</th>
					<th>DATE</th>
					<th>Payments</th>
				</tr>

					<?php
				$sel=mysqli_query($con,"SELECT * FROM ordered WHERE approval='approved' AND payment='not payed' ");
				while ($row=mysqli_fetch_array($sel)) {
					?>

				
<tr>				<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['quantity'];?></td>
					<td><?php echo $row['price'];?></td>
					<td><?php echo $row['approval'];?></td>
					<td><?php echo $row['date'];?></td>
					<td><?php echo "<a href='pay.php?id=$row[id]'>Pay</a>"?></td>
					</tr>
		<?php
				}
		?>
</table>

<h1>PAYED ORDERS</h1>
	<table style="color: white; width: 100%; height: auto; text-align: center;">

	
					
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>QUANTITY</th>
					<th>Price</th>
					<th>APPROVAL</th>
					<th>DATE</th>
					<th>Payed</th>
				</tr>

					<?php
				$sel=mysqli_query($con,"SELECT * FROM ordered WHERE payment='payed' ");
				while ($row=mysqli_fetch_array($sel)) {
					?>

				
<tr>				<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['quantity'];?></td>
					<td><?php echo $row['price'];?></td>
					<td><?php echo $row['approval'];?></td>
					<td><?php echo $row['date'];?></td>
					<td><?php echo $row['payment'];?></td>
					</tr>
		<?php
				}
		?>
</table>

	</fieldset>


</div>


</body>
</html>