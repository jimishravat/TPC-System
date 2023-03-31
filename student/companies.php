<?php
include("../database.php");
include("./applyDrive.php");
session_start();

if (!isset($_SESSION["studentUserId"])) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

$dept = $_SESSION["studentDept"];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/company.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome <?php echo strtoupper($_SESSION["studentUserId"]) ?>,</h1>
        <div class="container-fluid">

            <div class="row">
                <?php if (checkProfile($_SESSION["studentUserId"]) == 0) : ?>
                    <div class="mx-2  bg-danger rounded">
                        <p class="text-white text-center">Your Profile is not yet approved. &nbsp; Please fill all details and contact your respective TPC </p>
                        <p class="text-white text-center font-italic"><u>NOTE:</u> You will not able to apply for drive until your profile is approved</p>
                    </div>
                <?php endif ?>
                <!-- Total Drives -->
                <div class="col-xl-12 col-sm-12 col-12">
                    <?php

                    $allDrives = $conn->query("SELECT company.*, drive.* FROM company,drive WHERE company.company_id = drive.company_id AND JSON_CONTAINS(dept_eligible,'$dept') ORDER BY drive_deadline DESC");

                    while ($drive = $allDrives->fetch_assoc()) {
                        $driveId = $drive["drive_id"];

                    ?>
                        <div class="card shadow my-5 card-width-full">
                            <div class="card-body row d-flex">
                                <!-- <div class="row"> -->
                                <div class="col-sm-2 col-auto align-items-center d-flex justify-content-center">
                                    <div class="icon icon-shape text-white text-lg rounded-circle">
                                        <img src="../admin/uploads/logo/<?php echo $drive["company_logo"] ?>" alt="">

                                    </div>
                                </div>
                                <div class="col-sm-8 col d-flex flex-column justify-content-center">
                                    <div class="row">
                                        <span class="h3 font-bold "><?php echo $drive["company_name"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span class="h6  font-bold "><?php echo $drive["company_url"] ?></span>
                                    </div>
                                    <div class="row d-flex ">
                                        <span class="h5 font-bold  mt-2"><?php echo $drive["job_role"] ?></span>

                                    </div>
                                    <div class="row mt-5 align-items-center">

                                        <!-- View Button  -->
                                        <div class="col-auto">
                                            <a href="./viewDrive.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn text-white btn-primary btn-sm">View</a>
                                        </div>

                                        <!-- Apply Data Button -->
                                        <div class="col-auto">
                                            <a href="./applyDrive.php?drive_id=<?php echo $drive["drive_id"] ?>&stu_id=<?php echo $_SESSION["studentUserId"] ?>" class="btn text-white btn-warning btn-sm">Apply</a>
                                        </div>

                                        <div class="col-auto">
                                            <span class="badge badge-lg badge-dot ">
                                                <?php if (checkApplied($_SESSION["studentUserId"], $drive["drive_id"]) == 1) : ?>
                                                    <i class="bg-success"></i>Applied
                                                <?php else : ?>
                                                    <i class="bg-danger"></i>Not Applied
                                                <?php endif ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="badge badge-lg badge-dot">
                                                <?php if (checkEligiblity($drive["drive_id"], $_SESSION["studentUserId"]) == 1) : ?>
                                                    <i class="bg-success"></i>Eligible
                                                <?php else : ?>
                                                    <i class="bg-danger"></i>Not-Eligible
                                                <?php endif ?>
                                            </span>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-2 col-sm-2">
                                    <div class="row d-flex flex-column align-items-center">
                                        <div class="col">

                                            <?php if ($drive["is_active"]) : ?>
                                                <span class="badge  badge-lg badge-dot">
                                                    <i class="bg-success"></i>Active
                                                </span>
                                            <?php else : ?>
                                                <span class="badge badge-lg badge-dot">
                                                    <i class="bg-danger"></i>In-Active
                                                </span>
                                            <?php endif ?>
                                        </div>
                                        <div class="col">
                                            <span class="badge badge-lg badge-dot">

                                                <?php if ($drive["result_out"]) : ?>
                                                    <i class="bg-success"></i>
                                                <?php else : ?>
                                                    <i class="bg-warning"></i>
                                                <?php endif ?>

                                                Result
                                            </span>
                                        </div>
                                        <div class="col">
                                            <p class="font-bold  text-danger">Deadline : </p>
                                            <p class="text-danger font-bold"><?php echo $drive["drive_deadline"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- </div> -->

                            </div>
                        </div>
                    <?php
                    }

                    ?>

                </div>
            </div>

        </div>




        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>