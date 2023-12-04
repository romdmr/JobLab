<?php
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

include("db.php");

$fullname = $_POST['fullname'];
$birthdate = $_POST['birthdate'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query_registration = "
INSERT INTO user (user_fullname, birthdate, tel, email, pwd_user) 
VALUES ('$fullname', '$birthdate', '$phone', '$email', '$password')
";

$registration = mysqli_query($conn, $query_registration);

if (!$registration) {
    die("Query failed : " . mysqli_error($conn));
} else {
    header('Location:auth.php');
}
}
mysqli_close($conn);
?>