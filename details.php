<?php
    //Declare Variables
    //Multidimensional Array
    $students = array(
        1 => array('name' =>'Ben Smith',
                'designation' => 'Technical Systems Analyst',
                'image' => 'img/me.jpg',
                'facebook' => 'https://www.facebook.com/DarkCreed64',
                'linkedin' => 'https://www.linkedin.com/in/benjamin-smith-27b867101/',
                'level' => '<i class="fa-solid fa-4"></i>'),
        2 => array('name' => 'David Price',
                'designation' => 'System Administrator',
                'image' => 'img/david_price.jpg',
                'facebook' => 'https://www.facebook.com/zuck',
                'linkedin' => 'https://www.linkedin.com/',
                'level' => '<i class="fa-solid fa-2"></i>'),
        3 => array('name' => 'Devon Nash',
                'designation' => 'UX Designer',
                'image' => 'img/devon_nash.jpg',
                'facebook' => 'https://www.facebook.com/TheElonmusk',
                'linkedin' => 'https://www.linkedin.com/',
                'level' => '<i class="fa-solid fa-3"></i>')
                );
    $Intro= "Hello! My name is Ben, I am a Computer Information Technology major with a minor in Information Security. 
            This is my senior year at NKU and previously I graduated from Cincinnati State with an Associates of Applied Science with my field of
            study being Business Programming and Administration. I also work at Greater Cincinnati Water Works as a Technical Systems Analyst, where 
            I oversee some of our custom web applications as well as data analysis and reporting. I have two dogs and two cats and enjoy spending time
            with my wife and her family as well as being an avid gamer and tech enthusiast.";
    $Quote="For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.";
    $FunFact="A fun fact about me is that I enjoy cooking and learning new recipes, if I didn't persue a career in Information Technology then I would 
            have like to have become a chef and have my own food truck.";
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
        <?= 'ASE 230 - Benjamin Smith'; ?>
    </title>
</head>

<body>
    <nav class="navbar fixed-top" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.php">Home</a>
    </nav>
    <div class="container text-center mb-5">
        <h1>
            <?= 'This is ASE 230 - Benjamin Smith'; ?>
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="mb-2">
                    <img class="w-100" src=<?= 'img/me.jpg'; ?> alt="" />
                </div>
                <div class="mb-2 d-flex">
                    <h4 class="font-weight-normal">
                        <?= 'Benjamin Smith'; ?>
                    </h4>
                    <div class="social d-flex ml-auto">
                        <p class="pr-2 font-weight-normal">Follow me on:</p>
                        <a href="#" class="text-muted mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-muted">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="mb-2">
                    <ul class="list-unstyled">
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Dream profession:</span>
                            <label class="media-body"><?= 'Developer/System Administrator'; ?></label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Dream company:</span>
                            <label class="media-body"><?= 'Microsoft'; ?></label>
                        </li>
                        <li class="media">
                            <span class="w-25 text-black font-weight-normal">Email:</span>
                            <label class="media-body"><?= 'smithb77@mymail.nku.edu</label>'; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 pl-xl-3">
                <h5 class="font-weight-normal">Short intro</h5>
                <p>
                    <?= $Intro; ?>
                </p>
                <div class="my-2 bg-light p-2">
                    <p class="font-italic mb-0">
                        <?= $Quote; ?>
                    </p>
                </div>
                <div class="mb-2 mt-2 pt-1">
                    <h5 class="font-weight-normal">Top skills</h5>
                </div>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?= 'Data Analysis'; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?= '85%'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?= 'Development'; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?= '70%'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?= 'Data Administration'; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?= '60%'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <h5 class="font-weight-normal">Fun fact</h5>
                <p>
                    <?= $FunFact; ?>
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