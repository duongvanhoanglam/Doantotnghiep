<?php
require('../Carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
$date= $_POST['date'];  
$now = Carbon::now('Asia/Ho_Chi_Minh');
if($date=='7'){
  $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
}elseif($date=='28'){
  $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
}elseif($date=='90'){
  $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
}elseif($date=='365'){
$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();	
}

$uselist= "SELECT * FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang=tbl_user.id_user AND cart_date BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC" ;
print_r($uselist)
//header('Location:../..//Restro/admin/dashboard.php');
?>
			