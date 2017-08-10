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
	
	// remember id from button click
	//$teacherID = $_POST['id'];
	
?>


<!DOCTYPE html>

  
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirm</title>
</head>

<body>
	<h3>Please enter email to confirm</h3>
	<form method="post" action="follow.php">
		Email:<input type="text" name="email">
		<input type="hidden" name="teacherID" value="<?php echo $_POST['id']; ?>">
		<input type="submit">
	</form>


</body>
</html>
