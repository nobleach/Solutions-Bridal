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
	<title>Solutions Bridal - FAQs</title>
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
			<div id="infodiv">
				<h1><img src="images/faqsh1.png" /></h1>
				<p>
					<span class="question">Does a bride need to schedule an appointment?</span><br />
					We recommend scheduling an appointment to insure personal attention and a dressing room. You will
					have your own personal bridal stylist by your side every step of the way providing suggestions to fit
					your style.
				</p>				
				<p>
					<span class="question">Should you bring an entourage?</span><br />
					While searching for your dream wedding gown, fewer opinions may make the experience more
					enjoyable and intimate.
				</p>
				<p>
					<span class="question">When should you order your gown?</span><br />
					Its never too early to select your gown and bridesmaid dresses. Some designers can take up to eight
					months to create your gown, but this just speaks to their quality and attention to detail. Don't be afraid
					to fall in love with one of the first gowns you try on, the process is different for everyone and you can
					never recreate the moment you find your dress. If your wedding is less than 8 months away, please ask
					your stylist for the designer's rush options.
				</p>
				<p>
					<span class="question">What should you bring to your appointment?</span><br />
					Aside from yourself, we will take care of the rest! We invite you to bring inspiration pictures and ideas
					to explain your vision, but an open mind works just as well too. Please bring any heirloom pieces you
					will be wearing on your wedding day. Also, its recommended you come with hair and make-up similar
					to your wedding day look.	
				</p>
			</div>
			<div id="overlay">
				
			</div>
			<img class="fpimage" src="images/fpfaqimage.jpg" />
		</div>
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
