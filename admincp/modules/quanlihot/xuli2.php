<?php 

include '../../config/config.php';
$id=$_GET['idsanpham'];
$value = 0;
$sql_update = "UPDATE tbl_sanpham SET add_hot='".$value."' WHERE id_sanpham='".$id."'";
mysqli_query($mysqli,$sql_update);

header('Location:../../index.php?action=quanlyhot&query=them');



?>