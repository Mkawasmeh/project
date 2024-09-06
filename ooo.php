<?php

    $hours = $_POST['hours'];
    $major = $_POST['major'];
include("ooos.php");
	///////////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($hours) and !empty($major)){
    $sql4 = "UPDATE ingo SET number_of_hours='$hours' WHERE Name='$name' ";
	$sql5="UPDATE ingo SET major ='$major' WHERE Name='$name'";
	mysqli_query($mycon, $sql5);
    if (mysqli_query($mycon, $sql4)) {
       // echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($mycon);
    }

}
    // Validate major
    $allowed_majors = array("CS", "BIT", "CIS");
    if (!in_array($major, $allowed_majors)) {
        echo "Invalid major";
        exit;
    }

    // Calculate hours
    switch ($major) {
        case "CS":
            $w = (45 * $hours);
            break;
        case "BIT":
            $w = (40 * $hours);
            break;
        case "CIS":
            $w = (42 * $hours);
            break;
    }
    echo "<br>The amount to be paid to the Finance Ministry is : ".$w."<br><br>";
$q="SELECT * FROM ingo";
$rslt=mysqli_query($mycon,$q);
if (mysqli_num_rows($rslt)>0){
	echo "The records in DB <br>";
	while($output=mysqli_fetch_assoc($rslt)){
		echo "<br><br>";
		print_r($output);
		
	}
}
mysqli_close($mycon)	
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

     Check login
    if (isset($_POST['submit'])) {
        $sql2 = "SELECT * FROM ingo WHERE Name='$name' AND password='$password'";
        $result = mysqli_query($mycon, $sql2);

        if ($result) {
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                header("Location: payment.php");
                exit;
            } else {
                echo '<script>
                    window.location.href = "signin.php";
                    alert("Login failed. Invalid username or password");
                </script>';
                exit;
            }
        } else {
            echo "Error: " . mysqli_error($mycon);
            exit;
        }
    }

*/
?>