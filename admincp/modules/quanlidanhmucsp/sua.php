<?php
	$sql_sua_danhmuc = "SELECT * FROM tbl_danhmucsp WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmuc = mysqli_query($mysqli,$sql_sua_danhmuc);
?>



<div class="form">
   <div class="form-title">Sửa Danh mục Sản Phẩm </div>
   <div class="form-content">
   <form method="POST" action="modules/quanlidanhmucsp/xuli.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
   <?php
 	while($dong = mysqli_fetch_array($query_sua_danhmuc)) {
 	?>
	  <div class="input1">
         <p>Tên Danh Mục sản phẩm</p>
	  	<input type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc'] ?>">
	  </div>
	  <div class="input1">
	 
	    <p>Thứ tự</p>
	    <input type="text" name="thutu" value="<?php echo $dong['thutu'] ?>">
	  </div>
      <div class="input1">
	 
	    <p>Danh Mục sản phẩm</p>
	    <div class="custom-select" style="width:200px;">
	    	<select name="loaisp">
    
	    		<?php
	    		$sql_loaisp = "SELECT * FROM tbl_loaisp ORDER BY id_loaisp DESC";
	    		$query_loaisp = mysqli_query($mysqli,$sql_loaisp);
	    		while($row_loaisp = mysqli_fetch_array($query_loaisp)){
                    if($row_loaisp['id_loaisp']==$dong['id_loaisp']){
                  
	    		?>
	    		<option selected value="<?php echo $row_loaisp['id_loaisp'] ?>"><?php echo $row_loaisp['tenloaisp'] ?></option>


	    		<?php
	    		} else {
                   ?>
                       <option  value="<?php echo $row_loaisp['id_loaisp'] ?>"><?php echo $row_loaisp['tenloaisp'] ?></option>
                   <?php 
                }}
	    		?>
	    	</select>
		</div>
	  </div>
	<div class="input2">
	<input type="submit" name="suadanhmucsp" value="Sửa Danh mục sản phẩm">
	</div>
    <?php } ?>
 </form>
   </div>
</div>