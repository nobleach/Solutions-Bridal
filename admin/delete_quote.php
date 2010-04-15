<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$q_id = $_GET['q_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM quotes WHERE q_id = $q_id";
	
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		redirect_to("edit_quotes.php");
	}
?>