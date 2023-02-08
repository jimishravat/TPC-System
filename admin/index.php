<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Document</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Dashboard</h1>

        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Students</span>
                                <span class="h3 font-bold mb-0">$750.90</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
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
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Companies</span>
                                <span class="h3 font-bold mb-0">215</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <!-- <i class="bi bi-people"></i> -->
                                    <i class='bx bxs-bar-chart-square'></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <!-- <i class="bi bi-arrow-up me-1"></i>30% -->
                                <i class='bx bxs-error'></i>30
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Drives</span>
                                <span class="h3 font-bold mb-0">1.400</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <!-- <i class="bi bi-arrow-down me-1"></i>-5% -->
                                <i class='bx bxs-error'></i>5
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Coordinators</span>
                                <span class="h3 font-bold mb-0">95</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <!-- <i class="bi bi-minecart-loaded"></i> -->
                                    <i class='bx bx-sitemap' ></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <!-- <i class="bi bi-arrow-up me-1"></i>10% -->
                                <i class='bx bxs-error'></i>10
                            </span>
                            <span class="text-nowrap text-xs text-muted">Pending</span>
                        </div>
                    </div>
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