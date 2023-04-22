<?php
include("../database.php");
include("../helper/authorization.php");


if (!isset($_SESSION["studentUserId"])) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

$dept = $_SESSION["studentDept"];

if ($studentAccess == 0) {
    echo "<script> alert('Complete Your Profile and Wait for Approval') </script>";
    echo "<script> window.location.href = 'http://localhost/tpc/student/viewStudent.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="/student/helper/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome <?php echo strtoupper($_SESSION["studentUserId"])?>,</h1>


        <section class="column-list mb-sm-2 pr-lg-1 container-fluid" id="two-column-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Results</h1>
                    </div>
                    
                    <?php
                    $allResults = $conn->query("SELECT * FROM result");

                    while ($result = $allResults->fetch_assoc()) {
                        $date = $result["post_on"];
                        $date = explode("-", $date);
                        $month = DateTime::createFromFormat('!m', $date[1])->format('F');


                    ?>

                        <div class="card shadow-3 border-0 mt-5 card-height-sm mx-2 col-sm-12">
                            <div class="card-body d-flex flex-row justify-content-between ">
                                <div class="row ">
                                    <div class="col d-flex flex-column ">
                                        <span class="h5 f-w-400 text-danger"><?php echo $month . ' ' . $date[2] . ', ' . $date[0] ?></span>
                                        <span class="h3 text-primary mt-3"><?php echo $result["heading"] ?></span>
                                        <span class="h4 text-warning mt-3"><?php echo $result["description"] ?></span>
                                    </div>
                                </div>
                                <div class=" mb-0 text-sm">
                                    <a href="./viewResult.php?result_id=<?php echo $result["result_id"] ?>" class="btn text-white btn-warning mx-2">View</a>
                                   

                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>


        </section>
        </div>
        </div>
        </div>
        </section>



        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>