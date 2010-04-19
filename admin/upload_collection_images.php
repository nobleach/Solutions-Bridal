<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$col_id = $_GET['col_id'];
	$conn = dbConnect('admin');
	$photo_query = "SELECT * FROM collection_photos WHERE col_id = $col_id";
	$photo_rs = mysql_query($photo_query, $conn) or die(mysql_error());
	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: Designer Photo Upload</h1>
			<div id="styletwo">
				<ul>
					<li><a href="index.html" title="" >Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="edit_sale_gowns.php" title="">Edit Sale Gowns</a></li>
					<li><a href="edit_press.php" title="">Press</a></li>
					<li><a href="email_brides.php" title="">Email Brides</a></li>
				</ul>
			</div>
			<h3 class="warning">All photos MUST be portrait.</h3>	
			<?php while($photo_record = mysql_fetch_assoc($photo_rs)) { ?>
				<img src="../collections/thumbs/<?php echo $photo_record['cphoto_url']; ?>" />
				<a href="delete_collection_photo.php?col_id=<?php echo $photo_record['col_id']; ?>&cphoto_id=<?php echo $photo_record['cphoto_id']; ?>&cphoto_url=<?php echo $photo_record['cphoto_url']; ?>">Delete</a>	
				<?php } ?>
				<h4>Upload a new image</h4>
			<form enctype="multipart/form-data" action="handleMulti_collections.php" method="post" accept-charset="utf-8">
				<label for="Filedata">Image: </label><input type="file" name="Filedata[]" value="" id="image">
				<input type="hidden" name="col_id" value="<?php echo $col_id; ?>" id="col_id">

				<p><input type="submit" value="Upload"></p>
			</form>
		</div>
	</body>
</html>