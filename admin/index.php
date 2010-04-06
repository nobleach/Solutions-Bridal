<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<style type="text/css" media="screen">
			#events_box, #fp_pic_box, #ad1_box, #ad2_box {
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
			})
		</script>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: </h1>
			<div id="styletwo">
				<ul>
					<li><a href="index.html" title="" >Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a class="current" href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">View Measurements</a></li>
					<li><a href="" title="">Press</a></li>
					<li><a href="" title="">Newsletter</a></li>
				</ul>
			</div>
			<div id="fp_mock">
				<div id="events_box"></div>
				<div id="fp_pic_box"></div>
				<div id="ad1_box"></div>
				<div id="ad2_box"></div>
				<img src="images/front_page.jpg" />
				<a id="events_link" href="edit_events.php">Edit Events</a> |
				<a id="fp_pic_link" href="edit_fp_pic.php">Edit Frontpage Pic</a> |
				<a id="ad1_link" href="edit_ad1.php">Edit Ad 1</a> |
				<a id="ad2_link" href="edit_ad2.php">Edit Ad 2</a>
			</div>
		</div>
	</body>
</html>