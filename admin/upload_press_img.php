<?php
if ($_FILES['Filedata']['error'] == 0) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../press';
	$targetFile =  $targetPath . '/' . $_FILES['Filedata']['name'];
	
	// shoehorned code:
	$tmp_name = $_FILES["Filedata"]["tmp_name"];
	$rndName = mt_rand().mt_rand().".jpg";
	$thName = $fsName = "ad_" . $rndName;
	$name = $_FILES["Filedata"]["name"];
	$fsDir = "../press/";
	$thDir = "../press/thumbs/";
	$quality = 85;
	//$maxFSWidth = 626;
	$maxFSHeight = 391;
	//maxTHWidth = 120;
	$maxTHHeight = 80;
	list($width, $height) = getimagesize($tmp_name);
	$newFsWidth = $maxFSHeight/$height * $width;
	$newFsHeight = 391;
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
$press_name = $_POST['press_name'];
$press_desc = mysql_real_escape_string(trim($_POST['press_desc']));

if(isset($_POST['press_id'])) {
	$press_id = $_POST['press_id'];
	if(isset($fsName)) {
		$press_img = $fsName;
		$sql = "UPDATE press SET press_name = '$press_name', press_desc = '$press_desc', press_img = '$press_img' WHERE press_id = $press_id";
	} else {
		$sql = "UPDATE press SET press_name = '$press_name', press_desc = '$press_desc' WHERE press_id = $press_id";
	}
	
} else {
	$press_img = $fsName;
	$sql = "INSERT INTO press SET press_name = '$press_name', press_desc = '$press_desc', press_img = '$press_img'";
}

//echo $sql;
$handle = mysql_query($sql, $conn) or die(mysql_error());
if($handle) {
	redirect_to("edit_press.php");
}
?>