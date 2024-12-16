<?php 
  
   $sql_danhmuc = "SELECT * FROM tbl_danhmucbv   ORDER BY id_danhmuc DESC";
   $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
  


?>


<div class="form2 form2-1">
    <div class="form-title">
        <p>Liệt kê Danh Mục Bài Viết </p>
    </div>
    <div class="form2-content">
       <table>

        <tr>
          <th>Stt</th>
          <th>Tên Danh Mục bài viết</th>
         
          <th>Quản lí</th>
        </tr>
        

        <?php
          
           $i=0;
           while($row = mysqli_fetch_array($query_danhmuc)){
           $i++;
        
        ?>
            <tr>
                <th><?= $i ?></th>
             
                <th><?= $row['tendanhmuc_bv'] ?></th>
               
                <th>
                    <a href="?action=quanlydanhmucbv&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                    <a href="modules/quanlidanhmucbv/xuli.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>
                </th>
            </tr>
              
       <?php 
           }
       ?>
        
        
       </table>

    </div>
   
</div>