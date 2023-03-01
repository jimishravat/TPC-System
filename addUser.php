<?php
include("./database.php");

// Taking the values from the form 
if (isset($_POST["registerStudent"])) {
    // Values from the Register Form
    $is_d2d = $_POST["typeStudent"] == 1 ? 0 : 1;
    $id_number = $_POST["id"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $dept = $_POST["department"];
    $gender = $_POST["gender"];

    // Encrypting the password with MD5 and base64_encode
    $password = base64_encode(strrev(md5($password)));

    var_dump($_POST);
}
