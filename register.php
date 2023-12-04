<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <form class="register-form" action="register_in_db.php" method="POST">
                <label for="fullname">Full Name</label><br>
                <input type="text" name="fullname" placeholder="Enter your full name" required><br>
                <label for ="birthdate">Birth Date</label><br>
                <input type="date" name="birthdate" placeholder="Enter your birthdate" required><br>
                <label for ="tel">Phone</label><br>
                <input type="tel" name="phone" placeholder="Enter your phone number" required><br>
                <label for ="email">Email</label><br>
                <input type="email" name="email" placeholder="Enter your email" required><br>
                <label for ="password">Password</label><br>
                <input type="password" name="password" placeholder="********" required><br>
                <button type="submit">Register</button>
                <p>
                    Already a member ? <a href="auth.php">Login</a>
                </p>
            </form>
        </div>
    </div>        
</body>
</html>