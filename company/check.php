<?php

include("../database.php");
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$password = base64_encode(strrev(md5($password)));

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$matched = 0;

$check = $conn->query("SELECT password FROM company WHERE company_id='$id'");
$answer = $check->fetch_assoc();
if ($answer["password"] == $password) {
    $matched = 1;
}



echo $matched;
