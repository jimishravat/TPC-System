<?php

include("../database.php");
// include("../helper/authorization.php");
include("../helper/fileUpload.php");



$drive_id = isset($_GET["drive_id"]) ? $_GET["drive_id"] : 0;
// var_dump($drive_id);
$drive_fetch = $conn->query("SELECT * FROM drive,company WHERE drive.company_id = company.company_id AND drive.drive_id='$drive_id'");
// var_dump($drive_fetch);
// $job_fetch = $conn->query("SELECT * FROM drive_job_role WHERE drive_id = '$drive_id'");
$driveDetails = $drive_fetch->fetch_assoc();
$driveUpdate = 0;
$singleUpdateSuccess = 0;


// $pass = "Company@123";
// $driveInsert = 0;
if (isset($_POST["update-drive"])) {
    $targetLogoLoc = '../uploads/logo/';
    $targetPdfLoc = '../uploads/pdf/';
    $companyName = mysqli_real_escape_string($conn,$_POST["companyName"]);
    $companyUrl  = mysqli_real_escape_string($conn,$_POST["companyUrl"]);
    $HRName = mysqli_real_escape_string($conn,$_POST["HRName"]);
    $HRMobile = mysqli_real_escape_string($conn,$_POST["HRMobile"]);
    $HREmail = mysqli_real_escape_string($conn,$_POST["HREmail"]);
    $deadline = mysqli_real_escape_string($conn,$_POST["deadline"]);
    $location = mysqli_real_escape_string($conn,$_POST["location"]);
    $jobDesc = mysqli_real_escape_string($conn,$_POST["jobDesc"]);
    $skills = mysqli_real_escape_string($conn,$_POST["skills"]);
    $addInfo = mysqli_real_escape_string($conn,$_POST["additionalInfo"]);
    $bond = mysqli_real_escape_string($conn,$_POST["bond"]);
    $intern = mysqli_real_escape_string($conn,$_POST["checkInternship"]);
    $stipend = mysqli_real_escape_string($conn,$_POST["stipend"]);
    $internPeriod = mysqli_real_escape_string($conn,$_POST["internshipPeriod"]);
    $bonus = mysqli_real_escape_string($conn,$_POST["bonus"]);
    $bonusIncluded = mysqli_real_escape_string($conn,$_POST["bonusIncluded"]);
    $ssc = mysqli_real_escape_string($conn,$_POST["sscCriteria"]);
    $hsc = mysqli_real_escape_string($conn,$_POST["hscCriteria"]);
    $cpi = mysqli_real_escape_string($conn,$_POST["cpiCriteria"]);
    $spi = mysqli_real_escape_string($conn,$_POST["spiCriteria"]);
    $totalBacklog = mysqli_real_escape_string($conn,$_POST["totalBacklog"]);
    $activeBacklog = mysqli_real_escape_string($conn,$_POST["activeBacklog"]);
    $password = base64_encode(strrev(md5($pass)));

    $deptEligible = array();
    foreach ($_POST["dept"] as $selected) {
        array_push($deptEligible, intval($selected));
    }
    $deptEligible = json_encode($deptEligible);

    $jobRole = mysqli_real_escape_string($conn,$_POST["jobRole"]);
    $salary = mysqli_real_escape_string($conn,$_POST["salary"]);



    $cId = mysqli_real_escape_string($conn,$_POST["cId"]);
    $drive_id = mysqli_real_escape_string($conn,$_POST["driveId"]);
    if (file_exists($_FILES["file"]["name"])) {
        $logo = singleFile($_FILES["file"]["name"], $_FILES["file"]["tmp_name"], $targetLogoLoc);
    } else {
        $logo = mysqli_real_escape_string($conn,$_POST["logoDatabase"]);
    }
    $updateCompany = $conn->query("UPDATE `company` SET `company_name`='$companyName',`HR_name`='$HRName',`HR_email`='$HREmail',`HR_mobile`='$HRMobile',`company_url`='$companyUrl',`company_location`='$location',`company_logo`='$logo' WHERE `company_id`='$cId'");
    // $checkForCompany = $conn->query("SELECT * FROM company WHERE company_name='$companyName'");
    // if ($checkForCompany->num_rows) {
    //     $row = $checkForCompany->fetch_assoc();
    //     $cId = $row["company_id"]);
    // } else {

    //     $insertCompany = $conn->query("INSERT INTO `company`( `company_name`, `company_description`, `password`, `HR_name`, `HR_email`, `HR_mobile`, `company_url`, `company_location`, `company_logo`) VALUES ('$companyName','$companyDesc','$password','$HRName','$HREmail','$HRMobile','$companyUrl','$location','$logo')");
    //     if ($conn->affected_rows) {
    //         $cId = $conn->insert_id;
    //     }
    // }
    if (file_exists($_FILES["PDF"]["name"])) {
        $pdf = singleFile($_FILES["PDF"]["name"], $_FILES["PDF"]["tmp_name"], $targetPdfLoc);
    } else {
        $pdf = mysqli_real_escape_string($conn,$_POST["pdfDatabase"]);
    }

    $updateDrive = $conn->query("UPDATE `drive` SET `drive_deadline`='$deadline',`skills`='$skills',`additional_info`='$addInfo',`job_location`='$location',`job_description`='$jobDesc',`job_role`='$jobRole',`salary`='$salary',`internship`='$intern',`stipend`='$stipend',`internship_duration`='$internPeriod',`bond_period`='$bond',`bonus_amount`='$bonus',`included_ctc`='$bonusIncluded',`hsc_criteria`='$hsc',`ssc_criteria`='$ssc',`cpi_criteria`='$cpi',`spi_criteria`='$spi',`total_backlog`='$totalBacklog',`active_backlog`='$activeBacklog',`dept_eligible`='$deptEligible',`pdf`='$pdf' WHERE drive_id = '$drive_id'");
    if ($conn->affected_rows) {
        $driveId = $conn->insert_id;
        $driveUpdate = 1;
        echo "<script> alert('Drive Update Success'); </script>";
        echo "<script> window.location.href = './drives.php'; </script>";
    } else {
        $driveUpdateFailure = 1;
        echo "<script> alert('Drive Update Failure'); </script>";
        echo "<script> window.location.href = './updateDrive.php?drive_id=$drive_id'; </script>";
    }
    // var_dump($driveUpdate);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <?php if ($driveUpdate) : ?>
        <meta http-equiv="refresh" content="0;url=http://localhost/tpc/admin/drives.php" />
    <?php endif ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/approve.css">
    <title>Update Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <main>
        <div class="container">
            <form action="./updateDrive.php" method="POST" enctype="multipart/form-data">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row  d-flex justify-content-center">
                            <div class="">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <?php if ($driveUpdate) : ?>
                                            <p class="bg-success text-white text-center">Successfully Updated </p>
                                        <?php endif ?>
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <!-- <div class="preview"></div> -->
                                                    <img src="../uploads/logo/<?php echo $driveDetails["company_logo"] ?>" id="showLogo" class="img-radius my-5" alt="Company-Logo">
                                                    <input type="text" value="<?php echo $driveDetails["company_logo"] ?>" name="logoDatabase" hidden>
                                                    <input type="file" name="file" id="file" class="inputfile" />
                                                    <label for="file">Upload Logo</label>
                                                    <!-- <button class="text-center btn my-2 btn-success">Upload Logo</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <input type="text" value="<?php echo $driveDetails["company_id"] ?>" name="cId" hidden>
                                                <input type="text" value="<?php echo $driveDetails["drive_id"] ?>" name="driveId" hidden>
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Company Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="companyName" value="<?php echo $driveDetails["company_name"] ?>" id="" placeholder="Company Name">
                                                    </div>
                                                    <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Role</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" value="j_name">
                                                    </div> -->
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Company URL</p>
                                                        <input type="text" class="m-b-5 form-control" name="companyUrl" value="<?php echo $driveDetails["company_url"] ?>" id="" placeholder="Company URL">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">HR Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="HRName" value="<?php echo $driveDetails["HR_name"] ?>" id="" placeholder="HR Name">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">HR Mobile</p>
                                                        <input type="number" class="m-b-5 form-control" name="HRMobile" value="<?php echo $driveDetails["HR_mobile"] ?>" id="" placeholder="HR Mobile">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">HR Email</p>
                                                        <input type="email" class="m-b-5 form-control" name="HREmail" value="<?php echo $driveDetails["HR_email"] ?>" id="" placeholder="HR Email">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Deadline for Drive</p>
                                                        <input type="date" class="m-b-5 form-control" name="deadline" value="<?php echo $driveDetails["drive_deadline"] ?>" id="" placeholder="Deadline">
                                                    </div>
                                                    <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Salary</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" value="700000">
                                                    </div> -->
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Location</p>
                                                        <input type="text" class="m-b-5 form-control" name="location" value="<?php echo $driveDetails["job_location"] ?>" id="" placeholder="Ahmedabad">
                                                    </div>
                                                    <div class="col-sm-12 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Job Description</p>
                                                        <textarea class="m-b-5 form-control" name="jobDesc" placeholder="Job Description" id=""><?php echo $driveDetails["job_description"] ?></textarea>
                                                    </div>
                                                    <div class="col-sm-12 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Skills Required</p>
                                                        <textarea class="m-b-5 form-control" name="skills" id="" placeholder="HTML/CSS/JS"> <?php echo $driveDetails["skills"] ?></textarea>
                                                    </div>
                                                    <div class="col-sm-12 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Additional Information</p>
                                                        <textarea class="m-b-5 form-control" name="additionalInfo" id="" placeholder="Additional Information"><?php echo $driveDetails["additional_info"] ?></textarea>
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Bond (In Years)</p>
                                                        <input type="text" maxlength="3" class="m-b-5 form-control" name="bond" id="" value="<?php echo $driveDetails["bond_period"] ?>" placeholder="e.g 1.5 Years">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input " id="intern" name="checkInternship" value="0" <?php if ($driveDetails["internship"] == 0) echo "checked" ?>>
                                                            <label for="intern" class="from-check-label f-w-600"> No </label>
                                                        </div>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input" id="intern" name="checkInternship" value="1" <?php if ($driveDetails["internship"] == 1) echo "checked" ?>>
                                                            <label for="intern" class="from-check-label f-w-600"> Yes</label>
                                                        </div>
                                                        <!-- <input type="radio" class="form-check-input" id="intern" name="intern" value="1"> YES</input> -->
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Stipend (During Internship)</p>
                                                        <input type="text" class="m-b-5 form-control" name="stipend" id="" placeholder="10000" value="<?php echo $driveDetails["stipend"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Internship Period ( In Months )</p>
                                                        <input type="text" maxlength="1" class="m-b-5 form-control" name="internshipPeriod" id="" placeholder="4" value="<?php echo $driveDetails["internship_duration"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Bonus ( If Any )</p>
                                                        <input type="text" class="m-b-5 form-control" name="bonus" id="" placeholder="12000" value="<?php echo $driveDetails["bonus_amount"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Bonus Included in CTC ( If Any )</p>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input " id="bonus" name="bonusIncluded" value="0" <?php if ($driveDetails["included_ctc"] == 0) echo "checked" ?>>
                                                            <label for="bonus" class="from-check-label f-w-600"> No </label>
                                                        </div>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input" id="bonus" name="bonusIncluded" value="1" <?php if ($driveDetails["included_ctc"] == 1) echo "checked" ?>>
                                                            <label for="bonus" class="from-check-label f-w-600"> Yes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4 ">
                                                        <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p>
                                                        <input type="text" maxlength="2" class="m-b-5 form-control" name="sscCriteria" id="" placeholder="60" min="0" value="<?php echo $driveDetails["ssc_criteria"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p>
                                                        <input type="text" maxlength="2" class="m-b-5 form-control" name="hscCriteria" id="" placeholder="60" value="<?php echo $driveDetails["hsc_criteria"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Minimum CPI Criteria</p>
                                                        <input type="text" maxlength="3" class="m-b-5 form-control" name="cpiCriteria" id="" placeholder="6.5" value="<?php echo $driveDetails["cpi_criteria"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p>
                                                        <input type="text" maxlength="3" class="m-b-5 form-control" name="spiCriteria" id="" placeholder="6.5" value="<?php echo $driveDetails["spi_criteria"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Total Backlog Allowed</p>
                                                        <input type="text" maxlength="1" class="m-b-5 form-control" name="totalBacklog" id="" placeholder="2" value="<?php echo $driveDetails["total_backlog"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Active Backlog Allowed</p>
                                                        <input type="text" maxlength="1" class="m-b-5 form-control" name="activeBacklog" id="" placeholder="2" value="<?php echo $driveDetails["active_backlog"] ?>">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                        <?php $dept = json_decode($driveDetails["dept_eligible"]); ?>
                                                        <div class="row">
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="IT" name="dept[]" value="10" <?php if (in_array('10', $dept)) echo "checked" ?>>
                                                                <label for="IT"> IT</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="3" <?php if (in_array('3', $dept)) echo "checked" ?>>
                                                                <label for="CP"> CP</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="6" <?php if (in_array('6', $dept)) echo "checked" ?>>
                                                                <label for="CP"> ME</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="1" <?php if (in_array('1', $dept)) echo "checked" ?>>
                                                                <label for="CP"> CE</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="9" <?php if (in_array('9', $dept)) echo "checked" ?>>
                                                                <label for="CP"> EC</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="4" <?php if (in_array('4', $dept)) echo "checked" ?>>
                                                                <label for="CP"> EL</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="5" <?php if (in_array('5', $dept)) echo "checked" ?>>
                                                                <label for="CP"> EE</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept[]" value="8" <?php if (in_array('8', $dept)) echo "checked" ?>>
                                                                <label for="CP"> PE</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 mx-2 mb-5">
                                                        <table class="table" id="jobTable">
                                                            <thead>

                                                                <tr>
                                                                    <th>Job Role</th>
                                                                    <th>Salary (CTC in LPA)</th>
                                                                </tr>
                                                            </thead>
                                                            <tr>




                                                                <td id="col0"><input type="text" placeholder="e.g. DevOps Engineer" value="<?php echo $driveDetails["job_role"] ?>" class="form-control" name="jobRole"></td>
                                                                <td id="col1"><input type="text" placeholder="e.g. 500000" value="<?php echo $driveDetails["salary"] ?>" class="form-control" name="salary"></td>

                                                            </tr>

                                                        </table>
                                                        <!-- <table>
                                                            <tr>
                                                                <td><input type="button" value="Add Job Role" onclick="addRows()" class="text-center btn btn-sm btn-primary m-5" /></td>
                                                                <td><input type="button" value="Delete " onclick="deleteRows()" class="text-center btn btn-sm btn-danger m-5" /></td>

                                                            </tr>
                                                        </table> -->
                                                    </div>
                                                    <div class="row my-5" id="noOfJR">
                                                        <!-- <div class="col-sm-12">

                                                            <p class="m-b-5 f-w-600 h4">1. Job Role</p>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">Job Role</p>
                                                            <input type="text" name="jr" id="" class="m-b-5 form-control">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">Salary (LPA)</p>
                                                            <input type="text" name="salary" id="" class="m-b-5 form-control">
                                                        </div> -->

                                                        <div class=" col-sm-7 mx-2 mb-4">
                                                            <p class="m-b-5 f-w-600">Attach PDF('s)</p>

                                                            <a href="../uploads/pdf/<?php echo $driveDetails["pdf"] ?>" class="btn btn-primary" target="_blank" rel="noopener noreferrer">View</a>

                                                            <input type="text" value="<?php echo $driveDetails["pdf"] ?>" hidden name="pdfDatabase">
                                                            <input type="file" id="actual-btn" name="PDF" multiple hidden />

                                                            <label for="actual-btn" class="label">Upload PDF</label>

                                                            <span id="file-chosen">No file chosen</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <input type="text" hidden name="row" value="">
                                        <input type="submit" class="text-center btn btn-primary" name="update-drive" value="Update Drive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </main>

    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="./helper/sidebar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })

        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showLogo').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        $("#file").change(function() {
            imagePreview(this);
        });


        function num() {
            var row = document.getElementsByName("row");
            var table = document.getElementById('jobTable');
            var rowCount = table.rows.length
            row.value = rowCount;
        }

        function addRows() {
            var table = document.getElementById('jobTable');
            var rowCount = table.rows.length
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            for (var i = 0; i <= cellCount; i++) {
                var cell = 'cell' + i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col' + i).innerHTML;
                cell.innerHTML = copycel;

            }
            num()
        }

        function deleteRows() {
            var table = document.getElementById('jobTable');
            var rowCount = table.rows.length;
            if (rowCount > '2') {
                var row = table.deleteRow(rowCount - 1);
                rowCount--;
            } else {
                alert('There should be atleast one row');
            }
        }

        function addJobRole() {
            var n = document.getElementById("jRn").value;
            var d = document.getElementById("noOfJR");
            for (let index = 1; index <= n; index++) {
                d.innerHTML += "<div class='col-sm-12'><p class ='m-b-5 my-5 f-w-600 h4' >" + index + ". Job Role </p></div>";
                d.innerHTML += "<div class='col-sm-6'><p class='m-b-5 f-w-600'>Job Role</p><input type='text' name='jr" + index + "' class='m-b-5 form-control'></div>";
                d.innerHTML += "<div class='col-sm-6'><p class='m-b-5 f-w-600'>Salary (LPA)</p><input type='text' name='salary" + index + "'class='m-b-5 form-control'></div>";

            }

        }
    </script>

</body>

</html>