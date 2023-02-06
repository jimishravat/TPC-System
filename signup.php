<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./core/header.php")    ?>
    <link rel="stylesheet" href="./css/signup.css">

    <title>Home</title>
</head>

<body>
    <!-- Navigation bar -->
    <?php require_once("./core/nav.php") ?>

    <!-- Signup -->
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="./addUser.php" method="POSt" onsubmit="validate()">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">ID Number</span>
                        <input type="text" placeholder="Enter your ID number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile Number</span>
                        <input type="number" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" id="password" placeholder="Enter your password" required>

                    </div>
                    <div class="input-box">
                        <span class="details">Department</span>
                        <select name="department" id="dept">
                            <option> Enter your Department</option>
                            <option value="1">Computer</option>
                        </select>
                    </div>
                    <!-- <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="cPassword" placeholder="Confirm your password"  required>
                    </div> -->
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <input type="radio" name="gender" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Register">
                </div>
                <div class="signup-link">Already Registered <a href="./login.php">Login now</a></div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once("./core/footer.php") ?>


</body>

</html>