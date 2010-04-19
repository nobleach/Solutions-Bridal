<?php
	require_once('includes/conn_mysql.inc.php');
	//connect to DB:
	$conn = dbConnect('admin');
	$p_query = "SELECT * FROM press";
	$p_rs = mysql_query($p_query, $conn) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="css/dropdown.css" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" media="all" type="text/css" href="css/dropdown_ie.css" />
	<![endif]-->
	<link href="css/galleria.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.galleria.pack.js"></script>
	<script type="text/javascript">
	
	jQuery(function($) {
		
		$('.gallery_demo_unstyled').addClass('gallery_demo'); // adds new class name to maintain degradability
		$('.vnav').css('display','none'); // hides the nav initially
		
		$('ul.gallery_demo').galleria({
			history   : false, // deactivates the history object for bookmarking, back-button etc.
			clickNext : false, // helper for making the image clickable. Let's not have that in this example.
			insert    : undefined, // the containing selector for our main image. 
								   // If not found or undefined (like here), galleria will create a container 
								   // before the ul with the class .galleria_container (see CSS)
			onImage   : function() { $('.nav').css('display','block'); } // shows the nav when the image is showing
		});
	});
	
	</script>

	<style media="screen,projection" type="text/css">
	
	/* BEGIN DEMO STYLE */
	*{margin:0;padding:0}
	body{padding:20px;background:white;background:white;color:#555;font:80%/140% 'helvetica neue',sans-serif;width:900px;margin: 0 auto;}
	h1,h2{font:bold 80% 'helvetica neue',sans-serif;letter-spacing:3px;text-transform:uppercase;}
	a{color:#348;text-decoration:none;outline:none;}
	a:hover{color:#67a;}
	.caption{color:#888;position:absolute;top:250px;left:3px;width:200px;}
	.demo{position:relative;margin-top:2em;}
	.gallery_demo{width:200px;float:left;}
	.gallery_demo li{width:55px;height:70px;border:3px double #eee;margin: 0 2px 2px 0;background:#eee;}
	.gallery_demo li.hover{border-color:#bbb;}
	.gallery_demo li.active{border-style:solid;border-color:#222;}
	.gallery_demo li div{left:240px}
	.gallery_demo li div .caption{font:italic 0.7em/1.4 georgia,serif;}
	
	.galleria_container{margin:0 auto 60px auto;height:438px;width:700px;float:right;}
	
	.nav{padding-top:15px;clear:both;}
	
	.info{text-align:left;margin:30px 0;border-top:1px dotted #221;padding-top:30px;clear:both;}
	.info p{margin-top:1.6em;}
	
	.vnav{position:absolute;top:410px;left:0;}

	
    </style>

	<title>Wedding Photoshoot</title>
	
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
			<div id="main_image">
			
			</div>
			<ul class="gallery_demo_unstyled">
				<?php while($p_record = mysql_fetch_assoc($p_rs)) { ?>
					<li><img src="press/<?php echo $p_record['press_img']; ?>" /></li>
				<?php } ?>
			</ul>
		</div>	
	</div>
	<div id="adwrapper">
		<div class="ad">
			
		</div>
		<div class="ad">
			
		</div>
		<div class="ad">
			<a class="hide" href="http://www.solutionsbridal.com/blog/"><img src="images/visitourblogad.jpg" /></a>
		</div>
	</div>
	<div id="footer">
		<p>Winter Park P: 407.647.8666 330 W. Fairbanks Ave. Winter Park, FL 32789 | Gainesville P: 352.367.0070 6450 SW Archer Rd. Suite 230 Gainesville, FL 32608</p>
	</div>
</body>
</html>
