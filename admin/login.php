<?php
	/////// Quick and dirty SHA1 login /////////
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	session_start();
	$username = strtolower(trim($_POST['username']));
	$password = trim($_POST['password']);
	$sql = sprintf("SELECT password FROM admins WHERE username = '%s'", $username);
	$rs = mysql_query($sql, $conn) or die(mysql_error());
	$record = mysql_fetch_assoc($rs);		
	if (sha1($password) == $record['password']) {
	$_SESSION['authenticated'] = 'Yes';
	header('Location: index.php');
	} else {
	echo "Invalid Username or password.<br />";
	// echo "you typed" . sha1($password) . "<br />";
	// 	echo "and that doesn't match" . $record['password'];
	//header('Location: login.html');
	echo '<a href="login.html">Return to the login page.</a>';
	}
?>