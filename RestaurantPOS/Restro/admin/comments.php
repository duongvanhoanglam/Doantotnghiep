<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

if (isset($_GET['id_comment']) & isset($_GET['id_comment2'])) {
  $mysqli = new mysqli("localhost","root","206394832","shop");
  $id_comment = $_GET['id_comment'];
  $id_comment2 = $_GET['id_comment2'];
  $sql_xoa = "DELETE FROM  tbl_comments  WHERE  id_sp = $id_comment AND id_comment= $id_comment2 ";
	$stmt=mysqli_query($mysqli,$sql_xoa);

  if ($stmt == true ) {
    $success = "Deleted" && header("refresh:1; url=comments.php");
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
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Link bài viết</th>
                    <th scope="col">Nội dung bình luận</th>
                    <th scope="col">Quản lí</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php if (isset($_GET['ems'])) { ?>
                    <div class=" note_sp1" >
                              <a >
                      <?php echo htmlspecialchars($_GET['ems']);?></a>
                    </div>
                  <?php } ?>
                  <?php
                  $mysqli = new mysqli("localhost","root","206394832","shop");
                  $ret  = "SELECT * FROM tbl_comments  ORDER BY id_comment DESC";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($bv = $res->fetch_object()) {
                    if($bv->tinhtrang==0){
                  ?>
                    <tr><!-- Them link la link cua page sanphamchitiet  -->
                      <td><a href="../../../index.php?quanly=sanpham&id_sanpham=<?php echo $bv->id_sp; ?>">Link</td>
                      <td><?php echo $bv->noidungcmt; ?></td>
                      <td>
                          <a href="comments.php?id_comment=<?php echo $bv->id_sp;  ?>&id_comment2=<?php echo $bv->id_comment; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                          </a>
                          
                          <a href="xulycomment.php?update=<?php echo $bv->id_sp;  ?>&id_comment2=<?php echo $bv->id_comment; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                          </a>
                      </td>
                    </tr><!-- For more projects: Visit codeastro.com  -->
                  <?php }} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
      require_once('partials/_footer.php');
  ?>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>