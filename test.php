<?php

include("./database.php");

$company = $conn->query("SELECT company_logo FROM company WHERE company_id = '1'");
$company_data = $company->fetch_assoc();
$company_logo = $company_data["company_logo"];
var_dump(gettype($company_logo));

var_dump(is_null($company_logo));

if (isset($_POST['submit'])) {
    $user = array();
    $pass = array();

    foreach ($_POST["username"] as $key) {
        array_push($user, $key);
    }

    foreach ($_POST["password"] as $key) {
        array_push($pass, $key);
    }
    $row = sizeof($user);
    // var_dump($user);
    // var_dump($pass);
    $final  = array();

    for ($i = 0; $i < $row; $i++) {
        $temp = array(
            "username" => $user[$i],
            "password" => $pass[$i]

        );


        array_push($final, $temp);
    }
    $final = json_encode($final);

    $insert  = $conn->query("INSERT INTO `test`( `jsonObj`) VALUES ('$final')");

    $select = $conn->query("SELECT * FROM `test` WHERE `id` = '2'");
    $s = $select->fetch_assoc();

    $a = json_decode($s["jsonObj"], true);

    foreach ($a as $key) {
        echo $key["username"] . " " . $key["password"];
        // foreach ($key as $val) {
        //     echo $val;
        // }
    }
    // var_dump($user);
    // var_dump($pass);

    // prediction user side
    // lab testing user side
    // lab testing admin side
    // report genreation
    // test status module
    // login module
    // password manager module

    // medicine user side
    // medicine admin side
    
}
include("./vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
var_dump($_ENV["DATABASE_USERNAME"]);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./test.php" method="post">
        <input type="text" name="username[]" placeholder="Username">
        <input type="password" name="password[]" placeholder="Password">
        <input type="text" name="username[]" placeholder="Username">
        <input type="password" name="password[]" placeholder="Password">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>