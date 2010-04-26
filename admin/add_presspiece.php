<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
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
			<form enctype="multipart/form-data" action="upload_press_img.php" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Piece Name:</p></td>
						<td>
							<input type="text" name="press_name" value="" id="press_name">
						</td>
					</tr>
					<tr>
						<td><p>Press Desc:</p></td>
						<td>
							<textarea name="press_desc" rows="8" cols="40"></textarea> 
						</td>
					</tr>
					<tr>
						<td><p>Image:</p></td>
						<td>
							<input type="file" name="Filedata" value="" id="Filedata">
						</td>
					</tr>
				</table>
				<br />
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>