<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require("db.php");

$job = [];

if(isset($_GET['job_id'])) {
    $job_id = intval($_GET['job_id']);
    $query = "SELECT * FROM advertisement WHERE id_adv=$job_id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die(mysqli_error($conn));
    }
    $job = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION["id_user"])) {
        $id_adv = mysqli_real_escape_string($conn, $_POST["job_id"]);
        $id_user = mysqli_real_escape_string($conn, $_SESSION["id_user"]);
        $date_candidacy = mysqli_real_escape_string($conn, $_POST["date"]);
        $mail_content = mysqli_real_escape_string($conn, $_POST["text"]);

        $query = "INSERT INTO candidacy (id_adv, id_user, date_candidacy, mail_content) VALUES ('$id_adv', '$id_user', '$date_candidacy', '$mail_content')";
        mysqli_query($conn, $query);

        header("Location: thanks.php");
        exit();
    } else {
        echo "Please <a href='auth.php'>login</a> to apply.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Apply To</title>
</head>

<body>
    <h1>Want to Apply to this job ?</h1>
    <h2>The Job :</h2>
    <?php if($job): ?>
        <p><?php echo htmlspecialchars($job['title']); ?></p>
        <p><?php echo htmlspecialchars($job['description']); ?></p>
        <p><?php echo htmlspecialchars($job['wage']); ?></p>
        <p><?php echo htmlspecialchars($job['place']); ?></p>
    <?php else: ?>
        <p>Job not found.</p>
    <?php endif; ?>

    <h2>Your informations :</h2>
    <form action="apply.php?job_id=<?php echo $job_id; ?>" method="post">
        <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
        <label>Date :</label>
        <input type="date" name="date">
        <label>Message :</label>
        <input type="text" name="text">
        <button type="submit">Submit</button>
    </form>

</body>
</html>