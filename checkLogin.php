<?php

include("./database.php");

// TODO:
// Initialize the session and do accordingly in the below conditions


// if the user hits the login button in the login.php
if (isset($_POST["login"])) {

    // take the data from the login form
    $typeOfUser = $_POST["typeOfUser"];
    if ($typeOfUser == 3) {
        $typeOfUser = $_POST["typeOfAdmin"];
    }
    $username = strtolower($_POST["username"]);
    // for password convert the input passsword into base64_encode
    $password = base64_encode(strrev(md5($_POST["password"])));
    
}
