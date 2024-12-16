<?php 
  
   $sql_danhmuc = "SELECT * FROM tbl_danhmucsp,tbl_loaisp WHERE tbl_danhmucsp.id_loaisp= tbl_loaisp.id_loaisp  ORDER BY tbl_danhmucsp.id_danhmuc DESC";
   $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
  


?>


<div class="form2 form2-1">
    <div class="form-title">
        <p>Liệt kê Danh Mục Sản phẩm </p>
    </div>
    <div class="form2-content">
       <table>

        <tr>
          <th>Stt</th>
          <th>Tên Danh Mục Sản phẩm</th>
          <th>Loại Sản phẩm</th>
          <th>Quản lí</th>
        </tr>
        

        <?php
          
           $i=0;
           while($row = mysqli_fetch_array($query_danhmuc)){
           $i++;
        
        ?>
            <tr>
                <th><?= $i ?></th>
             
                <th><?= $row['tendanhmuc'] ?></th>
                <th><?= $row['tenloaisp']?></th>
                <th>
                    <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                    <a href="modules/quanlidanhmucsp/xuli.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>
                </th>
            </tr>
              
       <?php 
           }
       ?>
        
        
       </table>

    </div>
   
</div>