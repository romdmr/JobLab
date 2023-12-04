<?php 
$servername = "localhost";
$username="root";
$password = "";
$databasename = "job_board_db";

// Create connection

$conn = new mysqli($servername, $username, $password, $databasename);

//Get connection errors
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
?>