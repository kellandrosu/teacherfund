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

	
if(!($stmt = $mysqli->prepare("INSERT INTO tf_bank(userID, checkAcct, routNum) VALUES (?,?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("iii",$_POST['userID'],$_POST['checkAcct'],$_POST['routNum']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Bank account successfully added! Hooray!";
}
?>