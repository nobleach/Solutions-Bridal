<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('query');
	
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
	<link rel="stylesheet" href="css/fontstyle.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<title>Solutions Bridal - Experience</title>
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
			<div class="menu">
				<?php
					include('includes/menu.php');
				?>
			</div>
			<div id="infodiv" style="top:220px;">
				<h1><img src="images/experienceh1.png" /></h1>
				<p>
					The Solutions Bridal experience begins from the moment our brides walk through the door. You can
					expect to be greeted by your own bridal stylist who will not only help you find your dream gown, but
					get to know you and become a crucial factor in your big day. We build quality relationships with our
					brides, not just for the moment you find your gown, but for the many years after.
				</p>
				<p>
					Our knowledgeable stylists will get to know your individual style and vision, and will put together your
					dream bridal ensemble that includes shoes, accessories, and undergarments.
				</p>
				<p>
					The Orlando and Gainesville location have a seamstress available in-store for your convenience.
				</p>
			</div>
			<div id="overlay">
				
			</div>
			<img class="fpimage" src="images/fpbridalimage.jpg" />
		</div>	
	</div>
	<div id="adwrapper">
		<div class="ad">
			
		</div>
		<div class="ad">
			
		</div>
		<div class="ad">
			<a class="hide" href="http://www.solutionsbridal.com/blog/"><img src="images/visitourblogad.jpg" /></a>
		</div>
	</div>
	<div id="footer">
		<p>Winter Park P: 407.647.8666 330 W. Fairbanks Ave. Winter Park, FL 32789 | Gainesville P: 352.367.0070 6450 SW Archer Rd. Suite 230 Gainesville, FL 32608</p>
	</div>
</body>
</html>
