<?php 

	$mysqli = new mysqli("localhost","root","","shop",3307);

	
	if ($mysqli->connect_errno) {
	  echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
	  exit();
	}

?>