<?php
include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}
$drive_id = $_GET["drive_id"];

$searchDrive = $conn->query("SELECT job_role,company_name,applied FROM drive,company WHERE drive.company_id = company.company_id AND drive.drive_id = '$drive_id'");
$driveDetails = $searchDrive->fetch_assoc();

// Header 
/*

    Birla Vishvakarma Mahavidhyalaya
    An Autonomous Institution
    VallabhVidhyanagar-Anand 388120
    Company Name - Job Role Name

    Sr.no   Student_id  Student_name    Phone   Email   Gender  SSC%    HSC%    D2D_CPI Current_Cpi Active_Backlog


*/
$columnHeader = "\t" . "Birla Vishvakarma Mahavidyalaya" .   "\n"  . "\t" . "An Autonomous Institution" .   "\n" . "\t" . "VallabhVidyanagar-Anand 388120" .   "\n" . "\t" . $driveDetails["company_name"] . " - " . $driveDetails["job_role"] .   "\n"  . "\n"  . "Sr. No." . "\t" . "Student ID" . "\t" . "Student Name" . "\t" . "Phone" . "\t" . "Email" . "\t" . "Gender" . "\t" . "SSC %" . "\t" . "HSC %" . "\t" . "D2D CPI" . "\t" . "Current CPI" . "\t" . "Active Backlogs" . "\n";
$setData = '';
$studentArray = json_decode($driveDetails["applied"], true);
$srNo = 1;
foreach ($studentArray as $student) {
    $studentDetailsArray = $conn->query("SELECT student_academic.*, student.* FROM student_academic, student WHERE student.s_id = student_academic.s_id");
    $studentDetail = $studentDetailsArray->fetch_assoc();
    $rowData = '"' . $srNo++ . '"' . "\t";
    $rowData .= '"' . $studentDetail["s_id"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["s_fname"] . " " . $studentDetail["s_lname"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["s_mobile"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["s_email"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["s_gender"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["ssc_percentage"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["hsc_th_percentage"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["d2d_cgpa"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["bvm_cpi"] . '"' . "\t";
    $rowData .= '"' . $studentDetail["bvm_active_backlog"] . '"' . "\t";
    $setData .= trim($rowData) . "\n";
}



$fileName = $driveDetails["company_name"] . "-" . $driveDetails["job_role"];


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$fileName.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $columnHeader . "\n" . $setData . "\n";
