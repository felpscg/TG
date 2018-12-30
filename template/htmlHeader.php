<?php

/**
 * Description of htmlHeader
 *
 * @author Felipe
 */

class htmlHeader {
    function header($ROOT){
		
		echo "<html>".
			"<head>".
			"<meta charset='UTF-8'>".
			"<title>TODO supply a title</title>".
			"<!--CSS-->".
			"<link rel='stylesheet' type='text/css' href='css/menu.css'>".
			"<script charset='utf-8' type='text/javascript' src='js/menu.js' defer='defer'></script>".
			"<script charset='utf-8' type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js' defer='defer'></script>".
			"</head>".
			"<body>";
	}
}
