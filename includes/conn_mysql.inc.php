<?php
function dbConnect($type) {
  if ($type == 'admin') {
    $user = 'sb_admin';
	$pwd = 'ur3133t';
	} else {
		exit('Unrecognized connection type');
	}
  $conn = mysql_connect('localhost', $user, $pwd) or die ('Cannot connect to server');
  mysql_select_db('sbwd') or die ('Cannot open database');
  return $conn;
  }
?>