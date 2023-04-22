<?php

include("./database.php");
session_start();
$user = isset($_GET["user"]) ? isset($_GET["user"]) : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./core/header.php")    ?>
    <link rel="stylesheet" href="./css/signup.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-size: 1;
        }
    </style>
</head>

<body>
    <!-- Navigation bar -->
    <?php require_once("./core/nav.php") ?>

    <!-- Signup -->
    <div class="container">



        <div class="title">Company Registration</div>
        <div class="content">
            <form action="./addUser.php" method="POSt">
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Company Name</span>
                        <input type="text" name="cName" placeholder="Enter Company Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Company Website (URL)</span>
                        <input type="text" name="cEmail" placeholder="Enter Company URL" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Company Location (Headquaters)</span>
                        <input type="text" name="cLocation" placeholder="Enter Company Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">HR Name</span>
                        <input type="text" name="hrName" placeholder="Enter HR Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">HR Email</span>
                        <input type="email" name="hrEmail" placeholder="Enter HR Email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">HR Number</span>
                        <input type="number" name="hrMobile" placeholder="Enter HR Number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="companyPassword" id="password" placeholder="Enter your password" onkeyup="validate_password()" required>
                        <span class="extra" id="eightCharacter">Must be atleat 8 characters long</span><br>
                        <span class="extra" id="oneDigit">Must include 1 digit</span> <br>
                        <span class="extra" id="oneCapital">Must include 1 Capital Letter</span> <br>
                        <span class="extra" id="oneSpecial">Must include 1 Special Character </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="cPassword" placeholder="Confirm your password" onkeyup="check_password()" required>
                        <span id="message"></span>

                    </div>
                    <div class="input-box">
                        <span class="details">Company Logo</span>
                        <input type="file" name="cLogo" class="" required>
                    </div>


                </div>

                <div class="button">
                    <span id="finalmessage" class="extra"></span>

                    <input type="submit" name="registerCompany" value="Register">
                </div>
                <div class="row d-flex flex-column">
                    <div class="col-sm-6">

                        <div class="signup-link">Already Registered <a href="./login.php">Login now</a></div>
                    </div>
                    <div class="col-sm-6">

                        <div class="signup-link">Student Registeration <a href="./signup.php">I'm Students</a></div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- <span class="extra" id="eightCharacter">Must be atleat 8 characters long</span><br>
    <span class="extra" id="oneDigit">Must include 1 digit</span> <br>
    <span class="extra" id="oneCapital">Must include 1 Capital Letter</span> <br>
    <span class="extra" id="oneSpecial">Must include 1 Special Character </span> -->
    <!-- Footer -->
    <?php require_once("./core/footer.php") ?>

    <!-- JS -->
    <script>
        var finalSubmit = 0;
        var checkPassword = 0;
        var checkCPassword = 0;


        // var radios = document.querySelectorAll('input[type="radio"]:checked');
        // var value = radios.length > 0 ? true : false;
        // if (value) {
        //     checkGender = 1;
        // } else {
        //     checkGender = 0;
        // }


        function validate_password() {
            var c1, c2, c3, c4 = 0
            var eightCharacter = document.getElementById('eightCharacter');
            var oneCapital = document.getElementById('oneCapital');
            var oneDigit = document.getElementById('oneDigit');
            var oneSpecial = document.getElementById('oneSpecial');
            var pass = document.getElementById('password').value;
            // var confirm_pass = document.getElementById('cPassword').value;
            if (pass.length >= 8) {
                eightCharacter.classList.remove("extra");
                eightCharacter.classList.add("done");
                c1 = 1
            }
            if (pass.length < 8) {
                eightCharacter.classList.remove("done");
                eightCharacter.classList.add("extra");
                c1 = 0
            }
            if (pass.match(/[A-Z]+/)) {
                oneCapital.classList.remove("extra");
                oneCapital.classList.add("done");
                c2 = 1;
            }
            if (!pass.match(/[A-Z]+/)) {
                oneCapital.classList.remove("done");
                oneCapital.classList.add("extra");
                c2 = 0
            }
            if (pass.match(/[0-9]+/)) {
                oneDigit.classList.remove("extra");
                oneDigit.classList.add("done");
                c3 = 1;
            }
            if (!pass.match(/[0-9]+/)) {
                oneDigit.classList.remove("done");
                oneDigit.classList.add("extra");
                c3 = 0
            }
            if (pass.match(/[-’/`~!#*$@_%+=.,^&(){}[\]|;:”<>?\\]+/)) {
                oneSpecial.classList.remove("extra");
                oneSpecial.classList.add("done");
                c4 = 1
            }
            if (!pass.match(/[-’/`~!#*$@_%+=.,^&(){}[\]|;:”<>?\\]+/)) {
                oneSpecial.classList.remove("done");
                oneSpecial.classList.add("extra");
                c4 = 0
            }

            if ((c1 + c2 + c3 + c4) == 4) {
                checkPassword = 1;
            }

            finalCheck()

        }

        function check_password() {
            var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('cPassword').value;
            if (pass != confirm_pass) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = '☒ Use same password';
                checkCPassword = 0;

            } else {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = '🗹 Password Matched';
                checkCPassword = 1;
            }
            finalCheck()
        }







        function finalCheck() {
            // console.log("final:", finalSubmit)
            // console.log("id:", checkId)
            // console.log("email:", checkEmail)
            // console.log("number:", checkMobile)
            // console.log("pass:", checkPassword)
            // console.log("cpass:", checkCPassword)
            // console.log("dept:", checkDept)
            // console.log("gender:", checkGender)

            if ((checkPassword + checkCPassword) == 2) {
                finalSubmit = 1;
            }

            if (finalSubmit == 1) {
                document.getElementById('finalmessage').style.color = 'green';
                document.getElementById('finalmessage').innerHTML = 'You are ready for Registration 🗹';
                document.getElementById('registerStudent').disabled = false;
            }
            if (finalSubmit == 0) {
                document.getElementById('finalmessage').style.color = 'red';
                document.getElementById('finalmessage').innerHTML = 'Please fill all the details!';
                document.getElementById('registerStudent').disabled = true;
            }
        }
    </script>

    </script>

</body>

</html>