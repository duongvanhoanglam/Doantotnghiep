<?php
	$sql_sua_danhmuc = "SELECT * FROM tbl_danhmucbv WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmuc = mysqli_query($mysqli,$sql_sua_danhmuc);
?>



<div class="form">
   <div class="form-title">Sửa Danh mục bài viết </div>
   <div class="form-content">
   <form method="POST" action="modules/quanlidanhmucbv/xuli.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
   <?php
 	while($dong = mysqli_fetch_array($query_sua_danhmuc)) {
 	?>
	  <div class="input1">
         <p>Tên Danh Mục Bài viết</p>
	  	<input type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc_bv'] ?>">
	  </div>
	  <div class="input1">
	 
	    <p>Thứ tự</p>
	    <input type="text" name="thutu" value="<?php echo $dong['thutu'] ?>">
	  </div>
     
	<div class="input2">
	<input type="submit" name="suadanhmucsp" value="Sửa Danh mục sản phẩm">
	</div>
    <?php } ?>
 </form>
   </div>
</div>