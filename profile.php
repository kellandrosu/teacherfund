
<?php
		require_once('../mysqli_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>

<body>
<?php
		if(isset($_POST['email'])) $email=$_POST['email'];
	
		if(!($stmt = $dbc->prepare("SELECT userID FROM tf_login WHERE email='$email'"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}

		if(!$stmt->execute()){
			echo "Execute failed: "  . $dbc->connect_errno . " " . $dbc->connect_error;
		}
		if(!$stmt->bind_result($id)){
			echo "Bind failed: "  . $dbc->connect_errno . " " . $dbc->connect_error;
		}
	
		echo"ID: $id";
	
		if(!($stmt = $dbc->prepare("SELECT f_name, l_name FROM tf_users WHERE userID=$id"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}

		if(!$stmt->execute()){
			echo "Execute failed: "  . $dbc->connect_errno . " " . $dbc->connect_error;
		}
		
		if(!$stmt->bind_result($f_name, $l_name)){
			echo "Bind failed: "  . $dbc->connect_errno . " " . $dbc->connect_error;
		}


		echo "<h1>Welcome $f_name $l_name!</h1>";
?>
</body>

</html> 
