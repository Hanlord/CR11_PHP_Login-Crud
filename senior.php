<?php
session_start();


// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

require_once 'components/db_connect.php';
$sql = "SELECT * FROM animal WHERE status = 'available'";
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$result = mysqli_query($connect, $sql);
if (isset($_GET["submit2"])) {
    htmlentities($_GET['submit2']);
    $age_id = $_GET["submit2"];
    $sql3 = "SELECT `animal`.*, `animal`.`age` FROM `animal` WHERE `animal`.`age` NOT BETWEEN 0 and 7;";
    $res2 = mysqli_query($connect, "SELECT * FROM animal WHERE id=" . $_SESSION['user']);
    $rowb = mysqli_fetch_array($res2, MYSQLI_ASSOC);
    $result4 = mysqli_query($connect, $sql3);
    $tbody2 = '';
    if (mysqli_num_rows($result4)  > 0) {
        while ($rowb = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
            $tbody2 .= "
          <div class='container mt-2 col-lg-4 rows-col-md-2 rows-col-sm-1 d-flex justify-content-center animate__animated animate__fadeInLeft'>
          <div class='card' style='width: 18rem;'>
    <img src='pictures/" . $rowb['picture'] . "' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>" . $rowb['name'] . "</h5>
      <p> " . $rowb['live_location'] . "</p>
      <p> " . $rowb['age'] . "</p>
      <p> " . $rowb['status'] . "</p>
      <form method='POST'>
      <input class='btn btn-success' type='submit' name='submit' value='take me Home'>
      </form>
    </div>
    </div>
        </div>";
        };
    } else {
        $tbody2 =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
    }
}
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <?php require_once 'components/navbar.php' ?>
    <br>
    <div class="container">
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
            <p class="text-white">Hi <?php echo $row['first_name'] . " " . $row['email']; ?></p>
        </div>
        <a href="logout.php?logout" class="btn btn-danger">Sign Out</a>
        <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-warning">Update your profile</a>
    </div>
    <br>
    <div class="container">
        <br>
        <div class="row rows-col-lg-4 rows-col-md-2 rows-col-sm-1 animate__animated animate__fadeInLeft">
            <?= $tbody2 ?>
        </div>
    </div>
    <?php require_once 'components/footer.php' ?>
</body>

</html>