<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$col_type = $_GET['col_type'];
	$designer_query = "SELECT col_id, col_name FROM collections WHERE col_type = '$col_type'  ORDER BY col_name ASC";
	$designer_rs = mysql_query($designer_query, $conn) or die(mysql_error());
	$designer_record = mysql_fetch_assoc($designer_rs);
	
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
	<script src="scripts/paginator3.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/fontstyle.css" type="text/css" charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<title>Solutions Bridal - <?php echo $col_type; ?> Collections</title>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#bride_quote').cycle({
				speed: 2000,
				timeout: 5000,
				cleartype: 1
			});
			$(function () {  $("#thumbholder").pagination();  });
			$('#submenuitems li').hover(function(e){
				var id = $(this).attr("id");
				var url ='designer_info_pump.php?col_id=';
				
				$('#infonails').load(url+id);
				$(".galthumb").live('mouseover', function(){
					var fsurl = $(this).attr("src");
					var urlArray = fsurl.split("/");
					var filename = urlArray[urlArray.length-1];
					var fullpath = "collections/"+filename;
					//alert(filename);
					//$("#fsImage").attr({src: "collections/"+filename, alt: "Full Size Pic"});
					$("#fsImage").fadeOut("slow", function() {
						$(this).attr("src", fullpath).fadeIn('slow');
					})
				 });
			})
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
			<div id="infostatic">
				<img src="images/collect_<?php echo $col_type; ?>_static.jpg" />
				<div id="submenu">
					<div id="submenuheader">
						<h2><?php echo strtoupper($col_type); ?></h2>
					</div>
					<ul id="submenuitems">
						<?php do {?>
							<li id="<?php echo $designer_record['col_id']; ?>"><a href="#"><?php echo $designer_record['col_name']; ?></a></li>
						<?php } while($designer_record = mysql_fetch_assoc($designer_rs)); ?>
					</ul>
				</div>
			</div>
			<div id="infonails">
				
			</div>
			<div id="infoimg">
				<img id="fsImage" />
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
