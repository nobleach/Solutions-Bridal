<?php
	require_once('includes/conn_mysql.inc.php');
	$col_id = $_GET['col_id'];
	$conn = dbConnect('query');
	$info_query = "SELECT col_id, col_name, col_desc, col_url FROM collections WHERE col_id = $col_id";
	$info_rs = mysql_query($info_query, $conn) or die(mysql_error());
	$info_record = mysql_fetch_assoc($info_rs);
	
	$pic_query = "SELECT cphoto_id, cphoto_url FROM collection_photos WHERE col_id = $col_id";
	$pic_rs = mysql_query($pic_query, $conn) or die(mysql_error());
	$pic_record = mysql_fetch_assoc($pic_rs);
?>
<h1><?php echo $info_record['col_name']; ?></h1>
<p class="galdescription">
	<?php echo $info_record['col_desc']; ?>	
</p>
<p>
	<a href="<?php echo $info_record['col_url']; ?>"><?php echo $info_record['col_url']; ?></a>
</p>
<script>
	$(function () {  $("#galthumbs").pagination();  });
</script>
<div id="galthumbs">
	<?php do { ?>
	<img id="<?php echo $pic_record['cphoto_id']; ?>" class="galthumb" src="collections/thumbs/<?php echo $pic_record['cphoto_url']; ?>" width= "45" height="70" />
	<?php } while($pic_record = mysql_fetch_assoc($pic_rs));?>
</div>