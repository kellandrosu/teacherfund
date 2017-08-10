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

	
// query to find user id

if(!($stmt = $mysqli->prepare("SELECT userID FROM tf_login WHERE email=?"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['email']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($userID)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
//assign user ID to $donorID for future use
while($stmt->fetch()){
	$donorID = $userID;
}
$stmt->close();

// query to insert into relationship table
$four = 4;
$three = 3;
if(!($stmt = $mysqli->prepare("INSERT INTO tf_following(donorID, teacherID) VALUES (?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ii",$donorID,$_POST['teacherID']))){
	//$donorID,$_POST['teacherID']
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	//query to find teacher name
	echo "teacher followed";
}
?>