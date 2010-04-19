<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$ps_query = 'SELECT * FROM photoshoots';
	$ps_rs = mysql_query($ps_query, $conn) or die(mysql_error());
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
				<ul>
					<li><a href="index.html" title="" >Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">Edit Sale Gowns</a></li>
					<li><a href="" title="">Press</a></li>
					<li><a href="" title="">Email Brides</a></li>
				</ul>
			</div>
			<table  class="results">
				<tr>
					<th>Thumbnail</th>
					<th>ID</th>
					<th>Gallery Name</th>
					<th>Photographer</th>
					<th></th>
					<th></th>
				</tr>
				<?php while($ps_record = mysql_fetch_assoc($ps_rs)) { ?>
				<tr>
					<td><img src="photoshoots/thumb/<?php echo $ps_record['ps_thumb']; ?>" /></td>
					<td><?php echo $ps_record['ps_id']; ?></td>
					<td><?php echo $ps_record['ps_name']; ?></td>
					<td><?php echo $ps_record['ps_photographer']; ?></td>
					
					<td><a href="edit_photoshoot.php?ps_id=<?php echo $ps_record['ps_id']; ?>" >Edit</a></td>
					<td><a href="delete_photoshoot.php?ps_id=<?php echo $ps_record['ps_id']; ?>" >Delete</a></td>
				</tr>
				<?php } ?>
			</table>
			<p><a class="addbutton" href="add_photoshoot.php">Add Photoshoot</a></p>
		</div>
	</body>
</html>