<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('assets/img/products/'.$row['hinhanh']);
		
	}

	$sql2 = "SELECT * FROM img_product WHERE id_product = '$id' ";
	$query2 = mysqli_query($mysqli,$sql2);
     while($row2 = mysqli_fetch_array($query2)){
		unlink('assets/img/products2/'.$row2['img_product']);
		
	}

	$sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
	$stmt=mysqli_query($mysqli,$sql_xoa);

	$sql_xoa2 = "DELETE FROM img_product WHERE id_product='".$id."'";
	$stmt1=mysqli_query($mysqli,$sql_xoa2);
  if ($stmt == true & $stmt1 == true) {
    $success = "Deleted" && header("refresh:1; url=products.php");
  } else {
    $err = "Try Again Later";
  }

  
}
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
              <a href="add_product.php" class="btn btn-outline-success">
                <i class="fas fa-utensils"></i>
                Add New Product
              </a><!-- For more projects: Visit codeastro.com  -->
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên Sản Phẩm </th>
                    <th scope="col">Mã Sản Phẩm</th>
                    <th scope="col">Giá Sản Phẩm </th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Sale</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lí</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_danhmucsp,tbl_brand,tbl_sanpham WHERE  tbl_danhmucsp.id_danhmuc = tbl_sanpham.id_danhmuc AND tbl_sanpham.id_brand = tbl_brand.id_brand ORDER BY tbl_sanpham.id_sanpham";;
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $prod->id_sanpham; ?></td>
                      <td>
                        <?php
                        if ($prod->hinhanh) {
                          echo "<img src='assets/img/products/$prod->hinhanh' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $prod->tensanpham; ?></td>
                      <td><?php echo $prod->masp; ?></td>
                      <td>VND <?php echo $prod->giasp; ?></td>
                      <td><?php echo $prod->soluong; ?></td>
                      <td>VND <?php echo $prod->sale; ?></td>
                      <td><?php echo $prod->tenbrand; ?></td>
                      <th>
                        <?php 
                            if($prod->tinhtrang == 1){
                                echo "Hiện";
                            }else{
                                echo "Ẩn ";
                            }
                        ?>
                      </th>
                      <td>
                        <a href="products.php?delete=<?php echo $prod->id_sanpham; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>

                        <a href="update_product.php?update=<?php echo $prod->id_sanpham; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                        </a>
                      </td>
                    </tr><!-- For more projects: Visit codeastro.com  -->
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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