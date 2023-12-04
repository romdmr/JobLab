<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Authentication</title>
</head>
<body>
    <div class="auth">
        <div class="loginbox">
            <h1>Login</h1>
            <form class="login-form" action="auth_control.php" method="POST">
                <input type="email" class="form-fields" name="email" placeholder="Enter your email address" autocomplete="off"><br>
                <input type="password" class="form-fields" name="password" placeholder="Enter your password" autocomplete="off"><br>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <a href="home.php">Continue as visitor</a>
        </div>
    </div>    
</body>
</html>