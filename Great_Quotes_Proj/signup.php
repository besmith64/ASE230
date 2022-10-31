<?php
session_start();
//Add functions
include('auth.php');
//Declare variables
$error = '';
$email = '';
$password = '';
$pattern = '/\w+[^\s\d\w]{2}/';

// if the user is alreay signed in, redirect them to the members_page.php page
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    // index.php
    header("Location: index.php", TRUE, 302);
    die();
}

// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
if (count($_POST) > 0) {
    // check if the fields are empty
    if (!isset($_POST['email'])) {
        $error .= '<div class="alert alert-danger" role="alert">please enter your email</div>';
    } // 2. check if the email is well formatted
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error .= '<div class="alert alert-danger" role="alert">Your email is invalid</div>';
    } else {
        $email = $_POST['email'];
    }
    if (!isset($_POST['password'])) {
        $error .= '<div class="alert alert-danger" role="alert">please enter your password</div>';
    } // check if password length is between 8 and 16 characters
    elseif (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 16) {
        $error .= '<div class="alert alert-danger" role="alert">Please enter a password >=8 characters</div>';
    } // check if the password contains at least 2 special characters
    elseif (!preg_match($pattern, $_POST['password'])) {
        $error .= '<div class="alert alert-danger" role="alert">please use at least 2 special characters</div>';
    } else {
        $password = $_POST['password'];

        if (isset($email) && isset($password)) {
            $error .= signup($email, $password);
        }
    }
}

// improve the form
?>
<html style="font-size: 16px" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen" />
    <link rel="stylesheet" href="css/login.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/057979aec3.js" crossorigin="anonymous"></script>
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.19.3, nicepage.com" />
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />

    <meta name="theme-color" content="#478ac9" />
    <meta property="og:title" content="Sign Up" />
    <meta property="og:type" content="website" />
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <header>
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="fa-solid fa-pen-ruler"></i> Great Quotes!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            <i class="fa-solid fa-pen-ruler"></i> Great Quotes! Project
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="authors/index.php">Author List</a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="signin.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Signup</a>
                            </li>
                            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="signout.php">Sign Out</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="u-align-center u-clearfix u-block-4b94-1 u-section-1" custom-posts-hash="T"
        data-section-properties='{"margin":"both","stretch":true}' data-id="4b94" data-style="login-form-1"
        id="sec-0baa" data-image-width="1280" data-image-height="848">
        <div class="u-clearfix u-sheet u-block-4b94-2">
            <div id="liveAlertPlaceholder"><?= $error ?></div>
            <h2>Create an Account</h2>
            <div class="u-form u-login-control u-block-4b94-24">
                <form method="POST"
                    class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form"
                    source="custom" name="form" style="padding: 10px">
                    <div class="u-form-group u-form-name u-block-4b94-25">
                        <label for="username-a30d" class="u-label u-block-4b94-26">Username *</label>
                        <input type="text" placeholder="Enter your email" id="username-a30d" type="email" name="email"
                            class="u-border-grey-30 u-input u-input-rectangle u-block-4b94-27" required="" />
                    </div>
                    <div class="u-form-group u-form-password u-block-4b94-28">
                        <label for="password-a30d" class="u-label u-block-4b94-29">Password *</label>
                        <input type="text" placeholder="Enter your Password" id="password-a30d" type="password"
                            name="password" class="u-border-grey-30 u-input u-input-rectangle u-block-4b94-30"
                            required="" />
                    </div>
                    <div class="u-align-left u-form-group u-form-submit u-block-4b94-33">
                        <button type="submit" class="u-btn u-btn-submit u-button-style u-block-4b94-34">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-5cf2">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">
                CIT 483 Great Quotes Project
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>