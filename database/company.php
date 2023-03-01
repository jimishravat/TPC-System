<?php

include("../database.php");

function create_company($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS company(
        company_id int(10) PRIMARY KEY,
        company_name varchar(50),
        company_description text,
        password varchar(64),
        HR_name varchar(50),
        HR_email varchar(50),
        HR_mobile varchar(10),
        company_url varchar(40),
        company_location varchar(40)
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created Company table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating Company table");
        return json_encode($result);
    }
}

function insert_data_company($conn)
{

    $insert = "INSERT INTO company (`company_id`,`company_name`,`company_description`,`password`,`HR_name`,`HR_email`,`HR_mobile`,`company_url`,`company_location`) values (50678,'Tata Consultancy Service','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit voluptatibus deleniti odit explicabo minima suscipit quasi minus, quibusdam totam quae facere odio dignissimos at veritatis ipsa architecto, eos veniam maxime!','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=','Supriya Iyer','iyer@tcs.ion','9876543211','www.tcs.com','Ahmedabad')";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added Company Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding Company Data");
        return json_encode($result);
    }
}
