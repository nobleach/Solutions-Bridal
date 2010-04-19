<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$q_query = 'SELECT * FROM quotes';
	$q_rs = mysql_query($q_query, $conn) or die(mysql_error());
	
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
					<th>ID</th>
					<th>QUOTE</th>
					<th>SIGNATURE LINE</th>
					<th></th>
					<th></th>
				</tr>
				<?php while($q_record = mysql_fetch_assoc($q_rs)) { ?>
				<tr>
					<td><?php echo $q_record['q_id']; ?></td>
					<td><?php echo $q_record['q_body']; ?></td>
					<td><?php echo $q_record['q_sig']; ?></td>
					<td><a href="edit_quote.php?q_id=<?php echo $q_record['q_id']; ?>" >Edit</a></td>
					<td><a href="delete_quote.php?q_id=<?php echo $q_record['q_id']; ?>" >Delete</a></td>
				</tr>
				<?php } ?>
			</table>
			<p><a class="addbutton" href="add_quote.php">Add Quote</a></p>
		</div>
	</body>
</html>