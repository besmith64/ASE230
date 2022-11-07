<?php
session_start();
// if the user is not logged in, redirect them to the public page
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: ../index.php", TRUE, 302);
    die();
}
include('../csv_util.php');
// the page asks the user if they want to delete the quote (text, author)
// as the user confirms, the quote is removed from quotes.csv (overwritten)
// a message confirms that the quote has been deleted and shows the link to the detail page
$author = read_one_csv_element('../data/authors.csv', $_GET['author']);
$quote = read_one_csv_element('../data/quotes.csv', $_GET['author']);

if (isset($_POST['submit'])) {
    rm_from_csv('../data/quotes.csv', $_GET['author']);
}

?>
<!DOCTYPE html>
<html style="font-size: 16px" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>Great Quotes! - Detail</title>
    <link rel="stylesheet" href="../css/nicepage.css" media="screen" />
    <link rel="stylesheet" href="../css/Detail.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/057979aec3.js" crossorigin="anonymous"></script>
    <script class="u-script" type="text/javascript" src="../js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />

    <meta name="theme-color" content="#478ac9" />
</head>

<body class="u-body u-xl-mode" data-lang="en">
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
                                <a class="nav-link" href="../authors/index.php">Author List</a>
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
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="1280"
        data-image-height="914" id="sec-ff1b">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h1 class="u-text u-text-default u-title u-text-1" style="color:black;"><?= $author; ?></h1>
            <p class="u-large-text u-text u-text-variant u-text-2" style="color:black;">
                <?= $quote; ?>
            </p>
            <br />
            <form method="POST">
                <h4 class="u-align-center u-text u-text-default u-text-1">Are you sure you would like to delete?</h4>
                <input class="btn btn-danger" type="submit" id="submit" name="submit" value="Yes"
                    onclick="document.location = `<?= 'detail.php?author=' . $_GET['author']; ?>`;">
                <input class="btn btn-dark" type="button" name="cancel" value="No"
                    onclick="document.location = `<?= 'detail.php?author=' . $_GET['author']; ?>`;">
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