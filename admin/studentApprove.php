<?php

include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}

if ($access != 3) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

$action = isset($_GET["action"]) ? $_GET["action"] : 0;

if (isset($_POST["approve"])) {
    
    $id = $_POST["id"];
    $student_update = $conn->query("UPDATE student SET is_approved = '1' WHERE s_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc/admin/studentApprove.php'; </script>";
    }
}

if ($action == "approve") {
    $id = $_GET["id"];
    $student_update = $conn->query("UPDATE student SET is_approved = '1' WHERE s_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc/admin/studentApprove.php'; </script>";
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


    <title>Approve Student</title>
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
                        <h1 class="h2 mb-0 ls-tight">Welcome, TPC</h1>
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

                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <!-- <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Active</a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link font-regular">All Drives</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Civil</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Mechanical</a>
                    </li>
                </ul> -->
            </div>
        </div>

        <div class="row">

            <!-- Total Students -->
            <div class="col-xl-12 col-sm-12 col-12 row">


                <!-- Loop starts -->

                <?php
                $student_fetch = $conn->query("SELECT * FROM student WHERE is_approved = '0'");
                while ($student = $student_fetch->fetch_assoc()) {

                ?>

                    <div class="card shadow-3 border-0 mt-5 card-width-sm card-height-sm mx-2 col-sm-6">
                        <div class="card-body  ">
                            <div class="row ">
                                <div class="col d-flex align-items-center">
                                    <span class="h3 font-bold d-block"><?php echo strtoupper($student["s_id"]) ?> - </span>
                                    <span class="h3 font-semibold mb-0"><?php echo $student["s_fname"] . " " . $student["s_lname"] ?></span>
                                </div>
                            </div>
                            <div class="mt-5 mb-0 text-sm d-flex justify-content-start">

                                <a href="./viewStudent.php?id=<?php echo $student["s_id"] ?>" class="btn btn-primary btn-sm mx-2">View</a>
                                <a href="./studentApprove.php?id=<?php echo $student["s_id"] ?>&action=approve" class="btn btn-success btn-sm mx-2">Approve</a>

                            </div>
                        </div>

                    </div>
                <?php
                }

                ?>
                <!-- loop ends -->




            </div>
        </div>



        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>