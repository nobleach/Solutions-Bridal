<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$p_query = 'SELECT * FROM press';
	$p_rs = mysql_query($p_query, $conn) or die(mysql_error());
?>
<!DOCTYPE HTML>
<html>
	<head>
		<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$("tr:nth-child(odd)").addClass("odd");
				$("tr").hover(function() {
					$(this).addClass("highlight");
				},
				function() {
					$(this).removeClass("highlight");
				})
			})
		</script>
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<style type="text/css" media="screen">
			table.results {
				margin: 0 auto;
				margin-top:20px;
				width:700px;
			}
			table tr {
				font-family:Helvetica, Arial, sans-serif;
				font-size:12px;
				
			}
			a {
				text-decoration:none;
				font-family:Helvetica, Arial, sans-serif;
			}
			a:hover {
				text-decoration:underline;
			}
			.odd {
				background-color:#ccc;
			}
			.addbutton {
				margin-left:30px;
			}
			.highlight {
				background-color:#dedede;
			}
		</style>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: </h1>
			<div id="styletwo">
				<?php include('menu.php'); ?>
			</div>
			<table  class="results">
				<tr>
					<th>Thumbnail</th>
					<th>ID</th>
					<th>Piece Name</th>
					<th>Piece Description</th>
					<th></th>
					<th></th>
				</tr>
				<?php while($p_record = mysql_fetch_assoc($p_rs)) { ?>
				<tr>
					<td><img src="../press/thumbs/<?php echo $p_record['press_img']; ?>" /></td>
					<td><?php echo $p_record['press_id']; ?></td>
					<td><?php echo $p_record['press_name']; ?></td>
					<td><?php echo substr($p_record['press_desc'], 0, 40); ?></td>
					
					<td><a href="edit_presspiece.php?press_id=<?php echo $p_record['press_id']; ?>" >Edit</a></td>
					<td><a href="delete_presspiece.php?press_id=<?php echo $p_record['press_id']; ?>" >Delete</a></td>
				</tr>
				<?php } ?>
			</table>
			<p><a class="addbutton" href="add_presspiece.php">Add Press Piece</a></p>
		</div>
	</body>
</html>