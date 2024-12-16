<?php
include('../../config/config.php');

$tenloaisp = $_POST['tenloaisp'];
$thutu = $_POST['thutu'];
if(isset($_POST['themloaisp'])){
	//them
	$sql_them = "INSERT INTO tbl_loaisp(tenloaisp,thutu) VALUE('".$tenloaisp."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlyloaisp&query=them');
}elseif(isset($_POST['sualoaisp'])){
	//sua
	$sql_update = "UPDATE tbl_loaisp SET tenloaisp='".$tenloaisp."',thutu='".$thutu."' WHERE id_loaisp='$_GET[idloaisp]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlyloaisp&query=them');
}
else{

	$id=$_GET['idloaisp'];
	$sql_xoa = "DELETE FROM tbl_loaisp WHERE id_loaisp='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlyloaisp&query=them');
}
