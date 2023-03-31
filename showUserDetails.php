<?php

include("./database.php");

// Session
session_start();


// it will only be shown once when the student register 
// it will be shown for showing the user name of the student
if (!empty($_GET["user_id"]) && isset($_SESSION["showUser"])) {
    $user_id = $_GET["user_id"];
}
// if any user try to see this page through URL then he will be restricted and redirected to index page
else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>

<html>

<head>
    <?php include("./core/header.php") ?>
    <link rel="stylesheet" href="./css/details.css">

    <title>User</title>
</head>

<body>

    <?php include("./core/nav.php") ?>


    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Succesfully Registered</span></div>
            <div class="details">
                <p>User Name : <strong> <?php echo strtoupper($user_id)  ?> </strong>
                </p>
                <p> Your account is in <strong>IN-ACTIVE</strong> state. It will be active only after the TPC approves you. You can check the status in the profile section after you <a href="./login.php"> LOGIN </a> </p>
                <p> Once you fill your details and all supporting documents then only you will be allowed to apply in any Placement Drive </p>
            </div>
        </div>
    </div>


    <?php include("./core/footer.php") ?>

</body>

</html>