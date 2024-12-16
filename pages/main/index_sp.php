<?php
  
  $sql_sp1="SELECT * FROM tbl_sanpham,tbl_brand,tbl_danhmucsp WHERE tbl_sanpham.id_brand = tbl_brand.id_brand AND tbl_sanpham.id_danhmuc = tbl_danhmucsp.id_danhmuc ORDER BY id_sanpham DESC LIMIT 30";
  $query_sp1=mysqli_query($mysqli,$sql_sp1);

?>


<div class="main4" id="main2-4">
        <div class="main3-title1 main4-title">
                 Sản Phẩm mới nhất
               </div>
         <div class="main4-content">

             <?php 

                while($row_sp1 = mysqli_fetch_array($query_sp1)){
                 $new_price = $row_sp1['giasp'] - ($row_sp1['giasp'] * $row_sp1['sale']/100);
                   if($row_sp1['tinhtrang']==1){
              ?>
           <div class="sale-items content-items" >
                      <a href="">
                      <?php
                             
                             if($row_sp1['sale']>0){?>
                            <div class="sale">-<?php echo $row_sp1['sale'] ?>%</div>

                        <?php } ?>    
                     
                      <div class="items-img-sale">
                      <img src="RestaurantPOS/Restro/admin/assets/img/products/<?php echo $row_sp1['hinhanh']?>" alt="">
                      </div>
                      <div class="items-title-sale">
                         <p><?php echo $row_sp1['tensanpham'] ?></p>
                      </div>
                      <div class="place">
                      <i class="fa-solid fa-location-dot"></i> <p> <?php echo $row_sp1['sanxuat'] ?></p>
                      </div>
                      <div class="loaisp">
                      <i class="fa-solid fa-plus"></i> <p><?php echo $row_sp1['tendanhmuc'] ?></p>
                      </div>
                      <div class="brand">
                      <i class="fa-brands fa-viacoin"></i> <p><?php echo $row_sp1['tenbrand'] ?></p>
                      </div>
                      <div class="box-price">
                          <?php
                             
                             if($row_sp1['sale']>0){?>
                           <div class="items-price-news">
                            <p><?php echo number_format(($new_price),0,',','.' ).' ₫' ;?> </p>
                       </div>
                       <div class="items-price-old">
                           <del><?php  echo number_format(($row_sp1['giasp']),0,',','.' ).'₫ ' ;?> </del>
                             </div>

                        <?php } else {?>

                            <div class="items-price-news">
                            <p><?php echo number_format(($row_sp1['giasp']),0,',','.' ).' ₫' ;?> </p>
                       </div>
                        <?php } ?>
                       
                    </div>
                    
                </a><div class="items-show">
                        <div  class="btn-show">
                           
                              <a href="index.php?quanly=sanpham&id_sanpham=<?php echo $row_sp1['id_sanpham'] ?>"><i class="fa-solid fa-eye"></i></a>  
                         
                        </div>
                        <div class="btn-bought">
                         <!--<a href=""> <i class="fa-solid fa-shopping-cart"></i></a>-->
                               
                           
                        </div>
                    </div>
              </div>
              <?php }} ?>

              
  
  
       <div class="clear"></div>
        </div>
        <div class="main4-btn">
            <!-- <a href="index.php?quanly=seeall"> -->
            <a href="#">

                See - More
            </a>
        </div>
</div>

<script src="js/app/app.js">
 
</script>