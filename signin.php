<?php
include("ooos.php");
if(!empty($name) and !empty($email) and !empty($password)){
    $sql4 = "INSERT INTO ingo (Email, Name, password) VALUES ('$email', '$name', '$password')";
	
    if (mysqli_query($mycon, $sql4)) {
        //echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($mycon);
    }

mysqli_close($mycon);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Supply - Sign In</title>
</head>
<body>
    <main>
        <section class="signin-container" style="
            width: 400px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        ">
            <h2>Welcome Back!</h2>
            <form action="qq.php" onsubmit="return isvalid()" method="post" id="signin-form" style="
                display: flex;
                flex-direction: column;
                width: 100%;
            ">
                <label for="name">Name:</label>
                <input type="text" name="name" id="text" required autofocus>
                <br>			
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required autofocus>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <br>
                <button type="submit">Sign In</button>
            </form>
			<script>
			function isvalid(){
			var name= document.signin-form.name.value;
			var password= document.signin-form.password.value;
			if(name.length=="" && password.length==""){
			alert("Username and password field is empty!!!");
			return false
			}
			else{
			
			if(name.length==""){
			
			alert("Username is empty!!!");
			
			return false
			
			}
			
			if(password.length==""){
			
			alert("password is empty!!!");
			
			return false;}}
			</script>
            <p>Don't have an account? <a href="signup.php">Create One</a></p>
        </section>
    </main>
</body>
</html>
