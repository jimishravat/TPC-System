<?php
include("./database.php");

// Session
session_start();

// Taking the values from the form 
if (isset($_POST["registerStudent"])) {
    // Values from the Register Form
    $is_d2d = $_POST["typeStudent"] == 1 ? 0 : 1;
    $id_number = strtolower(mysqli_real_escape_string($conn, $_POST["id"]));
    $email = strtolower(mysqli_real_escape_string($conn, $_POST["email"]));
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $dept = mysqli_real_escape_string($conn, $_POST["department"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $gender = strtolower(mysqli_real_escape_string($conn, $_POST["gender"]));

    $academic_year = intval('20' . $id_number[0] . $id_number[1]);
    // Encrypting the password with MD5 and base64_encode
    $password = base64_encode(strrev(md5($password)));

    // check for the student id is already registered in the system or not
    $checkIdInDB = $conn->query("SELECT s_id FROM student WHERE s_id = '$id_number'");

    if ($checkIdInDB->num_rows > 0) {
        $_SESSION["alreadyRegisteredId"] = $id_number;
        echo "<script> window.location.href = './signup.php'; </script>";
    }

    // INSERT query
    $help = array();
    $help = json_encode($help);
    $insertQuery = $conn->query("INSERT INTO `student`(`s_id`, `s_fname`,`s_lname`,  `s_email`, `s_mobile`, `s_dept`, `s_gender`, `s_password`,   `s_academic_year`, `is_d2d`) VALUES ('$id_number','$fname','$lname','$email','$mobile','$dept','$gender','$password','$academic_year','$is_d2d')");
    $insertQuery = $conn->query("INSERT INTO `student_academic`(`s_id`) VALUES ('$id_number')");
    $insertQuery = $conn->query("INSERT INTO `student_document`(`s_id`) VALUES ('$id_number')");
    $insertQuery = $conn->query("INSERT INTO `student_placed`(`s_id`, `drive_applied`, `drive_selected`) VALUES ('$id_number','$help','0')");

    // if successfully inserted the value in the database then show the user details page with User ID
    if ($insertQuery) {
        if (isset($_SESSION["alreadyRegisteredId"])) {
            unset($_SESSION["alreadyRegisteredId"]);
        }
        $_SESSION["showUser"] = true;
        echo "<script> window.location.href = './showUserDetails.php?user_id=$id_number'; </script>";
    }
}
