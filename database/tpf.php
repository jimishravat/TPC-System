<?php

include("../database.php");

function create_tpf($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS tpf(
        tpf_id varchar(20) PRIMARY KEY,
        tpf_fname varchar(50),
        tpf_lname varchar(50),
        tpf_email varchar(40),
        tpf_mobile varchar(10),
        tpf_password varchar(64),
        tpf_department int(10),
        is_active int(10),
        academic_year int(10),
        FOREIGN KEY (tpf_department) REFERENCES department(dept_id)
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created TPF table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating TPF table");
        return json_encode($result);
    }
}

function insert_data_tpf($conn)
{

    $insert = "INSERT INTO tpf (`tpf_id`,`tpf_fname`,`tpf_lname`,`tpf_email`,`tpf_mobile`,`tpf_password`,`tpf_department`,`is_active`,`academic_year`) values ('74562','Prashant','Swadas','pbs@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,1,2022),('34527','Vatsal','shah','vshah@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',10,1,2022)";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added TPC Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding TPC Data");
        return json_encode($result);
    }
}
