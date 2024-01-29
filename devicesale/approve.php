<?php
$con = mysqli_connect("localhost", "root", "", "db");
$id = $_GET['id'];

$sele = mysqli_query($con, "SELECT * FROM ordered WHERE id='$id'");
$row = mysqli_fetch_array($sele);

if ($row) { // Check if $row is not null
    $oq = $row['quantity'];
    $pn = $row['name'];

    $se = mysqli_query($con, "SELECT * FROM product WHERE name='$pn'");
    $r = mysqli_fetch_array($se);
    $cq = $r['quantity'];

    if ($oq > $cq) {
        echo "<script>alert('YOU CAN'T APPROVE THIS ORDER');window.location.href='admin.php';</script>";
    } else {
        $qua = $cq - $oq;
        $update = mysqli_query($con, "UPDATE ordered SET approval='approved' WHERE id='$id'");
        $update = mysqli_query($con, "UPDATE product SET quantity='$qua' WHERE name='$pn'");
        if ($update) {
        	
        echo "<script>alert('ORDER APPROVED');window.location.href='admin.php';</script>";
        }
    }
} else {
    echo "No order found for the provided ID.";
}
?>
