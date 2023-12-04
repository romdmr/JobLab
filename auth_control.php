<?php

require('db.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query_authentication = "
        SELECT *
        FROM user
        WHERE email = '$email'
        AND pwd_user = '$password';
        ";

        $authentication = mysqli_query($conn, $query_authentication);

        $user = mysqli_fetch_array($authentication);

        if (mysqli_num_rows($authentication) > 0) {
            if ($user['is_admin'] == 1) {
                header('Location:monitor.php');
            } else {
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_fullname'] = $user['user_fullname'];
                $_SESSION['phone'] = $user['phone'];
                header('location:home.php');
            }
        } else {
            echo "Email / password incorrect. Please try again.";
        }
    }
}

?>