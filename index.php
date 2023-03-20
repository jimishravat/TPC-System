<?php

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("database.php");
session_start();
if (isset($_SESSION["admin"])) {
    echo "<script> window.location.href = 'http://localhost/tpc/admin/index.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./core/header.php")    ?>

    <title>Home</title>
</head>

<body>
    <!-- Navigation bar -->
    <?php require_once("./core/nav.php") ?>

    <!-- Main Content -->
    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="http://localhost/tpc/images/welcome.png" class="img-fluid animated mt-5">
            <h1>Welcome to <span>Placement Cell</span></h1>
            <p>We Will Support You In Your Entire Placement Journey.</p>
            <div class="d-flex">
                <a href="login.php"><button type="button" class="btn btn-outline-primary mb-5">Get Started</button></a>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php require_once("./core/footer.php") ?>

</body>

</html>