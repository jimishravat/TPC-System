<?php

include("../database.php");

session_start();

// Check is the admin has login or not
if (isset($_SESSION["admin"])) {

    if ($_SESSION["admin"] == "TPF" || $_SESSION["admin"] == "TPC") {
        $adminUser = $_SESSION["adminUserName"];
    } else {
        $adminUser = $_SESSION["admin"];
    }
    // Get the access token and the name of the admin
    $access = $_SESSION["access"];
}
else{
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

// $password = base64_encode(strrev(md5("Admin@123")));
// var_dump($password);
// var_dump($adminUser);
// var_dump($access);
