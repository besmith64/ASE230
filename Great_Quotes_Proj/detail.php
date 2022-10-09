<?php
include('csv_util.php');
// the page shows a specific quote (selected by the user) written using a bigger font, with its author
// a "delete" button enables you to delete the quote
// a "modify" button enables you to go to the modify page described below
$author = read_one_csv_element('data\authors.csv', $_GET['author']);
$quote = read_one_csv_element('data\quotes.csv', $_GET['author']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/057979aec3.js" crossorigin="anonymous"></script>
    <title>Great Quotes!</title>
</head>

<body>
    <div class="container text-center">
        <div class="row row-cols-1">
            <span class="border border-primary">
                <div class="col-auto">
                    <h1><?= $author; ?></h1>
                </div>

                <blockquote class="blockquote">
                    <p><?= $quote; ?></p>
                </blockquote>
            </span>
        </div>
    </div>
    </br>
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <a href=<?= 'modify.php?author=' . $_GET['author']; ?> class="btn btn-warning btn-lg" tabindex="-1"
                    role="button" aria-disabled="true">
                    <i class="fa-solid fa-gear"></i>
                    Modify
                </a>
            </div>
            <div class="col-6">
                <a href=<?= 'delete.php?author=' . $_GET['author']; ?> class="btn btn-danger btn-lg" tabindex="-1"
                    role="button" aria-disabled="true">
                    <i class="fa-solid fa-trash-can"></i>
                    Delete
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>