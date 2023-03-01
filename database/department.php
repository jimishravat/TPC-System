<?php

include("../database.php");

function create_dept($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS department(
        dept_id int(10) PRIMARY KEY,
        dept_name varchar(40)
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created Department table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating Department table");
        return json_encode($result);
    }
}

function insert_data_dept($conn)
{
    $insert = "INSERT INTO department (`dept_id`,`dept_name`) values (1,'Civil_01'),(2,'Civil_02'),(3,'Computer'),(4,'Electronics'),(5,'Electrical'),(6,'Mechanical_06'),(7,'Mechanical_07'),(8,'Production'),(9,'Electronics & Communication'),(10,'Information Technology')";
    
    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added Department Data");
        return json_encode($result);
    } else {
        // $conn->error_log();
        // $result = array("message" => "Error Occured on adding Department Data");
        // return json_encode($result);
        return $conn->error_log();
    }
}

// if (isset($_POST["create_dept"])) {
//     $create = "CREATE TABLE IF NOT EXISTS department(
//         dept_id int(10) PRIMARY KEY,
//         dept_name varchar(40)
//     )";
//     $conn->query($create);
// }

// if (isset($_POST["insert_dept"])) {
//     $insert = "INSERT INTO department (`dept_id`,`dept_name`) values (`1`,`Civil_01`),(`2`,`Civil_02`),(`3`,`Computer`),(`4`,`Electronics`),(`5`,`Electrical`),(`6`,`Mechanical_06`),(`7`,`Mechanical_07`),(`8`,`Production`),(`9`,`Electronics & Communication`),(`10`,`Information Technology`)";

//     $conn->query($insert);
// }
