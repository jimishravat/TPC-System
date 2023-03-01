<?php

include("../database.php");

function create_student($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS student(
        s_id varchar(20) PRIMARY KEY,
        s_fname varchar(30),
        s_lname varchar(30),
        s_mname varchar(30),
        s_email varchar(40),
        s_mobile varchar(10),
        s_dept int(10),
        s_gender varchar(10),
        s_password varchar(64),
        s_dob date,
        s_category varchar(10),
        s_linkedin varchar(50),
        s_academic_year int(10),
        s_enrollment varchar(20),
        s_pAddress text,
        s_cAdresss text,
        is_d2d int(10),
        is_approved int(10) DEFAULT(0),
        is_placed int(10) DEFAULT(0),
        is_registered int(10) DEFAULT(0),

        FOREIGN KEY (s_dept) REFERENCES department(dept_id)
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created STUDENT table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating STUDENT table");
        return json_encode($result);
    }
}

function insert_data_student($conn)
{

    $insert = "INSERT INTO tpc (`tpc_id`,`tpc_fname`,`tpc_lname`,`tpc_email`,`tpc_mobile`,`tpc_password`,`tpc_department`,`is_active`,`academic_year`) values ('19CP015','Jimish','Ravat','jimish@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,1,2019),('18CP013','Mehul','Parmar','shah@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,0,2018)";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added Student Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding Student Data");
        return json_encode($result);
    }
}
