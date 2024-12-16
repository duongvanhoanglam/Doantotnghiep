<p class="title_donhang">Xem đơn hàng</p>
<?php
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  require "pdfcrowd-5.5.0/pdfcrowd.php";
  $data = 42;
  
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  
  
  </tr >
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  	$thanhtien = ($row['giasp']*$row['soluongmua']*(100-$row['sale']))/100;
  	$tongtien += $thanhtien ;
    



  ?>
  <tr class="tr_sp">
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
   	
  </tr>
  <?php
  } 
  ?>
  <tr>
  	<td colspan="6" >
   		<p class="td_sp">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
   	</td>
  
  </tr>

</table>
<table>

<th>
  <a href="index.php?action=quanlydonhang&query=them">Quay Lại trang đơn Hàng</a>  

  <a href="modules/quanlidonhang/inPDF.php">In</a> 
</th>
</table>
<?php 

try
{     
   
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("quan20112002", "2c5d3170febf4454acc28a1f50ea2336");

    // run the conversion and write the result to a file
    $client->convertUrlToFile("http://codewithquan.xyz/index.php?quanly=sanpham&id={$data}", "pdf/hello-world2{$data}.pdf");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>

