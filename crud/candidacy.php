<?php 
require("../db.php");

//read
$results = mysqli_query($conn, "SELECT * FROM candidacy"); 

//delete
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM candidacy WHERE id_candidacy=$id");
    $_SESSION['message'] = "Candidacy deleted!"; 
    header('location: candidacy.php');
}

$id_candidacy = "";
$id_adv = "";
$id_user = "";
$date_candidacy = "";
$mail_content = "";

//create user
if (isset($_POST['save'])) {
    $id_candidacy = $_POST['id_candidacy'];
    $id_adv = $_POST['id_adv'];
    $id_user = $_POST['id_user'];
    $date_candidacy = $_POST['date_candidacy'];
    $mail_content = $_POST['mail content'];

    mysqli_query($conn, "INSERT INTO candidacy (id_candidacy, id_adv, id_user, date_candidacy, mail_content) VALUES ('$id_candidacy', '$id_adv', '$id_user', '$date_candidacy', '$mail_content')");
    $_SESSION['message'] = "Candidacy saved";
    header('location: candidacy.php');
}

//update user 
$id = 0;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM candidacy WHERE id_candidacy=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $id_candidacy = $n['id_candidacy'];
        $id_adv = $n['id_adv'];
        $id_user = $n['id_user'];
        $date_candidacy = $n['date_candidacy'];
        $mail_content = $n['mail content'];
    }
}

if (isset($_POST['update'])) {
    $id_candidacy = $_POST['id_candidacy'];
    $id_adv = $_POST['id_adv'];
    $id_user = $_POST['id_user'];
    $date_candidacy = $_POST['date_candidacy'];
    $mail_content = $_POST['mail content'];

    mysqli_query($conn, "UPDATE candidacy SET id_candidacy='$id_candidacy', id_adv='$id_adv', id_user='$id_user', date_candidacy='$date_candidacy', mail_content='$mail_content' WHERE id_candidacy=$id");
    $_SESSION['message'] = "User updated!"; 
    header('location: candidacy.php');
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../admin.css">
    <title>User</title>
</head>
<body>
    <header class="header">
        <h1 class="title-admin">Admin Dashboard</h1>
        <h2 class="table-title">Tables</h2>
        <ul class="table-list">
            <li><a href="ad.php">advertisement</a></li>
            <li><a href="andidacy.php">candidacy</a></li>
            <li><a href="company.php">company</a></li>
            <li><a href="user.php">user</a></li>
        </ul>
    </header>
    <div style="margin-top: 20px;">
        <form method="post" action="user.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>id_adv</label>
                <input type="number" name="id_adv" value="<?php echo $id_adv; ?>">
            </div>
            <div class="input-group">
                <label>id_user</label>
                <input type="number" name="id_user" value="<?php echo $id_user; ?>">
            </div>
            <div class="input-group">
                <label>date_candidacy</label>
                <input type="date" name="date_candidacy" value="<?php echo $date_candidacy; ?>">
            </div>
            <div class="input-group">
                <label>mail_content</label>
                <input type="text" name="mail_content" value="<?php echo $mail_content; ?>">
            </div>
            <div class="input-group">
                <?php if ($id != 0): ?>
                    <button class="btn" type="submit" name="update" >Update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
            </div>
        </form>
    </div>
    <table>
        <thead class="table-head">
            <tr>
                <th>
                    id_candidacy
                </th>
                <th>
                    id_adv
                </th>
                <th>
                    id_user
                </th>
                <th>
                    date_candidacy
                </th>
                <th>
                    mail_content
                </th>
                <th colspan="2">
                    
                </th>
            </tr>
        </thead>
        <tbody class="table-body">
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id_candidacy']; ?></td>
                <td><?php echo $row['id_adv']; ?></td>
                <td><?php echo $row['id_user']; ?></td>
                <td><?php echo $row['date_candidacy']; ?></td>
                <td><?php echo $row['mail_content']; ?></td>
                <td>
                    <a href="candidacy.php?edit=<?php echo $row['id_candidacy']; ?>" class="edit_btn" ><button>Edit</button></a>
                </td>
                <td>
                    <a href="candidacy.php?del=<?php echo $row['id_candidacy']; ?>" class="del_btn"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
</body>
</html>