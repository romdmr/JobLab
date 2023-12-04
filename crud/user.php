<?php 
require("../db.php");

//read
$results = mysqli_query($conn, "SELECT * FROM user"); 

//delete
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM user WHERE id_user=$id");
    $_SESSION['message'] = "User deleted!"; 
    header('location: user.php');
}

$user_fullname = "";
$birthdate = "";
$email = "";
$tel = "";
$pwd_user = "";
$is_admin = "";

//create user
if (isset($_POST['save'])) {
    $user_fullname = $_POST['user_fullname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pwd_user = password_hash($_POST['pwd_user'],PASSWORD_DEFAULT);
    $is_admin = $_POST['is_admin'];

    mysqli_query($conn, "INSERT INTO user (user_fullname, birthdate, email, tel, pwd_user, is_admin) VALUES ('$user_fullname', '$birthdate', '$email', '$tel', '$pwd_user', '$is_admin')");
    $_SESSION['message'] = "User saved";
    header('location: user.php');
}

//update user 
$id = 0;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $user_fullname = $n['user_fullname'];
        $birthdate = $n['birthdate'];
        $email = $n['email'];
        $tel = $n['tel'];
        $pwd_user = $n['pwd_user'];
        $is_admin = $n['is_admin'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $user_fullname = $_POST['user_fullname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pwd_user = password_hash($_POST['pwd_user'],PASSWORD_DEFAULT);
    $is_admin = $_POST['is_admin'];

    mysqli_query($conn, "UPDATE user SET user_fullname='$user_fullname', birthdate='$birthdate', email='$email', tel='$tel', pwd_user='$pwd_user', is_admin='$is_admin' WHERE id_user=$id");
    $_SESSION['message'] = "User updated!"; 
    header('location: user.php');
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
            <li><a href="candidacy.php">candidacy</a></li>
            <li><a href="company.php">company</a></li>
            <li><a href="user.php">user</a></li>
        </ul>
    </header>
    <div style="margin-top: 20px;">
        <form method="post" action="user.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>user_fullname</label>
                <input type="text" name="user_fullname" value="<?php echo $user_fullname; ?>">
            </div>
            <div class="input-group">
                <label>birthdate</label>
                <input type="date" name="birthdate" value="<?php echo $birthdate; ?>">
            </div>
            <div class="input-group">
                <label>email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>tel</label>
                <input type="tel" name="tel" value="<?php echo $tel; ?>">
            </div>
            <div class="input-group">
                <label>pwd_user</label>
                <input type="password" name="pwd_user" value="<?php echo $pwd_user; ?>">
            </div>
            <div class="input-group">
                <label>is_admin</label>
                <input type="number" name="is_admin" value="<?php echo $is_admin; ?>">
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
                    id_user
                </th>
                <th>
                    user_fullname
                </th>
                <th>
                    birthdate
                </th>
                <th>
                    email
                </th>
                <th>
                    phone
                </th>
                <th>
                    pwd_user
                </th>
                <th>
                    is_admin
                </th>
                <th colspan="2">
                    
                </th>
            </tr>
        </thead>
        <tbody class="table-body">
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id_user']; ?></td>
                <td><?php echo $row['user_fullname']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['tel']; ?></td>
                <td><?php echo $row['pwd_user']; ?></td>
                <td><?php echo $row['is_admin']; ?></td>
                <td>
                    <a href="user.php?edit=<?php echo $row['id_user']; ?>" class="edit_btn" ><button>Edit</button></a>
                </td>
                <td>
                    <a href="user.php?del=<?php echo $row['id_user']; ?>" class="del_btn"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
</body>
</html>