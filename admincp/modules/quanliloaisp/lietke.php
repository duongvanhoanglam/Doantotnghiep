<?php 
  
   $sql_loaisp = "SELECT * FROM tbl_loaisp ORDER BY thutu DESC";
   $query_loaisp = mysqli_query($mysqli,$sql_loaisp);
  


?>


<div class="form2">
    <div class="form-title">
        <p>Liệt kê Loại sản phẩm</p>
    </div>
    <div class="form2-content">
       <table>

        <tr>
          <th>Stt</th>
          <th>Tên Loại Sản phẩm</th>
          <th>Quản lí</th>
        </tr>
        

        <?php
          
           $i=0;
           while($row = mysqli_fetch_array($query_loaisp)){
           $i++;
        
        ?>
            <tr>
                <th><?= $i ?></th>
                <th><?= $row['tenloaisp'] ?></th>
                <th>
                    <a href="?action=quanlyloaisp&query=sua&idloaisp=<?php echo $row['id_loaisp'] ?>">Sửa</a>
                    <a href="modules/quanliloaisp/xuli.php?idloaisp=<?php echo $row['id_loaisp'] ?>">Xóa</a>
                </th>
            </tr>
              
       <?php 
           }
       ?>
        
        
       </table>

    </div>
   
</div>