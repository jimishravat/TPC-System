<?php

include("../database.php");
include("./applyDrive.php");


session_start();

if (!isset($_SESSION["studentUserId"])) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

$dept = $_SESSION["studentDept"];

$driveId = isset($_GET["drive_id"]) ? $_GET["drive_id"] : 0;

$driveDetailQuery = $conn->query("SELECT * FROM drive,company WHERE drive.company_id = company.company_id AND drive_id='$driveId'");

$driveDetail = $driveDetailQuery->fetch_assoc();

// var_dump($driveDetail);
// $jobRoleQuery = $conn->query("SELECT * from drive_job_role WHERE drive_id = '$driveId'");




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>View Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <div class="">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25">
                                                <!-- <div class="preview"></div> -->
                                                <img src="../admin/uploads/logo/<?php echo $driveDetail["company_logo"] ?>" id="showLogo" class="img-radius my-5" alt="Company-Logo">
                                                <?php if (checkDeadline($driveDetail["drive_id"]) == 1) : ?>

                                                    <?php if (checkApplied($_SESSION["studentUserId"], $driveDetail["drive_id"]) == 0) : ?>
                                                        <?php if (checkEligiblity($driveDetail["drive_id"], $_SESSION["studentUserId"]) == 1) : ?>

                                                            <a href="./applyDrive.php?drive_id=<?php echo $driveDetail["drive_id"] ?>&stu_id=<?php echo $_SESSION["studentUserId"] ?>" class="d-block btn text-white btn-primary"> <span> <i class='bx bxs-hand-up'></i></span> Apply Drive </a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endif ?>
                                                <!-- <button class="text-center btn my-2 btn-success">Upload Logo</button> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6 ">
                                                    <p class="m-b-5 text-muted f-w-600">Company Name</p>
                                                    <h5 class=" f-w-400"><?php echo $driveDetail["company_name"] ?></h5>

                                                    <!-- <input type="text" class="m-b-5 form-control" name="" id="" value="c_name"> -->
                                                </div>
                                                <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Role</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" value="j_name">
                                                    </div> -->
                                                <div class="col-sm-6">
                                                    <p class=" text-muted f-w-600">Company URL</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["company_url"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class=" text-muted f-w-600">HR Name</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["HR_name"] ?></h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class=" text-muted f-w-600">HR Mobile</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["HR_mobile"] ?></h5>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">HR Email</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["HR_email"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Deadline</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["drive_deadline"] ?></h5>

                                                </div>
                                                <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Salary</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" value="700000">
                                                    </div> -->
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Location</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["job_location"] ?></h5>

                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 text-muted f-w-600">Company Description</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["company_description"] ?></h5>

                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 text-muted f-w-600">Additional Information</p>
                                                    <h5 class="mb-5 f-w-400"><?php echo $driveDetail["additional_info"] ?></h5>

                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 text-muted f-w-600">Skills Required</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["skills"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Bond(in years)</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["bond_period"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Will Provide Internship?</p>
                                                    <h5 class="mb-5  f-w-400"><?php if ($driveDetail["internship"]) echo "YES";
                                                                                else echo "NO"; ?></h5>


                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Internship Period</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["internship_duration"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Stipend (During Internsip) </p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["stipend"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Bonus </p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["bonus_amount"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Bonus Included in CTC? </p>
                                                    <h5 class="mb-5  f-w-400"><?php if ($driveDetail["included_ctc"]) echo "YES";
                                                                                else echo "NO" ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Minimum 10th % Criteria</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["ssc_criteria"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Minimum 12th % Criteria</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["hsc_criteria"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Minimum CPI Criteria</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["cpi_criteria"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Minimum SPI Criteria(in all Sems)</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["spi_criteria"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Total Allowed Backlogs</p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["total_backlog"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Active Backlogs Allowed </p>
                                                    <h5 class="mb-5  f-w-400"><?php echo $driveDetail["active_backlog"] ?></h5>

                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 text-muted f-w-600">Eligible Branches</p>
                                                    <?php

                                                    $deptEligible = json_decode($driveDetail["dept_eligible"], true);

                                                    $deptQuery = $conn->query('SELECT dept_name FROM department WHERE dept_id IN (' . implode(',', array_map('intval', $deptEligible)) . ')');
                                                    // var_dump($deptQuery);
                                                    while ($dept = $deptQuery->fetch_assoc()) {
                                                    ?>

                                                        <h5 class="  f-w-400"><?php echo $dept["dept_name"] ?></h5>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>

                                                <div class="col-sm-12">
                                                    <table class="table" id="jobTable">
                                                        <thead>

                                                            <tr>
                                                                <td class="text-muted h4">Job Role</td>
                                                                <td class="text-muted h4">Salary (CTC in LPA)</td>
                                                            </tr>
                                                        </thead>


                                                        <tr>
                                                            <td id="col0">
                                                                <h5 class="  f-w-400"><?php echo $driveDetail["job_role"] ?></h5>

                                                            </td>
                                                            <td id="col1">
                                                                <h5 class="  f-w-400"><?php echo $driveDetail["salary"] ?></h5>

                                                            </td>

                                                        </tr>


                                                    </table>


                                                </div>
                                                <div class="col-sm-6 mt-5" id="noOfJR">

                                                    <p class="m-b-5 f-w-600">Attach PDF('s)</p>
                                                    <a class="btn text-white btn-primary btn-sm" href="../admin/uploads/pdf/<?php echo $driveDetail["pdf"] ?>" target="_blank" rel="noopener noreferrer"> View PDF</a>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <button class="text-center btn btn-primary">Add</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./helper/sidebar.js"></script>

</body>

</html>