<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

//Add Staff
if (isset($_POST['addStaff'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["username"]) || empty($_POST["sdtnv"]) || empty($_POST['dcnv']) || empty($_POST['pass'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $username = $_POST['username'];
    $pass = ($_POST['pass']);
    $dcnv = $_POST['dcnv'];
    $sdtnv = $_POST['sdtnv'];
    $id_admin = $_POST['id_admin'];

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO tbl_admin (username, password, admin_status) VALUES(?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sss', $username, $sdtnv, $pass);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Nhân viên được thêm" && header("refresh:1; url=staff.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
  }
}
require_once('partials/_head.php');
?>

<body>
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
              <h3>Thêm thông tin nhân viên</h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>User name: </label>
                    <input type="text" name="username" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Status</label>
                    <input type="text" name="pass" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Password </label>
                    <input type="password" name="sdtnv" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Address </label>
                    <input type="text" name="dcnv" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addStaff" value="Thêm nhân viên" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
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

</html>
<!--value="<?php echo $alpha; ?>-<?php echo $beta; ?>"!>