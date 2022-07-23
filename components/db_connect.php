<?php

$localhost = "173.212.235.205";
$username = "wehancodefactory_root";
$password = "Fm&7FQYWO].k";
$dbname = "wehancodefactory_petadopt";

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
// } else {
//     echo "Successfully Connected";
}