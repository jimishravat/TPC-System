<?php
include("../database.php");
include("../helper/authorization.php");
if (!isset($access)) {
    echo "<script> window.location.href = 'http://localhost/tpc/helper/noAccess.php'; </script>";
}

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}
$show = isset($_GET["show"]) ? mysqli_real_escape_string($conn, $_GET["show"]) : 0;

if ($access == 2 || $access == 3) {
    $show = $dept;
}
if ($show == 0) {
    $displayStudent = $conn->query("SELECT `s_id`, `s_fname`, `s_lname`, `s_email`, `s_mobile`, `s_dept`, `is_approved`, `s_academic_year`, department.dept_name FROM `student`,`department` WHERE department.dept_id = student.s_dept ORDER BY department.dept_name");
} else {
    $displayStudent = $conn->query("SELECT `s_id`, `s_fname`, `s_lname`, `s_email`, `s_mobile`, `s_dept`, `is_approved`, `s_academic_year`, department.dept_name FROM `student`,`department` WHERE s_dept='$show' AND department.dept_id = student.s_dept");
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


    <title>Document</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>

        <!-- <h1>Student</h1> -->
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Student </h1>
                    </div>
                    <!-- Actions -->
                    <!-- <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a>
                            <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Create</span>
                            </a>
                        </div>
                    </div> -->
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <?php if ($access == 1) : ?>
                        <li class="nav-item ">
                            <a href="./student.php?show=0" class="nav-link font-regular <?php if ($show == 0) echo "active" ?>">All Students</a>
                        </li>
                    <?php endif ?>
                    <?php if ($access == 1 || ($access == 2 && $show == 1) || ($access == 3 && $show == 1)) : ?>
                        <li class="nav-item">
                            <a href="./student.php?show=1" class="nav-link font-regular  <?php if ($show == 1) echo "active" ?>">Civil</a>
                        </li>
                    <?php endif ?>
                    <?php if ($access == 1 || ($access == 2 && $show == 3) || ($access == 3 && $show == 3)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=3" class="nav-link font-regular  <?php if ($show == 3) echo "active" ?>">Computer</a>
                        </li>
                    <?php endif ?>

                    <?php if ($access == 1 || ($access == 2 && $show == 4) || ($access == 3 && $show == 4)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=4" class="nav-link font-regular  <?php if ($show == 4) echo "active" ?>">Electronics</a>
                        </li>
                    <?php endif ?>

                    <?php if ($access == 1 || ($access == 2 && $show == 5) || ($access == 3 && $show == 5)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=5" class="nav-link font-regular  <?php if ($show == 5) echo "active" ?>">Electrical</a>
                        </li>
                    <?php endif ?>

                    <?php if ($access == 1 || ($access == 2 && $show == 6) || ($access == 3 && $show == 6)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=6" class="nav-link font-regular  <?php if ($show == 6) echo "active" ?>">Mechanical</a>
                        </li>
                    <?php endif ?>

                    <?php if ($access == 1 || ($access == 2 && $show == 8) || ($access == 3 && $show == 8)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=8" class="nav-link font-regular  <?php if ($show == 8) echo "active" ?>">Production</a>
                        </li>
                    <?php endif ?>

                    <?php if ($access == 1 || ($access == 2 && $show == 9) || ($access == 3 && $show == 9)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=9" class="nav-link font-regular  <?php if ($show == 9) echo "active" ?>">EC</a>
                        </li>
                    <?php endif ?>

                    <?php if ($access == 1 || ($access == 2 && $show == 10) || ($access == 3 && $show == 10)) : ?>

                        <li class="nav-item">
                            <a href="./student.php?show=10" class="nav-link font-regular  <?php if ($show == 10) echo "active" ?>">IT</a>
                        </li>
                    <?php endif ?>

                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Computer</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Civil</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Mechanical</a>
                    </li> -->
                </ul>
            </div>
        </div>

        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">Students</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Id Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $displayStudent->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <!-- <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2"> -->
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["s_fname"] . " " . $row["s_lname"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo strtoupper($row["s_id"]) ?>
                                </td>
                                <td>
                                    <!-- <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2"> -->
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["s_email"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $row["dept_name"] ?>
                                </td>
                                <td>
                                    <?php if ($row['is_approved']) : ?>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>Active
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-warning"></i>Pending
                                        </span>
                                    <?php endif ?>
                                </td>
                                <td class="text-end">
                                    <a href="./viewStudent.php?id=<?php echo $row["s_id"] ?>" class="btn btn-sm btn-neutral">View</a>
                                    <!-- <a href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a> -->

                                    <a href="./viewStudent.php?id=<?php echo  $row["s_id"] ?>&action=delete" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-footer border-0 py-5">
                <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
            </div> -->
        </div>





        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>