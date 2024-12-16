<?php
include('../../config/config.php');

$tendanhmuc = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];

if(isset($_POST['themdanhmucsp'])){
	//them
	$sql_them = "INSERT INTO tbl_danhmucbv(tendanhmuc_bv,thutu) VALUE('".$tendanhmuc."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucbv&query=them');
}elseif(isset($_POST['suadanhmucsp'])){
	//sua
	$sql_update = "UPDATE tbl_danhmucbv SET tendanhmuc_bv='".$tendanhmuc."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucbv&query=them');
}
else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmucbv WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucbv&query=them');
}