
<?php
$con = mysqli_connect("localhost", "root", "", "db");
$id = $_GET['id'];

$sele = mysqli_query($con, "SELECT * FROM ordered WHERE id='$id'");
$row = mysqli_fetch_array($sele);

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
            height:auto;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
            margin-top: 0px;
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

<div class="a"><h1>Rwanda online laptop store</h1></div>
<br><br><br><br>
<div class="b">
    <h1><center>PAYMENT FORM</center></h1>
<form action="pay.php" method="post"><br><br>

    <input type="text" name="id" style="border-radius: 8px;" value="<?php echo $row['id'];?>" style="display: none;" > <br>
    <input type="text" name="nm" style="border-radius: 8px;" value="<?php echo $row['name'];?>" readonly> <br>

     <input type="text" name="q"style="border-radius: 8px;" value="<?php echo $row['quantity'];?>"  readonly> <br>

     <input type="text" name="p"style="border-radius: 8px;" value="<?php echo $row['price'];?>"  readonly> <br>


     <input type="text" name="ba"style="border-radius: 8px;" placeholder="Bank account number" maxlength="13" > <br>

     <input type="text" name="pn"style="border-radius: 8px;" value="<?php echo $row['mobile'];?>" maxlength="10" readonly > <br>
     <input type="submit" name="ok"style="border-radius: 5px;" value="pay"> <br>
<b> <a href="myorder.php">Pay Later</a></b><br>

    

<?php
if (isset($_POST['ok'])) {
    $i=$_POST['id'];
    $nm=$_POST['nm'];
    $q=$_POST['q'];
    $p=$_POST['p'];
    $ba=$_POST['ba'];
    $pn=$_POST['pn'];

$ins=mysqli_query($con,"UPDATE ordered SET payment='Payed' where id='$i' ");

if ($ins) {
    echo "<script>alert('PAYMENT DONE');window.location.href='myorder.php';</script>";
}else{

    echo "<script>alert('PAYMENT FAILURE');</script>";
}
}

?>

    </form>
</div>


</body>
</html>