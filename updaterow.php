<?php 
	include_once("db_functions.php"); 
	include_once("display_functions.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo getenv('app_name'); ?> - DB Maintenance</title>
    </head>
	<body bgcolor="666666">
	

	<font face="arial" color="FFFFFF">
		<h1>Devops Fortune Cookie - Database Maintenance </h1>
	</font>

<!-- Display fortune -->
		<font face="arial" color="000000">
			<table border=1 bgcolor="EEEEEE" cellspacing=0 cellpadding=10><tr><td>
				<table>
					<tr>
						<td>
							<?php echo getFortune($_GET["id"]); ?>
						</td>
					</tr>
				</table>
			</table>
		</font>
		<br>



<!-- Update fortune form -->
	<font face="arial" color="FFFFFF">
		<h2>Update Fortune</h2> 
	</font>
	<font face="arial" color="000000">
		<form action="dbmaint.php" method=post>
		<table border=1 bgcolor="EEEEEE" cellspacing=0 cellpadding=10><tr><td>
			<table>
			<tr>
				<td>
					Edit text:<br>
					<textarea rows="4" cols="80" name="FortuneText"><?php echo getFortune($_GET["id"]); ?></textarea>
				</td>
			</tr><tr>
				<td align=right>
					<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?> >
					<input type="submit" name="update" value="Submit">
				</td>
			</tr>
		</table>
		</table>
		</form>
	</font>
	<br>

<!-- Delete fortune form -->
	<font face="arial" color="FFFFFF">
		<h2>Delete Fortune</h2> 
	</font>
	<font face="arial" color="000000">
		<form action="dbmaint.php" method=post>
		<table border=1 bgcolor="EEEEEE" cellspacing=0 cellpadding=10><tr><td>
			<table>
			<tr>
				<td>
					Delete this record from the database:<br>
				</td>
			</tr><tr>
				<td align=left>
					<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?> >
					<input type="submit" name="delete" value="Delete">
				</td>
			</tr><tr>
				<td>
					<font color="red"><b>WARNING</b> - This action cannot be undone.</font><br>
				</td>
		</tr>
		</table>
		</table>
		</form>
	</font>



	<br>
		
<!-- Footer -->
	<font color='FFFFFF'>
		<?php echo drawFooter(); ?>
	</font>
    </body>
</html>
