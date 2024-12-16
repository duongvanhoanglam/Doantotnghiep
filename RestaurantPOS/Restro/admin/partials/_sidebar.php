<?php
$admin_id = $_SESSION['id_admin'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  tbl_admin  WHERE id_admin = '$admin_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($admin = $res->fetch_object()) {

?>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="dashboard.php">
        <img src="assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="change_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
                <img src="assets/img/brand/repos.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <?php if($admin->admin_status==1) {?>
          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" id="usersDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fas fa-users text-primary"></i> Users
            </a>
            <ul class="dropdown-menu nav-item position-relative" aria-labelledby="usersDropdown">
              <li class="nav-item-dropdown">
                <a class="nav-link active" href="customes.php">Khách hàng</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="staff.php">Nhân viên</a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" id="usersDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fas fa-users text-primary"></i> Tổng hợp
            </a>
            <ul class="dropdown-menu nav-item position-relative" aria-labelledby="usersDropdown">
              <li class="nav-item-dropdown">
                <a class="nav-link active" href="products.php">Sản phẩm</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="baiviet.php">Bài viết</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="comments.php">Quản lí comments</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" id="usersDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fas fa-users text-primary"></i> Danh mục
            </a>
            <ul class="dropdown-menu nav-item position-relative" aria-labelledby="usersDropdown">
              <li class="nav-item-dropdown">
                <a class="nav-link active" href="loaisp.php">Loại sản phẩm</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="danhmucsp.php">Danh mục sản phẩm</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="thuonghieu.php">Thương hiệu</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="danhmucbv.php">Danh mục bài viết</a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <i class="ni ni-cart text-primary"></i> Đơn hàng
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receipts.php">
              <i class="fas fa-file-invoice-dollar text-primary"></i> Receipts
            </a>
          </li>

          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="fas fa-users text-primary"></i> Website
            </a>
            <ul class="dropdown-menu nav-item position-relative" aria-labelledby="usersDropdown">
              <li class="nav-item-dropdown">
                <a class="nav-link active" href="saller.php">Sale</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="banner.php">Banner</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="topsp.php">Top sản phẩm</a>
              </li>
              <li class="nav-item-dropdown">
                <a class="nav-link" href="#">Liên hệ</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Divider -->
        
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt text-danger"></i> Log Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php } ?>
