<?php
foreach ($_FILES["Filedata"]["error"] as $key => $error) {
	if ($error == UPLOAD_ERR_OK) {
		$tmp_name = $_FILES["Filedata"]["tmp_name"][$key];
		$rndName = mt_rand().mt_rand().".jpg";
		//echo $rndName;
		//$thName = "th_" . $_FILES['Filedata']['name'][$key];
		//$fsName = "fs_" . $_FILES['Filedata']['name'][$key];
		$thName = "sb_" . $rndName;
		$fsName = "sb_" . $rndName;
		$name = $_FILES["Filedata"]["name"][$key];
		$fsDir = "../collections/";
		$thDir = "../collections/thumbs/";
		$a[] = $fsName;
		$quality = 87;
		//move_uploaded_file($tmp_name, "data/$name");
		list($width, $height) = getimagesize($tmp_name);
		if($width > $height){
			$newFsWidth = 389;
			$newFsHeight = 250;
			$newThWidth = 101;
			$newThHeight = 65;
		} else {
			$newFsWidth = 250;
			$newFsHeight = 389;
			$newThWidth = 65;
			$newThHeight = 101;
		}
			
		$image_fs = imagecreatetruecolor($newFsWidth, $newFsHeight);
		$image = imagecreatefromjpeg($tmp_name);
		imagecopyresampled($image_fs, $image, 0, 0, 0, 0, $newFsWidth, $newFsHeight, $width, $height);
		
		imagejpeg($image_fs, $fsDir.$fsName, $quality);
		$image_th = imagecreatetruecolor($newThWidth, $newThHeight);
		imagecopyresampled($image_th, $image, 0,0,0,0, $newThWidth, $newThHeight, $width, $height);
		imagejpeg($image_th, $thDir.$thName, $quality);
		
   }
}
require_once('includes/conn_mysql.inc.php');
require_once('includes/corefuncs.inc.php');
$col_id = $_POST['col_id'];
$conn = dbConnect('admin');
for ($i = 0; $i < count($a); $i++) {
$sql = "INSERT INTO collection_photos (col_id, cphoto_url) VALUES ('$col_id','$a[$i]') ";
//echo $sql;
$handle = mysql_query($sql, $conn) or die(mysql_error());
}
if($handle) {
	redirect_to("upload_collection_images.php?col_id=$col_id");
}

?>