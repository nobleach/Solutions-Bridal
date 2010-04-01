<?php
	function getDstTime() {
		return localtime();
	}
	$localtime = localtime();
	$localtime_assoc = localtime(time(), true);
	echo '<pre>';
	print_r($localtime);
	echo '</pre>';
	echo '<pre>';
	print_r($localtime_assoc);
	echo '</pre>';
?>