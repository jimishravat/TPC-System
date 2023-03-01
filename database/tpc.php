<?php

include("../database.php");

function create_tpc($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS tpc(
        tpc_id varchar(20) PRIMARY KEY,
        tpc_fname varchar(50),
        tpc_lname varchar(50),
        tpc_email varchar(40),
        tpc_mobile varchar(10),
        tpc_password varchar(64),
        tpc_department int(10),
        is_active int(10),
        academic_year int(10),
        FOREIGN KEY (tpc_department) REFERENCES department(dept_id)
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created TPO table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating TPO table");
        return json_encode($result);
    }
}

function insert_data_tpc($conn)
{

    $insert = "INSERT INTO tpc (`tpc_id`,`tpc_fname`,`tpc_lname`,`tpc_email`,`tpc_mobile`,`tpc_password`,`tpc_department`,`is_active`,`academic_year`) values ('19CP015','Jimish','Ravat','jimish@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,1,2019),('18CP013','Mehul','Parmar','shah@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,0,2018)";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added TPC Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding TPC Data");
        return json_encode($result);
    }
}
