<?php 
  
   $sql_sp = "SELECT * FROM tbl_danhmucsp,tbl_brand,tbl_sanpham WHERE  tbl_danhmucsp.id_danhmuc = tbl_sanpham.id_danhmuc AND tbl_sanpham.id_brand = tbl_brand.id_brand ORDER BY tbl_sanpham.id_sanpham  DESC";
   $query_sp = mysqli_query($mysqli,$sql_sp);

   
  


?>


<div class="form2 form2-1">
    <div class="form-title">
        <p>Quản lí trang Top_Banner_carousel </p>
    </div>
    <div class="form2-content">
       <table>

        <tr>
          <th>Stt</th>
          <th>Tên Sản Phẩm </th>
          <th>Mã Sản Phẩm</th>
          <th>Sale</th>
          <th>Hình ảnh</th>
          <th>Tình trạng</th>
          <th>Quản lí</th>
          <th></th>
        </tr>
        

        <?php
          
           $i=0;
           while($row = mysqli_fetch_array($query_sp)){
           $i++;
           if($row['tinhtrang']==1){
        
        ?>
            <tr>
                <th><?= $i ?></th>
             
                <th class="width1"><?= $row['tensanpham'] ?></th>
                <th><?= $row['masp']?></th>
                <th><?= $row['sale'] ?>%</th>
               
                <th><img src="modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" class=" img_brand"></th> 
                <th>
                    <?php 
                        if($row['tinhtrang'] == 1){
                            echo "Hiện";
                        }else{
                            echo "Ẩn ";
                        }
                    ?>
                </th><th>
                <?php if($row['add_hot'] == 0){ ?>
                
                
                    <a href="modules/quanlihot/xuli.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Add</a>
               <?php }else{?>
                    
                <p class="status">added</p>

                <?php } ?> </th>
                
                 <?php if($row['add_hot'] == 1) {?>

                <th><a href="modules/quanlihot/xuli2.php?idsanpham=<?php echo $row['id_sanpham'] ?>" class="icon-a"><i class='bx bxs-message-alt-x'></i></a></th>
                <?php } ?>
              </tr>
       <?php 
           }}
       ?>
        
        
       </table>

    </div>
   
</div>