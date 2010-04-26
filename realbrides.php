<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('query');
	$sg_query = "SELECT * FROM realbrides ORDER BY bride_name ASC";
	$sg_rs = mysql_query($sg_query, $conn) or die(mysql_error());
	
	$q = "SELECT * FROM quotes";
	$s = mysql_query($q, $conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/paginator2.js" type="text/javascript" charset="utf-8"></script>
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
			background:#767674 url(images/fpRealBrides.jpg) no-repeat;
			width:100%;
			height:391px;
		}
		img#fsImage {
			position:absolute;
			left:12px;
			top:140px;
			border: 1px #fff solid;
		}
		div#thumbholder {
			position:absolute;
			left:450px;
			top:140px;
			width:330px;
			height:300px;
			/*border: thin red solid;*/
		}
		.thumbnail {
			float:left;
			max-width:108px;
			margin:3px;
			text-decoration:none;
		}
		.thumbnail p {
			clear:both;
			float:left;
			font-size: 11px;
			color:#fff;
			margin-left:3px;
		}
		img.thumbimg {
			border: 1px #fff solid;
			float:left;
		}
		.paginator {
			position:absolute;
			top:460px;
			left:620px;
		}
	</style>
	<title>Solutions Bridal - Real Brides</title>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#bride_quote').cycle({
				speed: 2000,
				timeout: 5000,
				cleartype: 1
			});
			$(".thumbimg").live('mouseover', function(){
					var fsurl = $(this).attr("src");
					var urlArray = fsurl.split("/");
					var filename = urlArray[urlArray.length-1];
					var fullpath = "brides/"+filename;
					//alert(filename);
					//$("#fsImage").attr({src: "collections/"+filename, alt: "Full Size Pic"});
					$("#fsImage").fadeOut("slow", function() {
						$(this).attr("src", fullpath).fadeIn('slow');
					})
				 });
			$(function () {  $("#thumbholder").pagination();  });
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
				<img id="fsImage" src="" />
				<div id="thumbholder">
					<?php while($sg_record = mysql_fetch_assoc($sg_rs)) { ?>
						<a class="thumbnail">
							<img class="thumbimg" src="brides/thumbs/<?php echo $sg_record['bride_img']; ?>" />
							<p><?php echo $sg_record['bride_name']; ?></p>
						</a>
					<?php } ?>
				</div>
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
