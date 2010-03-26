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
					<li><a href="index.html" title="" class="current">Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">Edit FAQs</a></li>
					<li><a href="" title="">View Measurements</a></li>
				</ul>
			</div>
			<h3 class="warning">All photos MUST be portrait.</h3>	
			<?php while($photo_record = mysql_fetch_assoc($photo_rs)) { ?>
				<img src="../images/<?php echo $photo_record['cphoto_url']; ?>" />
				<a href="delete_collection_photo.php?cphoto_id=<?php echo $photo_record['cphoto_id']; ?>">Delete</a>	
				<?php } ?>
				<h4>Upload a new image</h4>
			<form action="upload_new_collection_image.php" method="post" accept-charset="utf-8">
				<label for="cphoto_url">Image: </label><input type="file" name="cphoto_url" value="" id="image">
				

				<p><input type="submit" value="Upload"></p>
			</form>
		</div>
	</body>
</html>