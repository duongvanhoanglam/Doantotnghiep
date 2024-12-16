<?php
  
  $sql_sp1="SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC ";
  $query_sp1=mysqli_query($mysqli,$sql_sp1);

?>


<div class="main2" id="main2-1">
                 

               <div class="main2-title">
                 It is Sale Time ! ! !
               </div>
                <div class="main2-content1">
                <div id="countdown">
                    <div class="countdown-ti">
                        Tất cả sẽ kết thúc trong :
                    </div>
                     <ul>
                        <li><span id="days"></span>days</li>
                        <li><span id="hours"></span>Hours</li>
                        <li><span id="minutes"></span>Minutes</li>
                        <li><span id="seconds"></span>Seconds</li>
                     </ul>
                </div>
              <div class="sale-list " >
                  <div class="sale-co owl-carousel">
                    <?php 

                               while($row_sp1 = mysqli_fetch_array($query_sp1)){
                                 $new_price = $row_sp1['giasp'] - ($row_sp1['giasp'] * $row_sp1['sale']/100);
                                 if($row_sp1['add_sale']==1){
                                 ?>
                   
                  <div class="sale-items" >
                      <a href="index.php?quanly=sanpham&id_sanpham=<?php echo $row_sp1['id_sanpham'] ?>">
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
                      <div class="box-price">
                          <?php
                             
                             if($row_sp1['sale']>0){?>
                           <div class="items-price-news">
                            <p><?php echo number_format(($new_price),0,',','.' ).' ₫ ' ;?> </p>
                       </div>
                       <div class="items-price-old">
                           <del><?php  echo number_format(($row_sp1['giasp']),0,',','.' ).' ₫ ' ;?> </del>
                             </div>

                        <?php } else {?>

                            <div class="items-price-news">
                            <p><?php echo number_format(($row_sp1['giasp']),0,',','.' ).' ₫ ' ;?> </p>
                       </div>
                        <?php } ?>
                       
                    </div>
                    
                </a>
              </div>

              <?php }} ?>
              

            </div>
             </div>
             
            
            </div>
        </div>
<?php
  $time = "SELECT * FROM time_sale WHERE id = 1";
  $query_time = mysqli_query($mysqli,$time);

?>
<?php   while($row_time = mysqli_fetch_array($query_time)){ ?>
        <script>
            (function () {
    const second = 1000,
          minute = second * 60,
          hour = minute * 60,
          day = hour * 24;
  
    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 2,
        
        birthday ='<?php echo $row_time['time1']; ?>' ;
    
    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
      birthday = dayMonth + nextYear;
    }
    //end
    
    const countDown = new Date(birthday).getTime(),
        x = setInterval(function() {    
  
          const now = new Date().getTime(),
                distance = countDown - now;
  
          document.getElementById("days").innerText = Math.floor(distance / (day)),
            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
  
          //do something later when date is reached
          if (distance < 0) {
            document.getElementById("headline").innerText = "It's my birthday!";
            document.getElementById("countdown").style.display = "none";
            document.getElementById("content").style.display = "block";
            clearInterval(x);
          }
          //seconds
        }, 0)
    }());

        </script>
        <?php } ?>
        