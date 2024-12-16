<div class="main_giohang">
  
  <div class="main_giohang_content camon">
    <div class="img_camon"><img src="img/40947dc815042a29dabf3c6039ce7980-removebg-preview.png" alt=""></div> 
     <p>Cảm ơn quý khách đã mua hàng , chúng tôi đã gửi mail đến địa chỉ mail của bạn ! ! ! </p>
     
</div>

</div>

<?php
  // Extract GET parameters
  if(isset($_GET['partnerCode'])){
  $partnerCode = $_GET['partnerCode'];
  $orderId = $_GET['orderId'];
  $requestId = $_GET['requestId'];
  $amount = $_GET['amount'];
  $orderInfo = $_GET['orderInfo'];
  $orderType = $_GET['orderType'];
  $transId = $_GET['transId'];
  $resultCode = $_GET['resultCode'];
  $message = $_GET['message'];
  $payType = $_GET['payType'];
  $responseTime = $_GET['responseTime'];
  $extraData = $_GET['extraData'];
  $signature = $_GET['signature'];
  $paymentOption = $_GET['paymentOption'];
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_order = rand(0,9999);
	$insert_momo= "INSERT INTO tbl_momo(partnerCode, orderId, amount, orderInfo, orderType, transId, payType,code_cart) VALUE ('".$code_oder."','".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$transId."','".$payType."','".$code_order."')";
	$cart = mysqli_query($mysqli,$insert_momo);
	
	$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',0)";
	$cart_query = mysqli_query($mysqli,$insert_cart);
	if($cart_query && $cart){
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


		unset($_SESSION['cart']);
	}
}elseif(isset($_GET['vnp_Amount'])){
	$vnp_Amount = $_GET['vnp_Amount'];
	$vnp_BankCode = $_GET['vnp_BankCode'];
	$vnp_BankTranNo = $_GET['vnp_BankTranNo'];
	$vnp_CardType = $_GET['vnp_CardType'];
	$vnp_OrderInfo = $_GET['vnp_OrderInfo'];
	$vnp_PayDate = $_GET['vnp_PayDate'];
	$vnp_ResponseCode = $_GET['vnp_ResponseCode'];
	$vnp_TmnCode = $_GET['vnp_TmnCode'];
	$vnp_TransactionNo = $_GET['vnp_TransactionNo'];
	$vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
	$vnp_TxnRef = $_GET['vnp_TxnRef'];
	$vnp_SecureHash = $_GET['vnp_SecureHash'];
	$code_order= rand(0,9999);
	$id_khachhang = $_SESSION['id_khachhang'];

	$insert_vnpay="INSERT INTO tbl_vnpay(core_cart, amount, bankcode, banktranno, cardtype, orderinfo, paydate, tmncode, transaction_no) VALUE('".$code_order."', '".$vnp_Amount."', '".$vnp_BankCode."', '".$vnp_BankTranNo."', '".$vnp_CardType."', '".$vnp_OrderInfo."', '".$vnp_PayDate."', '".$vnp_TmnCode."', '".$vnp_TransactionNo."')";
	$cart = mysqli_query($mysqli,$insert_vnpay);
	
	$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',0)";
	$cart_query = mysqli_query($mysqli,$insert_cart);
	if($cart_query && $cart){
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


		unset($_SESSION['cart']);
	}
}
?>