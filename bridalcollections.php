<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$designer_query = 'SELECT col_id, col_name FROM sbwd.collections WHERE col_type = "bridal"';
	$designer_rs = mysql_query($designer_query, $conn) or die(mysql_error());
	$designer_record = mysql_fetch_assoc($designer_rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/paginator.js" type="text/javascript" charset="utf-8"></script>	
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<title>index</title>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('(#submenuitems li').hover(function(e){
				var id = $(this).attr("id");
				var url ='designer_info_pump.php?col_id=';
				
				$('#infonails').load(url+id);
				$(".galthumb").live('mouseover', function(){
					var fsurl = $(this).attr("src");
					var urlArray = fsurl.split("/");
					var filename = urlArray[urlArray.length-1];
					//alert(filename);
					$("#fsImage").attr({src: "collections/"+filename, alt: "Full Size Pic"});
				 });
			})
		})
	</script>
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
			<div id="infostatic">
				<img src="images/collect_bridal_static.jpg" />
				<div id="submenu">
					<div id="submenuheader">
						<h2>BRIDAL</h2>
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
		<div class="ad">
			
		</div>
		<div class="ad">
			
		</div>
		<div class="ad">
			<img src="images/visitourblogad.jpg">
		</div>
	</div>
	<div id="footer">
		<p>Winter Park P: 407.647.8666 330 W. Fairbanks Ave. Winter Park, FL 32789 | Gainesville P: 352.367.0070 6450 SW Archer Rd. Suite 230 Gainesville, FL 32608</p>
	</div>
</body>
</html>
