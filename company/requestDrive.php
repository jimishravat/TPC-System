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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./helper/sidebar.css">



    <title>Company | Request Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Request Drive</h1>
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-12 ">
                        <div class="mx-n1">
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a> -->
                            <!-- Add Drive Button -->
                            <!-- Only Access to TPO -->

                            <a href="./adddrive.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Request Drive</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <?php

            $allDrives = $conn->query("SELECT company.*, requests.* FROM company,requests WHERE company.company_id = requests.c_id ");

            while ($drive = $allDrives->fetch_assoc()) {


                $driveId = $drive["id"];

            ?>
                <div class="card shadow my-5 card-width-full">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 col-auto align-items-center d-flex justify-content-center">
                                <div class="icon icon-shape text-white text-lg rounded-circle">
                                    <img src="../uploads/logo/<?php echo $drive["company_logo"] ?>" alt="">

                                </div>
                            </div>
                            <div class="col-sm-8 col-8 d-flex flex-column justify-content-center">
                                <div class="row">
                                    <span class="h3 font-bold "><?php echo $drive["company_name"] ?></span>
                                </div>
                                <div class="row">
                                    <span class="h6  font-bold "><?php echo $drive["company_url"] ?></span>
                                </div>
                                <div class="row mt-2">
                                    <?php
                                    $job_role_array = json_decode($drive["job_role"], true);
                                    foreach ($job_role_array as $key) {

                                    ?>
                                        <div class="col-2">

                                            <p class="h5">| <?php echo $key["jobRole"] ?> |</p>
                                        </div>
                                    <?php

                                    }

                                    ?>
                                </div>
                                <div class="row mt-5">

                                    <!-- View Button  -->
                                    <div class="col-auto">
                                        <a href="./viewDrive.php?drive_id=<?php echo $drive["id"] ?>" class="btn btn-primary btn-sm">View</a>
                                    </div>

                                    <!-- Collect Data Button -->
                                    <!-- <div class="col-auto">
                                        <a href="./download_excel.php?drive_id=<?php echo $drive["id"] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-warning btn-sm">Collect Data</a>
                                    </div> -->

                                    <!-- Add Result Button -->
                                    <!-- Only Access to TPO -->

                                    <!-- <?php if (!$drive["result_out"]) : ?>
                                    <div class="col-auto">
                                        <a href="./addresult.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-secondary btn-sm">Add Result</a>

                                    </div>
                                <?php endif ?> -->
                                    <!-- <div class="col-auto">
                                        <a title="Applied Students" href="./viewAppliedStudents.php?drive_id=<?php echo $drive["id"] ?>" class="btn btn-danger btn-sm ">Applied Students</a>
                                    </div> -->





                                    <!-- Delete Button -->
                                    <!-- Only Access to TPO -->


                                    <!-- <div class="col-auto">
                                    <a title="Delete" href="./drives.php?id=<?php echo $drive["drive_id"] ?>&action=delete" class="btn btn-square btn-sm btn-neutral btn-danger-hover"><i class="bi bi-trash"></i></a>
                                </div> -->


                                </div>

                            </div>
                            <div class="col-2 col-sm-2">
                                <div class="row d-flex flex-column align-items-center">
                                    <!-- <div class="col">-->

                                    <?php if ($drive["approved"] == 1) : ?>
                                        <span class="badge  badge-lg badge-dot">
                                            <i class="bg-success"></i>Approved
                                        </span>
                                    <?php elseif ($drive["approved"] == 2) : ?>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-danger"></i>Rejected
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-warning"></i>Pending
                                        </span>
                                    <?php endif ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
        </div>
    <?php }
    ?>
    </div>








    <p class="copyright">
        &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
    </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>