<?php
	require_once('../mysqli_connect.php');
?>

<!-- HTML for save cc -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Save a Credit Card</title>
</head>

<body>
    <form method="post" action="submit_cc.php">
        <fieldset>
            <legend>Credit Card Information</legend><br>
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
			Card Type: <select name="type" value="choose one">
				<option>Choose One</option>
                <option name="visa">Visa</option>
                <option name="mastercard">Mastercard</option>
                <option name="amex">American Express</option>
                <option name="discover">Discover</option></select><br>
            Card Number: <input type="text" name="cardNum"><br>
            Exp Date: <input type="text" name="exp" value="mm/yy">
        </fieldset>
        <input type="submit" name="ccSubmit" value="submit">
    </form>
</body>

</html> 


