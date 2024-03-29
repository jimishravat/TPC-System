<?php

include("./database.php");

session_start();
// TODO:
// Initialize the session and do accordingly in the below conditions


// if the user hits the login button in the login.php
if (isset($_POST["login"])) {

    // take the data from the login form
    $typeOfUser = $_POST["typeOfUser"];

    // if the user is admin then check for the type of admin 
    if ($typeOfUser == 3) {
        $typeOfUser = $_POST["typeOfAdmin"];
    }

    // take the username as the input
    $username = mysqli_real_escape_string($conn, strtolower($_POST["username"]));
    // for password convert the input passsword into base64_encode
    $password = base64_encode(strrev(md5(mysqli_real_escape_string($conn, $_POST["password"]))));

    // Flow of data 
    // 1) check for the user in the respective table
    // 2) if the user credentials matches 
    // 2.1) intialize the session variables according to the user 
    // 2.2) redirect to the respective dashboard according to the user
    // 3) else show the error and stay on the login page

    // if the user is student then search in the student table for the credentials
    if ($typeOfUser == 1) {
        $checkQuery = $conn->query("SELECT * FROM student WHERE s_id = '$username' AND s_password = '$password' ");
        if ($checkQuery->num_rows == 1) {
            $row = $checkQuery->fetch_assoc();
            $_SESSION["studentUserId"] = $username;
            $_SESSION["studentEmail"] = $row["s_email"];
            $_SESSION["studentDept"] = $row["s_dept"];
            $_SESSION["isApproved"] = $row["is_approved"];
            $_SESSION["is_d2d"] = $row["is_d2d"];  
            echo "<script> window.location.href = './student/index.php'; </script>";
        } else {
            echo "<script> alert('Check Username or Password'); </script>";
            echo "<script> window.location.href = './login.php'; </script>";
        }
    }

    // if the user is company then search in the company table for the credentials
    if ($typeOfUser == 2) {
        $checkQuery = $conn->query("SELECT * FROM company WHERE HR_email = '$username' AND password = '$password' ");
        if ($checkQuery->num_rows == 1) {
            $row = $checkQuery->fetch_assoc();
            $_SESSION["companyId"] = $row["company_id"];
            $_SESSION["companyUserId"] = $row["company_name"];
            $_SESSION["cURL"] = $row["company_url"];
            $_SESSION["HR_name"] = $row["HR_name"];
            $_SESSION["HR_email"] = $row["HR_email"];
            $_SESSION["HR_mobile"] = $row["HR_mobile"];
            echo "<script> window.location.href = './company/index.php'; </script>";
        } else {
            echo "<script> alert('Check Username or Password'); </script>";
            echo "<script> window.location.href = './login.php'; </script>";
        }
    }

    // if the user is TPO
    if ($typeOfUser == 4) {
        $checkQuery = $conn->query("SELECT * FROM tpo WHERE tpo_email = '$username' and tpo_password = '$password'");
        if ($checkQuery->num_rows == 1) {
            $row = $checkQuery->fetch_assoc();
            $_SESSION["admin"] = "TPO";
            $_SESSION["access"] = 1;
            $_SESSION["adminId"] = $row["tpo_id"];
            $_SESSION["adminEmail"] = $row["tpo_email"];
            echo "<script> window.location.href = './admin/index.php'; </script>";
        } else {
            echo "<script> alert('Check Username or Password'); </script>";
            echo "<script> window.location.href = './login.php'; </script>";
        }
    }

    // if the user is TPF
    if ($typeOfUser == 5) {
        $checkQuery = $conn->query("SELECT * FROM tpf WHERE tpf_email = '$username' and tpf_password = '$password'");
        if ($checkQuery->num_rows == 1) {
            $row = $checkQuery->fetch_assoc();
            if ($row["is_active"] == 1) {

                $_SESSION["admin"] = "TPF";
                $_SESSION["adminUserName"] = $row["tpf_fname"] . ' ' . $row["tpf_lname"];
                $_SESSION["access"] = 2;
                $_SESSION["adminDept"] = $row["tpf_department"];
                $_SESSION["adminId"] = $row["tpf_id"];
                $_SESSION["adminEmail"] = $row["tpf_email"];

                // var_dump($row["tpf_id"]);
                echo "<script> window.location.href = './admin/index.php'; </script>";
            } else {

                echo "<script> alert('You are Not Authorized. Please Contact placement@bvm.com'); </script>";
                echo "<script> window.location.href = './login.php'; </script>";
            }
        } else {
            echo "<script> alert('Check Username or Password'); </script>";
            echo "<script> window.location.href = './login.php'; </script>";
        }
    }

    // if the user is TPC
    if ($typeOfUser == 6) {
        $checkQuery = $conn->query("SELECT * FROM tpc WHERE tpc_email = '$username' and tpc_password = '$password'");
        if ($checkQuery->num_rows == 1) {
            $row = $checkQuery->fetch_assoc();
            if ($row["is_active"] == 1) {

                $_SESSION["admin"] = "TPC";
                $_SESSION["adminUserName"] = $row["tpc_fname"] . ' ' . $row["tpc_lname"];
                $_SESSION["access"] = 3;
                $_SESSION["adminDept"] = $row["tpc_department"];
                $_SESSION["adminId"] = $row["tpc_id"];
                $_SESSION["adminEmail"] = $row["tpc_email"];

                echo "<script> window.location.href = './admin/index.php'; </script>";
            } else {

                echo "<script> alert('You are Not Authorized. Please Contact placement@bvm.com'); </script>";
                echo "<script> window.location.href = './login.php'; </script>";
            }
        } else {
            echo "<script> alert('Check Username or Password'); </script>";
            echo "<script> window.location.href = './login.php'; </script>";
        }
    }
}
