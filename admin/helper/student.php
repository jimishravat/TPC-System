<?php

include("../../database.php");

// Student Create Query

$sql = "CREATE TABLE IF NOT EXISTS student (
    id_number varchar(20) PRIMARY KEY,
    user_id varchar(20),
    first_name varchar(20),
    middle_name varchar(20),
    last_name varchar(20),
    mobile varchar(10),
    email varchar(30),
    father_first_name varchar(30),
    father_last_name varchar(30),
    father_occupation varchar(30),
    mother_first_name varchar(30),
    mother_last_names varchar(30),
    mother_occupation varchar(30),
    ssc_percentile decimal(4,2),
    ssc_percentage decimal(4,2),
    ssc_out_of_600 int(10),
    ssc_passing_year year(4),
    is_d2d int(10),
    hsc_percentile decimal(4,2),
    hsc_percentage decimal(4,2),
    hsc_physics int(10),
    hsc_chemistry int(10),
    hsc_maths int(10),
    hsc_out_of_650 int(10),
    hsc_passing_year year(4),
    d2d_cgpa decimal(4,2),
    d2d_passing_year year(4),
    aadhar_card varchar(20),
    pan_card varchar(20),
    ssc_marksheet varchar(20),
    hsc_marksheet varchar(20),
    d2d_marksheet varchar(20),
    resume varchar(20),
    is_active int(10)
)";
