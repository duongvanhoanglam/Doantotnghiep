<?php
if(isset($_GET['partnerCode'])){
  $partnerCode = $_GET('partnerCode');
  $orderId = $_GET('orderId');
  $amount = $_GET('amount');
  $now = $_GET('now');
  $id_khachhang = $_GET('id_khachhang');
  $orderInfo = $_GET('orderInfo');
  $orderType = $_GET('orderType');
  $transId = $_GET('transId');
  $payType = $_GET('payType');
  $code_order = rand(0,9999);
  $insert_momo= "INSERT INTO tbl_momo(id_momo, partnerCode, orderId, amount, orderInfo, orderType, transId, payType) VALUE ('".$code_oder."','".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$transId."','".$payType."')";
  $cart = mysqli_query($mysqli,$insert_momo);
  $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) VALUE('".$id_khachhang."','".$code_order."',1,'".$now."')";
  $cart_query = mysqli_query($mysqli,$insert_cart);
  if($cart_query){
    //them gio hang chi tiet
    foreach($_SESSION['cart'] as $key => $value){
      $id_sanpham = $value['id'];
      $soluong = $value['soluong'];
      $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
      mysqli_query($mysqli,$insert_order_details);
      
    }
    $tieude = "Đặt hàng website banhangcongnghe.net thành công!";
    $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : ".$code_order."</p>";
    $noidung.="<h4>Đơn hàng đặt bao gồm :</h4p>";
    $dem=0;
     $tongtien =0;
    foreach($_SESSION['cart'] as $key => $val){
      
      $noidung.= "<ul style='border:1px solid blue;margin:10px;'>
        <li>".$val['tensanpham']."</li>
        <li>".$val['masp']."</li>
        <li>".number_format($val['giasp'],0,',','.')."đ</li>
        <li>".$val['soluong']."</li>
        <li><img src='admincp/modules/quanlibaiviet/uploads/<?php echo ".$val['hinhanh']."?>' ></li>
        </ul>";
        $dem++;
        $tongtien += $val['giasp']*$val['soluong']*(100 - $val['sale'])/100;
    }
     
    $sql_se 	= "SELECT * FROM tbl_user WHERE id_user = '".$id_khachhang."'";
    $query_se 	= mysqli_query($mysqli,$sql_se);
    $row_se 	= mysqli_fetch_array($query_se);

    
    $get_so = "SELECT donhangdamua FROM tbl_user WHERE id_user='$id_khachhang'";
    $get_so_query = mysqli_query($mysqli,$get_so);
    $get_so_data = mysqli_fetch_array($get_so_query);


    $get_so2 = "SELECT tongtien FROM tbl_user WHERE id_user='$id_khachhang'";
    $get_so_query2 = mysqli_query($mysqli,$get_so2);
    $get_so_data2 = mysqli_fetch_array($get_so_query2);
     



    $soluong2 = $get_so_data['donhangdamua'] + $dem;
    $insert_donhang = "UPDATE tbl_user SET donhangdamua = '$soluong2' WHERE id_user = '$id_khachhang'";
    mysqli_query($mysqli,$insert_donhang);
     

    $soluong3 = $get_so_data2['tongtien'] + $tongtien;
    $insert_donhang2 = "UPDATE tbl_user SET tongtien = '$soluong3' WHERE id_user = '$id_khachhang'";
    mysqli_query($mysqli,$insert_donhang2);
    
    $get_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham'";
    $get_sanpham_query = mysqli_query($mysqli,$get_sanpham);

    while($row_sanpham = mysqli_fetch_array($get_sanpham_query)){
      $soluong_sp = $row_sanpham['soluong'] - $soluong;
      $update_sanpham = "UPDATE tbl_sanpham SET soluong = '$soluong_sp' WHERE id_sanpham = '$id_sanpham'";
      mysqli_query($mysqli,$update_sanpham);

      $luotmua = $row_sanpham['luongmua'] + $soluong;
      $update_sanpham2 = "UPDATE tbl_sanpham SET luongmua = '$luotmua' WHERE id_sanpham = '$id_sanpham'";
      mysqli_query($mysqli,$update_sanpham2);

      

    }


    $maildathang = $row_se['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude,$noidung,$maildathang);
    unset($_SESSION['cart']);
     header('Location:../../index.php?quanly=camon');
  }
}
?>