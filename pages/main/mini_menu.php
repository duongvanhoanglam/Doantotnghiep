<div class="menu-right">
                <ul> 
                 
                <?php 
                  $sql_loaisp="SELECT * FROM tbl_loaisp ORDER BY id_loaisp DESC";
                  $query_loaisp=mysqli_query($mysqli,$sql_loaisp);
                  
                ?>

                 
                
                   
                   
                    <div class="has-drop1">
                         <li class="has-drop-li"><a ><p >Danh mục sản phẩm</p> <i class="fas fa-sort-down"></i></a></li>
                         <div class="drop-co-1">
                         <?php 
                                 $sql_loaisp2 ="SELECT * FROM tbl_danhmucsp  ORDER BY id_danhmuc DESC";
                                 $mysqli = new mysqli("localhost","root","206394832","shop");
                                 $query_loaisp2=mysqli_query($mysqli,$sql_loaisp2);
                                  while($row_loaisp2=mysqli_fetch_array($query_loaisp2)){ ?>
                                          
                                          <li><a href="index.php?quanly=see-sp&id_danhmuc=<?php echo $row_loaisp2['id_danhmuc'] ?>&tendanhmuc=<?php echo $row_loaisp2['tendanhmuc'] ?>"><?php echo $row_loaisp2['tendanhmuc'] ?></a></li>
                                       
                                  <?php } ?>
                  
                
                                        

                         </div>
                    </div>

                    <div class="has-drop1">
                         <li class="has-drop-li"><a href="#" > <p >Thương Hiệu</p>  <i class="fas fa-sort-down"></i></a></li>
                         <div class="drop-co-1">
                         <?php 
                                 $sql_loaisp3 ="SELECT * FROM tbl_brand  ORDER BY id_brand DESC";
                                 $query_loaisp3=mysqli_query($mysqli,$sql_loaisp3);
                                  while($row_loaisp3=mysqli_fetch_array($query_loaisp3)){ ?>
                                          
                                          <li><a href="index.php?quanly=see-sp&id_brand=<?php echo $row_loaisp3['id_brand'] ?>&tenbrand=<?php echo $row_loaisp3['tenbrand'] ?>"><?php echo $row_loaisp3['tenbrand'] ?></a></li>
                                       
                                  <?php } ?>

                             
                         </div>
                    </div>
                    
                    
                    <div class="has-drop1">
                         <li class="has-drop-li"><a href="#" > <p >Bài Viết</p> <i class="fas fa-sort-down"></i></a></li>
                         <div class="drop-co-1">
                         <?php 
                                 $sql_loaisp3 ="SELECT * FROM tbl_danhmucbv  ORDER BY id_danhmuc DESC";
                                 $query_loaisp3=mysqli_query($mysqli,$sql_loaisp3);
                                  while($row_loaisp3=mysqli_fetch_array($query_loaisp3)){ ?>
                                          
                                          <li><a href="index.php?quanly=see-tintuc&id_danhmucbv=<?php echo $row_loaisp3['id_danhmuc'] ?>&tenbaiviet=<?php echo $row_loaisp3['tendanhmuc_bv'] ?>"><?php echo $row_loaisp3['tendanhmuc_bv'] ?></a></li>
                                       
                                  <?php } ?>
                         </div>
                    </div>
                    <div class="clear"></div>
                </ul>
            </div>