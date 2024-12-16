<?php
$mysqli = new mysqli("localhost","root","","shop");
$delete = $_GET['delete'];
$idpro = $_GET['idpro'];
$ptc = $_GET['ptc'];
$sql_xoa2 = "DELETE FROM img_product WHERE id = '$delete' and id_product='$idpro'";
$stmt3=mysqli_query($mysqli,$sql_xoa2);
  unlink('assets/img/products2/'.$ptc);
       
if ($stmt3) {
  $success = "Deleted" && header("refresh:1; url=products.php");
} else {
  $err = "Try Again Later";
}
?>