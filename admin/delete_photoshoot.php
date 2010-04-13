<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$ps_id = $_GET['ps_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM photoshoots WHERE ps_id = $ps_id";
	
	$del_assoc_img = "SELECT photo_url FROM photoshoot_photos WHERE ps_id = $ps_id";
	$del_assoc_img_rs = mysql_query($del_assoc_img, $conn);
	$del_assoc_image_array = mysql_fetch_assoc($del_assoc_img_rs);
	
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		foreach($del_assoc_image_array as $key => $value ) {
			unlink('../photoshoots/'.$value);
			unlink('../photoshoots/thumbs/'.$value);
		}
		redirect_to("edit_photoshoots.php");
	}
?>