<?php

include("./database.php");
include("./helper/fileUpload.php");

$statusmsg = '';

// $id_number = $_GET["id"];

// $ac = '20' . $id_number[0] . $id_number[1];
// $ac = intval($ac);
// var_dump($ac);

// if (isset($_POST["upload"])) {
//     $targetdir = "uploads/";
//     $targetfile = $_FILES["pdf"]["name"];

//     $result = singleFile($_FILES["pdf"]["name"], $_FILES["pdf"]["tmp_name"], $targetdir);

//     // $targetFilePath = $targetdir . $targetfile;

//     if ($result != 0) {
//         $insert = $conn->query("INSERT INTO `test`(`file_loc`) VALUES ('$result')");

//         if ($insert) {
//             $statusmsg = "file " . $targetfile . " uploaded success";
//         } else {
//             $statusmsg = "error";
//         }
//     }
// }
// echo $statusmsg;


// $output = shell_exec("python ../predict/test.py");
// var_dump($output);
?>

<!-- <?php

                $allDrives = $conn->query("SELECT company.*, drive.* FROM company,drive WHERE company.company_id = drive.drive_id ");

                while ($drive = $allDrives->fetch_assoc()) {
                    $driveId = $drive["drive_id"];
                    $jobSearch = $conn->query("SELECT * FROM drive_job_role WHERE drive_id = '$driveId'");
                ?>
                    <!-- LOOP START -->
                    <div class="card shadow border-0 my-10 card-width-full">
                        <div class="card-body  ">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-bold d-block"> Deadline : <?php echo $drive["drive_deadline"] ?></span>
                                    <span class="h3 font-bold d-block mb-2"><?php echo $drive["company_name"] ?></span>
                                    <?php while ($job = $jobSearch->fetch_assoc()) {
                                    ?>
                                        <!-- <span class="h5"> | </span> -->
                                        <span class="h5 font-bold  mb-2"><?php echo $job["job_role"] ?> &nbsp; &nbsp;</span>
                                        <!-- <span class="h5"> | &nbsp; &nbsp; </span> -->
                                    <?php
                                    } ?>
                                    <span class="h5 font-semibold d-block mb-0"><?php echo $drive["company_url"] ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape text-white text-lg rounded-circle">
                                        <img src="./uploads/logo/<?php echo $drive["company_logo"] ?>" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 mb-0 text-sm">
                                <!-- <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>13%
                                <i class='bx bxs-error'></i>13
                            </span> -->
                                <span>

                                    <a href="./viewDrive.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-primary btn-sm">View</a>
                                    <a href="./download_excel.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-warning btn-sm">Collect Data</a>
                                    <?php if (!$drive["result_out"]) : ?>
                                        <a href="./addresult.php?drive_id=<?php echo $drive["drive_id"] ?>" class="btn btn-secondary btn-sm">Add Result</a>
                                    <?php endif ?>
                                    <a title="Edit" href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>

                                    <?php if ($drive["is_active"]) : ?>

                                        <a title="De-Activate" href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral btn-danger-hover">
                                            <i class="bi bi-bookmark-x "></i>
                                        </a>
                                    <?php else : ?>
                                        <a title="Activate" href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral btn-success-hover">
                                            <i class="bi bi-bookmark-check "></i>
                                        </a>

                                    <?php endif ?>
                                    <a title="Delete" href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral btn-danger-hover"><i class="bi bi-trash"></i></a>

                                </span>

                                <!-- Status -->
                                <?php if ($drive["is_active"]) : ?>
                                    <span class="badge mx-5 badge-lg badge-dot">
                                        <i class="bg-success"></i>Active
                                    </span>
                                <?php else : ?>
                                    <span class="badge mx-5 badge-lg badge-dot">
                                        <i class="bg-danger"></i>In-Active
                                    </span>
                                <?php endif ?>
                                <span class="badge mx-5 badge-lg badge-dot">
                                    <?php if ($drive["result_out"]) : ?>
                                        <i class="bg-success"></i>
                                    <?php else : ?>
                                        <i class="bg-warning"></i>
                                    <?php endif ?>

                                    Result
                                </span>
                                <!-- <span class="text-nowrap text-xs text-muted">Status</span> -->
                            </div>
                        </div>
                    </div>
                    <!-- LOOP ENDS -->
                <?php
                }

                ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box {
            color: #fff;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .red {
            background: #ff0000;
        }

        .green {
            background: #228b22;
        }

        .blue {
            background: #0000ff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>
</head>

<body>
    <div>
        <label><input type="radio" name="colorRadio" value="red" /> red</label>
        <label><input type="radio" name="colorRadio" value="green" /> green</label>
        <label><input type="radio" name="colorRadio" value="blue" /> blue</label>
    </div>
    <div class="red box">
        You have selected <strong>red radio button</strong> so i am here
    </div>
    <div class="green box">
        You have selected <strong>green radio button</strong> so i am here
    </div>
    <div class="blue box">
        You have selected <strong>blue radio button</strong> so i am here
    </div>

    <form action="./test.php" enctype="multipart/form-data" method="post">
        <input type="file" name="pdf" id="" multiple>
        <input type="submit" value="Submit" name="upload">
    </form>
    <?php
    $result = $conn->query("SELECT * FROM test");

    while ($row = mysqli_fetch_assoc($result)) {



    ?>
        <a href="./uploads/<?php echo $row["file_loc"] ?>" target="_blank" rel="noopener noreferrer"><?php echo $row["file_loc"] ?></a>

    <?php } ?>

    <?php
    var_dump(base64_encode(strrev(md5("Tpo@1234"))));
    // $a = array("19cp015", "19cp016", "19cp017", "19cp018");
    // $a = json_encode($a);
    // $insert = $conn->query("UPDATE `drive_job_role` SET `applied`='$a' WHERE job_id = '1'");
    $select = $conn->query("SELECT company.company_name, company.company_url, company.company_location, drive.drive_deadline, drive.dept_eligible, drive_job_role.job_role FROM company,drive_job_role,drive WHERE company.company_id = drive.company_id AND drive_job_role.drive_id = drive.drive_id;");
    // $applied = json_decode($row["applied"], true);

    while ($row = $select->fetch_assoc()) {

        var_dump($row);
    }
    ?>
</body>

</html>