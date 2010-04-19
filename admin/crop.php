<?php

//crop script - Room For Squares:
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require_once('includes/conn_mysql.inc.php');
	require_once('includes/corefuncs.inc.php');
	//settings
	$targ_w = $targ_h = 73;
	$jpeg_quality = 90;

	//save directories and filenames
	$photo_url = $_POST['photo_url'];
	$save_dir = '../photoshoots/';
	$src = $save_dir . $photo_url;
	$thumb_name = 'th_'. $photo_url;
	$dest_name = $save_dir.$thumb_name;
	
	//functionality
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	
	$final_thumb = imagejpeg($dst_r,$dest_name,$jpeg_quality);
	
	//if it uploaded, let's stick it in the database and go back to the upload page
	if($final_thumb) {
		$ps_id = $_POST['ps_id'];
		$conn = dbConnect('admin');
		
		$th_query = "UPDATE photoshoots SET ps_thumb = '$thumb_name' WHERE ps_id = '$ps_id'";
		//echo $th_query;
		$handle = mysql_query($th_query, $conn) or die(mysql_error());
		if ($handle) {
			redirect_to("upload_photoshoot_images.php?ps_id=$ps_id");
		} else {
			echo 'could not insert into database!';
		} 
	} 
	//header('Content-type: image/jpeg');
	//imagejpeg($dst_r,null,$jpeg_quality);
	//exit;
}

// If not a POST request, display page below:

?>
<html>
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
			<input type="hidden" id="photo_url" name="photo_url" value="<?php echo $_GET['photo_url']; ?>" />
			<input type="hidden" id="ps_id" name="ps_id" value="<?php echo $_GET['ps_id']; ?>" />
			<input type="submit" value="Crop Image" />
		</form>

		<p>
			<b>Drag mouse to draw a square.</b> Hit "Crop Image" to save this image as the current thumbnail.
		</p>



	</div>
	</div>
	</div>
	</body>

</html>
