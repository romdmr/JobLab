<?php 
require("../db.php");

//read
$results = mysqli_query($conn, "SELECT * FROM advertisement"); 

//delete
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM advertisement WHERE id_advertisement=$id");
    $_SESSION['message'] = "Advertisement deleted!"; 
    header('location: ad.php');
}

$title = "";
$description = "";
$post_date = "";
$wage = "";
$place = "";
$contract_type = "";
$id_company="";

//create user
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $post_date = $_POST['post_date'];
    $wage = $_POST['wage'];
    $place = $_POST['place'];
    $contract_type = $_POST['contract_type'];
    $id_company=$_POST['id_company'];

    mysqli_query($conn, "INSERT INTO advertisement (title, description, post_date, wage, place, contract_type, id_company) VALUES ('$title', '$description', '$post_date', '$wage', '$place', '$contract_type', '$id_company')");
    $_SESSION['message'] = "Advertisement saved";
    header('location: ad.php');
}

//update user 
$id = 0;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM advertisement WHERE id_adv=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $title = $n['title'];
        $description = $n['description'];
        $post_date = $n['post_date'];
        $wage = $n['wage'];
        $place = $n['place'];
        $contract_type = $n['contract_type'];
        $id_company=$n['id_company'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $post_date = $_POST['post_date'];
    $wage = $_POST['wage'];
    $place = $_POST['place'];
    $contract_type = $_POST['contract_type'];
    $id_company=$_POST['id_company'];

    mysqli_query($conn, "UPDATE advertisement SET title='$title', description='$description', post_date='$post_date', wage='$wage', place='$place', contract_type='$contract_type', id_company='$id_company' WHERE id_adv=$id");
    $_SESSION['message'] = "Advertisement updated!"; 
    header('location: ad.php');
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
                <label>title</label>
                <input type="text" name="title" value="<?php echo $title; ?>">
            </div>
            <div class="input-group">
                <label>description</label>
                <input type="text" name="description" value="<?php echo $description; ?>">
            </div>
            <div class="input-group">
                <label>post_date</label>
                <input type="date" name="post_date" value="<?php echo $post_date; ?>">
            </div>
            <div class="input-group">
                <label>wage</label>
                <input type="number" name="wage" value="<?php echo $wage; ?>">
            </div>
            <div class="input-group">
                <label>place</label>
                <input type="text" name="place" value="<?php echo $place; ?>">
            </div>
            <div class="input-group">
                <label>contract_type</label>
                <select name="contract_type">
                    <option value="<?php echo $contract_type; ?>"><?php echo $contract_type; ?></option>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Stage">Stage</option>
                    <option value="Alternant">Alternant</option>
                    <option value="Interim">Interim</option>
                </select>
            </div>
            <div class="input-group">
                <label>id_company</label>
                <input type="number" name="id_company" value="<?php echo $id_company; ?>">
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
                    id_adv
                </th>
                <th>
                    title
                </th>
                <th>
                    description
                </th>
                <th>
                    post_date
                </th>
                <th>
                    wage
                </th>
                <th>
                    place
                </th>
                <th>
                    contract_type
                </th>
                <th>
                    id_company
                </th>
                <th colspan="2">
                    
                </th>
            </tr>
        </thead>
        <tbody class="table-body">
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id_adv']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['post_date']; ?></td>
                <td><?php echo $row['wage']; ?></td>
                <td><?php echo $row['place']; ?></td>
                <td><?php echo $row['contract_type']; ?></td>
                <td><?php echo $row['id_company']; ?></td>
                <td>
                    <a href="ad.php?edit=<?php echo $row['id_adv']; ?>" class="edit_btn" ><button>Edit</button></a>
                </td>
                <td>
                    <a href="ad.php?del=<?php echo $row['id_adv']; ?>" class="del_btn"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
</body>
</html>