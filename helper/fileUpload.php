<?php



$allowedType = array('jpg', 'png', 'jpeg', 'pdf');

function singleFile($fileName, $fileLocation, $fileTargetLocation)
{
    $typeOfFile =  pathinfo($fileName, PATHINFO_EXTENSION);

    $file = uniqid() . "." . $typeOfFile;
    $name = $fileTargetLocation . $file;

    if (file_exists($fileLocation)) {
        if (in_array($typeOfFile, $GLOBALS["allowedType"])) {
            move_uploaded_file($fileLocation, $name);
            return $file;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

function multipleFiles($file, $fileLocation)
{
}
