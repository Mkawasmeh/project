<?php
include("ooos.php");
	echo isset($_POST['submit']);
    // Check login
    if (!empty($name) and !empty($email) and !empty($password)) {
	//echo "oooooooooooo";
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);	
    $password = validate($_POST['password']);	
    $sql2 = "SELECT * FROM ingo WHERE Name='$name' and password='$password'";
	$result = mysqli_query($mycon, $sql2);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	if ($count >= 1) {
		header("Location: main.php");
		exit;
	} else {
		echo '<script>
			window.location.href = "signin.php";
			alert("Login failed. Invalid username or password");
		</script>';
		exit;
	}
} else {
	echo "Error: ".mysqli_error($mycon);
	exit;
}
    

?>