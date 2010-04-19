<?php
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../ads';
	$targetFile =  $targetPath . '/' . $_FILES['Filedata']['name'];
	
	// shoehorned code:
	$tmp_name = $_FILES["Filedata"]["tmp_name"];
	$rndName = mt_rand().mt_rand().".jpg";
	$fsName = "ad_" . $rndName;
	$name = $_FILES["Filedata"]["name"];
	$fsDir = "../ads/";
	$quality = 85;
	list($width, $height) = getimagesize($tmp_name);
	if($width > $height){
		$newFsWidth = 264;
		$newFsHeight = 58;
	} else {
		$newFsWidth = 264;
		$newFsHeight = 58;
	}
		$image_fs = imagecreatetruecolor($newFsWidth, $newFsHeight);
		$image = imagecreatefromjpeg($tmp_name);
		imagecopyresampled($image_fs, $image, 0, 0, 0, 0, $newFsWidth, $newFsHeight, $width, $height);
		imagejpeg($image_fs, $fsDir.$fsName, $quality);
}
require_once('includes/conn_mysql.inc.php');
require_once('includes/corefuncs.inc.php');
$conn = dbConnect('admin');
$ad_id = $_POST['ad_id'];
$ad_link = $_POST['ad_link'];
$sql = "UPDATE ads SET ad_img = '$fsName', ad_link = '$ad_link' WHERE ad_id = $ad_id";
//echo $sql;
$handle = mysql_query($sql, $conn) or die(mysql_error());
if($handle) {
	redirect_to("index.html");
}
?>