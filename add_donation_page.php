<html>
<head>
<title>Add Student</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['type'])){

        // Adds name to array
        $data_missing[] = 'type';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['type']);

    }

    if(empty($_POST['goal'])){

        // Adds name to array
        $data_missing[] = 'goal';

    } else{

        // Trim white space from the name and store the name
        $l_name = trim($_POST['goal']);

    }

    if(empty($_POST['description'])){

        // Adds name to array
        $data_missing[] = 'description';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['description']);

    }
    
    if(empty($data_missing)){
        
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO tf_fund_request (type, goal, description) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        i Integers
        d Doubles
        b Blobs
        s Everything Else
        
        mysqli_stmt_bind_param($stmt, "sis", $type,
                               $goal, $description);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Donation Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>

<form action="add_donation.php" method="post">
    
    <b>Add a Donation Post Request</b>
    
<p>Type:
<input type="text" name="type" size="30" value="" />
</p>

<p>Goal:
<input type="text" name="goal" size="30" value="" />
</p>

<p>Description:
<input type="text" name="description" size="30" value="" />
</p>
<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>
