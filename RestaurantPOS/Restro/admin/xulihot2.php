<?php 

include('config/config.php');
$id=$_GET['idsanpham'];
$value = 0;
$sql_update = "UPDATE tbl_sanpham SET add_hot='".$value."' WHERE id_sanpham='".$id."'";
$stmt=mysqli_query($mysqli,$sql_update);

if ($stmt) {
    $success = "Add thanh cong" && header("refresh:1; url=topsp.php");
} else {
    $err = "Try Again Later";
}



?>