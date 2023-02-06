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
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email or Phone" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" required>
                </div>
                <div class="pass"><a href="./forgotPassword.php">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="./signup.php">Signup now</a></div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./core/footer.php") ?>

</body>

</html>