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
		$fsDir = "photoshoots/";
		$thDir = "photoshoots/thumbs/";
		$a[] = $fsName;
		$quality = 72;
		//move_uploaded_file($tmp_name, "data/$name");
		list($width, $height) = getimagesize($tmp_name);
		if($width > $height){
			$newFsWidth = 392;
			$newFsHeight = 294;
			$newThWidth = 100;
			$newThHeight = 75;
		} else {
			$newFsWidth = 294;
			$newFsHeight = 392;
			$newThWidth = 75;
			$newThHeight = 100;
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
require_once('connect.php');
$car_id = $_GET['car_id'];
//echo $car_id;
// 
mysql_select_db($database, $conn);

for ($i = 0; $i < count($a); $i++) {
$sql = "INSERT INTO pics (car_id, filename) VALUES ('$car_id','$a[$i]') ";
$rs = mysql_query($sql, $conn) or die(mysql_error());
}


echo "Insert Succeeded";
$insertGoTo = "editRecord.php?car_id=$car_id";
header(sprintf("Location: %s", $insertGoTo));
//echo '<a href="list.php">Return to the list</a>'
//print_r($a);
?>