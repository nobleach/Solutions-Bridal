<?php
if ($_FILES['Filedata']['error'] == 0) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = '../press';
	$targetFile =  $targetPath . '/' . $_FILES['Filedata']['name'];
	
	// shoehorned code:
	$tmp_name = $_FILES["Filedata"]["tmp_name"];
	$rndName = mt_rand().mt_rand().".jpg";
	$thName = $fsName = "g_" . $rndName;
	$name = $_FILES["Filedata"]["name"];
	$fsDir = "../salegowns/";
	$thDir = "../salegowns/thumbs/";
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
$gown_name = $_POST['gown_name'];
$gown_designer = $_POST['gown_designer'];
$gown_desc = mysql_real_escape_string(trim($_POST['gown_desc']));

if(isset($_POST['gown_id'])) {
	$gown_id = $_POST['gown_id'];
	if(isset($fsName)) {
		$gown_img = $fsName;
		$sql = "UPDATE salegowns SET gown_name = '$gown_name', gown_desc = '$gown_desc', gown_designer = '$gown_designer', gown_img = '$gown_img' WHERE gown_id = $gown_id";
	} else {
		$sql = "UPDATE salegowns SET gown_name = '$gown_name', gown_desc = '$gown_desc' gown_designer = '$gown_designer', WHERE gown_id = $gown_id";
	}
	
} else {
	$gown_img = $fsName;
	$sql = "INSERT INTO salegowns SET gown_name = '$gown_name', gown_desc = '$gown_desc', gown_designer = '$gown_designer', gown_img = '$gown_img'";
}

//echo $sql;
$handle = mysql_query($sql, $conn) or die(mysql_error());
if($handle) {
	redirect_to("edit_sale_gowns.php");
}
?>