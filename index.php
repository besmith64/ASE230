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
                               ); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
    <script src="https://kit.fontawesome.com/057979aec3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/index.css" />
    <title>
        <?= 'ASE 230 - class of Fall 2022'; ?></title>
</head>

<body>
    <div class="container text-center">
        <h1>
            <?= 'This is ASE 230 - Class of Fall 2022'; ?>
        </h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
                <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h3>
                        <?= 'Our Creative<span> Team</span>'; ?></h3>
                    <p>
                        <?= 'Appland is completely creative, lightweight, clean &amp; super responsive app landing page.'; ?>
                    </p>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($students as $student): ?>
            <!-- # Single Advisor -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="advisor_thumb">
                        <a href="details.php">
                            <img src=<?= $student['image']; ?> alt="" width="250" height="315" />
                        </a>
                        <div class="social-info">
                            <a href=<?= $student['facebook']; ?>>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href=<?= $student['linkedin']; ?>>
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="single_advisor_details_info">
                        <h6><?= $student['name']; ?></h6>
                        <p class="designation"><?= $student['designation']; ?></p>
                        <p><?= 'College Level:'; ?></p><?= $student['level']; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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