<?php

//crop script - Room For Squares:
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = $targ_h = 73;
	$jpeg_quality = 90;

	//$src = 'images/flowers.jpg';
	$photo_url = $_POST['photo_url'];
	$src = '../photoshoots/'.$photo_url;
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	$final_thumb = imagejpeg($dst_r,null,$jpeg_quality);
	//header('Content-type: image/jpeg');
	//imagejpeg($dst_r,null,$jpeg_quality);
	//exit;
}

// If not a POST request, display page below:

?><html>
	<head>

		<script src="scripts/jquery-1.4.2.min.js"></script>
		<script src="scripts/jquery.Jcrop.min.js"></script>
		<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
		<link rel="stylesheet" href="css/demos.css" type="text/css" />

		<script language="Javascript">

			$(function(){

				$('#cropbox').Jcrop({
					aspectRatio: 1,
					onSelect: updateCoords
				});

			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};

		</script>

	</head>

	<body>

	<div id="outer">
	<div class="jcExample">
	<div class="article">

		<h1>Create a thumbnail for this album:</h1>

		<!-- This is the image we're attaching Jcrop to -->
		<img src="<?php echo '../photoshoots/' . $_GET['photo_url']; ?>" id="cropbox" />

		<!-- This is the form that our event handler fills -->
		<form action="crop.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="hidden" id="photo_url" name="photo_url" value="<?php echo '../photoshoots/' . $_GET['photo_url']; ?>" />
			<input type="submit" value="Crop Image" />
		</form>

		<p>
			<b>Drag moust to draw a square.</b> Hit "Crop Image" to save this image as the current thumbnail.
		</p>



	</div>
	</div>
	</div>
	</body>

</html>
