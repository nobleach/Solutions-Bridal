<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<style type="text/css" media="screen">
			#events_box, #fp_pic_box, #ad1_box, #ad2_box, #quotes_box {
				border:1px solid red;
				background:url(images/identback.png);
			}
			#events_box {
				display:none;
				position:absolute;
				left:115px;
				top:200px;
				width:265px;
				height:270px;
				z-index:3;
			}
			#fp_pic_box {
				display:none;
				position:absolute;
				left:400px;
				top:190px;
				width:300px;
				height:290px;
				z-index:3;
			}
			#ad1_box {
				display:none;
				position:absolute;
				left:105px;
				top:470px;
				width:230px;
				height:50px;
				z-index:3;
			}
			#ad2_box {
				display:none;
				position:absolute;
				left:335px;
				top:470px;
				width:200px;
				height:50px;
				z-index:3;
			}
			#quotes_box {
				display:none;
				position:absolute;
				left:400px;
				top:90px;
				width:300px;
				height:80px;
				z-index:3;
			}
		</style>
		<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#events_link').hover(function() {
					$('#events_box').toggle();
				})
				$('#fp_pic_link').hover(function() {
					$('#fp_pic_box').toggle();
				})
				$('#ad1_link').hover(function() {
					$('#ad1_box').toggle();
				})
				$('#ad2_link').hover(function() {
					$('#ad2_box').toggle();
				})
				$('#quotes_link').hover(function() {
					$('#quotes_box').toggle();
				})
			})
		</script>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: </h1>
			<div id="styletwo">
				<?php include('menu.php'); ?>
			</div>
			<div id="fp_mock">
				<div id="events_box"></div>
				<div id="fp_pic_box"></div>
				<div id="ad1_box"></div>
				<div id="ad2_box"></div>
				<div id="quotes_box"></div>
				<img src="images/front_page.jpg" />
				<a id="events_link" href="edit_events.php">Edit Events</a> |
				<a id="ad1_link" href="edit_ad.php?ad_id=1">Edit Ad 1</a> |
				<a id="ad2_link" href="edit_ad.php?ad_id=2">Edit Ad 2</a> | 
				<a id="quotes_link" href="edit_quotes.php">Edit Quotes</a>
			</div>
		</div>
	</body>
</html>