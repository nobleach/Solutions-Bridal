<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$cphoto_id = $_GET['cphoto_id'];
	$col_id = $_GET['col_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM collection_photos WHERE cphoto_id = $cphoto_id";
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		redirect_to("upload_collection_images.php?col_id=$col_id");
	}
?>