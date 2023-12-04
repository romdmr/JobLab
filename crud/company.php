<?php 

require("../db.php");

//read
$results = mysqli_query($conn, "SELECT * FROM company");

//delete
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM company WHERE id_company =$id");
    $_SESSION['message'] = "Company deleted!"; 
    header('location: read_company.php');
}

//create

$company_name = "";
$company_address = "";
$email = "";
$tel = "";

if (isset($_POST['save'])) {
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    mysqli_query($conn, "INSERT INTO company (company_name, company_address, email, tel) VALUES ('$company_name', '$company_address', '$email', '$tel')");
    $_SESSION['message'] = "Company saved";
    header('location: company.php');
}

//update
$id = 0;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM company WHERE id_company=$id");
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $company_name = $n['company_name'];
        $company_address = $n['company_address'];
        $email = $n['email'];
        $tel = $n['tel'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    mysqli_query($conn, "UPDATE company SET company_name='$company_name', company_address='$company_address', email='$email', tel='$tel' WHERE id_company=$id");
    $_SESSION['message'] = "User updated!"; 
    header('location: company.php');
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../admin.css">
    <title>Company</title>
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
        <form method="post" action="company.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>company_name</label>
                <input type="text" name="company_name" value="<?php echo $company_name; ?>">
            </div>
            <div class="input-group">
                <label>company_address</label>
                <input type="text" name="company_address" value="<?php echo $company_address; ?>">
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
                    id_company
                </th>
                <th>
                    company_name
                </th>
                <th>
                    company_address
                </th>
                <th>
                    email
                </th>
                <th>
                    tel
                </th>
                <th colspan="2">
                    
                </th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['id_company']?></td>
                    <td><?php echo $row['company_name'] ?></td>
                    <td><?php echo $row['company_address'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['tel'] ?></td>
                    <td>
                        <a href="company.php?edit=<?php echo $row['id_company']; ?>" class="edit_btn" ><button>Edit</button></a>
                    </td>>
                    <td>
                        <a href="company.php?del=<?php echo $row['id_company']; ?>" class="del_btn"><button>Delete</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>