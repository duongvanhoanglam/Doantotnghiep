<?php
function check_login()
{
if(strlen($_SESSION['id_admin'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";
		$_SESSION["id_admin"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
