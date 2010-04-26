<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$q_id = $_GET['q_id'];
	$q_query = "SELECT * FROM quotes WHERE q_id = '$q_id'";
	$q_rs = mysql_query($q_query, $conn) or die(mysql_error());
	$q_record = mysql_fetch_object($q_rs);
	
	if (array_key_exists('submit', $_POST)) {
		foreach($_POST as $key => $value) {
			${$key} = $value;
		}
		//$q_body = mysql_real_escape_string($q_body);
		$insert_query = "UPDATE quotes 
							SET q_body = '$q_body', 
							q_sig = '$q_sig'
							WHERE q_id = '$q_id'";
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
				<?php include('menu.php'); ?>
			</div>	
			<form action="" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td>Quote:</td>
						<td>
							<textarea name="q_body" rows="8" cols="40">
								<?php echo $q_record->q_body; ?>
							</textarea>
						</td>
						<tr>
						<td><p>Quote Signature:</p></td>
						<td>
							<input type="text" name="q_sig" value="<?php echo $q_record->q_sig; ?>" id="q_sig" /> 
							<input type="hidden" name="q_id" value="<?php echo $q_record->q_id; ?>" />
						</td>
					</tr>
					</tr>
				</table>
				<br />
				
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>