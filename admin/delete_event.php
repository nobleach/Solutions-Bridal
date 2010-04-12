<?php
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	$event_id = $_GET['event_id'];
	$conn = dbConnect('admin');
	$del_query = "DELETE FROM events WHERE event_id = $event_id";
	$handle = mysql_query($del_query, $conn) or die(mysql_error());
	//make sure to remember to unlink it at some point!!!
	if($handle) {
		redirect_to("edit_events.php");
	}
?>