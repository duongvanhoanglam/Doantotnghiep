<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

require_once('partials/_head.php');
require_once('partials/_analytics.php');

require('../Carbon/autoload.php');
if(isset($_GET['now']) && isset($_GET['date']) ){
$now=$_GET['now'];
$sundays=$_GET['date'];
}else{
  /*$now = Carbon::now('Asia/Ho_Chi_Minh');
  $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();	*/
}

?>

<body>
<!-- For more projects: Visit codeastro.com  -->
  <!-- Sidenav -->
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
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Customers</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $customers; ?></span>
                    </div><!-- For more projects: Visit codeastro.com  -->
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<!-- For more projects: Visit codeastro.com  -->
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $products; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-utensils"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Orders</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $orders; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recent Orders</h3>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lí</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang=tbl_user.id_user ORDER BY tbl_cart.id_cart";
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
                      <?php if($prod->cart_status==0){
                        echo '<a href="xulydh.php?code='.$prod->code_cart.'">
                            <button class="btn btn-sm btn-primary">
                              <i class="fas fa-check"></i>
                              Check
                            </button></a>';
                        }else{
                          echo '<a href="update_ttdh.php?code='.$prod->code_cart.'">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-handshake"></i>
                            Update Status
                          </button></a>';
                          
                        }?>
                          <a href="orders_reports.php?code=<?php echo $prod->code_cart; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                            Xem đơn hàng
                          </button>
                          <a href="xuly.php?huy=<?php echo $prod->code_cart; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-window-close"></i>
                            Hủy đơn hàng
                          </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
		
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  <script type="text/javascript">
  $(document).ready(function(){
   		thongke();
	    var char = new Morris.Area({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','order','sales','quantity'],
		
		  labels: ['Đơn hàng','Doanh thu','Số lượng bán ra','Số lượng']
		});

		$('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian=='28ngay'){
                var text = '28 ngày qua';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }

             $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
        })
		 function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
	});
    </script>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>