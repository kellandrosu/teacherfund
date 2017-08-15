<?php
	require_once('../mysqli_connect.php');


if(!($stmt = $dbc->prepare("INSERT INTO tf_ccard(userID, cardNum, exp, type) VALUES (?,?,?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("iiss",$_POST['userID'],$_POST['cardNum'],$_POST['exp'],$_POST['type']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Credit card successfully added! Hooray!";
}
?>