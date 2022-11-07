<?php
session_start();
// if the user is not logged in, redirect them to the public page
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: ../index.php", TRUE, 302);
    die();
}
include('../csv_util.php');
// the file displays a form with a text field where users can type the quote and a select box that displays all the available authors
// as the form gets submitted, a new quote is added to quotes.csv
$author_list = read_csv('../data/authors.csv');
$id = 0;
$error = '';

foreach ($author_list as $key => $val) {
    for ($i = 0; $i < $val[0]; $i++) {
        if ($i == $val[0] - 1) {
            $id = $i + 2;
        }
    }
}

if (isset($_POST['submit'])) {
    if (empty($_POST['new_author'])) {
        $error .= '<div class="alert alert-danger" role="alert">Please enter a new author.</div>';
    }
    if ($error == '') {
        $file = '../data/authors.csv';
        $values = array(
            'id' => $id,
            'author' => $_POST['new_author']
        );
        write_csv($file, $values);
        $error = '<div class="alert alert-success" role="alert">Successfully Submitted! <a href="index.php"><i
        class="fa-solid fa-house"></i> Home</a></div>';
    }
    $id = 0;
}

?>
<!DOCTYPE html>
<html style="font-size: 16px" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>Great Quotes!</title>
    <link rel="stylesheet" href="../css/nicepage.css" media="screen" />
    <link rel="stylesheet" href="../css/Home.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/057979aec3.js" crossorigin="anonymous"></script>
    <script class="u-script" type="text/javascript" src="../js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />

</head>

<body class="u-body u-xl-mode">
    <header>
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><i class="fa-solid fa-pen-ruler"></i> Great Quotes!</a>
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
                                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Author List</a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../signin.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../signup.php">Signup</a>
                            </li>
                            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../signout.php">Sign Out</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" id="carousel_57ee" data-image-width="1280"
        data-image-height="848">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div id="liveAlertPlaceholder"><?= $error ?></div>
            <form method="POST">
                <div class="input-group">
                    <span class="input-group-text">Add Author</span>
                    <input name="new_author" class="form-control" placeholder="Enter Author" aria-label="Add Author" />
                </div>
                <br></br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
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