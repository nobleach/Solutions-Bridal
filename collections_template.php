<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="scripts/jScrollPane.js" type="text/javascript" charset="utf-8"></script>	
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/jScrollPane.css" type="text/css" media="screen">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<title>index</title>
	<script type="text/javascript" charset="utf-8">
		$(function()
		{
			$('.scroll-pane').jScrollPane({scrollbarWidth:5, showArrows:true, reinitialiseOnImageLoad: true});
		});
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
						<li><a href="#">JASMINE</a></li>
						<li><a href="#">WATTERS &amp; WATTERS</a></li>
					</ul>
				</div>
			</div>
			<div id="infonails">
				<h1><?php echo ?></h1>
				<p class="galdescription">
					<?php echo ?>	
				</p>
				<div class="scroll-pane">
					<?php

					?>
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
					<img class="galthumb" src="images/gal_bridal_thumb.jpg">
				</div>
			</div>
			<div id="infoimg">
				<img src="images/gal_placeholder.jpg" />
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
