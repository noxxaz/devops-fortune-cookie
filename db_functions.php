<?php
function createTable()
{
//verify that mysqli has been enabled
    if (function_exists('mysqli_connect') == false) {
        echo "Need to enable mysqli!" ;
        error_log("mysqli not enabled!", 0);
        return;
    }

//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

//create the FortuneCookie table (if it doesn't already exist)

	$sql =  "CREATE TABLE IF NOT EXISTS Fortunes (";
	$sql .= "	ID INT AUTO_INCREMENT PRIMARY KEY,";
	$sql .= "	FortuneText	VARCHAR(255))";

  	  if (mysqli_query($mysql, $sql)) {
  	  	echo "Table created successfully or already exists...";
        return;
  	  } else {
  	  	echo "Error creating table: " . mysqli_error($mysql);
        error_log("Error creating table: " . mysqli_error( $mysql));
  	    return;
  	  }

	mysqli_close($mysql);
}  	


function insertRow($fortune)
{
//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

    if (empty($anArray)){       
//TODO: need to scrub special chars 
		$sql = "INSERT INTO Fortunes (FortuneText) VALUES ('" .  $fortune . "')";
		        
        if (mysqli_query($mysql, $sql)) {
            echo "INSERT successful.";
        } else {
            echo "Error inserting value: " . mysqli_error( $mysql);
            error_log("Error inserting value: " . mysqli_error( $mysql));
        }
    }
    
	mysqli_close($mysql);
}


function updateRow($id, $fortune)
{
//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

    if (empty($anArray)){       
//TODO: need to scrub special chars 
		$sql = "UPDATE Fortunes SET FortuneText='" . $fortune . "' WHERE ID=" . $id;
		        
        if (mysqli_query($mysql, $sql)) {
            echo "UPDATE successful.";
        } else {
            echo "Error updating value: " . mysqli_error( $mysql);
            error_log("Error updating value: " . mysqli_error( $mysql));
        }
    }
	mysqli_close($mysql);
}


function deleteRow($id)
{
//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

    if (empty($anArray)){       
		$sql = "DELETE FROM Fortunes WHERE ID=" . $id;
		        
        if (mysqli_query($mysql, $sql)) {
            echo "DELETE successful.";
        } else {
            echo "Error deleting row: " . mysqli_error( $mysql);
            error_log("Error deleting row: " . mysqli_error( $mysql));
        }
    }
	mysqli_close($mysql);

}


function displayData()
{
//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

$sql="SELECT * FROM Fortunes";

if ($result=mysqli_query($mysql,$sql))
  {
  // Fetch one and one row
  $textResults = "<tr><td><b>ID</b></td><td><b>FortuneText</b> - Click to edit row</td></tr>\n";
   
  while ($row=mysqli_fetch_row($result))
    {
    $textResults .= "<tr><td>" . $row[0] ."</td><td><a href=updaterow.php?id=" . $row[0] . ">" . $row[1] . "</a></td></tr>\n";
    }
  // Free result set
  mysqli_free_result($result);

	return $textResults;
  } else {
  return "No data";
  }
	mysqli_close($mysql);
}


function getFortune($id)
{

//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

$sql="SELECT FortuneText FROM Fortunes WHERE ID=" . $id;

if ($result=mysqli_query($mysql,$sql)) {
	$row=mysqli_fetch_row($result);
    $textFortune = $row[0];

// Free result set
	mysqli_free_result($result);

	return $textFortune;

	} else {
	return "Unable to Read Fortune";
	}
	mysqli_close($mysql);
}


function displayFortune()
{
//get connection info from environment variables
        $json = getenv('VCAP_SERVICES');
        $obj = json_decode($json);
        $cleardb = $obj-> cleardb;
        $credentials = $cleardb[ 0]->credentials;
        $hostname = $credentials-> hostname;
        $username = $credentials-> username;
        $password = $credentials-> password;
        $dbname = $credentials-> name;

//connect to the database
    $mysql = mysqli_connect($hostname, $username, $password, $dbname );
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        error_log("Failed to connect to MySQL: " . mysqli_connect_error());
        return;
    }

	$sql="SELECT * FROM Fortunes ORDER BY RAND() LIMIT 1";

	if ($result=mysqli_query($mysql,$sql)) {
		$row=mysqli_fetch_row($result);
    	$textFortune = "<tr><td>" . $row[1] ."</td></tr>\n";

// Free result set
		mysqli_free_result($result);
		
		return $textFortune;
	} else {
		return "Your cookie was empty";
	}
	mysqli_close($mysql);
}


?>