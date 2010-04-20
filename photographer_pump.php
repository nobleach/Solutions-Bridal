<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('query');
	$ps_id = $_GET['ps_id'];
	$p = "SELECT ps_photographer FROM photoshoots WHERE ps_id = $ps_id";
	$p_rs = mysql_query($p, $conn);
	$p_record = mysql_fetch_object($p_rs);
	
	echo 'Photographer: ' . $p_record->ps_photographer;
?>