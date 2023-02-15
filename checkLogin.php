<?php

include("./database.php");

// TODO:
// Initialize the session and do accordingly in the below conditions


// if the user hits the login button in the login.php
if (isset($_POST["login"])) {

    // take the data from the login form
    $typeOfUser = $_POST["typeOfUser"];
    $username = strtolower($_POST["username"]);
    // for password convert the input passsword into base64_encode
    $password = base64_encode(strrev(md5($_POST["password"])));

    // if the user is student
    if ($typeOfUser == 1) {

        // Query for fetching the data from the student table
        $check_query = "SELECT * FROM student WHERE id_number = '$username' AND password = '$password'";
        $check_result = $conn->query($check_query);
    }
    // if the user is company
    else if ($typeOfUser == 2) {

        // Query for fetching the data from the company table
        $check_query = "SELECT * FROM company WHERE email = '$username' AND password = '$password'";
        $check_result = $conn->query($check_query);
    }


    // if the authenticate user found redirect the user to the dashboard 
    if ($check_result->num_rows == 1 && $typeOfUser == 1) {
        // TODO: 
        // Initialize the session variable accordingly 
        header("Location: ./student/index.php");
        exit();
    } else if ($check_result->num_rows == 1 && $typeOfUser == 2) {

        // TODO:
        // Initialize the session variable accordingly
        header("Location: ./company/index.php");
        exit();
    } else {

        // TODO:
        // Initialize the session variable so that the error can be displayed accordingly
        echo '<script> alert("Credentials Does Not Match. Please Check!! ") </script>';

        //  and redirect to the login page
        echo '<script> window.location.href="./login.php" </script>';
    }
}
