<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	foreach($_POST as $key => $value) {
		${$key} = $value;
	}
	//need to escape ' or ":
	$col_desc = mysql_real_escape_string($col_desc, $conn);
	
	$insert_query = "UPDATE collections 
						SET col_type = '$col_type', 
						col_name = '$col_name', 
						col_desc = '$col_desc',
						col_url = '$col_url'
						WHERE col_id = $col_id";
	//echo $insert_query;
	$handle = mysql_query($insert_query, $conn) or die(mysql_error());
	if($handle) {
		header("Location: upload_collection_images.php?col_id=$col_id");
		exit;
	} else {
		echo 'Error in database insert.';
	}
?>