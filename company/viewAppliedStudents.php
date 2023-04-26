<?php
include("../database.php");
include("../helper/authorization.php");

$show = isset($_GET["show"]) ? mysqli_real_escape_string($conn, $_GET["show"]) : 0;



$displayStudent = $conn->query("SELECT student.*, department.*, student_academic.*, student_document.* FROM student INNER JOIN student_academic ON student.s_id = student_academic.s_id INNER JOIN student_document ON student.s_id = student_document.s_id INNER JOIN department ON student.s_dept = department.dept_id");

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
                        <h1 class="h2 mb-5 ls-tight">Welcome, <?= $_SESSION["companyUserId"] ?></h1>
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
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Resume</th>
                            <th scope="col" class="text-end">Action</th>

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
                                    <?php echo strtoupper($row["s_email"]) ?>
                                </td>
                                <td>
                                    <!-- <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2"> -->
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["dept_name"] ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="../uploads/student/<?php echo $row["resume"] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary">Resume</a>

                                </td>

                                <td class="text-end">
                                    <div class="form-check d-flex justify-content-center space-evenly">

                                        <input type="checkbox" name="selected[]" id="" class="form-check-input">
                                        <label for="selected">Select</label>

                                    </div>
                                    <!-- <a href="./viewStudent.php?id=<?php echo $row["s_id"] ?>" class="btn btn-sm btn-neutral">View</a> -->
                                    <!-- <a href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a> -->

                                    <!-- <a href="./viewStudent.php?id=<?php echo  $row["s_id"] ?>&action=delete" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-trash"></i>
                                    </a> -->
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