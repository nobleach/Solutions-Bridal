<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$events_query = "SELECT * FROM events WHERE event_type = 'events'";
	$events_rs = mysql_query($events_query, $conn) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<link rel="stylesheet" href="css/fontstyle.css" type="text/css" charset="utf-8">
	<style type="text/css" media="screen">
		h1.fontface {font: 50px/68px 'TeXGyrePagellaRegular', Arial, sans-serif;letter-spacing: 4px; color:#e6d7b4; margin-bottom:-23px;}
		h2.fontface {font: 30px/46px 'TeXGyrePagellaRegular', Arial, sans-serif;letter-spacing: 7px; color:#fff; border-bottom:1px solid #fff;}
		p.style1 {font: 16px 'TeXGyrePagellaRegular', Arial, sans-serif; color:#fff; }
	</style>
	<title>Solutions Bridal</title>
	
</head>

<body>
	<div id="wrapper">
		<div id="main">
			<img src="images/sbheaderlogo.jpg" />
			
			<div class="menu">
				<?php
					include('includes/menu.php');
				?>
			</div>
			<div id="overlay">
				
			</div>
			<img class="fpimage" src="images/fptrunkshow.jpg" />
			<div id="fpbigad">
				<?php while($events_record = mysql_fetch_assoc($events_rs)) { ?>
				<h1 class="fontface"><?php echo $events_record['event_h1']; ?></h1>
				<h2 class="fontface"><?php echo $events_record['event_h2']; ?></h2>
				<p class="style1">
					<?php echo $events_record['event_date']; ?><br />
					<?php
					if ($events_record['event_time']) { 
								echo  $events_record['event_time']; 
								}
					if ($events_record['event_place']) { 
								echo  '<br />' . $events_record['event_place']; 
								}
					?>
				<?php } ?>	
				</p>
			</div>
		</div>
	</div>
	<div id="adwrapper">
		<div class="ad">
			
		</div>
		<div class="ad">
			
		</div>
		<div class="ad">
			
		</div>
	</div>
	<div id="footer">
		<p>Winter Park P: 407.647.8666 330 W. Fairbanks Ave. Winter Park, FL 32789 | Gainesville P: 352.367.0070 6450 SW Archer Rd. Suite 230 Gainesville, FL 32608</p>
	</div>
</body>
</html>
