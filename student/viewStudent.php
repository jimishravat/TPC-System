<?php

// session_start();
include("../database.php");
include("../helper/authorization.php");
include("../helper/fileUpload.php");

// Edit variable
$isEdit = false;
$addStudent = false;
$show = false;
if ($studentAccess == 1) {
    $student_fetch = $conn->query("SELECT * FROM student,student_academic,student_document,department WHERE student.s_id = student_academic.s_id AND student.s_id=student_document.s_id AND student.s_dept = department.dept_id AND student.s_id = '$id'");
    $student = $student_fetch->fetch_assoc();
    $show = true;
    // if edit button is clicked 
    if (isset($_GET["editAccess"])) {
        $isEdit = true;
        $show = false;
    }
}

if ($studentAccess == 0) {
    $addStudent = true;
}

if (isset($_POST["add-student"])) {

    // target location for upload all document files
    $targetLoc = "./uploads/student/";

    // basic information of student
    $id = $_SESSION["studentUserId"];
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $mname = mysqli_real_escape_string($conn, $_POST["mname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $linkedin = mysqli_real_escape_string($conn, $_POST["linkedin"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $pAdd = mysqli_real_escape_string($conn, $_POST["pAddress"]);
    $cAdd = mysqli_real_escape_string($conn, $_POST["cAddress"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $enroll = mysqli_real_escape_string($conn, $_POST["enrollement"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $placement = mysqli_real_escape_string($conn, $_POST["pgoal"]);


    // data for ssc of student
    $ssc_year = mysqli_real_escape_string($conn, $_POST["ssc_year"]);
    $ssc_pr = mysqli_real_escape_string($conn, $_POST["ssc_pr"]);
    $ssc_total = mysqli_real_escape_string($conn, $_POST["ssc_total"]);
    $ssc_board = mysqli_real_escape_string($conn, $_POST["ssc_board"]);
    $ssc_school = mysqli_real_escape_string($conn, $_POST["ssc_school"]);
    $ssc_gap = mysqli_real_escape_string($conn, $_POST["ssc_gap"]);


    // data for student who is hsc
    $hsc_year = mysqli_real_escape_string($conn, $_POST["hsc_year"]);
    $hsc_th_p_pr = mysqli_real_escape_string($conn, $_POST["hsc_th_p_pr"]);
    $hsc_th_pr = mysqli_real_escape_string($conn, $_POST["hsc_th_pr"]);
    $hsc_th_marks  = mysqli_real_escape_string($conn, $_POST["hsc_th_marks"]);
    $hsc_th_p_marks = mysqli_real_escape_string($conn, $_POST["hsc_th_p_marks"]);
    $hsc_gap = mysqli_real_escape_string($conn, $_POST["hsc_gap"]);
    $hsc_board = mysqli_real_escape_string($conn, $_POST["hsc_board"]);
    $hsc_school = mysqli_real_escape_string($conn, $_POST["hsc_school"]);
    $hsc_gap = mysqli_real_escape_string($conn, $_POST["hsc_gap"]);

    // data for student who is d2d
    $d2d_year = mysqli_real_escape_string($conn, $_POST["d2d_year"]);
    $d2d_cgpa = mysqli_real_escape_string($conn, $_POST["d2d_cgpa"]);
    $d2d_college = mysqli_real_escape_string($conn, $_POST["d2d_college"]);
    $d2d_sem1 = mysqli_real_escape_string($conn, $_POST["d2d_sem1"]);
    $d2d_sem2 = mysqli_real_escape_string($conn, $_POST["d2d_sem2"]);
    $d2d_sem3 = mysqli_real_escape_string($conn, $_POST["d2d_sem3"]);
    $d2d_sem4 = mysqli_real_escape_string($conn, $_POST["d2d_sem4"]);
    $d2d_sem5 = mysqli_real_escape_string($conn, $_POST["d2d_sem5"]);
    $d2d_sem6 = mysqli_real_escape_string($conn, $_POST["d2d_sem6"]);
    $d2d_back = mysqli_real_escape_string($conn, $_POST["d2d_back"]);
    $d2d_gap = mysqli_real_escape_string($conn, $_POST["d2d_gap"]);

    // data for student bvm college information
    $bvm_sem1 = mysqli_real_escape_string($conn, $_POST["sem1"]);
    $bvm_sem2 = mysqli_real_escape_string($conn, $_POST["sem2"]);
    $bvm_sem3 = mysqli_real_escape_string($conn, $_POST["sem3"]);
    $bvm_sem4 = mysqli_real_escape_string($conn, $_POST["sem4"]);
    $bvm_sem5 = mysqli_real_escape_string($conn, $_POST["sem5"]);
    $bvm_sem6 = mysqli_real_escape_string($conn, $_POST["sem6"]);
    $bvm_aback = mysqli_real_escape_string($conn, $_POST["a_back"]);
    $bvm_dback = mysqli_real_escape_string($conn, $_POST["d_back"]);
    $bvm_tback = mysqli_real_escape_string($conn, $_POST["t_back"]);
    $bvm_cpi = mysqli_real_escape_string($conn, $_POST["cpi"]);


    // Data for students documents
    if (file_exists($_FILES["sscMarksheet"]["name"])) {
        $ssc_marksheet = singleFile($_FILES["sscMarksheet"]["name"], $_FILES["sscMarksheet"]["tmp_name"], $targetLoc);
    } else {
        $ssc_marksheet = "";
    }

    if (file_exists($_FILES["hscMarksheet"]["name"])) {
        $hsc_marksheet = singleFile($_FILES["hscMarksheet"]["name"], $_FILES["hscMarksheet"]["tmp_name"], $targetLoc);
    } else {
        $hsc_marksheet = "";
    }

    if (file_exists($_FILES["d2dMarksheet"]["name"])) {
        $d2d_marksheet = singleFile($_FILES["d2dMarksheet"]["name"], $_FILES["d2dMarksheet"]["tmp_name"], $targetLoc);
    } else {
        $d2d_marksheet = "";
    }

    if (file_exists($_FILES["bvmMarksheet"]["name"])) {
        $bvm_marksheet = singleFile($_FILES["bvmMarksheet"]["name"], $_FILES["bvmMarksheet"]["tmp_name"], $targetLoc);
    } else {
        $bvm_marksheet = "";
    }

    if (file_exists($_FILES["resume"]["name"])) {
        $resume = singleFile($_FILES["resume"]["name"], $_FILES["resume"]["tmp_name"], $targetLoc);
    } else {
        $resume = "";
    }

    if (file_exists($_FILES["profile"]["name"])) {
        $photo = singleFile($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"], $targetLoc);
    } else {
        $photo = "";
    }




    // Queries to update the student information
    $updateStudent = $conn->query("UPDATE `student` SET `s_fname`='$fname',`s_lname`='$lname',`s_mname`='$mname',`s_email`='$email',`s_mobile`='$mobile',`s_gender`='$gender',`s_dob`='$dob',`s_category`='$category',`s_linkedin`='$linkedin',`s_enrollment`='$enroll',`s_pAddress`='$pAdd',`s_cAdresss`='$cAdd',`future_goal`='$placement' WHERE `s_id`='$id'");

    $updateStudentAcademic = $conn->query("UPDATE `student_academic` SET `ssc_passing_year`='$ssc_year',`ssc_total`='$ssc_total',`ssc_percentage`='$ssc_pr',`ssc_board`='$ssc_board',`ssc_school`='$ssc_school',`ssc_educational_gap`='$ssc_gap',`hsc_passing_year`='$hsc_year',`hsc_th_percentage`='$hsc_th_pr',`hsc_th_p_percentage`='$hsc_th_p_pr',`hsc_th_marks`='$hsc_th_marks',`hsc_th_p_marks`='$hsc_th_p_marks',`hsc_board`='$hsc_board',`hsc_school`='$hsc_school',`hsc_educational_gap`='$hsc_gap',`d2d_passing_year`='$d2d_year',`d2d_cgpa`='$d2d_cgpa',`d2d_college`='$d2d_college',`d2d_sem1`='$d2d_sem1',`d2d_sem2`='$d2d_sem2',`d2d_sem3`='$d2d_sem3',`d2d_sem4`='$d2d_sem4',`d2d_sem5`='$d2d_sem5',`d2d_sem6`='$d2d_sem6',`d2d_backlogs`='$d2d_back',`d2d_educational_gap`='$d2d_gap',`bvm_sem1`='$bvm_sem1',`bvm_sem2`='$bvm_sem2',`bvm_sem3`='$bvm_sem3',`bvm_sem4`='$bvm_sem4',`bvm_sem5`='$bvm_sem5',`bvm_sem6`='$bvm_sem6',`bvm_active_backlog`='$bvm_aback',`bvm_dead_backlog`='$bvm_dback',`bvm_total_backlog`='$bvm_tback',`bvm_cpi`='$bvm_cpi' WHERE `s_id`='$id'");


    $updateStudentDocument = $conn->query("UPDATE `student_document` SET `ssc_marksheet`='$ssc_marksheet',`hsc_marksheet`='$hsc_marksheet',`d2d_marksheet`='$d2d_marksheet',`bvm_marksheet`='$bvm_marksheet',`resume`='$resume',`photo`='$photo' WHERE 1");
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>View Student</title>

    <style>
        /* Input File */
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile+label {
            font-size: 20px;
            width: 150px;
            height: 50px;
            padding-top: 10px;
            padding-left: 10px;
            /* font-wei#e2dad1700; */
            color: #f2efeb;
            border-radius: 10px;
            background-color: #5cb85c;
            display: inline-block;
        }

        .inputfile:focus+label,
        .inputfile+label:hover {
            background-color: #5bc0de;
        }

        .inputfile+label {
            cursor: pointer;
            /* "hand" cursor */
        }

        .inputfile:focus+label {
            outline: 1px dotted #000;
            outline: -webkit-focus-ring-color auto 5px;
        }

        .label {
            background-color: #5cb85c;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }
    </style>

</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <div class="">
                            <form action="./viewStudent.php" enctype="multipart/form-data" method="post">

                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">

                                                    <img src=" <?php if ($show) echo "../uploads/student/" . $student["photo"];
                                                                else echo "../images/user-icon.png" ?>" class="img-radius my-5" id="showProfile" alt="User-Profile-Image">

                                                    <?php if ($addStudent || $isEdit) : ?>
                                                        <input type="file" name="profile" id="profile" class="btn btn-sm inputfile">
                                                        <label for="profile">Upload</label>
                                                    <?php endif ?>
                                                </div>
                                                <p>
                                                    <span class="badge text-white badge-lg badge-dot">
                                                        <?php if ($studentAccess == 1) : ?>
                                                            <i class="bg-success"></i> Success
                                                        <?php else : ?>
                                                            <i class="bg-warning"></i> Pending
                                                        <?php endif ?>

                                                    </span>
                                                </p>
                                                <?php if ($studentAccess == 1) : ?>
                                                    <h2 class="f-w-600">
                                                        <?php echo $student["s_fname"] . " " . $student["s_lname"] ?>
                                                    </h2>
                                                    <p><?php echo $student["s_email"] ?></p>
                                                    <p><?php echo $student["s_id"] ?></p>
                                                    <!-- <p>Information Technology</p> -->
                                                    <div class="row">

                                                        <div class="col-sm-5">
                                                            <p class="m-b-10 f-w-600">
                                                                <?php if ($student["is_d2d"] == 1) : echo "D2D";
                                                                else : echo "Regular";
                                                                endif ?>
                                                            </p>
                                                            <!-- <h6 class="f-w-400">f_name</h6> -->
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p class="m-b-10 f-w-600"><?php echo $student["dept_name"] ?></p>
                                                            <!-- <h6 class="f-w-400">f_name</h6> -->
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="http://localhost/tpc/student/viewStudent.php?editAccess=true" class="text-reset">
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>


                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6 ">
                                                        <p class="m-b-5 f-w-600">First Name</p>
                                                        <?php if ($show) : ?>
                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_fname"] ?></h6>
                                                        <?php endif ?>

                                                        <?php if ($addStudent || $isEdit) : ?>
                                                            <input type="text" class="m-b-5 form-control" name="fname" id="" value="<?php if ($isEdit) echo $student["s_fname"] ?>">
                                                        <?php endif ?>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Middle Name</p>
                                                        <?php if ($show) : ?>
                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_mname"] ?></h6>
                                                        <?php endif ?>

                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <input type="text" class="m-b-5 form-control" name="mname" id="" value="<?php if ($isEdit) echo $student["s_mname"] ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Last Name</p>
                                                        <?php if ($show) : ?>


                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_lname"] ?></h6>
                                                        <?php endif ?>

                                                        <?php if ($addStudent || $isEdit) : ?>


                                                            <input type="text" class="m-b-5 form-control" name="lname" id="" value="<?php if ($isEdit) echo $student["s_lname"] ?>">
                                                        <?php endif ?>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Phone</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_mobile"] ?></h6>
                                                        <?php endif ?>

                                                        <?php if ($addStudent || $isEdit) : ?>


                                                            <input type="number" class="m-b-5 form-control" name="mobile" id="" value="<?php if ($isEdit) echo $student["s_mobile"] ?>">
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Email</p>
                                                        <?php if ($show) : ?>
                                                            <h6 class="text-muted mb-5 f-w-400"><?php echo $student["s_email"] ?></h6>
                                                        <?php endif ?>

                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <input type="email" class="m-b-5 mb-5 form-control" name="email" id="" value="<?php if ($isEdit) echo $student["s_email"] ?>">
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Gender</p>
                                                        <?php if ($show) : ?>
                                                            <h6 class="text-muted f-w-400"><?php echo strtoupper($student["s_gender"]) ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <p>
                                                                <input type="radio" id="Male" name="gender" value="male" required <?php if ($isEdit) {
                                                                                                                                        if ($student["s_gender"] == "male") :
                                                                                                                                            echo "checked";
                                                                                                                                        endif;
                                                                                                                                    }
                                                                                                                                    ?>> Male</input>
                                                            </p>

                                                            <p>
                                                                <input type="radio" id="Female" name="gender" value="female" required<?php if ($isEdit) {
                                                                                                                                            if ($student["s_gender"] == "female") :
                                                                                                                                                echo "checked";
                                                                                                                                            endif;
                                                                                                                                        }
                                                                                                                                        ?>> Female</input>
                                                            </p>
                                                        <?php endif ?>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Linkedin URL</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_linkedin"] ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <input type="text" class="m-b-5 form-control" name="linkedin" id="" value="<?php if ($isEdit) echo $student["s_linkedin"] ?>">
                                                        <?php endif ?>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Date of Birth</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_dob"] ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <input type="date" class="m-b-5 form-control" name="dob" id="" value="<?php if ($isEdit) echo $student["s_dob"] ?>">
                                                        <?php endif ?>

                                                    </div>
                                                </div>

                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Other Details </h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-5 f-w-600">Enrollment Number</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_enrollment"] ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <input type="text" class="m-b-5 form-control" name="enrollment" id="" value="<?php if ($isEdit) echo $student["s_enrollment"] ?>">
                                                        <?php endif ?>

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p class="m-b-5 f-w-600">Category</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo strtoupper($student["s_category"]) ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <p> <input type="radio" id="general" name="category" value="general" <?php if ($isEdit) {
                                                                                                                                        if ($student["s_category"] == "general") :
                                                                                                                                            echo "checked";
                                                                                                                                        endif;
                                                                                                                                    }
                                                                                                                                    ?>> General</input> </p>
                                                            <p> <input type="radio" id="scst" name="category" value="sc/st" <?php if ($isEdit) {
                                                                                                                                if ($student["s_category"] == "sc/st") :
                                                                                                                                    echo "checked";
                                                                                                                                endif;
                                                                                                                            }
                                                                                                                            ?>> SC/ST</input> </p>
                                                            <p> <input type="radio" id="obc" name="category" value="obc" <?php if ($isEdit) {
                                                                                                                                if ($student["s_category"] == "obc") :
                                                                                                                                    echo "checked";
                                                                                                                                endif;
                                                                                                                            }
                                                                                                                            ?>> OBC</input> </p>

                                                        <?php endif ?>

                                                    </div>
                                                    <div class="col-sm-5">
                                                        <p class="m-b-5 f-w-600">Future Goals(1st Priority)</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo $student["future_goal"] ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <p> <input type="radio" id="pplacement" name="pgoal" value="Placement" <?php if ($isEdit) {
                                                                                                                                        if ($student["future_goal"] == "Placement") :
                                                                                                                                            echo "checked";
                                                                                                                                        endif;
                                                                                                                                    }
                                                                                                                                    ?>> Campus Placement</input> </p>
                                                            <p> <input type="radio" id="pstudy" name="pgoal" value="Masters" <?php if ($isEdit) {
                                                                                                                                    if ($student["future_goal"] == "Masters") :
                                                                                                                                        echo "checked";
                                                                                                                                    endif;
                                                                                                                                }
                                                                                                                                ?>> Further Studies</input> </p>
                                                        <?php endif ?>

                                                    </div>

                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400"><?php echo $student["s_pAddress"] ?></h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <textarea name="pAddress" id="" cols="30" rows="5" class="text-black">
                                                    <?php if ($isEdit) echo $student["s_pAddress"] ?>
                                                    </textarea>
                                                        <?php endif ?>


                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address</p>
                                                        <?php if ($show) : ?>

                                                            <h6 class="text-muted f-w-400">
                                                                <?php echo $student["s_cAdresss"] ?>

                                                            </h6>
                                                        <?php endif ?>
                                                        <?php if ($addStudent || $isEdit) : ?>

                                                            <textarea name="cAddress" id="" cols="30" rows="5" class="text-black">

                                                    <?php if ($isEdit) echo $student["s_cAdresss"] ?>

                                                    </textarea>
                                                        <?php endif ?>


                                                    </div>
                                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">SSC Details </h6>
                                                    <div class="row m-b-20">
                                                        <div class="col-sm-3">
                                                            <p class="m-b-5 f-w-600">Passing Year</p>
                                                            <?php if ($show) : ?>

                                                                <h6 class="text-muted mb-5 f-w-400"><?php echo $student["ssc_passing_year"] ?></h6>
                                                            <?php endif ?>

                                                            <?php if ($addStudent || $isEdit) : ?>

                                                                <input type="text" class="m-b-5 mb-5 form-control" name="ssc_year" id="" value="<?php if ($isEdit) echo $student["ssc_passing_year"] ?>">
                                                            <?php endif ?>

                                                        </div>

                                                        <div class="col-sm-3">
                                                            <p class="m-b-5 f-w-600">Percentage</p>
                                                            <?php if ($show) : ?>

                                                                <h6 class="text-muted f-w-400"><?php echo $student["ssc_percentage"] ?></h6>
                                                            <?php endif ?>

                                                            <?php if ($addStudent || $isEdit) : ?>

                                                                <input type="text" class="m-b-5 form-control" name="ssc_pr" id="" value="<?php if ($isEdit) echo $student["ssc_percentage"] ?>">
                                                            <?php endif ?>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">out of 600
                                                                or out of 10(other board)
                                                            </p>
                                                            <?php if ($show) : ?>

                                                                <h6 class="text-muted f-w-400"><?php echo $student["ssc_total"] ?></h6>
                                                            <?php endif ?>

                                                            <?php if ($addStudent || $isEdit) : ?>

                                                                <input type="text" class="m-b-5 form-control" name="ssc_total" id="" value="" placeholder="<?php if ($isEdit) echo $student["ssc_total"] ?>">
                                                            <?php endif ?>

                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-3">
                                                                <p class="m-b-5 f-w-600">Board of SSC</p>
                                                                <?php if ($show) : ?>

                                                                    <h6 class="text-muted f-w-400"><?php echo $student["ssc_board"] ?></h6>
                                                                <?php endif ?>

                                                                <?php if ($addStudent || $isEdit) : ?>

                                                                    <input type="text" class="m-b-5 form-control" name="ssc_board" id="" value="<?php if ($isEdit) echo $student["ssc_board"] ?>">
                                                                <?php endif ?>

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">School Name</p>
                                                                <?php if ($show) : ?>

                                                                    <h6 class="text-muted f-w-400"><?php echo $student["ssc_school"] ?></h6>
                                                                <?php endif ?>

                                                                <?php if ($addStudent || $isEdit) : ?>

                                                                    <input type="text" class="m-b-5 form-control" name="ssc_school" id="" value="<?php if ($isEdit) echo $student["ssc_school"] ?>">
                                                                <?php endif ?>

                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="m-b-5 f-w-600">SSC Marksheet</p>
                                                                <?php if ($show) : ?>
                                                                    <a href="../uploads/student/<?php echo $student["ssc_marksheet"] ?>" target="_blank" class=" text-white mb-2 btn btn-sm btn-primary" rel="noreferrer noopener">
                                                                        View
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if ($addStudent || $isEdit) : ?>
                                                                    <input type="file" name="sscMarksheet" class="btn btn-sm btn-primary inputfile" id="sscMarksheet">
                                                                    <label for="sscMarksheet" class="text-black">Upload</label>
                                                                <?php endif ?>
                                                                <!-- <span id="file-chosen-ssc" class="text-black">input</span> -->
                                                            </div>
                                                            <div class="row m-b-20">
                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">Educational Gaps after SSC(0 if NA)</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["ssc_educational_gap"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="ssc_gap" id="" value="<?php if ($isEdit) echo $student["ssc_educational_gap"] ?>">
                                                                    <?php endif ?>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php if ($_SESSION["is_d2d"] == 0) : ?>
                                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HSC Details </h6>
                                                            <div class="row m-b-20">
                                                                <div class="col-sm-3">
                                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted mb-5 f-w-400"><?php echo $student["hsc_passing_year"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 mb-5 form-control" name="hsc_year" id="" value="<?php if ($isEdit) echo $student["hsc_passing_year"] ?>">
                                                                    <?php endif ?>

                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">Percentage(Theory+Practical)</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted mb-5 f-w-400"><?php echo $student["hsc_th_p_percentage"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 mb-5 form-control" name="hsc_th_p_pr" id="" value="<?php if ($isEdit) echo $student["hsc_th_p_percentage"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">Percentage(Theory)</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["hsc_th_percentage"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="hsc_th_pr" id="" value="<?php if ($isEdit) echo $student["hsc_th_percentage"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-7">
                                                                        <p class="m-b-5 f-w-600">Theory Marks out of 500(410 if CBSE)
                                                                        </p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["hsc_th_marks"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="hsc_th_marks" id="" value="<?php if ($isEdit) echo $student["hsc_th_p_marks"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Board of HSC</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["hsc_board"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="hsc_board" id="" value="<?php if ($isEdit) echo $student["hsc_board"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                </div>
                                                                <div class="row m-b-20">

                                                                    <div class="col-sm-7">
                                                                        <p class="m-b-5 f-w-600">Theory+Practical Marks out of 650(500 if CBSE)
                                                                        </p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted mb-5 f-w-400"><?php echo $student["hsc_th_p_marks"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 mb-5 form-control" name="hsc_th_p_marks" id="" value="<?php if ($isEdit) echo $student["hsc_th_p_marks"] ?>">
                                                                        <?php endif ?>

                                                                    </div>

                                                                    <div class="col-sm-7">
                                                                        <p class="m-b-5 f-w-600">School Name</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["hsc_school"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="hsc_school" id="" value="<?php if ($isEdit) echo $student["hsc_school"] ?>">
                                                                        <?php endif ?>

                                                                    </div>

                                                                    <div class="col-sm-5">
                                                                        <p class="m-b-5 f-w-600">Educational Gaps after HSC(0 if NA)</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["hsc_educational_gap"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="hsc_gap" id="" value="<?php if ($isEdit) echo $student["hsc_educational_gap"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">HSC Marksheet</p>
                                                                        <?php if ($show) : ?>
                                                                            <a href="../uploads/student/<?php echo $student["hsc_marksheet"] ?>" target="_blank" class=" text-white mb-2 btn btn-sm btn-primary" rel="noreferrer noopener">
                                                                                View
                                                                            </a>
                                                                        <?php endif ?>
                                                                        <?php if ($addStudent || $isEdit) : ?>
                                                                            <input type="file" name="hscMarksheet" class="btn btn-sm btn-primary inputfile" id="hscMarksheet">
                                                                            <label for="hscMarksheet" class="text-black">Upload</label>
                                                                        <?php endif ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>

                                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">D2D Details </h6>
                                                            <div class="row m-b-20">
                                                                <div class="col-sm-6">
                                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted mb-5 f-w-400"><?php echo $student["d2d_passing_year"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 mb-5 form-control" name="d2d_year" id="" value="<?php if ($isEdit) echo $student["d2d_passing_year"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p class="m-b-5 f-w-600">Final CGPA</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["d2d_cgpa"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="d2d_cgpa" id="" value="<?php if ($isEdit) echo $student["d2d_cgpa"] ?>">
                                                                    <?php endif ?>

                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <p class="m-b-5 f-w-600">College Name</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted mb-5 f-w-400"><?php echo $student["d2d_college"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 mb-5 form-control" name="d2d_college" id="" value="<?php if ($isEdit) echo $student["d2d_college"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">SEM 1 SPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted mb-5 f-w-400"><?php echo $student["d2d_sem1"] ?></h6>
                                                                        <?php endif ?>


                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 mb-5 form-control" name="d2d_sem1" id="" value="<?php if ($isEdit) echo $student["d2d_sem1"] ?>">
                                                                        <?php endif ?>


                                                                    </div>


                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">SEM 2 SPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_sem2"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d2d_sem2" id="" value="<?php if ($isEdit) echo $student["d2d_sem2"] ?>">
                                                                        <?php endif ?>


                                                                    </div>


                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">SEM 3 SPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_sem3"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d2d_sem3" id="" value="<?php if ($isEdit) echo $student["d2d_sem3"] ?>">
                                                                        <?php endif ?>


                                                                    </div>


                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">SEM 4 SPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_sem4"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d2d_sem4" id="" value="<?php if ($isEdit) echo $student["d2d_sem4"] ?>">
                                                                        <?php endif ?>



                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">SEM 5 SPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_sem5"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d2d_sem5" id="" value="<?php if ($isEdit) echo $student["d2d_sem5"] ?>">
                                                                        <?php endif ?>


                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">SEM 6 SPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_sem6"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d2d_sem6" id="" value="<?php if ($isEdit) echo $student["d2d_sem6"] ?>">
                                                                        <?php endif ?>


                                                                    </div>
                                                                </div>
                                                                <div class="row m-b-20">

                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Total Backlogs</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_backlogs"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="number" class="m-b-5 form-control" name="d2d_back" id="" value="<?php if ($isEdit) echo $student["d2d_backlogs"] ?>">
                                                                        <?php endif ?>

                                                                    </div>

                                                                    <div class="col-sm-5">
                                                                        <p class="m-b-5 f-w-600">Educational Gaps after Diploma(0 if NA)</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["d2d_educational_gap"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d2d_gap" id="" value="<?php if ($isEdit) echo $student["d2d_educational_gap"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Diploma Certificate & All Marksheets</p>
                                                                        <?php if ($show) : ?>
                                                                            <a href="../uploads/student/<?php echo $student["d2d_marksheet"] ?>" target="_blank" class=" text-white mb-2 btn btn-sm btn-primary" rel="noreferrer noopener">
                                                                                View
                                                                            </a>
                                                                        <?php endif ?>
                                                                        <?php if ($addStudent || $isEdit) : ?>
                                                                            <input type="file" name="d2dMarksheet" class="btn btn-sm btn-primary inputfile" id="d2dMarksheet">
                                                                            <label for="d2dMarksheet" class="text-black">Upload</label>
                                                                        <?php endif ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>

                                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">College Details</h6>
                                                        <div class="row m-b-20">
                                                            <div class="row m-b-20">
                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">SEM 1 SPI</p>
                                                                    <?php if ($show) : ?>
                                                                        <h6 class="text-muted mb-5 f-w-400"><?php echo $student["bvm_sem1"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 mb-5 form-control" name="sem1" id="" value="<?php if ($isEdit) echo $student["bvm_sem1"] ?>">
                                                                    <?php endif ?>


                                                                </div>


                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">SEM 2 SPI</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["bvm_sem2"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="sem2" id="" value="<?php if ($isEdit) echo $student["bvm_sem2"] ?>">
                                                                    <?php endif ?>

                                                                </div>


                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">SEM 3 SPI</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["bvm_sem3"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="sem3" id="" value="<?php if ($isEdit) echo $student["bvm_sem3"] ?>">
                                                                    <?php endif ?>

                                                                </div>


                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">SEM 4 SPI</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["bvm_sem4"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="sem4" id="" value="<?php if ($isEdit) echo $student["bvm_sem4"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">SEM 5 SPI</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["bvm_sem5"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="sem5" id="" value="<?php if ($isEdit) echo $student["bvm_sem5"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <p class="m-b-5 f-w-600">SEM 6 SPI</p>
                                                                    <?php if ($show) : ?>

                                                                        <h6 class="text-muted f-w-400"><?php echo $student["bvm_sem6"] ?></h6>
                                                                    <?php endif ?>

                                                                    <?php if ($addStudent || $isEdit) : ?>

                                                                        <input type="text" class="m-b-5 form-control" name="sem6" id="" value="<?php if ($isEdit) echo $student["bvm_sem6"] ?>">
                                                                    <?php endif ?>

                                                                </div>
                                                            </div>
                                                            <div class="row m-b-20">
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Current CPI</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted mb-5 f-w-400"><?php echo $student["bvm_cpi"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 mb-5 form-control" name="cpi" id="" value="<?php if ($isEdit) echo $student["bvm_cpi"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Active Backlog</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["bvm_active_backlog"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="a_back" id="" value="<?php if ($isEdit) echo $student["bvm_active_backlog"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Cleared Backlog</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["bvm_dead_backlog"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="d_back" id="" value="<?php if ($isEdit) echo $student["bvm_dead_backlog"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Total Backlog</p>
                                                                        <?php if ($show) : ?>

                                                                            <h6 class="text-muted f-w-400"><?php echo $student["bvm_total_backlog"] ?></h6>
                                                                        <?php endif ?>

                                                                        <?php if ($addStudent || $isEdit) : ?>

                                                                            <input type="text" class="m-b-5 form-control" name="t_back" id="" value="<?php if ($isEdit) echo $student["bvm_total_backlog"] ?>">
                                                                        <?php endif ?>

                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">BVM all Marksheets</p>
                                                                        <?php if ($show) : ?>
                                                                            <a href="../uploads/student/<?php echo $student["bvm_marksheet"] ?>" target="_blank" class=" text-white mb-2 btn btn-sm btn-primary" rel="noreferrer noopener">
                                                                                View
                                                                            </a>
                                                                        <?php endif ?>
                                                                        <?php if ($addStudent || $isEdit) : ?>
                                                                            <input type="file" name="bvmMarksheet" class="btn btn-sm btn-primary inputfile" id="bvmMarksheet">
                                                                            <label for="bvmMarksheet" class="text-black">Upload</label>
                                                                        <?php endif ?>
                                                                    </div>

                                                                    <div class="col-sm-12 mt-5">
                                                                        <p class="mb-5 f-w-600">Resume</p>
                                                                        <?php if ($show) : ?>
                                                                            <a href="../uploads/student/<?php echo $student["resume"] ?>" target="_blank" class=" text-white mb-2 btn btn-sm btn-primary" rel="noreferrer noopener">
                                                                                View
                                                                            </a>
                                                                        <?php endif ?>
                                                                        <?php if ($addStudent || $isEdit) : ?>
                                                                            <input type="file" name="resume" class="btn btn-sm btn-primary inputfile" id="resume">
                                                                            <label for="resume" class="text-black">Upload</label>
                                                                        <?php endif ?>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <?php if ($addStudent || $isEdit) : ?>
                                                        <input type="submit" value="Save" name="add-student" class="btn btn-primary">
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
        </main>

    </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./helper/sidebar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showProfile').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        $("#profile").change(function() {
            imagePreview(this);
        });
    </script>
</body>

</html>