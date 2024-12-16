

<div class="main_giohang">
  <div class="url_sp2">
    <p><a href="#">Home</a> / <a href="#">Giỏ Hàng</a></p>
  </div>
  <div class="main_giohang_content">
  <?php
if(isset($_SESSION['cart'])){
  $i = 0;
  
  foreach($_SESSION['cart'] as $cart_item){
    $thanhtien = ($cart_item['soluong']*$cart_item['giasp']*(100 -$cart_item['sale']))/100;
    
   
    $i++;}

?>
  <div class="gio_hang_title"> Thanh Toán  Đơn Hàng ( <span><?php echo $i ?></span>  đơn hàng có sẵn)  </div>
  <?php } else {?>
  <div class="gio_hang_title"> Không có hàng trong giỏ  !!! </div>
  <?php } ?>



  <?php
if(isset($_SESSION['cart'])){
  $i = 0;
  $tongtien = 0;

  foreach($_SESSION['cart'] as $cart_item){
    $thanhtien = ($cart_item['soluong']*$cart_item['giasp']*(100 -$cart_item['sale']))/100;
    $tongtien+=$thanhtien;
    $tien = ($cart_item['giasp']*(100 -$cart_item['sale']))/100;
   
    $i++;
    $id = $cart_item['id'];

?>
 <div class="that_scrool"></div>
  <div class="giohang_content">
     <div class="gio_hang_content_left">
       <div class="thongtinhang_left">
               <img src="RestaurantPOS/Restro/admin/assets/img/products/<?php echo $cart_item['hinhanh']; ?>" alt="">
       </div>
       <div class="thongtinhang_right">
                 <div class="thongtinhang_masp">Mã sản phẩm: <span><?php echo $id = $cart_item['id']; ?></span> </div>
                 <div class="thongtinhang_masp">Mã sản phẩm: <span><?php echo $cart_item['masp']; ?></span> </div>
                 <div class="thongtinhang_right_name"><?php echo $cart_item['tensanpham']; ?></div>
                 <div class="thongtinhang_price"> Giá : <span><?php echo number_format($tien,0,',','.').'₫ '; ?></span> </div>
                 <div class="thongtinhang_price">Số Lượng :</div>
                 <div class="soluong">
                   <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="cong"><i class="fa-solid fa-plus" aria-hidden="true"></i></a>
                       <span contenteditable="true"> <?php echo $cart_item['soluong']; ?></span>  
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="tru"><i class="fa-solid fa-minus" aria-hidden="true"></i></a>
                 </div>
                 <div class="thanhtien">
                       Thành tiền : <span><?php echo number_format($thanhtien,0,',','.').' ₫' ?></span>
                 </div>  
  
                  </div>
     </div>
     <div class="thongtinhang_right">
                  <?php
                  $mysqli = new mysqli("localhost","root","206394832","shop");
                  $sql_picture2 = "SELECT  id_sanpham, thongso FROM tbl_sanpham";
                  $query = mysqli_query($mysqli,$sql_picture2);
                  while($row_loaisp = mysqli_fetch_array($query)){
                    if($row_loaisp['id_sanpham']==$cart_item['id']){
                  ?>
                    <div class="thongtinhang_masp">Mô tả: <span><?php echo $row_loaisp['thongso'] ?></span> </div>
                  <?php } ?>
                  <?php } ?>
        </div>
     <div class="gio_hang_content_right">
      
        <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-trash-can"></i></a> 
      
     </div>
  </div>
  <?php } ?>


    <div class="tongtien">Tổng Tiền : <span><?php echo number_format($tongtien,0,',','.') ?>₫</span></div>

    <?php if(isset($_SESSION['dangky'])){
         ?>
      <div class="buy_btn">
      <a href="pages/main/thanhtoan.php">Đặt Hàng (Thanh toán trực tiếp)</a>
      </div>
      <!--<div class="buy_btn">
      <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/thanhtoanmomo.php">
        <input type="submit" value="Thanh toán qua MoMo QR code" class="btn-btn-danger">
      </form>
      </div>-->
      <div class="buy_btn">
      <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="#">
        <input type="hidden" name="tongtien" value="<?php echo $tongtien; ?>">
        <input type="submit" name="payWithATM" value="Thanh toán qua MoMo" class="btn-btn-danger">
      </form>
      </div>
      <div class="buy_btn">
      <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="#">
        <input type="hidden" name="tongtien" value="<?php echo $tongtien; ?>">
        <input type="submit" name="redirect" value="Thanh toán qua VNPay" class="btn-btn-danger">
      </form>
      </div>
      

    <?php  }else { ?>
           
      <div class="login-sp2 login_giohang"> <a href="index.php?quanly=login " class="login-sp"> Đăng nhập để thanh toán sản phẩm</a></div>

    <?php  } ?>
    

    
    <div class="clear"></div>
  
  <?php }else { ?>
      
    <div class="giohang_nothing">
      <div class="giohang_nothing_img">
        <img src="img/empty_cart.jpg" alt="">
      </div>
      <div class="giohang_nothing_text">
        <p>Giỏ hàng của bạn đang trống</p>
        <p>Vui lòng chọn sản phẩm vào giỏ hàng</p>
      </div>
    </div>
</div>
  <?php } ?>
  
</div>
