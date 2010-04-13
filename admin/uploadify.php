<?php
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_REQUEST['folder'] . '/';
	$targetPath = '../photoshoots';
	//$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	$targetFile =  $targetPath . '/' . $_FILES['Filedata']['name'];
	
	// shoehorned code:
	$tmp_name = $_FILES["Filedata"]["tmp_name"];
	$rndName = mt_rand().mt_rand().".jpg";
	$thName = "sb_" . $rndName;
	$fsName = "sb_" . $rndName;
	$name = $_FILES["Filedata"]["name"];
	$fsDir = "../photoshoots/";
	$thDir = "../photoshoots/thumbs/";
	$quality = 85;
	//move_uploaded_file($tmp_name, "data/$name");
	list($width, $height) = getimagesize($tmp_name);
	if($width > $height){
		$newFsWidth = 700;
		$newFsHeight = 492;
		$newThWidth = 160;
		$newThHeight = 113;
	} else {
		$newFsWidth = 316;
		$newFsHeight = 492;
		$newThWidth = 120;
		$newThHeight = 187;
	}
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		//move_uploaded_file($tempFile,$targetFile);
		$image_fs = imagecreatetruecolor($newFsWidth, $newFsHeight);
		$image = imagecreatefromjpeg($tmp_name);
		imagecopyresampled($image_fs, $image, 0, 0, 0, 0, $newFsWidth, $newFsHeight, $width, $height);
		
		imagejpeg($image_fs, $fsDir.$fsName, $quality);
		$image_th = imagecreatetruecolor($newThWidth, $newThHeight);
		imagecopyresampled($image_th, $image, 0,0,0,0, $newThWidth, $newThHeight, $width, $height);
		imagejpeg($image_th, $thDir.$thName, $quality);
		echo "1";
	// } else {
	// 	echo 'Invalid file type.';
	// }
}
require_once('includes/conn_mysql.inc.php');
require_once('includes/corefuncs.inc.php');
$conn = dbConnect('admin');
$ps_id = $_POST['ps_id'];
$sql = "INSERT INTO photoshoot_photos (ps_id, photo_url) VALUES ('$ps_id','$fsName')";
//echo $sql;
$handle = mysql_query($sql, $conn) or die(mysql_error());
if($handle) {
	redirect_to("upload_photoshoot_images.php?ps_id=$ps_id");
}
?>