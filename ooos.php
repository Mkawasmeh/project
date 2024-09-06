<?php
global $name;
global $email;
global $password;
function validate($n){
    $n = trim($n);
    $n = stripslashes($n);
    $n = htmlspecialchars($n);
    return $n;
}    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    // Connect to database
    $server = "localhost";
    $user = "root";
    $pwd = "";
    $db = "db_3";

    $mycon = mysqli_connect($server, $user, $pwd, $db);

    if (!$mycon) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected to DB server <br>";

/*
    // Connect to database
    $server = "localhost";
    $user = "root";
    $pwd = "";
    $db = "db_3";

    $mycon = mysqli_connect($server, $user, $pwd, $db);

    if (!$mycon) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected to DB server <br>";
    $sql4 = "ALTER TABLE ingo ADD major varchar(30) NOT NULL";
	
    if (mysqli_query($mycon, $sql4)) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($mycon);
    }

mysqli_close($mycon);*/
?>