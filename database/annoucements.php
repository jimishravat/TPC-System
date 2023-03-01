<?php

include("../database.php");

function create_annoucements($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS annuocements(
        annouce_id int(10) PRIMARY KEY,
        title varchar(60),
        description text,
        date_annouce date
     
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created annoucements table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating annoucements table");
        return json_encode($result);
    }
}

function insert_data_annoucements($conn)
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
