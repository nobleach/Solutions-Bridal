<?php
function dbConnect($type) {
  if ($type == 'query') {
    	//$user = 'sb_view';
		//$pwd = 'viewonly';
		$user = 'sbwd@localhost';
		$pwd = 'ur3133t';
	} 
	elseif ($type == 'admin') {
		//$user = 'sb_admin';
		$user = 'sbwd@localhost';
		$pwd = 'ur3133t';
	} else {
		exit('Unrecognized connection type');
	}
  $conn = mysql_connect('localhost', $user, $pwd) or die ('Cannot connect to server');
  mysql_select_db('sbwd') or die ('Cannot open database');
  return $conn;
  }
?>