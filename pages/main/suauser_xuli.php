<?php 
 
 include('../../admincp/config/config.php');
 $id_user = $_GET['id_user'];
if(isset($_POST['suauser'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['fulladress']; 
    $city2 = $_POST['calc_shipping_provinces'];
    $mall = $_POST['calc_shipping_district'];
    
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    
    $hinhanh = time().'_'.$hinhanh;
    
   
       if($city2 == 0){
        $city = 0;
       }
       elseif($city2 == 1){
        $city = "An Giang";
       }else if($city2 == 2){
        $city = "Bà Rịa - Vũng Tàu";
        }else if($city2 == 3){
        $city = "Bạc Liêu";
        }else if($city2 == 4){
        $city = "Bắc Kạn";
        }else if($city2 == 5){
        $city = "Bắc Giang";
        }else if($city2 == 6){
        $city = "Bắc Ninh";
        }else if($city2 == 7){
        $city = "Bến Tre";
        }else if($city2 == 8){
        $city = "Bình Dương";
        }else if($city2 == 9){
        $city = "Bình Định";
        }else if($city2 == 10){
        $city = "Bình Phước";
        }else if($city2 == 11){
        $city = "Bình Thuận";
        }else if($city2 == 12){
        $city = "Cà Mau";
        }else if($city2 == 13){
        $city = "Cao Bằng";
        }else if($city2 == 14){
        $city = "Cần Thơ";
        }else if($city2 == 15){
        $city = "Đà Nẵng";
        }else if($city2 == 16){
        $city = "Daklak";
        }else if($city2 == 17){
        $city = "Dăk Nông";
        }else if($city2 == 18){
        $city = "Đồng Nai";
        }else if($city2 == 19){
        $city = "Đồng Tháp";
        }else if($city2 == 20){
        $city = "Điện Biên";
        }else if($city2 == 21){
        $city = "Gia Lai";
        }else if($city2 == 22){
        $city = "Hà Giang";
        }else if($city2 == 23){
        $city = "Hà Nam";
        }else if($city2 == 24){
        $city = "Hà Nội";
        }else if($city2 == 25){
        $city = "Hà Tĩnh";
        }else if($city2 == 26){
        $city = "Hải Dương";
        }else if($city2 == 27){
        $city = "Hải Phòng";
        }else if($city2 == 28){
        $city = "Hòa Bình";
        }else if($city2 == 29){
        $city = "Hậu Giang";
        }else if($city2 == 30){
        $city = "Hưng Yên";
        }else if($city2 == 31){
        $city = "Thành Phố Hồ Chí Minh";
        }else if($city2 == 32){
        $city = "Khánh Hòa";
        }else if($city2 == 33){
        $city = "Kiên Giang";
        }else if($city2 == 34){
        $city = "Kon Tum";
        }else if($city2 == 35){
        $city = "Lai Châu";
        }else if($city2 == 36){
        $city = "Lào Cai";
        }else if($city2 == 37){
        $city = "Lạng Sơn";
        }else if($city2 == 38){
        $city = "Lâm Đồng";
        }else if($city2 == 39){
        $city = "Long An";
        }else if($city2 == 40){
        $city = "Nam Định";
        }else if($city2 == 41){
        $city = "Nghệ An";
        }else if($city2 == 42){
        $city = "Ninh Bình";
        }else if($city2 == 43){
        $city = "Ninh Thuận";
        }else if($city2 == 44){
        $city = "Phú Thọ";
        }else if($city2 == 45){
        $city = "Phú Yên";
        }else if($city2 == 46){
        $city = "Quảng Bình";
        }else if($city2 == 47){
        $city = "Quảng Nam";
        }else if($city2 == 48){
        $city = "Quảng Ngãi";
        }else if($city2 == 49){
        $city = "Quảng Ninh";
        }else if($city2 == 50){
        $city = "Quảng Trị";
        }else if($city2 == 51){
        $city = "Sóc Trăng";
        }else if($city2 == 52){
        $city = "Sơn La";
        }else if($city2 == 53){
        $city = "Tây Ninh";
        }else if($city2 == 54){
        $city = "Thái Bình";
        }else if($city2 == 55){
        $city = "Thái Nguyên";
        }else if($city2 == 56){
        $city = "Thanh Hóa";
        }else if($city2 == 57){
        $city = "Thừa Thiên Huế";
        }else if($city2 == 58){
        $city = "Tiền Giang";
        }else if($city2 == 59){
        $city = "Trà Vinh";
        }else if($city2 == 60){
        $city = "Tuyên Quang";
        }else if($city2 = 61){
        $city = "Vĩnh Long";
        }else if($city2 == 62){
        $city = "Vĩnh Phúc";
        }else if($city2 == 63){
        $city = "Yên Bái";
        }
 if(!empty($_FILES['hinhanh']['name'])){
        
  if($city==0  && $mall!=0){
    $mysqli = new mysqli("localhost","root","206394832","shop");
    $sql = "SELECT * FROM tbl_user WHERE id_user = '".$id_user."'";
    $query = mysqli_query($mysqli,$sql);
   while($row = mysqli_fetch_array($query)){
      unlink('admincp/modules/quanliuser/upload/'.$row['hinhanh']);
    }
    $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."',hinhanh = '".$hinhanh."', sdt = '".$phone."', diachicuthe = '".$address."' , tp = '".$mall."'  WHERE id_user = '".$id_user."'";
    $row_update = mysqli_query($mysqli,$sql_update);
    move_uploaded_file($hinhanh_tmp,'admincp/modules/quanliuser/upload/'.$hinhanh);
    
    if($row_update){
       echo '<script>window.location="index.php?quanly=user"</script>';
    }
}elseif($mall==0 && $city!=0){
    $mysqli = new mysqli("localhost","root","206394832","shop");
    $sql = "SELECT * FROM tbl_user WHERE id_user = '".$id_user."'";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
      unlink('admincp/modules/quanliuser/upload/'.$row['hinhanh']);
    }
    $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."',hinhanh = '".$hinhanh."', sdt = '".$phone."', diachicuthe = '".$address."' , tinh = '".$city."'  WHERE id_user = '".$id_user."'";
    $row_update = mysqli_query($mysqli,$sql_update);
    
    move_uploaded_file($hinhanh_tmp,'admincp/modules/quanliuser/upload/'.$hinhanh);
    
    if($row_update){
      echo '<script>window.location="../../index.php?quanly=user"</script>';
    }
}
elseif($city==0 && $mall==0){
  $mysqli = new mysqli("localhost","root","206394832","shop");
  $sql = "SELECT * FROM tbl_user WHERE id_user = '".$id_user."'";
        $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
      unlink('admincp/modules/quanliuser/upload/'.$row['hinhanh']);
    }
    $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."',hinhanh = '".$hinhanh."', sdt = '".$phone."',diachicuthe  = '".$address."'   WHERE id_user = '".$id_user."'";
    $row_update = mysqli_query($mysqli,$sql_update);
    move_uploaded_file($hinhanh_tmp,'admincp/modules/quanliuser/upload/'.$hinhanh);
    
    if($row_update){
      echo '<script>window.location="../../index.php?quanly=user"</script>';
    }
}elseif($city!=0 && $mall!=0){
    $mysqli = new mysqli("localhost","root","206394832","shop");
    $sql = "SELECT * FROM tbl_user WHERE id_user = '".$id_user."'";
        $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
      unlink('admincp/modules/quanliuser/upload/'.$row['hinhanh']);
    }$sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."',hinhanh = '".$hinhanh."', sdt = '".$phone."',diachicuthe = '".$address."',tinh = '".$city."',tp = '".$mall."' WHERE id_user = '".$id_user."'";
    $row_update = mysqli_query($mysqli,$sql_update);
    move_uploaded_file($hinhanh_tmp,'admincp/modules/quanliuser/upload/'.$hinhanh);
  if($row_update){
    echo '<script>window.location="../../index.php?quanly=user"</script>';
}

}
  


 }else{
    if($city==0 && $mall!=0){
        $mysqli = new mysqli("localhost","root","206394832","shop");
        $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."', sdt = '".$phone."', diachicuthe  = '".$address."' , tp = '".$mall."'  WHERE id_user = '".$id_user."'";
        $row_update = mysqli_query($mysqli,$sql_update);
        if($row_update){
          echo '<script>window.location="../../index.php?quanly=user"</script>';
        }
    }elseif($mall==0 && $city!=0){
        $mysqli = new mysqli("localhost","root","206394832","shop");
        $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."', sdt = '".$phone."',diachicuthe  = '".$address."' , tinh = '".$city."'  WHERE id_user = '".$id_user."'";
        $row_update = mysqli_query($mysqli,$sql_update);
        if($row_update){
          echo '<script>window.location="../../index.php?quanly=user"</script>';
        }
    }
    elseif($city==0 && $mall==0){
        $mysqli = new mysqli("localhost","root","206394832","shop");
        $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."', sdt = '".$phone."',diachicuthe = '".$address."'   WHERE id_user = '".$id_user."'";
        $row_update = mysqli_query($mysqli,$sql_update);
        if($row_update){
          echo '<script>window.location="../../index.php?quanly=user"</script>';
        }
    }elseif($city!=0 && $mall!=0){
      $mysqli = new mysqli("localhost","root","206394832","shop");
      $sql_update = "UPDATE tbl_user SET fullname = '".$fullname."', email = '".$email."', sdt = '".$phone."', diachicuthe = '".$address."' ,tinh = '".$city."',tp = '".$mall."'  WHERE id_user = '".$id_user."'";
      $row_update = mysqli_query($mysqli,$sql_update);
      if($row_update){
        echo '<script>window.location="../../index.php?quanly=user"</script>';
    }

    }
        
    
    
    
}}

?>