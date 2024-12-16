

<?php 
 
 $tenbaiviet = $_GET['tenbaiviet'];
 $id_danhmucbv =    $_GET['id_danhmucbv'];

 $sql_sp = "SELECT * FROM tbl_danhmucbv,tbl_baiviet WHERE  tbl_danhmucbv.id_danhmuc = tbl_baiviet.id_danhmuc ORDER BY tbl_baiviet.id DESC";
   $query_sp1 = mysqli_query($mysqli,$sql_sp);

?>
<div class="main4 main_all" id="main2-4">
        <div class="main4_tt-url">
            <a href="index.php">Home</a> / <a href="index.php?quanly=tintuc">Tin tức </a> / <a><?php echo $tenbaiviet ?></a>
        </div>
         <div class="main4-content">

             <?php 
                 
                while($row_sp1 = mysqli_fetch_array($query_sp1)){
                    if($row_sp1['id_danhmuc'] == $id_danhmucbv){
                 
                 
               
                  
                
              ?>
           <div class="tt-items tt-items-2">
                    <a href="index.php?quanly=seetintuc&id_bv=<?php echo $row_sp1['id'] ?>">
                        <div class="tt-pic">
                              <img src="RestaurantPOS/Restro/admin/assets/img/anhbaiviet/<?php echo $row_sp1['hinhanh']?>" alt="">
                        </div>
                      
                        <div class="clear"></div>
                        <div class="tt-co">
                          <?php echo $row_sp1['tenbaiviet'] ?>
                        </div>
                        <div class="date-time-cmt">
                            <?php echo $row_sp1['time'] ?>
                        </div>
                        <div class="tt-titl">
                            <?php echo $row_sp1['tomtat'] ?>
                        </div>
                    </a>
                    
                </div>


              <?php }}  ?>
         

              
  
  
       <div class="clear"></div>
        </div>
     
</div>
