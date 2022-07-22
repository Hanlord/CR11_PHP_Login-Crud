<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animal WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $picture = $data['picture'];
        $location = $data['live_location'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        $breed = $data['breed'];
        $status = $data['status'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Animal</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $name ?>" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class="form-control" type="text" name="live_location" step="any" placeholder="location" value="<?php echo $location ?>" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class="form-control" type="text" name="description" step="any" placeholder="description" value="<?php echo $description ?>" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>
                        <select class="form-select" name="size" aria-label="Default select example">
                            <?php echo $size ?>
                            <option value='small'>small</option>
                            <option value='large'>large</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class="form-control" type="number" name="age" step="any" placeholder="age" value="<?php echo $age ?>" /></td>
                <tr>
                <tr>
                    <th>Vaccine</th>
                    <td>
                        <select class="form-select" name="vaccinated" aria-label="Default select example">
                            <?php echo $vaccinated ?>
                            <option value='true'>true</option>
                            <option value='false'>false</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class="form-control" type="text" name="breed" step="any" placeholder="breed" value="<?php echo $breed ?>" /></td>
                </tr>
                <tr>
                    <th>status</th>
                    <td>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <?php echo $status ?>
                            <option value='adopted'>adopted</option>
                            <option value='available'>available</option>
                        </select>
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>