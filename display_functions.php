<?php
function drawFooter()
{
	echo "	<p>\n";
	echo "		<hr>\n";
	echo "			<tt>\n";
	echo getenv('app_name') . " ver " . getenv('app_ver') . "<br>\n"; 
	echo "Running on: " . getenv('stack') . "<br>\n";
	echo "Created by: <a href=mailto:" . getenv('creator_email') . 
		"?Subject=OMG%20This%20is%20the%20best%20app%20everrr>" . getenv('creator') . "</a>\n";
	echo "			</tt>\n";
}
?>