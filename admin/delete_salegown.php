<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$gown_id = $_GET['gown_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM salegowns WHERE gown_id = $gown_id";
	
	$del_assoc_img = "SELECT gown_img FROM salegowns WHERE gown_id = $gown_id";
	$del_assoc_img_rs = mysql_query($del_assoc_img, $conn);
	$del_assoc_image_array = mysql_fetch_assoc($del_assoc_img_rs);
	
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		foreach($del_assoc_image_array as $key => $value ) {
			unlink('../salegowns/'.$value);
			unlink('../salegowns/thumbs/'.$value);
		}
		redirect_to("edit_sale_gowns.php");
	}
?>