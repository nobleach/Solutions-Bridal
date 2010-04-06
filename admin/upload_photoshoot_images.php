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
	
	$thumbnail_query = "SELECT ps_thumb FROM photoshoots WHERE ps_id = $ps_id";
	$thumbnail_rs = mysql_query($thumbnail_query, $conn) or die(mysql_error());
	$thumbnail_record = mysql_fetch_object($thumbnail_rs);
?>
<!DOCTYPE HTML>
<html>
	<head>
		
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/uploadify.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script src="scripts/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/swfobject.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/jquery.uploadify.v2.1.0.min.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
			$("#fileInput2").uploadify({
					'uploader'       : 'scripts/uploadify.swf',
					'script'         : 'uploadify.php',
					'cancelImg'      : 'images/cancel.png',
					'folder'         : 'images',
					'multi'          : true,
					'scriptData'	 : {"ps_id":'<?php echo $ps_id; ?>'},
					'onAllComplete'  : function() {
										location.reload(true);
										}
				});
		})
			
		</script>
		<style type="text/css" media="screen">
		div#thumbHolder {
			overflow:scroll;
			width:700px;
			height:260px;
			border: 1px solid #000;
			background-color:#fff;
		}
		div.thumbNail {
			float:left;
			height:160px;
			width:170px;
		}
		div.thumbNail a, div.thumbNail p {
			float:left;
			margin-right:12px;
			margin-left:3px;
			font-size:11px;
		}
		div.thumbNail img {
			
		}
	</style>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: Designer Photo Upload</h1>
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
			<p>
				Current Thumbnail Image:
			</p>
			<img src="../photoshoots/<?php echo $thumbnail_record->ps_thumb; ?>">
			<div id="thumbHolder">
				<?php while($photo_record = mysql_fetch_assoc($photo_rs)) { ?>
						<div class="thumbNail">
							<img src="../photoshoots/thumbs/<?php echo $photo_record['photo_url']; ?>" />
							<a href="delete_photoshoot_photo.php?ps_id=<?php echo $photo_record['ps_id']; ?>&photo_id=<?php echo $photo_record['photo_id']; ?>&photo_url=<?php echo $photo_record['photo_url']; ?>">Delete</a>  
							<a href="crop.php?ps_id=<?php echo $photo_record['ps_id']; ?>&photo_id=<?php echo $photo_record['photo_id']; ?>&photo_url=<?php echo $photo_record['photo_url']; ?>">Set As Thumbnail</a>
						</div>
				<?php } ?>
			</div>
			
				<h4>Upload new image images:</h4>
			<form enctype="multipart/form-data" action="uploadify.php" method="post" accept-charset="utf-8">
				<input id="fileInput2" name="fileInput2" type="file" /> <a href="javascript:$('#fileInput2').uploadifyUpload();">Upload Files</a> | <a href="javascript:$('#fileInput2').uploadifyClearQueue();">Clear Queue</a>
				<input type="hidden" name="ps_id" value="<?php echo $ps_id; ?>" id="ps_id">
			</form>
		</div>
	</body>
</html>