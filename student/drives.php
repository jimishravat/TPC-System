<?php
include("../database.php");
include("./applyDrive.php");
include("../helper/authorization.php");

if (!isset($_SESSION["studentUserId"])) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

if ($studentAccess == 0) {
    echo "<script> alert('Complete Your Profile and Wait for Approval') </script>";
    echo "<script> window.location.href = 'http://localhost/tpc/student/viewStudent.php'; </script>";
}
$dept = $_SESSION["studentDept"];
$id = $_SESSION["studentUserId"];

function print_msg($s_id, $drive)
{
    global $conn;
    $s_data = $conn->query("SELECT * FROM student_placed WHERE s_id = '$s_id'");
    $s_drive_data = $s_data->fetch_assoc();

    $applyDrive = json_decode($s_drive_data["drive_applied"], true);
    $selectedInDrive = json_decode($s_drive_data["selected_in_drive"], true);
    $rejectDrive = json_decode($s_drive_data["reject_drive"], true);
    $finalDrive = $s_drive_data["drive_selected"];

    // var_dump($applyDrive);
    // var_dump($selectedInDrive);
    // var_dump($rejectDrive);
    // var_dump($finalDrive);

    // Type of Msg
    // 0 => Application Submitted
    // 1 => Final Drive Selected
    // 2 => Selected But Rejected
    // 3 => Selected But Yet to Accept/Reject

    $msg_type = 0;

    if (in_array($drive, $applyDrive)) {

        global $msg_type;
        $msg_type = 0;
        if (in_array($drive, $selectedInDrive)) {
            if (in_array($drive, $rejectDrive)) {
                $msg_type = 2;
            } else if ($drive == $finalDrive) {
                $msg_type = 1;
            } else {
                $msg_type = 3;
            }
        }
    }

    return is_null($msg_type) ? "0" : $msg_type;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/drive.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome Student,Your Applied Drives</h1>
        <h5>Below you will find job roles you have applied for</h5>

        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12 row text-primary">
                <?php

                $drive_id_fetch = $conn->query("SELECT * FROM student_placed WHERE s_id = '$id'");
                $help = $drive_id_fetch->fetch_assoc();
                $drive_id_array = json_decode($help["drive_applied"]);

                foreach ($drive_id_array as $drive_id) {
                    $drive_fetch = $conn->query("SELECT company.company_name, drive.job_role FROM drive,company WHERE drive.company_id=company.company_id AND drive.drive_id='$drive_id'");
                    $drive = $drive_fetch->fetch_assoc();

                    $msg_type = print_msg($id, $drive_id);
                ?>

                    <div class="card shadow-3 border-0 mt-5 mx-2 col-sm-12 ">
                        <div class="card-body  ">
                            <div class="row ">
                                <div class="col d-flex">
                                    <span class="h3 font-bold"><?php echo $drive["company_name"] ?> -</span>
                                    <span class="h3 font-semibold mb-0 mx-5"><?php echo $drive["job_role"] ?></span>
                                </div>
                            </div>

                            <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                                <p class="text-primary">
                                    <?php if ($msg_type == 0) {
                                        echo "Application Submitted to Admin";
                                    } elseif ($msg_type == 1 ) {

                                        echo "Congratulations! You have been selected";
                                    } elseif ($msg_type == 3 ) {

                                        echo "Congratulations! You have been selected. Please Accept/Reject the offer as soon as possible";
                                    }else {
                                        echo "You have been selected but you rejected the offer";
                                    }
                                    ?>
                                </p>
                            </div>
                            <?php if ($msg_type == 3) : ?>
                                <a href="" class="btn btn-sm btn-success text-white">Accept</a>
                                <a href="" class="btn btn-sm btn-danger text-white">Reject</a>
                            <?php endif ?>


                        </div>

                    </div>
                <?php
                }

                ?>

            </div>
        </div>






        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>