<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$photo_id = $_GET['photo_id'];
	$ps_id = $_GET['ps_id'];
	$photo_url = $_GET['photo_url'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM photoshoot_photos WHERE photo_id = $photo_id";
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		unlink("../photoshoots/$photo_url");
		unlink("../photoshoots/thumbs/$photo_url");
		redirect_to("upload_photoshoot_images.php?ps_id=$ps_id");
	}
?>