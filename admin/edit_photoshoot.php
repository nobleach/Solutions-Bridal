<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$ps_id = $_GET['ps_id'];
	$conn = dbConnect('admin');
	$ps_query = "SELECT * FROM photoshoots WHERE ps_id = $ps_id";
	$ps_rs = mysql_query($ps_query, $conn) or die(mysql_error());
	$ps_record = mysql_fetch_object($ps_rs);
	if(array_key_exists('submit', $_POST)) {
		foreach($_POST as $key => $value) {
			${$key} = $value;
		}
		
		$insert_query = "UPDATE photoshoots 
						SET ps_name = '$ps_name', 
						ps_photographer = '$ps_photographer' 
						WHERE ps_id = $ps_id";
		//echo $insert_query;
		$handle = mysql_query($insert_query, $conn) or die(mysql_error());
		if($handle) {
			header("Location: upload_photoshoot_images.php?ps_id=$ps_id");
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
					<li><a href="index.html" title="" >Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">Edit Sale Gowns</a></li>
					<li><a href="" title="">Press</a></li>
					<li><a href="" title="">Email Brides</a></li>
				</ul>
			</div>	
			<form action="" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Photoshoot Name:</p></td>
						<td>
							<input type="text" name="ps_name" value="<?php echo $ps_record->ps_name; ?>" id="ps_name">
						</td>
					</tr>
					<tr>
						<td><p>Photographer Name:</p></td>
						<td>
							<input type="text" name="ps_photographer" value="<?php echo $ps_record->ps_photographer; ?>" id="ps_phtographer"> 
						</td>
					</tr>
					
				</table>
				<br />
				<input type="hidden" name="col_id" value="<?php echo $collection_record->col_id; ?>" id="col_id">
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>