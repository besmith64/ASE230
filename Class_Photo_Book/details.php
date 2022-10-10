<?php
// Include php files
include('data.php');
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/detail.css" />
    <title>
        <?= 'ASE 230 - ' . $students[$_GET['id']]['name']; ?>
    </title>
</head>

<body>
    <div class="container text-center mb-5">
        <div class="row p-4">
            <nav class="navbar fixed-top" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="index.php">Home</a>
            </nav>
        </div>
        <div class="row text-center">
            <h1><?= 'This is ASE 230 - ' . $students[$_GET['id']]['name']; ?></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="mb-2">
                    <img class="w-100" src=<?= $students[$_GET['id']]['image']; ?> alt="" />
                </div>
                <div class="mb-2 d-flex">
                    <h4 class="font-weight-normal">
                        <?= $students[$_GET['id']]['name']; ?>
                    </h4>
                    <div class="social d-flex ml-auto">
                        <p class="pr-2 font-weight-normal">Follow me on:</p>
                        <a href=<?= $students[$_GET['id']]['facebook']; ?> class="text-muted mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href=<?= $students[$_GET['id']]['linkedin']; ?> class="text-muted">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="mb-2">
                    <ul class="list-unstyled">
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Dream profession:</span>
                            <label class="media-body"><?= $students[$_GET['id']]['profession']; ?></label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Dream company:</span>
                            <label class="media-body"><?= $students[$_GET['id']]['company']; ?></label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Email:</span>
                            <label class="media-body">
                                <?= $students[$_GET['id']]['email']; ?>
                            </label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Age:</span>
                            <label class="media-body">
                                <?= age($students[$_GET['id']]['dob']); ?>
                            </label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Months Old:</span>
                            <label class="media-body">
                                <?= time_intervals($students[$_GET['id']]['dob'])['months']; ?>
                            </label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Days Old:</span>
                            <label class="media-body">
                                <?= time_intervals($students[$_GET['id']]['dob'])['days']; ?>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 pl-xl-3">
                <h5 class="font-weight-normal">Short intro</h5>
                <p>
                    <?= $students[$_GET['id']]['intro']; ?>
                </p>
                <div class="my-2 bg-light p-2">
                    <p class="font-italic mb-0">
                        <?= $students[$_GET['id']]['quote']; ?>
                    </p>
                </div>
                <div class="mb-2 mt-2 pt-1">
                    <h5 class="font-weight-normal">Top skills</h5>
                </div>
                <?php foreach ($students[$_GET['id']]['skills'] as $name => $skill) : ?>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style=<?= "'width: " . $skill . "%'"; ?>
                            aria-valuenow=<?= $skill; ?> aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?= $name; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?= $skill . "%"; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <h5 class="font-weight-normal">Fun fact</h5>
                <p>
                    <?= $students[$_GET['id']]['funfact']; ?>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>