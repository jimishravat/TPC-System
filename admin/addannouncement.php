<?php

include("../database.php");
include("../helper/authorization.php");
include("../helper/sendMail.php");
if (!isset($access)) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}


// add the annoucement

$insertSuccess = 0;
$insertFailure = 0;


if (isset($_POST["add-annouce"])) {
    $title = mysqli_real_escape_string($conn, $_POST["annouce-heading"]);
    $desc = mysqli_real_escape_string($conn, $_POST["annouce-desc"]);
    $date_annouce = mysqli_real_escape_string($conn, $_POST["annouce-date"]);
    $deptEligible = array();
    foreach ($_POST["eligible_dept"] as $selected) {
        if ($selected == 0) {
            for ($i = 1; $i <= 10; $i++) {
                array_push($deptEligible, intval($i));
            }
            break;
        }
        if ($selected == 1 || $selected == 6) {
            array_push($deptEligible, intval($selected));
            array_push($deptEligible, intval($selected + 1));
            continue;
        }
        array_push($deptEligible, intval($selected));
    }
    $deptEligible = json_encode($deptEligible);
    // var_dump($deptEligible);
    $insert = $conn->query("INSERT INTO `annoucements`( `title`, `description`, `date_annouce`, `dept_eligible`) VALUES ('$title','$desc','$date_annouce','$deptEligible')");
    if ($conn->affected_rows) {


        // Subject of the mail
        $subject = "New Annoucement Arrived";

        $body = '
        <html>
        <head>
        </head>
        <body>
        <h1>New Annoucement Arrived</h1>
        <p> ' . $date_annouce . '</p>
        <p>Dear Student,</p>
        <h4>' . $title . '</h4>
        <p>' . $desc . '</p>

        </body>
        </html>
        
        
        ';

        $body = "Date : " . $date_annouce . "\n \n";
        $body .= "Title : " . $title . "\n ";
        $body .= "\t" . $desc . "\n ";

        // Fetch the student list email
        $dept = json_decode($deptEligible);
        $student_query = $conn->query("SELECT s_email FROM student WHERE s_dept IN (" . implode(',', $dept) . ") ");
        while ($student = $student_query->fetch_assoc()) {
            sendMail($student["s_email"], $subject, $body);
        }

        $insertSuccess = 1;
    } else {
        $insertFailure = 1;
    }
    // var_dump($insert);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($insertSuccess == 1 || $insertFailure == 1) : ?>
        <meta http-equiv="refresh" content="5;url=http://localhost/tpc/admin/addannouncement.php" />
    <?php endif ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Add Announcement</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <?php if ($insertSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Added </p>
                        <?php endif ?>
                        <?php if ($insertFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Adding the Annoucement </p>
                        <?php endif ?>
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add An Announcement</h6>
                                        <div class="col d-flex justify-content-start">
                                            <p class="m-b-5 f-w-600">Date</p>
                                            <p class="mx-10">:</p>
                                            <?php $date = getdate(date("U"));
                                            $currentDate = $date['month'] . ' ' . $date['mday'] . ', ' . $date['year'];

                                            ?>
                                            <p class="mx-10"><?php echo $currentDate ?></p>
                                        </div>
                                        <form action="./addannouncement.php" method="post">
                                            <input type="text" name="annouce-date" id="" value="<?php echo $currentDate; ?>" hidden>

                                            <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Heading</p>
                                                <input type="text" class="m-b-5 form-control" name="annouce-heading" id="" placeholder="Enter Title of Annoucement">
                                            </div>
                                            <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Description</p>
                                                <input type="text" class="m-b-5 form-control" name="annouce-desc" id="" placeholder="Enter Description of Annoucement">
                                            </div>
                                            <!-- <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Date</p>
                                                <input type="date" class="m-b-5 form-control" name="annouce-date" id="" value="">
                                            </div> -->
                                            <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Department</p>
                                                <div class="row">
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="0"><label class="form-check-label"> All Department</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="1"><label class="form-check-label">Civil</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="3"><label class="form-check-label"> Computer</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="4"><label class="form-check-label"> Electronics</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="5"><label class="form-check-label"> Electrical</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="6"><label class="form-check-label"> Mechanical</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="8"><label class="form-check-label">Production</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="9"><label class="form-check-label">Electronics & Communication</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="10"><label class="form-check-label">Information & Technology</label>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <button class="text-center btn btn-primary">Add </button> -->
                        <input type="submit" value="Add" name="add-annouce" class="text-center btn btn-primary">
                        </form>
                    </div>
                </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>