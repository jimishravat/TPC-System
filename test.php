<?php

include("./database.php");

$statusmsg = '';

// $id_number = $_GET["id"];

// $ac = '20' . $id_number[0] . $id_number[1];
// $ac = intval($ac);
// var_dump($ac);

if (isset($_POST["upload"])) {
    $targetdir = "uploads/";
    $targetfile = $_FILES["pdf"]["name"];
    $targetFilePath = $targetdir . $targetfile;

    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetFilePath)) {
        $insert = $conn->query("INSERT INTO `test`(`file_loc`) VALUES ('$targetfile')");

        if ($insert) {
            $statusmsg = "file " . $targetfile . " uploaded success";
        } else {
            $statusmsg = "error";
        }
    }
}
echo $statusmsg;


// $output = shell_exec("python ../predict/test.py");
// var_dump($output);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box {
            color: #fff;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .red {
            background: #ff0000;
        }

        .green {
            background: #228b22;
        }

        .blue {
            background: #0000ff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>
</head>

<body>
    <div>
        <label><input type="radio" name="colorRadio" value="red" /> red</label>
        <label><input type="radio" name="colorRadio" value="green" /> green</label>
        <label><input type="radio" name="colorRadio" value="blue" /> blue</label>
    </div>
    <div class="red box">
        You have selected <strong>red radio button</strong> so i am here
    </div>
    <div class="green box">
        You have selected <strong>green radio button</strong> so i am here
    </div>
    <div class="blue box">
        You have selected <strong>blue radio button</strong> so i am here
    </div>

    <form action="./test.php" enctype="multipart/form-data" method="post">
        <input type="file" name="pdf" id="" multiple>
        <input type="submit" value="Submit" name="upload">
    </form>
    <?php
    $result = $conn->query("SELECT * FROM test");

    while ($row = mysqli_fetch_assoc($result)) {



    ?>
        <a href="./uploads/<?php echo $row["file_loc"] ?>" target="_blank" rel="noopener noreferrer"><?php echo $row["file_loc"] ?></a>

    <?php } ?>
</body>

</html>