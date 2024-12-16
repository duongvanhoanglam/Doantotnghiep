<div class="form">
   <div class="form-title">Thêm Danh mục sản phẩm </div>
   <div class="form-content">
   <form method="POST" action="modules/quanlidanhmucsp/xuli.php">
	  
	  <div class="input1">
         <p>Tên Danh Mục sản phẩm</p>
	  	<input type="text" name="tendanhmuc" required>
	  </div>
	  <div class="input1">
	 
	    <p>Thứ tự</p>
	    <input type="text" name="thutu" required>
	  </div>
      <div class="input1">
	 
	    <p>Loại sản phẩm</p>
	    <div class="custom-select" style="width:200px;">
	    	<select name="loaisp">
    
	    		<?php
	    		$sql_loaisp = "SELECT * FROM tbl_loaisp ORDER BY id_loaisp DESC";
	    		$query_loaisp = mysqli_query($mysqli,$sql_loaisp);
	    		while($row_loaisp = mysqli_fetch_array($query_loaisp)){
	    		?>
	    		<option value="<?php echo $row_loaisp['id_loaisp'] ?>"><?php echo $row_loaisp['tenloaisp'] ?></option>
	    		<?php
	    		} 
	    		?>
	    	</select>
		</div>
	  </div>
	<div class="input2">
	<input type="submit" name="themdanhmucsp" value="Thêm danh mục sản phẩm">
	</div>
 </form>
   </div>
</div>