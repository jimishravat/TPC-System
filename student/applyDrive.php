<?php
include("../database.php");
if (isset($_GET["drive_id"]) && isset($_GET["stu_id"])) {
    $result = applyForDrive($_GET["stu_id"], $_GET["drive_id"], $conn);

    if ($result == 1) {

        echo "<script> alert('Applied for Drive Success! Further Details will be conveyed through mail') </script>";
        echo "<script> window.location.href = 'http://localhost/tpc/student/drives.php'; </script>";
    } else {
        echo "<script> alert('Failure !!!!') </script>";
        echo "<script> window.location.href = 'http://localhost/tpc/student/drives.php'; </script>";
    }
}

function checkProfile($stu_id)
{
    global $conn;
    $student_fetch = $conn->query("SELECT is_approved FROM student WHERE s_id = '$stu_id'");
    $studentDetails = $student_fetch->fetch_assoc();
    if ($studentDetails["is_approved"] == 1) {
        return 1;
    } else {
        return 0;
    }
}
function checkApplied($stu_id, $drive_id)
{
    global $conn;
    // var_dump($stu_id);
    $queryStu = $conn->query("SELECT * FROM student_placed WHERE s_id = '$stu_id'");
    // var_dump($queryStu);
    $result = $queryStu->fetch_assoc();
    $drive = json_decode($result["drive_applied"], true);
    if (in_array($drive_id, $drive)) {
        return 1;
    } else {
        return 0;
    }
}
function applyForDrive($stu_id, $drive_id, $conn)
{


    $driveInsert = $studentInsert = false;

    $drive = $conn->query("SELECT applied FROM drive WHERE drive_id = '$drive_id'");
    $d = $drive->fetch_assoc();
    $dArray = json_decode($d["applied"], true);
    array_push($dArray, $stu_id);
    $dArray = json_encode($dArray);
    $insertStudent = $conn->query("UPDATE drive SET applied = '$dArray' WHERE drive_id = '$drive_id'");
    if ($conn->affected_rows) {
        $studentInsert = true;
    }

    $student = $conn->query("SELECT drive_applied FROM student_placed WHERE s_id = '$stu_id'");
    $s = $student->fetch_assoc();
    $sArray = json_decode($s["drive_applied"], true);
    array_push($sArray, $drive_id);
    $sArray = json_encode($sArray);
    $insertDrive = $conn->query("UPDATE student_placed SET drive_applied = '$sArray' WHERE s_id = '$stu_id'");
    if ($conn->affected_rows) {
        $driveInsert = true;
    }


    if ($driveInsert && $studentInsert) {
        return 1;
    } else {
        return 0;
    }
}
function checkDeadline($drive_id)
{
    global $conn;
    $drive_fetch = $conn->query("SELECT * FROM drive WHERE drive_id = '$drive_id'");
    $driveDetails = $drive_fetch->fetch_assoc();

    $deadline = strtotime($driveDetails["drive_deadline"]);
    $current = strtotime(date('y-m-d'));
    $is_active = $current <= $deadline ? 1 : 0;
    // var_dump($is_active);

    return $is_active;
}
function checkEligiblity($drive_id, $stu_id)
{
    global $conn;
    $drive_fetch = $conn->query("SELECT * FROM drive WHERE drive_id = '$drive_id'");
    $driveDetails = $drive_fetch->fetch_assoc();

    $student_fetch = $conn->query("SELECT * FROM student_academic,student WHERE student_academic.s_id = student.s_id AND student_academic.s_id = '$stu_id'");
    $studentDetails = $student_fetch->fetch_assoc();

    $isEligible = 0;


    if (($driveDetails["hsc_criteria"] <= intval($studentDetails["hsc_th_p_percentage"]))
        && ($driveDetails["ssc_criteria"] <= $studentDetails["ssc_percentage"])
        && ($driveDetails["cpi_criteria"] <= $studentDetails["bvm_cpi"])
        && ($driveDetails["total_backlog"] >= $studentDetails["bvm_total_backlog"])
        && ($driveDetails["active_backlog"] >= $studentDetails["bvm_active_backlog"])
        && $studentDetails["is_approved"] == 1
    ) {
        $isEligible = 1;
    }

    return $isEligible;
}
