<?php

include("../database.php");

function create_tpo($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS tpo(
        tpo_id varchar(20) PRIMARY KEY,
        tpo_name varchar(50),
        tpo_email varchar(40),
        tpo_number varchar(10),
        tpo_password varchar(64)
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created TPO table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating TPO table");
        return json_encode($result);
    }
}

function insert_data_tpo($conn)
{

    $insert = "INSERT INTO tpo(`tpo_id`,`tpo_name`,`tpo_password`,`tpo_email`,`tpo_number`) values ('tpo@bvm','Mehul Patel','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=','mehulpatel@bvm.com','9876543211')";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added TPO Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding TPO Data");
        return json_encode($result);
    }
}
