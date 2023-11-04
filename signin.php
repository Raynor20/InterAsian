<?php
session_start(); 

//session if reg success
if(isset($_SESSION['registration_success']) && $_SESSION['registration_success']){
    $registrationMessage = "Account created! Proceed to Sign In";
    unset($_SESSION['registration_success']);  
}
//session if reg error
if (isset($_SESSION['registration_error'])) {
    $errorMessage = $_SESSION['registration_error'];
    unset($_SESSION['registration_error']); 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login</title>
    <link rel="stylesheet" href=".\css\login-register.css">
    <style>
    .registration-message {
        color: black;
        text-align: center;
    }

    .reg-error-message {
        color: #E34234;
        margin-left: 40px;
    }

    .log-error-message {
        color: #E34234;
    }
    </style>
</head>

<body class="form-v8">
    <div class="page-content" style="background-image: url(assets/signin-bg.jpg);">
        <div class="form-v8-content">
            <div class="form-left">
                <img src=".\assets\logowithname.jpg" alt="form"
                    style="width: 494px; height: 620px; transform: scale(0.65,0.5);">
            </div>
            <div class="form-right" style="margin-left: 2em;">
                <div class="tab">
                    <div class="tab-inner">
                        <button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Sign
                            Up</button>
                    </div>
                    <div class="tab-inner">
                        <button class="tablinks" onclick="openCity(event, 'sign-in')" id="login-tab">Sign In</button>
                    </div>
                </div>
                <!-----REGISTER------>
                <form class="form-detail" action="register-config.php" method="post">
                    <div class="tabcontent" id="sign-up">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="firstname" id="firstname" class="input-text" required>
                                <span class="label">First Name</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="lastname" id="lastname" class="input-text" required>
                                <span class="label">Last Name</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="email" id="email" class="input-text" required>
                                <span class="label">E-Mail</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="password" id="password" class="input-text" required>
                                <span class="label">Password</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="confirm_password" id="confirm_password" class="input-text"
                                    required>
                                <span class="label">Confirm Password</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row-last">
                            <input type="submit" name="register" class="register" value="Register">
                        </div>
                    </div>
                </form>

                <!----LOGIN------->
                <form class="form-detail" action="login-config.php" method="post">
                    <div class="tabcontent" id="sign-in">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="email-login" id="email-login" class="input-text" required>
                                <span class="label">E-Mail</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="password-login" id="email-login" class="input-text"
                                    required>
                                <span class="label">Password</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <?php
                            if (isset($_SESSION['login_error'])) {
                                echo '<div class="log-error-message">' . $_SESSION['login_error'] . '</div>';
                                unset($_SESSION['login_error']); 
                                }
                        ?>
                        <div class="form-row-last">
                            <input type="submit" name="login" class="register" value="Sign In">
                        </div>
                    </div>
                </form>
                <?php if (!empty($registrationMessage)) { ?>
                <div class="registration-message"><?php echo $registrationMessage; ?>
                    <?php } ?>
                    <div id="registration-error-container">
                        <?php if (!empty($errorMessage)) { ?>
                        <div class="reg-error-message"><?php echo $errorMessage; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";

                // Hide registration error message when switching to login tab
                if (cityName === "sign-in") {
                    var registrationErrorContainer = document.getElementById("registration-error-container");
                    if (registrationErrorContainer) {
                        registrationErrorContainer.style.display = "none";
                    }
                }
            }
            document.getElementById("defaultOpen").click();
            </script>
</body>

</html>