<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('query');
	$sg_query = "SELECT * FROM salegowns";
	$sg_rs = mysql_query($sg_query, $conn) or die(mysql_error());
	$sg_record = mysql_fetch_assoc($sg_rs);
	
	$q = "SELECT * FROM quotes";
	$s = mysql_query($q, $conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.cycle.lite.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/fontstyle.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<style type="text/css" media="screen">
		div#fpStatic {
			background:#7f7f7f url(images/fpSaleStatic.jpg) no-repeat;
			width:100%;
			height:391px;
		}
	</style>
	<title>Solutions Bridal - Sale Gowns</title>
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
			<div id="fpStatic">
				
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
