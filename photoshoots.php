<?php
	require_once('includes/conn_mysql.inc.php');
	//connect to DB:
	$conn = dbConnect('admin');
	$ps_query = "SELECT * FROM photoshoots ORDER BY ps_id ASC";
	$ps_rs = mysql_query($ps_query, $conn) or die(mysql_error());
	
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
	<title>Solutions Bridal - Photoshoots</title>
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/paginator.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jquery.cycle.lite.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#bride_quote').cycle({
				speed: 2000,
				timeout: 5000,
				cleartype: 1
			});
			$('#thumbholder a').hover(function() {
				var id = $(this).attr("id");
				var url ='photographer_pump.php?ps_id=';
				$('#photographer').load(url+id).fadeIn('fast');
			}, function(){
				$('#photographer').fadeOut('fast');
			})
		})
		$(function () {  $("#thumbholder").pagination();  });
	</script>
	<style type="text/css" media="screen">
		div#thumbholder {
			width:380px;
			height:160px;
		}
		h3#photographer {
			display:none;
			position:absolute;
			width:380px;
			margin-top:7px;
			font-size:16px;
			color:#ddd;
			font-weight:normal;
			font-style:italic;
		}
	</style>
	
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
			<div id="infodiv" style="top:220px">
				<h1><img src="images/photoshootsh1.png" /></h1>
				<div id="thumbholder">
					<?php while($ps_record = mysql_fetch_assoc($ps_rs)) { ?>	
						<a id="<?php echo $ps_record['ps_id']; ?>" href="viewgallery.php?ps_id=<?php echo $ps_record['ps_id']; ?>"> 
							<img class="photothumb" src="photoshoots/<?php echo $ps_record['ps_thumb']; ?>">
						</a>
					<?php } ?>
				</div>
				<h3 id="photographer"></h3>	
			</div>
			<img class="fpimage" src="images/fpphotoshoots.jpg" />
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
