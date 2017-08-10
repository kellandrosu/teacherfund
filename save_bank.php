<?php
    // Turn on error reporting
	ini_set('display_errors', 'On');
	
	// Opens a connection to the database
	
    DEFINE ('DB_USER', 'kellandr-db');
    DEFINE ('DB_PASSWORD', '6n9dKqzI5XVx1ZeP');
    DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
    DEFINE ('DB_NAME', 'kellandr-db');
	

    // Connects or returns an error
    $mysqli = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' .
    mysqli_connect_error());
?>

<!-- HTML for save bank -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Save Bank</title>
</head>

<body>
    <form method="post" action="submit_bank.php">
        <fieldset>
            <legend>Bank Information</legend><br>
			USER ID (TEMPORARY):<select name="userID">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT userID FROM tf_users"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($id)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $id . ' "> ' . $id . '</option>\n';
					}
					$stmt->close();
					?>
				</select><br>
			Account Number: <input type="text" name="checkAcct"><br>
            Routing Number: <input type="text" name="routNum"><br> 
        </fieldset>
        <input type="submit" name="bankSubmit" value="submit">
    </form>
</body>

</html> 





