<?php
    
    include 'admincp/mudules2/getLast.php';
    

   
?>
<div class="card shadow">
            <div class="card-header border-0">
              <h1>Tất cả đơn hàng của bạn</h1>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th class="text-success" scope="col">Id</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th class="text-success" scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th>Thành tiền</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                <?php
                                    $code = $_GET['code'];
                                    $id_user = $_GET['id'];
                                    $mysqli = new mysqli("localhost","root","206394832","shop");
                                    $ret = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."'";
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
                                                <h3 class="td_sp" >Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></h3>
                                            </td>
                                        
                                      </tr>
                </tbody>
              </table>
              <table>
                            <th>
                            <a href="index.php?quanly=lsdonhang&id_user=<?php echo $id_user ?>">
                            <button class="btn btn-sm btn-primary">
                                    Quay Lại trang đơn Hàng
                            </button> 
                            </a>
                            </th>
                            </table>
            </div>