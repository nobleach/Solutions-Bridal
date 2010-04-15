<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');	
	if (array_key_exists('submit', $_POST)) {
		$conn = dbConnect('admin');
		foreach($_POST as $key => $value) {
			${$key} = $value;
		}
		$q_body = mysql_real_escape_string($q_body);
		$insert_query = "INSERT INTO quotes 
							SET q_body = '$q_body', 
							q_sig = '$q_sig'";
		//echo $insert_query;
		$handle = mysql_query($insert_query, $conn) or die(mysql_error());
		if($handle) {
			header("Location: edit_quotes.php");
			exit;
		} else {
			echo 'Error in database insert.';
		}
	}
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<style type="text/css" media="screen">
			table {
				float:left;
				margin-top:20px;
				width: 700px;
			}
			.btnSubmit {
				clear:both;
				float:left;
				margin-top:12px;
			}
		</style>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: </h1>
			<div id="styletwo">
				<ul>
					<li><a href="index.html" title="">Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="" class="current">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">View Measurements</a></li>
					<li><a href="" title="">Press</a></li>
					<li><a href="" title="">Newsletter</a></li>
				</ul>
			</div>	
			<form action="" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td>Quote:</td>
						<td>
							<textarea name="q_body" rows="8" cols="40">
								
							</textarea>
						</td>
						<tr>
						<td><p>Quote Signature:</p></td>
						<td><input type="text" name="q_sig" value="" id="q_sig"> </td>
					</tr>
					</tr>
				</table>
				<br />
				
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>