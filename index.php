<?php 
	include_once("db_functions.php"); 
	include_once("display_functions.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo getenv('app_name'); ?></title>
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    </head>

<!-- Header -->

	<body bgcolor="FFFFFF">
		<font face="arial" color="000000">
			<h1><?php echo getenv('app_name'); ?> App</h1>
		</font>


<img src="fortunecookie.png">


<!-- Display fortune -->
		<font face="arial" color="000000">
			<h2>Your Devops Fortune is...</h2> 
			<table border=1 bgcolor="EEEEEE" cellspacing=0 cellpadding=10><tr><td>
				<table>
					<tr>
						<td>
							<?php echo displayFortune(); ?>
						</td>
					</tr>
				</table>
			</table>
		</font>
		<br>
		<p>
		<font face="arial">
		<a href="dbmaint.php">Fortune Admin</a>
		
<!-- Footer -->
		<font color='000000'>
			<?php echo drawFooter(); ?>
		</font>
    </body>
</html>
