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


// Check if the student has logged in or not

else if (isset($_SESSION["studentUserId"])) {
    // check for the approval
    $studentAccess = 0;
    $id = $_SESSION["studentUserId"];
    $checkApproval = $conn->query("SELECT * FROM student WHERE s_id='$id'");
    $checkApprovalValue = $checkApproval->fetch_assoc();
    $_SESSION["is_d2d"] = $checkApprovalValue["is_d2d"];
    if ($checkApprovalValue["is_approved"] == 1) {
        // var_dump("hgelo");
        $studentAccess = 1;
    }
} else {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}
