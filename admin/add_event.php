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
		$insert_query = "INSERT INTO events 
							SET event_type = '$event_type', 
							event_h1 = '$event_h1', 
							event_h2 = '$event_h2',
							event_date = '$event_date',
							event_time = '$event_time',
							event_place = '$event_place'";
		//echo $insert_query;
		$handle = mysql_query($insert_query, $conn) or die(mysql_error());
		if($handle) {
			header("Location: edit_events.php");
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
		<link rel="stylesheet" type="text/css" media="screen" href="css/datePicker.css">
		

		<script type="text/javascript" src="scripts/jquery-pack.js"></script>
		<script type="text/javascript" src="scripts/date.js"></script>
		<script type="text/javascript" src="scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" charset="utf-8">
		Date.firstDayOfWeek = 7;
		Date.format = 'mm/dd/yyyy';
            $(function()
            {
				$('.date-pick').datePicker();
            });
	</script>
	
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
			a.dp-choose-date {
				float: left;
				width: 16px;
				height: 16px;
				padding: 0;
				margin: 5px 3px 0;
				display: block;
				text-indent: -2000px;
				overflow: hidden;
				background: url(../admin/images/calendar.png) no-repeat; 
			}
			a.dp-choose-date.dp-disabled {
				background-position: 0 -20px;
				cursor: default;
			}
			/* makes the input field shorter once the date picker code
			* has run (to allow space for the calendar icon
			*/
			input.dp-applied {
				width: 140px;
				float: left;
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
						<td><p>Event Type:</p></td>
						<td>
							<select name="event_type">
								<option>event</option>
								<option>expo</option>
								<option>trunkshow</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><p>Event Main Headline:</p></td>
						<td><input type="text" name="event_h1" value="" id="event_h1"> </td>
						
					</tr>
					<tr>
						<td>Event Sub-Headline:</td>
						<td><input type="text" name="event_h2" value="" id="event_h2"> </td>
					</tr>
					<tr>
						<td>Event Date:</td>
						<td><input type="text" name="event_date" class="date-pick" value="" /></td>
					</tr>
					<tr>
						<td><p>Event Time:</p></td>
						<td><input type="text" name="event_time" value="" id="event_time"> </td>
					</tr>
					<tr>
						<td><p>Event Location:</p></td>
						<td><input type="text" name="event_place" value="" id="event_place"> </td>
					</tr>
				</table>
				<br />
				
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>