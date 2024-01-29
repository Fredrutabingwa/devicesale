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
	<fieldset style="width: 45%; height: 400px; margin-left: 15%; background-color: rgba(0, 0, 0, 0.9);">
		<h1>PRODUCTS AVAILABLE</h1>
	<table style="color: white; width: 100%; height: auto; text-align: center;">

	
					
				<tr>
					<th>ID</th>
					<th>NAME</th>
				</tr>

					<?php
				$sel=mysqli_query($con,"SELECT * FROM product");
				while ($row=mysqli_fetch_array($sel)) {
					?>

				
<tr>				<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					</tr>
		<?php
				}
		?>
</table>

	</fieldset>

	<fieldset style="width: 45%; height: 400px; color:white; background-color: rgba(0, 0, 0, 0.9); margin-left: 65%; margin-top: -420px; ">
		<form action="home.php" method="post">
			<h1>MAKE ODERS</h1>
		<center><table style="color: white;"><tr><td>NAME </td><td>
			<select name="n">
			<option>your choice</option>
			<?php
				$sel=mysqli_query($con,"SELECT * FROM product");
				while ($row=mysqli_fetch_array($sel)) {
					?>
			<option><?php echo $row['name'];?></option>
				<?php
}
				?>
		</select></td></tr>
	<tr><td>Quantity</td><td><input type="number" name="q" required> </td></tr>
	<tr><td>MOBILE</td><td><input type="text" name="m" maxlength="10" required> </td></tr>
	<tr><td> <input type="submit" name="ok" value="order"> </td></tr>
</table>
<?php
if (isset($_POST['ok'])) {
	$n=$_POST['n'];
	$q=$_POST['q'];
	$m=$_POST['m'];
$get=mysqli_query($con,"SELECT price FROM product WHERE name='$n' ");
$r=mysqli_fetch_array($get);

$price= $r['price'] * $q;

$check=mysqli_query($con,"INSERT INTO ordered(name,quantity,mobile,price) VALUES('$n','$q','$m','$price') ");
if($check){
		echo "<script>alert('order made');</script>";
}else{
	echo "order not made";
}
}

?>

	</form>
</center>
	</fieldset>

</div>


</body>
</html>