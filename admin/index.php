<?php

include("../database.php");
include("../helper/authorization.php");

// var_dump($access);

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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



    <title>Document</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Dashboard</h1>

        <div class="row g-6 mb-6">

            <!-- Total Students -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Students</span>
                                <span class="h3 font-bold mb-0">100</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>13%
                                <i class='bx bxs-error'></i>13
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Total Interested Students -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Interested Students</span>
                                <span class="h3 font-bold mb-0">100</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>13%
                                <i class='bx bxs-error'></i>13
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Total Students Placed -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Placed Students</span>
                                <span class="h3 font-bold mb-0">100</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white text-lg rounded-circle">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <!-- <i class="bi bi-arrow-up me-1"></i>13% -->
                                <i class='bx bxs-error'></i>13
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Companies Visited -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Companies Visited</span>
                                <span class="h3 font-bold mb-0">215</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <!-- <i class="bi bi-people"></i> -->
                                    <i class='bx bxs-bar-chart-square'></i>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>30%
                                <i class='bx bxs-error'></i>30
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Total Drives  -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Drives</span>
                                <span class="h3 font-bold mb-0">14</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-success text-success me-2">
                                <!-- <i class="bi bi-arrow-down me-1"></i>-5% -->
                                <!-- <i class='bx bxs-error'></i>5 -->
                                <i class='bx bx-share bx-flip-horizontal'></i>5
                            </span>
                            <span class="text-nowrap text-xs text-muted">On-Going</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Student Co-ordinators -->
            <?php if ($access == 1) : ?>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Student Coordinators</span>
                                    <span class="h3 font-bold mb-0">95</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                        <!-- <i class="bi bi-minecart-loaded"></i> -->
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
                <!-- Total Faculty Co-ordinators -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Faculty Coordinators</span>
                                    <span class="h3 font-bold mb-0">95</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white text-lg rounded-circle">
                                        <!-- <i class="bi bi-minecart-loaded"></i> -->
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <!-- Average Package of College for Current Academic Year -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Average Package</span>
                                <span class="h3 font-bold mb-0">5.5 LPA</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <!-- <i class="bi bi-minecart-loaded"></i> -->
                                    <i class='bx bx-sitemap'></i>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                    </div>
                </div>
            </div>
            <h1>Departmental Statistics</h1>
            <!-- Average Package of different departments -->

            <?php
            if ($access == 2) {
                $show = $_SESSION["adminDept"];
            }
            if ($access == 1 || $access == 3 || ($access == 2 && ($show == 1 || $show == 2))) : ?>
                <!-- Average Package of Civil Department -->

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Civil Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == 3)) : ?>

                <!-- Average Package of Computer Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Computer Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($access == 1 || $access == 3 || ($access == 2 && $show == 4)) : ?>

                <!-- Average Package of Electronics Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($access == 1 || $access == 3 || ($access == 2 && $show == 5)) : ?>

                <!-- Average Package of Electrical Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electrical Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($access == 1 || $access == 3 || ($access == 2 && ($show == 6 || $show == 7))) : ?>

                <!-- Average Package of Mechanical Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Mechanical Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($access == 1 || $access == 3 || ($access == 2 && $show == 8)) : ?>

                <!-- Average Package of Production Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Production Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($access == 1 || $access == 3 || ($access == 2 && $show == 9)) : ?>

                <!-- Average Package of Electronics & Communication Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics & Communication Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($access == 1 || $access == 3 || ($access == 2 && $show == 10)) : ?>
                <!-- Average Package of IT Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">IT Average Package</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>10%
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div> -->
                        </div>
                    </div>
                </div>
            <?php endif ?>


        </div>







        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>