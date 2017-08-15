<?php
		require_once('../mysqli_connect.php');
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
					if(!($stmt = $dbc->prepare("SELECT userID FROM tf_users"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $dbc->connect_errno . " " . $dbc->connect_error;
					}
					if(!$stmt->bind_result($id)){
						echo "Bind failed: "  . $dbc->connect_errno . " " . $dbc->connect_error;
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





