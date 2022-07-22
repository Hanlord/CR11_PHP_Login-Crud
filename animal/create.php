<?php
session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$animal = "";
$result = mysqli_query($connect, "SELECT * FROM animal");

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $animal .=
        "<option value='{$row['animalId']}'>{$row['sup_name']}</option>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add animal</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add animal</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="animal Name" /></td>
                </tr>
                <tr>
                    <th>location</th>
                    <td><input class='form-control' type="text" name="live_location" placeholder="location" step="any" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>size</th>
                    <td>
                        <select class="form-select" name="size" aria-label="Default select example">
                            <?php echo $animal; ?>
                            <option selected value='none'>none</option>
                            <option value='small'>small</option>
                            <option value='large'>large</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="description" step="any" /></td>
                </tr>
                <tr>
                    <th>Vaccinated</th>
                    <td>
                        <select class="form-select" name="vaccinated" aria-label="Default select example">
                            <?php echo $animal; ?>
                            <option selected value='none'>none</option>
                            <option value='true'>true</option>
                            <option value='false'>false</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="breed" step="any" /></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <?php echo $animal; ?>
                            <option selected value='none'>none</option>
                            <option value='adopted'>adopted</option>
                            <option value='available'>available</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert animal</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>