<?php
	// Turn on error reporting
	ini_set('display_errors', 'On');
	
	// Opens a connection to the database
	/*
    DEFINE ('DB_USER', 'kellandr-db');
    DEFINE ('DB_PASSWORD', '6n9dKqzI5XVx1ZeP');
    DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
    DEFINE ('DB_NAME', 'kellandr-db');
	*/
	DEFINE ('DB_USER', 'stauffen-db');
    DEFINE ('DB_PASSWORD', 'fSWPMi2rhiwh95n7');
    DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
    DEFINE ('DB_NAME', 'stauffen-db');
	
	
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
	//updated to also select userID for purpose of creating HTML follow button
	if(!($stmt = $mysqli->prepare("SELECT u.userID, u.l_name, s.name, s.city, s.state FROM tf_users u INNER JOIN
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
	//updated to also bind userID to the result
	if(!$stmt->bind_result($userID, $l_name, $school, $city, $state)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		echo "<tr>\n<td>\n" . $l_name . "\n</td>\n<td>\n" . $school . "\n</td>\n<td>\n" . $city . "\n</td>\n<td>\n" . $state . "\n</td>\n<td>\n";
		makeFollowButton($userID);
		echo "</td>\n</tr>\n";
	}
	$stmt->close();
	
	
	
	//makeFollowButton function creates an HTML button that adds a teacher to a user's follow list
	function makeFollowButton($id){ 
		echo "<form method='post' action='confirm.php'>\n";
		echo "<input type='hidden' name='id' value='" . $id . "'>";
		echo "<input type='submit' name='follow' value='Follow This Teacher'>\n";
		echo "</form>\n";
		
	}
	
?>

	</table>
</body>
</html>