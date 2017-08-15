<?php
	require_once('../mysqli_connect.php');
	
if(!($stmt = $dbc->prepare("INSERT INTO tf_bank(userID, checkAcct, routNum) VALUES (?,?,?)"))){
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