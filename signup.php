<html>
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
<h2>Create Your Account</h2>
<form action="signin.php" method="post" id="signup-form" style="
                display: flex;
                flex-direction: column;
                width: 100%;
            ">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Sign Up</button>
</form>
</section>
</main>
</body>
</html>