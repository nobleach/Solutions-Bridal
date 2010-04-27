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
	<title>Solutions Entertainment</title>
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
			<div id="infodiv" style="top:270px;">
				<h1><img src="images/entertainmenth1.png" /></h1>
				<p>Solutions Entertainment is a professional disc jockey 
company founded in Gainesville, Florida. It is unique among its competitors because they have two disc jockeys at every event, with one of the owners always in attendance. 
They are fully insured, dependable,  and are always dressed to impress. Their music collections stretch from 50's to current, offering an impeccable selection. 
				</p>
				<p>
For more information and pricing, please contact the 
owner at 352.745.6136.
				</p>
			</div>
			<div id="overlay">
				
			</div>
			<img class="fpimage" src="images/fpentertainment.jpg" />
		</div>	
	</div>
	<div id="adwrapper">
		<?php include('includes/ads.php'); ?>
	</div>
	<div id="footer">
		<?php include('includes/footer.inc.php'); ?>
	</div>
</body>
</html>
