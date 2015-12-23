<?php 
	include_once("db_functions.php"); 
	include_once("display_functions.php"); 
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo getenv('app_name'); ?> - DB Maintenance</title>
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    </head>
	<body bgcolor="666666">
	
<!-- Handle POST action / Display result or error -->
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo "<table cellpadding=2 width='100%' bgcolor='FFFFFF'><tr><td>\n";
			echo "<font face='arial' color='red'>\n";
			if ($_POST["insert"] == 'Submit') {
				echo insertRow(addslashes($_POST["FortuneText"]));
			} elseif ($_POST["update"] == 'Submit') {
				echo updateRow($_POST["id"], addslashes($_POST["FortuneText"]));
			} elseif ($_POST["delete"] == 'Delete') {
				echo deleteRow($_POST["id"]);
			}
			echo "</font>\n</td></tr></table>";
		}
	?>
	
	<font face="arial" color="FFFFFF">
		<h1>Devops Fortune Cookie - Database Maintenance </h1>
	</font>
		
	<font face="arial" color="FFFFFF">
		<h2>Current Fortune List</h2> 
	</font>

<!-- Display data table -->
	<font face="arial" color="000000">
		<table border=1 bgcolor="DDDDDD" cellspacing=0 cellpadding=3>
			<?php echo displayData(); ?>
		</table>
		<br>
		
		<p>
	</font>


<!-- Add new fortune form -->
	<font face="arial" color="FFFFFF">
		<h2>Add a new Fortune</h2>
	</font>
	<font face="arial" color="FFFFFF">
		<form action="dbmaint.php" method=post>
			<table>
			<tr>
				<td>
					Enter fortune text:<br>
					<textarea rows="4" cols="80" name="FortuneText"></textarea>
				</td>
			</tr><tr>
				<td align=right>
					<input type="submit" name="insert" value="Submit">
				</td>
			</tr>
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
