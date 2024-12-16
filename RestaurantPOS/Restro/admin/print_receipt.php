<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="MartDevelopers Inc">
    <title>ElectricStore </title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/brand/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/brand/logo.png">">
    <link rel="manifest" href="assets/img/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.js"></script>
    <style>
        body {
            margin-top: 20px;
        }
    </style>
</head>
</style>
<?php
$code = $_GET['order_code'];

$ret = "SELECT * FROM tbl_cart_details,tbl_sanpham,tbl_cart,tbl_user WHERE  tbl_user.id_user=tbl_cart.id_khachhang AND tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart=tbl_cart.code_cart AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
$i = 0;
$tongtien = 0;
while ($order = $res->fetch_object()) {
    $i++;
    $thanhtien = ($order->giasp*$order->soluongmua*(100-$order->sale))/100  ;
    $tongtien += $thanhtien ;
?>

    <body>
        <div class="container">
            <div class="row">
                <div id="Receipt" class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>Electrical Shop</strong>
                                <br>
                                Thành phố Đà Nẵng
                                <br>
                                0367947767
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                
                                <em>Date: <?php echo date('d/M/Y g:i', strtotime($order->cart_date)); ?></em>
                            </p>
                            <p>
                                <em class="text-success">Receipt #: <?php echo $order->code_cart; ?></em>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <h2>Hóa đơn</h2>
                        </div>
                        <div >
                            <p><b>Tên người nhận: </b><?php 
                            if($order->id_khachhang == $order->id_khachhang){
                                echo "$order->fullname";
                            }?></p><br>
                            <p><b>Địa chỉ: </b><?php 
                            if($order->id_khachhang == $order->id_khachhang){
                                echo "$order->diachicuthe, ","$order->tinh, ","$order->tp";
                            }?></p><br>
                            <p><b>Số điện thoại: </b><?php 
                            if($order->id_khachhang == $order->id_khachhang){
                                echo "$order->sdt";
                            }?></p><br>
                            <p><b>Email: </b><?php 
                            if($order->id_khachhang == $order->id_khachhang){
                                echo "$order->email";
                            }?></p><br>
                        </div>
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-9"><em> <?php echo $order->tensanpham; ?> </em></h4>
                                    </td>
                                    <td class="col-md-1" style="text-align: center"> <?php echo $order->soluongmua; ?></td>
                                    <td class="col-md-1 text-center">$<?php echo $order->giasp; ?></td>
                                    <td class="col-md-1 text-center">$<?php echo $thanhtien; ?></td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right">
                                        <p>
                                            <strong>Subtotal: </strong>
                                        </p>
                                        <p>
                                            <strong>Tax: </strong>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p>
                                            <strong>$<?php echo $thanhtien; ?></strong>
                                        </p>
                                        <p>
                                            <strong>1%</strong>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right">
                                        <h4><strong>Total: </strong></h4>
                                    </td>
                                    <td class="text-center text-danger">
                                        <h4><strong>$<?php echo $tongtien+($tongtien*(1/100)); ?></strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <button id="print" onclick="printContent('Receipt');" class="btn btn-success btn-lg text-justify btn-block">
                        Print <span class="fas fa-print"></span>
                    </button>
                </div>
            </div>
        </div>
    </body>

</html>
<script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>
<?php } ?>