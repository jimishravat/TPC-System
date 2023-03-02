<?php

session_start();

if (isset($_SESSION["showUser"])) {
    unset($_SESSION["showUser"]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./core/header.php") ?>
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("./core/nav.php") ?>
    <!-- Login -->
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <form action="./checkLogin.php" method="POST">
                <div class="row">
                    <i class="fa fa-user-o fa-fw"></i>

                    <select name="typeOfUser" required id="user">
                        <option value="1">Student</option>
                        <option value="2">Company</option>
                        <option value="3">Admin</option>
                    </select>
                </div>
                <div class="row show" id="admin">

                    <i class="fa fa-user-o fa-fw"></i>
                    <select name="typeOfAdmin">
                        <option value="4">TPO</option>
                        <option value="5">TPF</option>
                        <option value="6">TPC</option>
                    </select>
                </div>
                <div class="row">
                    <i class="fa fa-envelope-o fa-fw"></i>
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="pass"><a href="./forgotPassword.php">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" name="login" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="./signup.php">Signup now</a></div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./core/footer.php") ?>
    <script>
        var admin = document.getElementById('admin');
        document.getElementById('user').addEventListener('change', (event) => {
            if (event.target.value == 3) {
                admin.classList.remove("show");
            }
            if (event.target.value != 3) {
                admin.classList.add("show");
            }
        })
    </script>
</body>

</html>