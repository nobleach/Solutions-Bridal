<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$col_id = $_GET['col_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM collections WHERE col_id = $col_id";
	
	$del_assoc_img = "SELECT cphoto_url FROM collection_photos WHERE col_id = $col_id";
	$del_assoc_img_rs = mysql_query($del_assoc_img, $conn);
	$del_assoc_image_array = mysql_fetch_assoc($del_assoc_img_rs);
	
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		foreach($del_assoc_image_array as $key => $value ) {
			unlink('../collections/'.$value);
			unlink('../collections/thumbs/'.$value);
		}
		redirect_to("edit_collections.php");
	}
?>