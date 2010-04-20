<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');	
	$event_id = $_GET['event_id'];
	$event_query = "SELECT * FROM events WHERE event_id = $event_id";
	$event_rs = mysql_query($event_query, $conn) or die(mysql_error());
	$event_record = mysql_fetch_object($event_rs);
	
	if (array_key_exists('submit', $_POST)) {
		
		foreach($_POST as $key => $value) {
			${$key} = $value;
		}
		//need to mysql escape string for 's
		$insert_query = "UPDATE events 
							SET event_type = '$event_type', 
							event_h1 = '$event_h1', 
							event_h2 = '$event_h2',
							event_date = '$event_date',
							event_time = '$event_time',
							event_place = '$event_place'
							WHERE event_id = '$event_id'";
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
					<li><a href="edit_sale_gowns.php" title="">Edit Sale Gowns</a></li>
					<li><a href="edit_press.php" title="">Press</a></li>
					<li><a href="email_brides.php" title="">Email Brides</a></li>
				</ul>
			</div>	
			<form action="" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Event Type:</p></td>
						<td>
							<select name="event_type">
								<option <?php if($event_record->event_type == 'event') {echo 'selected ';} ?>value="event">event</option>
								<option <?php if($event_record->event_type == 'expo') {echo 'selected ';} ?>value="expo">expo</option>
								<option <?php if($event_record->event_type == 'trunkshow') {echo 'selected ';} ?>value="trunkshow">trunkshow</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><p>Event Main Headline:</p></td>
						<td><input type="text" name="event_h1" value="<?php echo $event_record->event_h1; ?>" id="event_h1"> </td>
						
					</tr>
					<tr>
						<td>Event Sub-Headline:</td>
						<td><input type="text" name="event_h2" value="<?php echo $event_record->event_h2; ?>" id="event_h2"> </td>
					</tr>
					<tr>
						<td>Event Date:</td>
						<td><input type="text" name="event_date" class="date-pick" value="<?php echo $event_record->event_date; ?>" /></td>
					</tr>
					<tr>
						<td><p>Event Time:</p></td>
						<td><input type="text" name="event_time" value="<?php echo $event_record->event_time; ?>" id="event_time"> </td>
					</tr>
					<tr>
						<td><p>Event Location:</p></td>
						<td><input type="text" name="event_place" value="<?php echo $event_record->event_place; ?>" id="event_place"> </td>
					</tr>
				</table>
				<br />
				
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>