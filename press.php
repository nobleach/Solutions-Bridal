<?php
	require_once('includes/conn_mysql.inc.php');
	//connect to DB:
	$conn = dbConnect('admin');
	$p_query = "SELECT * FROM press";
	$p_rs = mysql_query($p_query, $conn) or die(mysql_error());
	
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
	<link href="css/galleria.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<title>Solutions Bridal - Press</title>
	<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="scripts/jquery.galleria.pack.js"></script>
	<script src="scripts/jquery.cycle.lite.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#bride_quote').cycle({
				speed: 2000,
				timeout: 5000,
				cleartype: 1
			});
		})
		jQuery(function($) {

			$('.gallery_demo_unstyled').addClass('gallery_demo'); // adds new class name to maintain degradability

			$('ul.gallery_demo').galleria({
				history   : true, // activates the history object for bookmarking, back-button etc.
				clickNext : true, // helper for making the image clickable
				insert    : '#main_image', // the containing selector for our main image
				onImage   : function(image,caption,thumb) { // let's add some image effects for demonstration purposes

					// fade in the image & caption
					if(! ($.browser.mozilla && navigator.appVersion.indexOf("Win")!=-1) ) { // FF/Win fades large images terribly slow
						image.css('display','none').fadeIn(1000);
					}
					caption.css('display','none').fadeIn(1000);

					// fetch the thumbnail container
					var _li = thumb.parents('li');

					// fade out inactive thumbnail
					_li.siblings().children('img.selected').fadeTo(500,0.3);

					// fade in active thumbnail
					thumb.fadeTo('fast',1).addClass('selected');

					// add a title for the clickable image
					image.attr('title','Next image >>');
				},
				onThumb : function(thumb) { // thumbnail effects goes here

					// fetch the thumbnail container
					var _li = thumb.parents('li');

					// if thumbnail is active, fade all the way.
					var _fadeTo = _li.is('.active') ? '1' : '0.3';

					// fade in the thumbnail when finnished loading
					thumb.css({display:'none',opacity:_fadeTo}).fadeIn(1500);

					// hover effects
					thumb.hover(
						function() { thumb.fadeTo('fast',1); },
						function() { _li.not('.active').children('img').fadeTo('fast',0.3); } // don't fade out if the parent is active
					)
				}
			});
		});
	</script>
	<style type="text/css" media="screen">
		/* BEGIN DEMO STYLE */


		h1,h2{font:bold 80% 'helvetica neue',sans-serif;letter-spacing:3px;text-transform:uppercase;}
		a{color:#348;text-decoration:none;outline:none;}
		a:hover{color:#67a;}
		.caption{font-style:italic;color:#887;}
		.demo{position:relative;margin-top:2em;}
		.gallery_demo{
			position:absolute;
			left:35px;
			top:250px;
			width:230px;
			margin:0 auto;
		}
		.gallery_demo li{width:68px;height:50px;border:3px double #111;margin: 0 2px;background:#000;}
		.gallery_demo li div{left:240px}
		.gallery_demo li div .caption{font:italic 0.7em/1.4 georgia,serif;}

		#main_image{margin:0 auto 60px auto;height:438px;width:700px;}
		#main_image img{margin-bottom:10px; background:none;}
		.nav{padding-left:32px;padding-top:15px;clear:both;font:80% 'helvetica neue',sans-serif;letter-spacing:3px;text-transform:uppercase;}
		.nav a{color:#DDD; text-decoration:none;}
		.nav a:hover{text-decoration:underline;}
		.info{text-align:left;width:700px;margin:30px auto;border-top:1px dotted #221;padding-top:30px;}
		.info p{margin-top:1.6em;}
		.galleria_wrapper{float:right;}
		.galleria_container{
			position:absolute;
			left:270px;
			top:125px;
		}
		.caption {
			position:absolute;
			top:400px;
			left:5px;
			color:#fff;
		}
		div#wrapper {
			min-height:610px;
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
				<h1><img src="images/pressh1.png" /></h1>
			</div>
			<ul class="gallery_demo_unstyled">
				<?php while($p_record = mysql_fetch_assoc($p_rs)) { ?>
					<li><img src="press/<?php echo $p_record['press_img']; ?>" title="<?php echo $p_record['press_desc']; ?>" /></li>
				<?php } ?>
			</ul>
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
