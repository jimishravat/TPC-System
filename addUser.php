<?php
include("./database.php");
include("./helper/fileUpload.php");

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
    $insertQuery = $conn->query("INSERT INTO `student_placed`(`s_id`, `drive_applied`, `selected_in_drive`, `reject_drive`, `drive_selected`) VALUES ('$id_number','$help','$help','$help','0')");
    $updateQuery = $conn->query("UPDATE `department` SET `total_student` = `total_student`+1 WHERE `dept_id` = '$dept'");

    // if successfully inserted the value in the database then show the user details page with User ID
    if ($updateQuery) {
        if (isset($_SESSION["alreadyRegisteredId"])) {
            unset($_SESSION["alreadyRegisteredId"]);
        }
        // var_dump($updateQuery);
        $_SESSION["showUser"] = true;
        // var_dump($_SESSION);
        echo "<script> window.location.href = './showUserDetails.php?user_id=$id_number&user_type=0' </script>";
    }
}

if (isset($_POST["registerCompany"])) {
    $cName = mysqli_real_escape_string($conn, $_POST["cName"]);
    $cURL = mysqli_real_escape_string($conn, $_POST["cURL"]);
    $cLocation = mysqli_real_escape_string($conn, $_POST["cLocation"]);
    $hrName = mysqli_real_escape_string($conn, $_POST["hrName"]);
    $hrEmail = mysqli_real_escape_string($conn, $_POST["hrEmail"]);
    $hrMobile = mysqli_real_escape_string($conn, $_POST["hrMobile"]);
    $companyPassword = mysqli_real_escape_string($conn, $_POST["companyPassword"]);

    $cPassword = base64_encode(strrev(md5($companyPassword)));

    $targetLoc = '../uploads/logo/';

    $cLogo = singleFile($_FILES["cLogo"]["name"], $_FILES["cLogo"]["tmp_name"], $targetLoc);

    $insertQuery = $conn->query("INSERT INTO `company`(`company_name`, `password`, `HR_name`, `HR_email`, `HR_mobile`, `company_url`, `company_location`, `company_logo`) VALUES ('$cName','$cPassword','$hrName','$hrEmail','$hrMobile','$cURL','$cLocation','$cLogo')");
    if ($insertQuery) {

        $_SESSION["showUser"] = true;
        echo "<script> window.location.href = './showUserDetails.php?user_id=$hrEmail&user_type=1'; </script>";
    }
}
