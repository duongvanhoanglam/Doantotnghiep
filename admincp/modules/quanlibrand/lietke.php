<?php 
  
   $sql_brand = "SELECT * FROM tbl_brand  ORDER BY tbl_brand.thutu DESC";
   $query_brand = mysqli_query($mysqli,$sql_brand);
  


?>


<div class="form2 form2-1">
    <div class="form-title">
        <p>Liệt kê Thương Hiệu Sản phẩm </p>
    </div>
    <div class="form2-content">
       <table>

        <tr>
          <th>Stt</th>
          <th>Tên Thương Hiệu </th>
          <th>Hình ảnh</th>
          <th>Quản lí</th>
        </tr>
        

        <?php
          
           $i=0;
           while($row = mysqli_fetch_array($query_brand)){
           $i++;
        
        ?>
            <tr>
                <th><?= $i ?></th>
             
                <th><?= $row['tenbrand'] ?></th>
                <th><img src="modules/quanlibrand/ptc/<?php echo $row['hinhanhbrand'] ?>" alt="" class=" img_brand"></th>
                <th>
                    <a href="?action=quanlybrand&query=sua&idbrand=<?php echo $row['id_brand'] ?>">Sửa</a>
                    <a href="modules/quanlibrand/xuli.php?idbrand=<?php echo $row['id_brand'] ?>">Xóa</a>
                </th>
            </tr>
              
       <?php 
           }
       ?>
        
        
       </table>

    </div>
   
</div>