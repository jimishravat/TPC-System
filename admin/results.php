<?php
include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/announcements.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome TPO,</h1>


        <section class="column-list mb-sm-2 pr-lg-1 container-fluid" id="two-column-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Results</h1>
                    </div>
                    <div class="col-sm-4 col-12 text-sm-end">
                        <div class="mx-n1">
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a> -->
                            <?php if ($access == 1) : ?>

                                <a href="./addresult.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Add Result</span>
                                </a>
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="card shadow-3 border-0 mt-5 card-height-sm mx-2 col-sm-12">
                        <div class="card-body d-flex flex-row justify-content-between ">
                            <div class="row ">
                                <div class="col d-flex flex-column ">
                                    <span class="h5 f-w-400 text-danger">April 2nd, 2019</span>
                                    <span class="h3 text-primary mt-3">TCS Digital</span>
                                    <span class="h4 text-warning mt-3">2 Students Placed</span>
                                </div>
                            </div>
                            <div class=" mb-0 text-sm">
                                <a href="./studentApprove.php?id=<?php echo "id" ?>" class="btn btn-warning  mx-2">View</a>
                                <?php if ($access == 1) : ?>
                                    <a href="./studentApprove.php?id=<?php echo "id" ?>&action=approve" class="btn btn-primary  mx-2">Update</a>
                                    <a href="./studentApprove.php?id=<?php echo "id" ?>&action=reject" class="btn btn-danger  mx-2">Delete</a>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                    <div class="card shadow-3 border-0 mt-5 card-height-sm  mx-2 col-sm-12">
                        <div class="card-body d-flex flex-row justify-content-between ">
                            <div class="row ">
                                <div class="col d-flex flex-column ">
                                    <span class="h5 f-w-400 text-danger">April 2nd, 2019</span>
                                    <span class="h3 text-primary mt-3">TCS Digital</span>
                                    <span class="h4 text-warning mt-3">2 Students Placed</span>
                                </div>
                            </div>
                            <div class=" mb-0 text-sm">
                                <!-- <a href="./studentApprove.php?id=<?php echo "id" ?>" class="btn btn-primary btn-sm mx-2">View</a> -->
                                <?php if ($access == 1) : ?>
                                    <a href="./studentApprove.php?id=<?php echo "id" ?>&action=approve" class="btn btn-primary btn-sm mx-2">Update</a>
                                    <a href="./studentApprove.php?id=<?php echo "id" ?>&action=reject" class="btn btn-danger btn-sm mx-2">Delete</a>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                    <div class="card shadow-3 border-0 mt-5 card-height-sm mx-2 col-sm-12">
                        <div class="card-body d-flex flex-row justify-content-between ">
                            <div class="row ">
                                <div class="col d-flex flex-column ">
                                    <span class="h5 f-w-400 text-danger">April 2nd, 2019</span>
                                    <span class="h3 text-primary mt-3">TCS Digital</span>
                                    <span class="h4 text-warning mt-3">2 Students Placed</span>
                                </div>
                            </div>
                            <div class=" mb-0 text-sm">
                                <!-- <a href="./studentApprove.php?id=<?php echo "id" ?>" class="btn btn-primary btn-sm mx-2">View</a> -->
                                <?php if ($access == 1) : ?>
                                    <a href="./studentApprove.php?id=<?php echo "id" ?>&action=approve" class="btn btn-primary btn-sm mx-2">Update</a>
                                    <a href="./studentApprove.php?id=<?php echo "id" ?>&action=reject" class="btn btn-danger btn-sm mx-2">Delete</a>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>

                    <div class="card shadow-3 border-0 mt-5 card-height-sm mx-2 col-sm-12">
                        <div class="card-body d-flex flex-row justify-content-between ">
                            <div class="row ">
                                <div class="col d-flex flex-column ">
                                    <span class="h5 f-w-400 text-danger">April 2nd, 2019</span>
                                    <span class="h3 text-primary mt-3">TCS Digital</span>
                                    <span class="h4 text-warning mt-3">2 Students Placed</span>
                                </div>
                            </div>
                            <div class=" mb-0 text-sm">

                                <!-- <a href="./studentApprove.php?id=<?php echo "id" ?>" class="btn btn-primary btn-sm mx-2">View</a> -->
                                <a href="./studentApprove.php?id=<?php echo "id" ?>&action=approve" class="btn btn-primary btn-sm mx-2">Update</a>
                                <a href="./studentApprove.php?id=<?php echo "id" ?>&action=reject" class="btn btn-danger btn-sm mx-2">Delete</a>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-10 pr-0">
                        <section aria-label="Announcements" class="announcements">
                            <a href="addresult.php"> <button type="button" class="btn btn-primary" style="float:right">Add</button></a>
                            <h2 class="font-weight-bold  pb-3 mt-3 mb-0 pr-5">Results</h2>

                            <div class="announcement-slider border-r-xs-0 border-r position-relative">
                                <div>
                                    <ul class="nolist list-unstyled position-relative mb-0 px-lg-5 pt-lg-5">
                                        <li class="border-bottom pb-3 mt-3">
                                            <span class="meta text-uppercase">April 02nd, 2018</span>

                                            <div style="float:right;" class="mt-5">
                                                <a href="updateresult.php"><button type="button" class="btn btn-success float-right">Update</button></a>
                                                <button type="button" class="btn btn-danger float-right">Delete</button>
                                            </div>
                                            <h3 class="font-weight-bold mt-0">
                                                <a href="#">TCS Digital</a>
                                            </h3>
                                            <p class="m-0 post_intro bl">2 students got placed</p>
                                        </li>
                                        <li class="border-bottom pb-3 mt-3">

                                            <span class="meta text-uppercase">January 30th, 2018</span>
                                            <div style="float:right;" class="mt-5">
                                                <a href="updateresult.php"> <button type="button" class="btn btn-success float-right">Update</button></a>
                                                <button type="button" class="btn btn-danger float-right">Delete</button>
                                            </div>
                                            <h3 class="font-weight-bold mt-0">
                                                <a href="#">
                                                    TCS Ninja
                                                </a>
                                            </h3>
                                            <p class="m-0 post_intro bl">8 students got placed</p>
                                        </li>
                                        <li class="border-bottom pb-3 mt-3">
                                            <span class="meta text-uppercase">April 02nd, 2018</span>
                                            <div style="float:right;" class="mt-5">
                                                <a href="updateresult.php"><button type="button" class="btn btn-success float-right">Update</button></a>
                                                <button type="button" class="btn btn-danger float-right">Delete</button>
                                            </div>
                                            <h3 class="font-weight-bold mt-0">
                                                <a href="#">InfocusP Learnings</a>
                                            </h3>
                                            <p class="m-0 post_intro bl">3 students got placed.</p>
                                        </li>
                                    </ul>
                                    <a class="all pos-stat text-uppercase ml-lg-5" href="#">All Results
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </a>

                                </div>

                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 pl-0">
                    </div> -->
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