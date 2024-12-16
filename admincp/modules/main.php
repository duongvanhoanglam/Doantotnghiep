<section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Drop Down Sidebar</span>
    </div>
    <div class="home-content2">
        <?php 
       include ('config/config.php');
      if(isset($_GET['action']  )  && isset($_GET['query'])){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }else{
        $tam = '';
        $query = '';
    }
    if($tam=='quanlyloaisp' && $query=='them'){
       include 'modules/quanliloaisp/them.php';
       include 'modules/quanliloaisp/lietke.php';

    }elseif ($tam=='quanlyloaisp' && $query=='sua') {
        include("modules/quanliloaisp/sua.php");

    }elseif ($tam=='quanlydanhmucsanpham' && $query=='them') {
      include("modules/quanlidanhmucsp/them.php");
      include("modules/quanlidanhmucsp/lietke.php");

  }elseif ($tam=='quanlydanhmucsanpham' && $query=='sua') {
      include("modules/quanlidanhmucsp/sua.php");

}elseif ($tam=='quanlybrand' && $query=='them') {
    include("modules/quanlibrand/them.php");  
    include("modules/quanlibrand/lietke.php");
}elseif ($tam=='quanlybrand' && $query=='sua') {
  include("modules/quanlibrand/sua.php");

}elseif ($tam=='quanlysanpham' && $query=='them') {
  include("modules/quanlisanpham/them.php");
  include("modules/quanlisanpham/lietke.php");
  

}elseif ($tam=='quanlysp' && $query=='sua') {
  include("modules/quanlisanpham/sua.php");

}elseif ($tam=='quanlysp' && $query=='xoa_anh') {
  include("modules/quanlisanpham/sua_anh_phu.php");

}elseif ($tam=='quanlysale' && $query=='them') {
  
  include("modules/quanlisale/them.php");include("modules/quanlisale/lietke.php");

}
elseif ($tam=='quanlyhot' && $query=='them') {
  
  include("modules/quanlihot/lietke.php");

}
elseif ($tam=='quanlybanner' && $query=='them') {
  
  include("modules/quanlibanner/them.php");
  include("modules/quanlibanner/lietke.php");

}
elseif ($tam=='quanlycomment' && $query=='them') {
  
  include("modules/quanlicomment/them.php");
 

}
elseif ($tam=='quanlybanner' && $query=='sua') {
  
  include("modules/quanlibanner/sua.php");


}elseif ($tam=='quanlydonhang' && $query=='them') {
  
  include("modules/quanlidonhang/lietke.php");


}elseif ($tam=='quanlydanhmucbv' && $query=='them') {
  
  include("modules/quanlidanhmucbv/them.php");
  include("modules/quanlidanhmucbv/lietke.php");


}elseif ($tam=='quanlydanhmucbv' && $query=='sua') {
  
  include ("modules/quanlidanhmucbv/sua.php");


}elseif ($tam=='quanlybv' && $query=='them') {
  
  include("modules/quanlibaiviet/them.php");
  include("modules/quanlibaiviet/lietke.php");
  


}elseif ($tam=='quanlybv' && $query=='sua') {
  
 include ("modules/quanlibaiviet/sua.php");
  


}elseif ($tam=='donhang' && $query=='xemdonhang') {
  
  include("modules/quanlidonhang/xemdonhang.php");


}elseif ($tam=='home') {
  
  include("modules/dashboard.php");


}

else {
  include("modules/dashboard.php");
}

    
    
      ?>
    </div>
    
  </section>