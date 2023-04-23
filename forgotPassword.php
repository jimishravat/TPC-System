<?php

include("./database.php");
include("./helper/sendMail.php");

$mailSentSuccess = 0;
$updateSuccess = 0;
$changePassword = 0;
$linkExpired = 0;
$typeOfUser = "";
$db_email = "";
// Send Mail to the registered mail id of the user   store the hash value in the database with an expiration

if (isset($_POST["send-password-link"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    // take the data from the login form
    $typeOfUser = $_POST["typeOfUser"];

    // if the user is admin then check for the type of admin 
    if ($typeOfUser == 3) {
        $typeOfUser = $_POST["typeOfAdmin"];
    }

    $sendMail = 0;

    if ($typeOfUser == 1) {
        $checkQuery = $conn->query("SELECT s_email FROM student WHERE s_email = '$email' ");
        if ($checkQuery->num_rows == 1) {
            $sendMail = 1;
        }
    }
    if ($typeOfUser == 2) {
        $checkQuery = $conn->query("SELECT HR_email FROM company WHERE HR_email = '$email'   ");
        if ($checkQuery->num_rows == 1) {
            $sendMail = 1;
        }
    }
    if ($typeOfUser == 4) {
        $checkQuery = $conn->query("SELECT s_email FROM tpo WHERE tpo_email = '$email'   ");
        if ($checkQuery->num_rows == 1) {
            $sendMail = 1;
        }
    }
    if ($typeOfUser == 5) {
        $checkQuery = $conn->query("SELECT tpf_email FROM tpf WHERE tpf_email = '$email'   ");
        if ($checkQuery->num_rows == 1) {
            $sendMail = 1;
        }
    }
    if ($typeOfUser == 6) {
        $checkQuery = $conn->query("SELECT tpc_email FROM tpc WHERE tpc_email = '$email'   ");
        if ($checkQuery->num_rows == 1) {
            $sendMail = 1;
        }
    }




    $subject = "Password Recovery Link";
    $token = getRandomStringShuffle();

    $email_send = base64_encode($email);

    $body = '
    <html>
    <head>
    <title>Password Recovery Link</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </head>
    <body>
        <h1>Password Recovery Link</h1>
        <p>Your password recovery link is <a href="http://localhost/tpc/forgotPassword.php?token=' . $token . '&email=' . $email_send . '&type=' . $typeOfUser . '" class="btn btn-primary btn-sm">Reset Password</a></p>
        <p>If you did not request this, please ignore this email.</p>
    </body>
    </html>
    ';


    if ($sendMail) {
        sendMail($email, $subject, $body);
        $insert = $conn->query("INSERT INTO password_recovery(`token` , `email`) values('$token', '$email')");
    } else {
        sleep(2);
    }
    $mailSentSuccess = 1;
}

if (isset($_GET["token"]) && isset($_GET["email"]) && isset($_GET["type"])) {

    $changePassword = 1;
    $token = $_GET["token"];
    $email = $_GET["email"];
    $typeOfUser = $_GET["type"];

    $get_data_query = $conn->query("SELECT * FROM password_recovery WHERE token = '$token'");

    $get_data = $get_data_query->fetch_assoc();
    $db_email = $get_data['email'];
    $expiry = $get_data['expired'];

    if ($expiry == 1) {
        $linkExpired = 1;
    } else {
        $update = $conn->query("UPDATE password_recovery SET expired = 1 WHERE token = '$token'");
    }
}

if (isset($_POST["change-password"])) {
    $email_new = $_POST["email"];
    $type  = $_POST["type"];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $password = base64_encode(strrev(md5($password)));


    if ($type == 1) {
        $updateQuery = $conn->query("UPDATE student SET s_password = '$password' WHERE s_email = '$email_new'");
        if ($conn->affected_rows) {
            $updateSuccess = 1;
        }
    }
    if ($type == 2) {
        $updateQuery = $conn->query("UPDATE company SET password = '$password' WHERE HR_email = '$email_new'");
        if ($conn->affected_rows) {
            $updateSuccess = 1;
        }
    }
    if ($type == 4) {
        $updateQuery = $conn->query("UPDATE tpo SET tpo_password = '$password' WHERE tpo_email = '$email_new'");
        if ($conn->affected_rows) {
            $updateSuccess = 1;
        }
    }
    if ($type == 5) {
        $updateQuery = $conn->query("UPDATE tpf SET tpf_password = '$password' WHERE tpf_email = '$email_new'");
        if ($conn->affected_rows) {
            $updateSuccess = 1;
        }
    }
    if ($type == 6) {
        $updateQuery = $conn->query("UPDATE tpc SET tpc_password = '$password' WHERE tpc_email = '$email_new'");
        if ($conn->affected_rows) {
            $updateSuccess = 1;
        }
    }
}

function getRandomStringShuffle($length = 16)
{
    $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringLength = strlen($stringSpace);
    $string = str_repeat($stringSpace, ceil($length / $stringLength));
    $shuffledString = str_shuffle($string);
    $randomString = substr($shuffledString, 1, $length);
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./core/header.php") ?>
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .extra {
            font-size: 13px;
            color: #adacac;
        }

        .done {
            font-size: 14px;
            font-weight: bolder;
            color: #08b30e;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("./core/nav.php") ?>
    <!-- Login -->
    <?php if ($mailSentSuccess == 1) {
    ?>

        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Password Reset Link Sent Successfully</span></div>
                <div class="">

                    <p class="text-center mt-2 fs-2 "> Please check your registered Email ID for the Password Recovery Link. <i>Thank You</i></p>
                </div>
            </div>
        </div>



    <?php

    } else if ($linkExpired == 1) {
    ?>

        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Password Reset Link Expired</span></div>

            </div>
        </div>





    <?php

    } else if ($updateSuccess == 1) {
    ?>

        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Password Reset Successfully Done</span></div>
                <div class="">

                    <p class="text-center mt-2 fs-2 "> Please Login to your Account <a class="btn btn-sm btn-primary" href="./login.php"> LOGIN </a> </p>
                </div>
            </div>
        </div>



    <?php

    } elseif ($changePassword) {

    ?>
        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Change Password</span></div>
                <form action="./forgotPassword.php" method="POST">

                    <input type="text" name="email" value="<?php echo $db_email ?>" hidden>
                    <input type="text" name="type" value="<?php echo $typeOfUser ?>" hidden>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" onkeyup="validate_password()" required>
                        <div class="col d-flex">
                            <span class="extra " id="eightCharacter">Atleat 8 characters,</span><br>

                            <span class="extra" id="oneDigit">1 digit,</span> <br>
                            <span class="extra" id="oneCapital">1 Capital Letter,</span> <br>
                            <span class="extra" id="oneSpecial">1 Special Character </span>
                        </div>


                    </div>
                    <div class="row mt-5">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="cPassword" name="cpassword" onkeyup="check_password()" placeholder="Confirm Password" autocomplete="off" required>
                        <div class="col">

                            <span id="message"></span>
                        </div>

                    </div>
                    <div class="row button">
                        <span id="finalmessage" class="extra"></span>

                        <input type="submit" name="change-password" id="updatePassword" value="Update">
                    </div>
                    <!-- <div class="signup-link">Password Rememberred ? <a href="./login.php">Login now</a></div> -->
                </form>


            </div>
        </div>


    <?php } else {  ?>

        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Password Recovery</span></div>
                <form action="./forgotPassword.php" method="POST">
                    <div class="row">
                        <i class="fa fa-user-o fa-fw"></i>

                        <select name="typeOfUser" required id="user">
                            <option value="1">Student</option>
                            <option value="2">Company</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                    <div class="row d-none" id="admin">

                        <i class="fa fa-user-o fa-fw"></i>
                        <select name="typeOfAdmin">
                            <option value="4">TPO</option>
                            <option value="5">TPF</option>
                            <option value="6">TPC</option>
                        </select>
                    </div>
                    <div class="row">
                        <i class="fa fa-envelope-o fa-fw"></i>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" required>
                    </div>
                    <!-- <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="pass"><a href="./forgotPassword.php">Forgot password?</a></div> -->
                    <div class="row button">
                        <input type="submit" name="send-password-link" value="Send Reset Link">
                    </div>
                    <div class="signup-link">Password Rememberred ? <a href="./login.php">Login now</a></div>
                </form>


            </div>
        </div>
    <?php
    } ?>

    <!-- Footer -->
    <?php include("./core/footer.php") ?>
    <script>
        // var admin = document.getElementById('admin');
        // document.getElementById('user').addEventListener('change', (event) => {
        //     if (event.target.value == 3) {
        //         admin.classList.remove("d-none");
        //     }
        //     if (event.target.value != 3) {
        //         admin.classList.add("d-none");
        //     }
        // })
        $(document).ready(function() {

            $('#user').change(function() {
                if ($(this).val() == "3") {
                    $("#admin").removeClass("d-none");
                } else {
                    $("#admin").addClass("d-none")
                }

            })
        });


        var finalSubmit = 0;
        var oldPass = 0;
        var newPass = 0;
        var newCpass = 0;

        function validate_password() {
            var c1, c2, c3, c4 = 0
            console.log("pas");
            var eightCharacter = document.getElementById('eightCharacter');
            var oneCapital = document.getElementById('oneCapital');
            var oneDigit = document.getElementById('oneDigit');
            var oneSpecial = document.getElementById('oneSpecial');
            var pass = document.getElementById('password').value;
            // var confirm_pass = document.getElementById('cPassword').value;
            if (pass.length >= 8) {
                console.log(pass.length)
                eightCharacter.classList.remove("extra");
                eightCharacter.classList.add("done");
                c1 = 1
            }
            if (pass.length < 8) {
                eightCharacter.classList.remove("done");
                eightCharacter.classList.add("extra");
                c1 = 0
            }
            console.log(eightCharacter.classList);
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
                newPass = 1;
            }
            check_password()
            finalCheck()




        }

        function check_password() {
            var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('cPassword').value;
            if (pass != confirm_pass) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password Not Matched';
                // document.getElementById('message').classList.add('bg-danger')
                // document.getElementById('message').classList.remove('bg-success')
                newCpass = 0;

            } else {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = '🗹 Password Matched';
                // document.getElementById('message').innerHTML = 'Password Matched';
                // document.getElementById('message').classList.remove('bg-danger')
                // document.getElementById('message').classList.add('bg-success')
                newCpass = 1;
            }
            finalCheck()

        }
        $(document).ready(function() {
            finalCheck()
        })

        function finalCheck() {

            if ((newCpass + newPass) == 2) {
                // console.log("ENABLED")
                document.getElementById('finalmessage').style.color = 'green';
                document.getElementById('finalmessage').innerHTML = 'Done 🗹';
                document.getElementById('updatePassword').disabled = false;

            } else {
                // console.log("DISBLED")
                document.getElementById('finalmessage').style.color = 'red';
                document.getElementById('finalmessage').innerHTML = 'Check Password';
                document.getElementById('updatePassword').disabled = true;

            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>