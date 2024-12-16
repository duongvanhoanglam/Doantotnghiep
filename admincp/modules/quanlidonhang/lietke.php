<?php 
  
  $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang=tbl_user.id_user ORDER BY tbl_cart.id_cart DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  


?>


<div class="form2 form2-1">
    <div class="form-title">
        <p>Liệt kê Danh Sách đơn hàng </p>
    </div>
    <div class="form2-content">
       <table>

        <tr>
          <th>id</th>
          <th>Mã Đơn Hàng</th>
          <th>Tên Khách Hàng</th>
          <th>Địa Chỉ</th>
          <th>Số Điện Thoại</th>
          <th>Ngày Đặt</th>
          <th>Quản lí</th>
        </tr>
        

        <?php
          
           $i=0;
           while($row = mysqli_fetch_array($query_lietke_dh)){
           $i++;
        
        ?>
            <tr>
                <th><?= $i ?></th>
             
                <th><?php echo $row['code_cart'] ?></th>
                <th><?php echo $row['fullname'] ?></th>
                <th><?php echo $row['diachicuthe'] ?>, <?php echo $row['tinh'] ?>, <?php echo $row['tp'] ?><?php  ?></th>
                <th><?php echo $row['sdt'] ?></th>
                <th><?php echo $row['cart_date'] ?></th>
                <th class="quanli"> 
                    
                      <?php if($row['cart_status']==1){
    		             echo ' <a href="modules/quanlidonhang/xuly.php?code='.$row['code_cart'].'">Check</a>';
    	              }else{
    		             echo '<a class ="viewed">Đã xem</a>' ;
    	               }?>
                    <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem Đơn Hàng</a>
                    <a href="modules/quanlidonhang/xuly.php?huy=<?php echo $row['code_cart']  ?>">Hủy Đơn Hàng</a>
                  
                </th>
            </tr>
              
       <?php 
           }
       ?>
        
        
       </table>

    </div>
   
</div>