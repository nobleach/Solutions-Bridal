<?php
if ($_FILES['Filedata']['error'] == 0) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../brides';
	$targetFile =  $targetPath . '/' . $_FILES['Filedata']['name'];
	
	// shoehorned code:
	$tmp_name = $_FILES["Filedata"]["tmp_name"];
	$rndName = mt_rand().mt_rand().".jpg";
	$thName = $fsName = "g_" . $rndName;
	$name = $_FILES["Filedata"]["name"];
	$fsDir = "../brides/";
	$thDir = "../brides/thumbs/";
	$quality = 85;
	//$maxFSWidth = 626;
	$maxFSHeight = 368;
	//maxTHWidth = 120;
	$maxTHHeight = 80;
	list($width, $height) = getimagesize($tmp_name);
	$newFsWidth = $maxFSHeight/$height * $width;
	$newFsHeight = 368;
	$newThWidth = $maxTHHeight/$height * $width;
	$newThHeight = $maxTHHeight;
	//create the FS image
	$image_fs = imagecreatetruecolor($newFsWidth, $newFsHeight);
	$image = imagecreatefromjpeg($tmp_name);
	imagecopyresampled($image_fs, $image, 0, 0, 0, 0, $newFsWidth, $newFsHeight, $width, $height);
	imagejpeg($image_fs, $fsDir.$fsName, $quality);
	//create the Thumbnail
	$image_th = imagecreatetruecolor($newThWidth, $newThHeight);
	$image = imagecreatefromjpeg($tmp_name);
	imagecopyresampled($image_th, $image, 0, 0, 0, 0, $newThWidth, $newThHeight, $width, $height);
	imagejpeg($image_th, $thDir.$thName, $quality);
}
require_once('includes/conn_mysql.inc.php');
require_once('includes/corefuncs.inc.php');
$conn = dbConnect('admin');
$bride_name = $_POST['bride_name'];

if(isset($_POST['bride_id'])) {
	$bride_id = $_POST['bride_id'];
	if(isset($fsName)) {
		$bride_img = $fsName;
		$sql = "UPDATE realbrides SET bride_name = '$bride_name',  bride_img = '$bride_img' WHERE bride_id = $bride_id";
	} else {
		$sql = "UPDATE realbrides SET bride_name = '$bride_name' WHERE bride_id = $bride_id";
	}
	
} else {
	$bride_img = $fsName;
	$sql = "INSERT INTO realbrides SET bride_name = '$bride_name', bride_img = '$bride_img'";
}

//echo $sql;
$handle = mysql_query($sql, $conn) or die(mysql_error());
if($handle) {
	redirect_to("edit_brides.php");
}
?>