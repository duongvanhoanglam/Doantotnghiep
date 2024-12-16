<?php 

include '../../config/config.php';
$id=$_GET['idsanpham'];
$value = 1;
$date = $_POST['date'];
$id2= 1;
if(isset($_POST['addtime'])){
  $sql_update = "UPDATE time_sale SET time1='".$date."' WHERE id='$id2'" ;
  mysqli_query($mysqli,$sql_update);
  header('Location:../../index.php?action=quanlysale&query=them');
}else {
$sql_update = "UPDATE tbl_sanpham SET add_sale='".$value."' WHERE id_sanpham='".$id."'";
mysqli_query($mysqli,$sql_update);

header('Location:../../index.php?action=quanlysale&query=them');

}

?>