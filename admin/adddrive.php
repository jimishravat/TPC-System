<?php

include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/approve.css">
    <title>Add Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>
            <form action="./adddrive.php" method="POST" enctype="multipart/form-data">
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
                                                    <img src="#" id="showLogo" class="img-radius my-5" alt="Company-Logo">
                                                    <input type="file" name="file" id="file" class="inputfile" />
                                                    <label for="file">Upload Logo</label>
                                                    <!-- <button class="text-center btn my-2 btn-success">Upload Logo</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Company Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="companyName" id="" placeholder="Company Name">
                                                    </div>
                                                    <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Role</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" value="j_name">
                                                    </div> -->
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Company URL</p>
                                                        <input type="text" class="m-b-5 form-control" name="companyUrl" id="" placeholder="Company URL">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">HR Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="HRName" id="" placeholder="HR Name">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">HR Mobile</p>
                                                        <input type="number" class="m-b-5 form-control" name="HRMobile" id="" placeholder="HR Mobile">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">HR Email</p>
                                                        <input type="email" class="m-b-5 form-control" name="HREmail" id="" placeholder="HR Email">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Deadline for Drive</p>
                                                        <input type="date" class="m-b-5 form-control" name="dealine" id="" placeholder="Deadline">
                                                    </div>
                                                    <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Salary</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" value="700000">
                                                    </div> -->
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Location</p>
                                                        <input type="text" class="m-b-5 form-control" name="location" id="" placeholder="Ahmedabad">
                                                    </div>
                                                    <div class="col-sm-12 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Job Description</p>
                                                        <textarea class="m-b-5 form-control" name="companyDesc" placeholder="Job Description" id=""></textarea>
                                                    </div>
                                                    <div class="col-sm-12 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Skills Required</p>
                                                        <textarea class="m-b-5 form-control" name="skills" id="" placeholder="HTML/CSS/JS"></textarea>
                                                    </div>
                                                    <div class="col-sm-12 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Additional Information</p>
                                                        <textarea class="m-b-5 form-control" name="additionalInfo" id="" placeholder="Additional Information"></textarea>
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Bond (In Years)</p>
                                                        <input type="number" class="m-b-5 form-control" name="bond" id="" placeholder="e.g 1.5 Years">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input " id="intern" name="checkInternship" value="0">
                                                            <label for="intern" class="from-check-label f-w-600"> No </label>
                                                        </div>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input" id="intern" name="checkInternship" value="1">
                                                            <label for="intern" class="from-check-label f-w-600"> Yes</label>
                                                        </div>
                                                        <!-- <input type="radio" class="form-check-input" id="intern" name="intern" value="1"> YES</input> -->
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Stipend (During Internship)</p>
                                                        <input type="number" class="m-b-5 form-control" name="stipend" id="" placeholder="10000">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Internship Period ( In Months )</p>
                                                        <input type="number" class="m-b-5 form-control" name="internshipPeriod" id="" placeholder="4">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Bonus ( If Any )</p>
                                                        <input type="number" class="m-b-5 form-control" name="bonus" id="" placeholder="12000">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Bonus Included in CTC ( If Any )</p>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input " id="bonus" name="bonusIncluded" value="0">
                                                            <label for="bonus" class="from-check-label f-w-600"> No </label>
                                                        </div>
                                                        <div class="form-check">

                                                            <input type="radio" class="form-check-input" id="bonus" name="bonusIncluded" value="1">
                                                            <label for="bonus" class="from-check-label f-w-600"> Yes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4 ">
                                                        <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p>
                                                        <input type="number" class="m-b-5 form-control" name="sscCriteria" id="" placeholder="60" min="0">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p>
                                                        <input type="number" class="m-b-5 form-control" name="hscCriteria" id="" placeholder="60">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Minimum CPI Criteria</p>
                                                        <input type="number" class="m-b-5 form-control" name="cpiCriteria" id="" placeholder="6.5">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p>
                                                        <input type="number" class="m-b-5 form-control" name="spiCriteria" id="" placeholder="6.5">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Total Backlog Allowed</p>
                                                        <input type="number" class="m-b-5 form-control" name="totalBacklog" id="" placeholder="2">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Dead Backlog Allowed</p>
                                                        <input type="number" class="m-b-5 form-control" name="deadBacklog" id="" placeholder="2">
                                                    </div>
                                                    <div class="col-sm-5 mx-2 mb-4">
                                                        <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                        <div class="row">
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="IT" name="dept" value="10">
                                                                <label for="IT"> IT</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="3">
                                                                <label for="CP"> CP</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="6">
                                                                <label for="CP"> ME</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="1">
                                                                <label for="CP"> CE</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="9">
                                                                <label for="CP"> EC</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="4">
                                                                <label for="CP"> EL</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="5">
                                                                <label for="CP"> EE</label>
                                                            </div>
                                                            <div class="col-sm-3">

                                                                <input type="checkbox" id="CP" name="dept" value="8">
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
                                                                <td id="col0"><input type="text" placeholder="e.g. DevOps Engineer" class="form-control" name="jobRole[]"></td>
                                                                <td id="col1"><input type="text" placeholder="e.g. 500000" class="form-control" name="salary[]"></td>
                                                            </tr>

                                                        </table>
                                                        <table>
                                                            <tr>
                                                                <td><input type="button" value="Add Job Role" onclick="addRows()" class="text-center btn btn-sm btn-primary m-5" /></td>
                                                                <td><input type="button" value="Delete " onclick="deleteRows()" class="text-center btn btn-sm btn-danger m-5" /></td>

                                                            </tr>
                                                        </table>
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

                                                        <div class=" col-sm-5 mx-2 mb-4">
                                                            <p class="m-b-5 f-w-600">Attach PDF('s)</p>

                                                            <input type="file" id="actual-btn" name="PDF" multiple hidden />

                                                            <label for="actual-btn" class="label">Upload PDF</label>

                                                            <span id="file-chosen">No file chosen</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <button class="text-center btn btn-primary">Add Drive</button>
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