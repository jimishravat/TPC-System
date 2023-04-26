<?php

include("../database.php");
session_start();


$id = mysqli_real_escape_string($conn, $_GET["id"]);

$student_fetch = $conn->query("SELECT * FROM student,department WHERE student.s_dept = department.dept_id AND s_id = '$id'");
$student = $student_fetch->fetch_assoc();

$student_academic_fetch = $conn->query("SELECT * FROM student_academic WHERE s_id = '$id'");
$student_academic = $student_academic_fetch->fetch_assoc();

$student_document_fetch = $conn->query("SELECT * FROM student_document WHERE s_id = '$id'");
$student_document = $student_document_fetch->fetch_assoc();

$root_folder = '../uploads/student/';
// var_dump($root_folder);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>View Student</title>
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
                                                <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                            </div>
                                            <p>
                                                <span class="badge text-white badge-lg badge-dot">
                                                    <?php if ($student["is_approved"] == 0) : ?>
                                                        <i class="bg-warning"></i> Pending
                                                    <?php else : ?>
                                                        <i class="bg-success"></i> Approved
                                                    <?php endif ?>
                                                </span>
                                            </p>
                                            <!-- <h6 class="f-w-600">Jimish Ravat</h6> -->
                                            <p><?php echo strtoupper($student["s_id"]) ?></p>
                                            <div class="row d-flex align-items-center justify-content-center ">

                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">
                                                        <?php if ($student["is_d2d"] == 1) echo "D2D";
                                                        else echo "Regular"; ?>

                                                    </p>
                                                    <!-- <h6 class="f-w-400">f_name</h6> -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600"><?php echo $student["dept_name"] ?></p>
                                                    <!-- <h6 class="f-w-400">f_name</h6> -->
                                                </div>
                                                <!-- <div class="col-sm-2">
                                                    <a href="#" class="text-reset">
                                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                    </a>
                                                </div> -->
                                            </div>
                                            <div class="row d-flex align-items-center justify-content-center">

                                                <div class="col-sm-6">
                                                    <form action="./studentApprove.php" method="post">
                                                        <input type="hidden" name="approve" value="id">
                                                        <input type="hidden" name="id" value="<?php echo $student["s_id"] ?>">
                                                        <button class="btn-primary btn-success text-dark fw-bolder   p-2 rounded" type="submit">Approve</button>
                                                    </form>
                                                </div>
                                                <!-- <div class="col-sm-6">
                                                    <form action="./studentAction.php" method="post">
                                                        <input type="hidden" name="remarks" value="id">
                                                        <button class="btn-primary btn-warning text-dark fw-bolder   p-2 rounded" type="submit">Remarks</button>
                                                    </form>
                                                </div> -->

                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-5 b-b-default border-top f-w-600">Personal Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6 ">
                                                    <p class="m-b-5 text-muted ">First Name</p>
                                                    <!-- <input type="text" class="form-control" name="" id="" value="hi"> -->
                                                    <h6 class="f-w-600"><?php echo $student["s_fname"] ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="text-muted m-b-5">Middle Name</p>
                                                    <h6 class="f-w-600"><?php echo $student["s_mname"] ?></h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="text-muted m-b-5">Last Name</p>
                                                    <h6 class="f-w-600"><?php echo $student["s_lname"] ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="text-muted m-b-5">Phone</p>
                                                    <h6 class="f-w-600"><?php echo $student["s_mobile"] ?></h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="text-muted m-b-5">Email</p>
                                                    <h6 class="f-w-600"><?php echo $student["s_email"] ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="text-muted m-b-5">Gender</p>
                                                    <h6 class="f-w-600"><?php echo $student["s_gender"] ?></h6>
                                                </div>
                                            </div>
                                            <!-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Father's Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="text-muted m-b-5">First Name</p>
                                                    <h6 class="f-w-600">f_name</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-muted m-b-5">Last Name</p>
                                                    <h6 class="f-w-600">l_name</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-muted m-b-5">Father's Occupation</p>
                                                    <h6 class="f-w-600">f_occupation</h6>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Mother's Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="text-muted m-b-5">First Name</p>
                                                    <h6 class="f-w-600">f_name</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-muted m-b-5">Last Name</p>
                                                    <h6 class="f-w-600">l_name</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="text-muted m-b-5">Mother's Occupation</p>
                                                    <h6 class="f-w-600">m_occupation</h6>
                                                </div>
                                            </div> -->
                                            <h6 class="m-b-20 m-t-40 p-5 b-b-default border-top f-w-600">SSC Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Passing Year</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["ssc_passing_year"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Board</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["ssc_board"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">School</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["ssc_school"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Percentage</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["ssc_percentage"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">out of 600</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["ssc_total"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Educational Gap</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["ssc_educational_gap"] ?></h6>
                                                </div>
                                            </div>

                                            <?php if ($student["is_d2d"] == 1) : ?>
                                                <h6 class="m-b-20 m-t-40 p-5 b-b-default border-top f-w-600">D2D Details </h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Passing Year</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_passing_year"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">CGPA</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_cgpa"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">College</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_college"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Sem - 1</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_sem1"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Sem - 2</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_sem2"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Sem - 3</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_sem3"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Sem - 4</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_sem4"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Sem - 5</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_sem5"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Sem - 6</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_sem6"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Total Backlogs</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_backlogs"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Educational Gap</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["d2d_educational_gap"] ?></h6>
                                                    </div>

                                                </div>
                                            <?php else : ?>
                                                <h6 class="m-b-20 m-t-40 p-5 b-b-default border-top f-w-600">HSC Details </h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Passing Year</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_passing_year"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Board</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_board"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">School</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_school"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Percentage</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_th_p_percentage"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Percentage - Theory</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_th_percentage"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Marks - Theory</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_th_marks"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">out of 600</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_th_p_marks"] ?></h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="text-muted m-b-5">Educational Gap</p>
                                                        <h6 class="f-w-600"><?php echo $student_academic["hsc_educational_gap"] ?></h6>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <h6 class="m-b-20 m-t-40 p-5 b-b-default border-top f-w-600">BVM Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Sem - 1</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_sem1"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Sem - 2</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_sem2"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Sem - 3</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_sem3"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Sem - 4</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_sem4"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Sem - 5</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_sem5"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Sem - 6</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_sem6"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Active Backlogs</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_active_backlog"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Dead Backlogs</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_dead_backlog"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">Total Backlogs</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_total_backlog"] ?></h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="text-muted m-b-5">CPI</p>
                                                    <h6 class="f-w-600"><?php echo $student_academic["bvm_cpi"] ?></h6>
                                                </div>
                                            </div>

                                            <h6 class="m-b-20 m-t-40 p-5 b-b-default border-top f-w-600">Documents </h6>
                                            <div class="row m-b-20">
                                                
                                                <div class="col-sm-3">
                                                    <a href="<?php echo $root_folder . $student_document["resume"] ?>">
                                                        <p class="text-primary m-b-5">Resume</p>
                                                    </a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="<?php echo $root_folder . $student_document["ssc_marksheet"] ?>" target="_blank" rel="noopener noreferrer">
                                                        <p class="text-primary m-b-5">SSC Marksheet</p>
                                                    </a>
                                                </div>
                                                <?php if ($student["is_d2d"] == 1) : ?>

                                                    <div class="col-sm-3">
                                                        <a href="<?php echo $root_folder . $student_document["d2d_marksheet"] ?>" target="_blank" rel="noopener noreferrer">
                                                            <p class="text-primary m-b-5">D2D Marksheet</p>
                                                        </a>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="col-sm-3">
                                                        <a href="<?php echo $root_folder . $student_document["hsc_marksheet"] ?>" target="_blank" rel="noopener noreferrer">
                                                            <p class="text-primary m-b-5">HSC Marksheet</p>
                                                        </a>
                                                    </div>
                                                <?php endif ?>
                                                <div class="col-sm-3">
                                                    <a href="<?php echo $root_folder . $student_document["bvm_marksheet"] ?>" target="_blank" rel="noopener noreferrer">
                                                        <p class="text-primary m-b-5">BVM Marksheet</p>
                                                    </a>
                                                </div>

                                            </div>


                                            <!-- <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                            </ul> -->
                                        </div>
                                    </div>
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