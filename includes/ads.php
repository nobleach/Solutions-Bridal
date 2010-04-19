<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('query');
	
	$ad1_query = "SELECT ad_img, ad_link FROM ads WHERE ad_id = 1";
	$ad1_rs = mysql_query($ad1_query, $conn);
	$ad1_record = mysql_fetch_object($ad1_rs);
	
	$ad2_query = "SELECT ad_img, ad_link FROM ads WHERE ad_id = 2";
	$ad2_rs = mysql_query($ad2_query, $conn);
	$ad2_record = mysql_fetch_object($ad2_rs);
	
?>
<div class="ad">
	<a href="<?php echo $ad1_record->ad_link; ?>">
		<img src="ads/<?php echo $ad1_record->ad_img; ?>" />
	</a>
</div>
<div class="ad">
	<a href="<?php echo $ad2_record->ad_link; ?>">
		<img src="ads/<?php echo $ad2_record->ad_img; ?>" />
	</a>
</div>
<div class="ad">
	<a class="hide" href="http://www.solutionsbridal.com/blog/"><img src="images/visitourblogad.jpg" /></a>
</div>