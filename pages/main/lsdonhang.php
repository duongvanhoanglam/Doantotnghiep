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
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Quản lí</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php
                  $id_user=$_GET['id_user'];
                  $ret = "SELECT * FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang=tbl_user.id_user AND id_khachhang='$id_user' ORDER BY tbl_cart.id_cart";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $prod->code_cart; ?></td>
                      <td><?php echo $prod->fullname; ?></td>
                      <td><?php echo $prod->diachicuthe.",".$prod->tinh.",".$prod->tp; ?></td>
                      <td><?php echo $prod->sdt; ?></td>
                      <td><?php echo $prod->cart_date; ?></td>
                      <td><?php 
                        if($prod->cart_status==0){
                            echo "Đang chờ xử lí";
                        }elseif($prod->cart_status==1){
                            echo "Đơn được duyệt";
                        }elseif($prod->cart_status==2){
                            echo "Đơn đang được giao";
                        }else{
                          echo "Giao hàng thành công";
                        }
                       ?></td>
                      <td>
                         <a href="index.php?quanly=ctlsdonhang&code=<?php echo $prod->code_cart;  ?>&id=<?php echo $id_user;  ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                            Xem đơn hàng
                          </button>
                          <?php if($prod->cart_status<=2){?>
                          <a href="index.php?quanly=xulydh&huy=<?php echo $prod->code_cart; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-window-close"></i>
                            Hủy đơn hàng
                          </button>
                          <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>