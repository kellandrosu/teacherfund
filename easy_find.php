<?php
	// Turn on error reporting
	ini_set('display_errors', 'On');
	
	// Opens a connection to the database
    DEFINE ('DB_USER', 'kellandr-db');
    DEFINE ('DB_PASSWORD', '6n9dKqzI5XVx1ZeP');
    DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
    DEFINE ('DB_NAME', 'kellandr-db');
	/*
	DEFINE ('DB_USER', 'stauffen-db');
    DEFINE ('DB_PASSWORD', 'fSWPMi2rhiwh95n7');
    DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
    DEFINE ('DB_NAME', 'stauffen-db');
	*/
	
    // Connects or returns an error
    
    $mysqli = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' .
    mysqli_connect_error());
?>
	
<!DOCTYPE html>

  
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>

<body>
    <h1>Results</h1>

    <table>
        <tr>
            <th>Teacher</th>
            <th>School</th>
            <th>City</th>
            <th>State</th>
        </tr>
			
<?php
	
	if(!($stmt = $mysqli->prepare("SELECT u.l_name, s.name, s.city, s.state FROM tf_users u INNER JOIN
								tf_teaching t ON u.userID = t.teacherID INNER JOIN
								tf_schools s ON t.schoolID = s.schoolID
								WHERE u.l_name=? AND s.city=? AND s.state=?"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("sss",$_POST['l_name'],$_POST['city'],$_POST['state']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($l_name, $school, $city, $state)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
	 echo "<tr>\n<td>\n" . $l_name . "\n</td>\n<td>\n" . $school . "\n</td>\n<td>\n" . $city . "\n</td>\n<td>\n" . $state . "\n</td>\n</tr>";
	}
	$stmt->close();
	
?>

	</table>
</body>
</html>