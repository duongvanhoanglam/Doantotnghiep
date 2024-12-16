<?php
include('../../config/config.php');

$tendanhmuc = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
$id_loaisp = $_POST['loaisp'];
if(isset($_POST['themdanhmucsp'])){
	//them
	$sql_them = "INSERT INTO tbl_danhmucsp(tendanhmuc,id_loaisp,thutu) VALUE('".$tendanhmuc."','".$id_loaisp."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmucsp'])){
	//sua
	$sql_update = "UPDATE tbl_danhmucsp SET tendanhmuc='".$tendanhmuc."',id_loaisp='".$id_loaisp."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmucsp WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
