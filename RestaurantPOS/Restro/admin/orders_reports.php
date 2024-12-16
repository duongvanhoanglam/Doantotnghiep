<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

require_once('partials/_head.php');
?>

<body>
    <!-- Sidenav --><!-- For more projects: Visit codeastro.com  -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('partials/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            Xem đơn hàng
                        </div><!-- For more projects: Visit codeastro.com  -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">Id</th>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th class="text-success" scope="col">Tên sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scop="col">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $code = $_GET['code'];
                                    $ret = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    $i = 0;
                                    $tongtien = 0;
                                    while ($order = $res->fetch_object()) {
                                        $i++;
                                        $thanhtien = ($order->giasp*$order->soluongmua*(100-$order->sale))/100;
                                        $tongtien += $thanhtien ;

                                    ?>
                                        <tr class="tr_sp">
                                            <th class="text-success" scope="row"><?php echo $order->id_cart_details; ?></th>
                                            <td><?php echo $order->code_cart; ?></td>
                                            <td class="text-success"><?php echo $order->tensanpham; ?></td>
                                            <td> <?php echo $order->soluongmua; ?></td>
                                            <td class="text-success"><?php echo number_format($order->giasp,0,',','.').'vnđ' ?></td>
                                            <td> <?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
                                        </tr>
                                    
                                    <?php } ?>
                                    <tr>
                                            <td colspan="6" align="right" >
                                                <p class="td_sp" >Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
                                            </td>
                                        
                                        </tr>
                                </tbody>
                            </table>
                            <table>
                            <th>
                            <a href="orders.php">
                                <button class="btn btn-sm btn-primary">
                                    Quay Lại trang đơn Hàng
                                </button> 
                            </a> 
                            </th>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- For more projects: Visit codeastro.com  -->
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>