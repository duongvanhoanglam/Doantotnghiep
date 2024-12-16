<?php 
 $id_bv = $_GET['id_bv'];
 $sql_sp = "SELECT * FROM tbl_danhmucbv,tbl_baiviet WHERE  tbl_danhmucbv.id_danhmuc = tbl_baiviet.id_danhmuc AND tbl_baiviet.id = '$_GET[id_bv]' ORDER BY tbl_baiviet.id DESC";
   $query_sp1 = mysqli_query($mysqli,$sql_sp);
 ($row_sp1 = mysqli_fetch_array($query_sp1))
?>

<div class="main-sp-all">
    <div class="clear"></div>
    <div class="url_sp">
        <p><a href="index.php">Home</a> \ <a href="index.php?quanly=tintuc">Tin Tức</a> \ <a
                href="index.php?quanly=see-tintuc&id_danhmucbv=<?php echo $row_sp1['id_danhmuc'] ?>&tenbaiviet=<?php echo $row_sp1['tendanhmuc_bv'] ?>"><?php echo $row_sp1['tendanhmuc_bv'] ?></a>
            \ <a href=""><?php echo $row_sp1['tenbaiviet'] ?></a></p>
    </div>
    <div class="main-sp main-sp-tt">
        <div class="main_sp_tt_title">
            <h1><?php echo $row_sp1['tenbaiviet'] ?></h1>
        </div>
        <div class="main_sp_tt_time">
            <p>Thời gian: <?php echo $row_sp1['time'] ?></p>
        </div>
        <div class="main_sp_tt_tomtat">
            <p><?php echo $row_sp1['tomtat'] ?></p>
        </div>
        <div class="main_sp_tt_noidung">
            <p><?php echo $row_sp1['noidung'] ?></p>
        </div>


    </div>
</div>