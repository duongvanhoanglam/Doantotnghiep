<?php
  
  $sql_sp1="SELECT * FROM tbl_sanpham,tbl_brand,tbl_danhmucsp WHERE tbl_sanpham.id_brand = tbl_brand.id_brand AND tbl_sanpham.id_danhmuc = tbl_danhmucsp.id_danhmuc ORDER BY id_sanpham DESC LIMIT 30";
  $query_sp1=mysqli_query($mysqli,$sql_sp1);

?>


<div class="banner">
          
            
                <div class="tab-link">
                <div class="tab-link_i"><a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a> </div>  
                </div>
                <div class="banner-list ">
                <div class="owl-carousel banner-list-content ">
                           

                           <?php 

                while($row_sp1 = mysqli_fetch_array($query_sp1)){
                 $new_price = $row_sp1['giasp'] - ($row_sp1['giasp'] * $row_sp1['sale']/100);
                 if($row_sp1['add_hot']==1){?>
                   
              
                     <div class="banner-items">
                               <div class="banner-items-left">
                                <?php if($row_sp1['sale']>0){ ?>
                                   <div class="banner-title1">  Get up to span <span class="span-sale"> <?php echo $row_sp1['sale'] ?>% </span> Off </div>
                                <?php }else{ ?>
                                    <div class="banner-title1"> New product </div>
                                    <?php } ?>
                                   <div class="banner-title2"><a href="index.php?quanly=sanpham&id_sanpham=<?php echo $row_sp1['id_sanpham'] ?>"><?php echo $row_sp1['tensanpham'] ?></a></div>
                                   <div class="banner-btn">
                                       <a href="index.php?quanly=sanpham&id_sanpham=<?php echo $row_sp1['id_sanpham'] ?>">Buy Now</a>
                                   </div>
                               </div>
                               <div class="banner-items-right">
                               <img src="RestaurantPOS/Restro/admin/assets/img/products/<?php echo $row_sp1['hinhanh']?>" alt="">
                               </div>
                           </div>
                     

              <?php }} ?>

                          

                           
               </div>
                         
                </div>
           
        </div>
