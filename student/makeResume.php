<?php


include("../database.php");

session_start();

$id = $_SESSION["studentUserId"];

$student_fetch = $conn->query("SELECT * FROM student,department WHERE student.s_dept = department.dept_id AND s_id = '$id'");
$student = $student_fetch->fetch_assoc();

$student_academic_fetch = $conn->query("SELECT * FROM student_academic WHERE s_id = '$id'");
$student_academic = $student_academic_fetch->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Generator</title>
    <!-- <link rel="stylesheet" href="./helper/bootstrap.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css">

</head>

<body>

    <button id="pdfButton">Generate PDF</button>
    <div class="container  mt-5 pt-5 border border-secondary w-75" id="generatePdf">
        <div class="row border-bottom border-2 border-secondary ">
            <div class="col">
                <p class="h2 fw-bolder text-center"><?php echo $student["s_fname"] . " " . $student["s_mname"] . " " . $student["s_lname"] ?></p>
            </div>
        </div>
        <div class="row border-bottom border-2 border-secondary">
            <div class="col-12  mt-2">
                <p class="h6  text-center"><?php echo $student["s_pAddress"] ?></p>
            </div>
            <div class="col-4 ">
                <p class="h6  float-end"><?php echo $student["s_mobile"] ?></p>
            </div>
            <div class="col-4 ">
                <p class="h6  text-center"><?php echo $student["s_email"] ?></p>
            </div>
            <div class="col-4 ">
                <p class="h6  float-start">
                    <a href="<?php echo $student["s_linkedin"] ?>" class="text-decoration-none text-black">
                        <?php echo $student["s_linkedin"] ?>
                    </a>
                </p>
            </div>
        </div>
        <div class="row p-4 border-bottom border-2 border-secondary">
            <div class="col">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur deserunt maiores cumque fugit ipsum explicabo quae a et magnam? Labore itaque eaque accusantium quaerat consectetur quos repellendus eum impedit numquam!
                Beatae libero odio iusto corrupti consectetur reiciendis in distinctio deserunt fugit repellat? Veritatis, quidem magni! Ex pariatur nesciunt
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js">
    </script>
    <script>
        var button = document.getElementById("pdfButton");
        button.addEventListener("click", function() {
            var doc = new jsPDF("p", "mm", [400, 600]);
            var makePDF = document.querySelector("#generatePdf");
            // fromHTML Method
            doc.fromHTML(makePDF);
            doc.save("output.pdf");
        });
    </script>

</body>

</html>