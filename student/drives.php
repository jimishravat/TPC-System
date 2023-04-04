<?php
include("../database.php");
include("./applyDrive.php");
session_start();

if (!isset($_SESSION["studentUserId"])) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

$dept = $_SESSION["studentDept"];
$id = $_SESSION["studentUserId"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/drive.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome Student,Your Applied Drives</h1>
        <h5>Below you will find job roles you have applied for</h5>

        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 row">
                <?php

                $drive_id_fetch = $conn->query("SELECT * FROM student_placed WHERE s_id = '$id'");
                $help = $drive_id_fetch->fetch_assoc();
                $drive_id_array = json_decode($help["drive_applied"]);

                foreach ($drive_id_array as $drive_id) {
                    $drive_fetch = $conn->query("SELECT company.company_name, drive.job_role FROM drive,company WHERE drive.company_id=company.company_id AND drive.drive_id='$drive_id'");
                    $drive = $drive_fetch->fetch_assoc();

                ?>
                    <div class="card shadow-3 border-0 mt-5 mx-2 col-sm-12">
                        <div class="card-body  ">
                            <div class="row ">
                                <div class="col d-flex">
                                    <span class="h3 font-bold"><?php echo $drive["company_name"] ?> -</span>
                                    <span class="h3 font-semibold mb-0 mx-5"><?php echo $drive["job_role"] ?></span>
                                </div>
                            </div>
                            <div class="mt-2 mb-0 text-sm d-flex justify-content-start">

                                <?php if ($drive_id == $help["drive_selected"]) : ?>
                                    <p class="text-primary">Congratulations!! You are selected </p>
                                <?php else : ?>
                                    <p class="text-primary">Application Submitted to admin</p>
                                <?php endif ?>

                            </div>
                        </div>

                    </div>
                <?php
                }

                ?>

            </div>
        </div>






        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>