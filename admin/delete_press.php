<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$press_id = $_GET['press_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM press WHERE press_id = $press_id";
	
	$del_assoc_img = "SELECT press_img FROM press WHERE press_id = $press_id";
	$del_assoc_img_rs = mysql_query($del_assoc_img, $conn);
	$del_assoc_image_array = mysql_fetch_assoc($del_assoc_img_rs);
	
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		foreach($del_assoc_image_array as $key => $value ) {
			unlink('../press/'.$value);
			unlink('../press/thumbs/'.$value);
		}
		redirect_to("edit_press.php");
	}
?>