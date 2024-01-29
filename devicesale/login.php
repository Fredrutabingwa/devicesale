<?php
$con=mysqli_connect("localhost","root","","db");


?>

<html>
<head><title></title>

<style>
.a{
	width:80%;
	margin: auto;
	height:70px;
	background-color: #4169E1;
	border-radius: 10px;
	 text-align: center;
	 color: white;
	 
}

}
body {
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .b {
            background-color: rgba(255, 255, 255, 0.4); 
            width:30%;
			height:400px;
			margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #000;
            border-radius: 5px;
            text-align: center;
        }

        input[type="submit"] {
            background-color:#8FDB86 ;
            color: #000;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #0070FF;

        }

body{
	background-image: url('/devicesale/backi.jpg');
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;

}

</style>

</head>
<body>

<div class="a"><h1>Rwanda online laptop store</h1><br><h3 style="color: blue;">order we deliver</h3></div>
<br><br><br><br>
<div class="b">
<form action="login.php" method="post"><br><br>
	<input type="text" name="us" style="border-radius: 8px;" placeholder="user name" required> <br><br>

	 <input type="password" name="ps"style="border-radius: 8px;"placeholder="password" required> <br><br>
	 <input type="submit" name="ok"style="border-radius: 5px;" value="Login"> <br><br>
<b> <a href="signin.php">Don't have account</a></b><br><br>

	

<?php
if (isset($_POST['ok'])) {
	$us=$_POST['us'];
	$ps=$_POST['ps'];

$ch=mysqli_query($con,"SELECT * FROM user WHERE usern='$us' AND passw='$ps' ");
$check=mysqli_query($con,"SELECT * FROM admin WHERE usern='$us' AND passw='$ps' ");
if(mysqli_num_rows($check)==1){
		header("location:admin.php");
}else if(mysqli_num_rows($ch)==1){
        header("location: home.php");
}
}

?>

	</form>
</div>


</body>
</html>