<?php

include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}

// if action button is clicked
$action = isset($_GET["action"]) ? $_GET["action"] : 0;

// var_dump($action);
if ($action == "active") {
    $id = $_GET["id"];
    // change the status from 0 to 1
    $update = $conn->query("UPDATE `drive` SET `is_active`=1 WHERE drive_id = '$id'");

    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc/admin/drives.php'; </script>";
    }
} elseif ($action == "inactive") {
    $id = $_GET["id"];

    // change the status from 1 to 0
    $update = $conn->query("UPDATE `drive` SET `is_active`=0 WHERE drive_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc/admin/drives.php'; </script>";
    }
} elseif ($action == "delete") {
    $id = $_GET["id"];
    $deleteJob = $conn->query("DELETE FROM `drive_job_role` WHERE drive_id='$id'");
    if ($conn->affected_rows) {
        $deleteDrive = $conn->query("DELETE FROM `drive` WHERE drive_id='$id'");
        if ($conn->affected_rows) {
            echo "<script> window.location.href = 'http://localhost/tpc/admin/drives.php'; </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Drives</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>

        <!-- <h1>Student</h1> -->
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Welcome, TPO</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a> -->
                            <!-- Add Drive Button -->
                            <!-- Only Access to TPO -->
                            <?php if ($access == 1) : ?>
                                <a href="./adddrive.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Active</a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link font-regular">All Drives</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Completed</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Civil</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Mechanical</a>
                    </li> -->
                </ul>
            </div>
        </div>

        <div class="row">

            <!-- Total Drives -->
            <div class="col-xl-12 col-sm-12 col-12">
                <?php

                $allDrives = $conn->query("SELECT company.*, drive.* FROM company,drive WHERE company.company_id = drive.company_id ");

                while ($drive = $allDrives->fetch_assoc()) {
                    $driveId = $drive["drive_id"];

                ?>
                    <div class="card shadow my-5 card-width-full">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-auto align-items-center d-flex justify-content-center">
                                    <div class="icon icon-shape text-white text-lg rounded-circle">
                                        <img src="./uploads/logo/<?php echo $drive["company_logo"] ?>" alt="">

                                    </div>
                                </div>
                                <div class="col-sm-8 col-8 d-flex flex-column justify-content-center">
                                    <div class="row">
                                        <span class="h3 font-bold "><?php echo $drive["company_name"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span class="h6  font-bold "><?php echo $drive["company_url"] ?></span>
                                    </div>
                                    <div class="row d-flex ">
                                        <span class="h5 font-bold  mt-2"><?php echo $drive["job_role"] ?></span>

                                    </div>
                                    <div class="row mt-5">

                                        <!-- View Button  -->
                                        <div class="col-auto">
                                            <a href="./viewDrive.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-primary btn-sm">View</a>
                                        </div>

                                        <!-- Collect Data Button -->
                                        <div class="col-auto">
                                            <a href="./download_excel.php?drive_id=<?php echo $drive["drive_id"] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-warning btn-sm">Collect Data</a>
                                        </div>

                                        <!-- Add Result Button -->
                                        <!-- Only Access to TPO -->
                                        <?php if ($access == 1) : ?>
                                            <?php if (!$drive["result_out"]) : ?>
                                                <div class="col-auto">
                                                    <a href="./addresult.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-secondary btn-sm">Add Result</a>

                                                </div>
                                            <?php endif ?>
                                            <div class="col-auto">
                                                <a title="Edit" href="./updateDrive.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>
                                            </div>
                                        <?php endif ?>

                                        <!-- Active and Inactive Button -->
                                        <!-- Only Access to TPO -->
                                        <?php if ($access == 1) : ?>
                                            <div class="col-auto">
                                                <?php if ($drive["is_active"]) : ?>

                                                    <a title="De-Activate" href="./drives.php?id=<?php echo $drive["drive_id"] ?>&action=inactive" class="btn btn-square btn-sm btn-neutral btn-danger-hover">
                                                        <i class="bi bi-bookmark-x "></i>
                                                    </a>
                                                <?php else : ?>
                                                    <a title="Activate" href="./drives.php?id=<?php echo $drive["drive_id"] ?>&action=active" class="btn btn-square btn-sm btn-neutral btn-success-hover">
                                                        <i class="bi bi-bookmark-check "></i>
                                                    </a>

                                                <?php endif ?>
                                            </div>
                                        <?php endif ?>

                                        <!-- Delete Button -->
                                        <!-- Only Access to TPO -->
                                        <?php if ($access == 1) : ?>

                                            <div class="col-auto">
                                                <a title="Delete" href="./drives.php?id=<?php echo $drive["drive_id"] ?>&action=delete" class="btn btn-square btn-sm btn-neutral btn-danger-hover"><i class="bi bi-trash"></i></a>
                                            </div>
                                        <?php endif ?>

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
                                                <span class="badge  badge-lg badge-dot">
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
                                            <p class="font-bold ">Deadline : </p>
                                            <p><?php echo $drive["drive_deadline"] ?></p>
                                        </div>
                                    </div>
                                </div>
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