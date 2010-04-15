<?php
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$q = "SELECT * FROM quotes";
	$s = mysql_query($q, $conn);
	
	// XML Preamble
	$xml = '<?xml version="1.0" encoding="utf-8"?>';

	// Begin XML response
	$xml .= '<quotes>';
	while($a = mysql_fetch_assoc($s)) {
		$xml .= '<quote>';
		$xml .= '<q_body>' . $a['q_body'] . '</q_body>';
		$xml .= '<q_sig>'. $a['q_sig'] . '</q_sig>';
		$xml .= '</quote>';
	}
	// End XML response
	$xml .= '</quotes>';
	// Output XML string
	echo $xml;
?>