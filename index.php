<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$events_query = "SELECT * FROM events LIMIT 2";
	$events_rs = mysql_query($events_query, $conn) or die(mysql_error());
	
	$q = "SELECT * FROM quotes";
	$s = mysql_query($q, $conn);
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
		h1.fontface {font: 40px/59px 'TeXGyrePagellaRegular', Arial, sans-serif;letter-spacing: 4px; color:#e6d7b4; margin-bottom:-23px;}
		h2.fontface {font: 25px/46px 'TeXGyrePagellaRegular', Arial, sans-serif;letter-spacing: 7px; color:#fff; border-bottom:1px solid #fff;}
		p.style1 {font: 16px 'TeXGyrePagellaRegular', Arial, sans-serif; color:#fff; }
	</style>
	<title>Solutions Bridal</title>
	
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.cycle.lite.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#bride_quote').cycle({
			speed: 2000,
			timeout: 5000,
			cleartype: 1
		});
	})	
	</script>
</head>

<body>
	<div id="wrapper">
		<div id="main">
			<img src="images/sbheaderlogo.jpg" />
			<div id="bride_quote">
				<?php while($a = mysql_fetch_assoc($s)) { ?>
					<div>
						<p class="pretty"><?php echo $a['q_body']; ?></p>
						<p class="quote_person"><?php echo $a['q_sig']; ?></p>
					</div>
				<?php } ?>
			</div>
			<a href="salegowns.php"><img id="salegown" src="images/salegowns.png" /></a>
			<div class="menu">
				<ul>
					<li><a class="hide" href="index.php">HOME</a>

					</li>
					<li><a class="hide" href="#">COMPANY</a>
						<!--[if lte IE 6]>
						<a href="about.html">ABOUT
						<table><tr><td>
						<![endif]-->
						<ul>
							<li><a href="company.php">ABOUT</a></li>
							<li><a href="experience.php">EXPERIENCE</a></li>
							<li><a href="ourstaff.php">CONSULTANTS</a></li>
							<li><a href="faqs.php">FAQ</a></li>
							<li><a href="photoshoots.php">PHOTOSHOOTS</a></li>
							<li><a href="#">PRESS</a></li>
						</ul>
						<!--[if lte IE 6]>
						</td></tr></table>
						</a>
						<![endif]-->
					</li>
					<li><a class="hide" href="#">COLLECTIONS</a>
						<!--[if lte IE 6]>
						<a href="about.html">ABOUT
						<table><tr><td>
						<![endif]-->
						<ul>
							<li><a href="collections.php?col_type=BRIDAL">BRIDAL</a></li>
							<li><a href="collections.php?col_type=ATTENDANTS">ATTENDANTS</a></li>
							<li><a href="collections.php?col_type=ACCESSORIES">ACCESSORIES</a></li>
							<li><a href="collections.php?col_type=MOMS">MOMS</a></li>
							<li><a href="collections.php?col_type=FLOWERGIRLS">FLOWERGIRLS</a></li>
							<li><a href="measurements.pdf">MEASUREMENTS</a></li>
						</ul>
						<!--[if lte IE 6]>
						</td></tr></table>
						</a>
						<![endif]-->
					</li>
					<li><a class="hide" href="#">EVENTS</a>
						<!--[if lte IE 6]>
						<a href="about.html">ABOUT
						<table><tr><td>
						<![endif]-->
						<ul>
							<li><a href="trunkshow.php">TRUNK SHOW</a></li>
							<li><a href="events.php">EVENTS</a></li>
							<li><a href="expo.php">EXPO</a></li>
						</ul>
						<!--[if lte IE 6]>
						</td></tr></table>
						</a>
						<![endif]-->
					</li>
					<li><a class="hide" href="#">SALONS</a>
						<!--[if lte IE 6]>
						<a href="about.html">ABOUT
						<table><tr><td>
						<![endif]-->
						<ul>
							<li><a href="salon_gainesville.php">GAINESVILLE</a></li>
							<li><a href="salon_winterpark.php">WINTER PARK</a></li>
						</ul>
						<!--[if lte IE 6]>
						</td></tr></table>
						</a>
						<![endif]-->
					</li>
					<li><a class="hide" href="http://www.solutionsbridal.com/blog/">BLOG</a></li>
					<li><a class="hide" href="salegowns.php">SALE GOWNS</a></li>
				</ul>
			</div>
			<div id="overlay">
				
			</div>
			<img class="fpimage" src="images/fpbridalimage.jpg" />
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
		<?php include('includes/ads.php'); ?>
	</div>
	<div id="footer">
		<p>Winter Park P: 407.647.8666 330 W. Fairbanks Ave. Winter Park, FL 32789 | Gainesville P: 352.367.0070 6450 SW Archer Rd. Suite 230 Gainesville, FL 32608</p>
	</div>
</body>
</html>
