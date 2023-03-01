<?php

include("../database.php");

function create_student_placed($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS student_placed(
        s_id varchar(20) PRIMARY KEY,
        drive_applied json,
        drive_selected int(10),
        FOREIGN KEY (s_id) REFERENCES student(s_id)
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created STUDENT Placed table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating STUDENT placed table");
        return json_encode($result);
    }
}

function insert_data_student_placed($conn)
{

    $insert = "INSERT INTO tpc (`tpc_id`,`tpc_fname`,`tpc_lname`,`tpc_email`,`tpc_mobile`,`tpc_password`,`tpc_department`,`is_active`,`academic_year`) values ('19CP015','Jimish','Ravat','jimish@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,1,2019),('18CP013','Mehul','Parmar','shah@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,0,2018)";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added STUDENT Placed Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding STUDENT Placed Data");
        return json_encode($result);
    }
}
