<?php 

include('../../config/config.php');

$tenthuonghieu = $_POST['tenthuonghieu'];

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

$thutu = $_POST['thutu'];
$danhmuc = $_POST['danhmuc'];


if(isset($_POST['themthuonghieu'])){
	
	$sql_them = "INSERT INTO tbl_brand(tenbrand,hinhanhbrand,thutu) VALUE('".$tenthuonghieu."','".$hinhanh."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'ptc/'.$hinhanh);
	header('Location:../../index.php?action=quanlybrand&query=them');
}
elseif(isset($_POST['suathuonghieu'])){
	//sua
	if(!empty($_FILES['hinhanh']['name'])){

		move_uploaded_file($hinhanh_tmp,'ptc/'.$hinhanh);
		
		$sql_update = "UPDATE tbl_brand SET tenbrand='".$tenthuonghieu."',hinhanhbrand='".$hinhanh."',thutu='".$thutu."' WHERE id_brand ='$_GET[idbrand]'";

		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_brand WHERE id_brand = '$_GET[idbrand]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('ptc/'.$row['hinhanhbrand']);
		}
		
	}else{
		$sql_update = "UPDATE tbl_brand SET tenbrand='".$tenthuonghieu."',thutu='".$thutu."' WHERE id_brand='$_GET[idbrand]'";
	}

	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlybrand&query=them');

}


else{
	$id=$_GET['idbrand'];
	$sql = "SELECT * FROM tbl_brand WHERE id_brand = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('ptc/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_brand WHERE id_brand='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlybrand&query=them');
}


?>