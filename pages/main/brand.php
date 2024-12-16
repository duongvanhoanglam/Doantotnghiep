<?php
  
  $sql_sp1="SELECT * FROM tbl_brand ORDER BY id_brand DESC ";
  $query_sp1=mysqli_query($mysqli,$sql_sp1);

?>




        <div class="main3" id="main2-2">
            <div class="main3-title1">
                Thương hiệu nổi tiếng
            </div>
           <div class="band-list">
                 <div class="band-list-co owl-carousel">

                    <?php
                     while ($row_sp1 = mysqli_fetch_array($query_sp1)) {
                      ?>
                      <div class="band-item">
                        <a href="index.php?quanly=see-sp&id_brand=<?php echo $row_sp1['id_brand'] ?>&tenbrand=<?php echo $row_sp1['tenbrand'] ?>">
                            <img src="RestaurantPOS/Restro/admin/assets/img/thuonghieu/<?php echo $row_sp1['hinhanhbrand']?>" >
                        </a>
                      </div>
                    
                    <?php } ?>

                     
                     
                 </div>
             </div>
        </div>

        