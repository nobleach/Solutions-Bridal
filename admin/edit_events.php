<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$events_query = 'SELECT * FROM events';
	$events_rs = mysql_query($events_query, $conn) or die(mysql_error());
	
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
					<li><a class="current" href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">View Measurements</a></li>
					<li><a href="" title="">Press</a></li>
					<li><a href="" title="">Newsletter</a></li>
				</ul>
			</div>
			<table  class="results">
				<tr>
					<th>ID</th>
					<th>TYPE</th>
					<th>Headline</th>
					<th>Subhead</th>
					<th>Date</th>
					<th>Time</th>
					<th>Place</th>
					<th></th>
					<th></th>
				</tr>
				<?php while($events_record = mysql_fetch_assoc($events_rs)) { ?>
				<tr>
					<td><?php echo $events_record['event_id']; ?></td>
					<td><?php echo $events_record['event_type']; ?></td>
					<td><?php echo $events_record['event_h1']; ?></td>
					<td><?php echo $events_record['event_h2']; ?></td>
					<td><?php echo $events_record['event_date']; ?></td>
					<td><?php echo $events_record['event_time']; ?></td>
					<td><?php echo $events_record['event_place']; ?></td>
					<td><a href="edit_event.php?col_id=<?php echo $events_record['event_id']; ?>" >Edit</a></td>
					<td><a href="delete_event.php?col_id=<?php echo $events_record['event_id']; ?>" >Delete</a></td>
				</tr>
				<?php } ?>
			</table>
			<p><a class="addbutton" href="add_event.php">Add Collection</a></p>
		</div>
	</body>
</html>