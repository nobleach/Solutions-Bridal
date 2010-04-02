<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$ps_id = $_GET['ps_id'];
	$conn = dbConnect('admin');
	$photo_query = "SELECT * FROM photoshoot_photos WHERE ps_id = $ps_id";
	$photo_rs = mysql_query($photo_query, $conn) or die(mysql_error());
	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/paginator.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function () {  $("#thumbholder").pagination();  });
		</script>
		<style type="text/css" media="screen">
		div#thumbholder {
			position:absolute;
			width:700px;
			height:300px;
			border: 1px solid #000;
			background-color:#fff;
		}
	</style>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: Designer Photo Upload</h1>
			<div id="styletwo">
				<ul>
					<li><a href="index.html" title="">Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a class="current" href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">Edit FAQs</a></li>
					<li><a href="" title="">View Measurements</a></li>
				</ul>
			</div>
			<div id="thumbHolder">
				<?php while($photo_record = mysql_fetch_assoc($photo_rs)) { ?>
				<img src="../collections/thumbs/<?php echo $photo_record['photo_url']; ?>" />
				<a href="delete_collection_photo.php?col_id=<?php echo $photo_record['ps_id']; ?>&cphoto_id=<?php echo $photo_record['photo_id']; ?>&photo_url=<?php echo $photo_record['photo_url']; ?>">Delete</a>	
				<?php } ?>
			</div>
			
				<h4>Upload a new image</h4>
			<form enctype="multipart/form-data" action="uploadify.php" method="post" accept-charset="utf-8">
				<label for="Filedata">Image: </label><input type="file" name="Filedata" value="" id="image">
				<input type="hidden" name="col_id" value="<?php echo $col_id; ?>" id="col_id">

				<p><input type="submit" value="Upload"></p>
			</form>
		</div>
	</body>
</html>