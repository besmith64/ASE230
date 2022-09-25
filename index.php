<?php
// Include php files
include('data.php');
include('functions.php');

function card($i)
{
    include('data.php');
    $person_info = array(
        'name' => $students[$i]['name'],
        'age' => age($students[$i]['dob']),
        'months_old' => time_intervals($students[$i]['dob'])['months'],
        'days_old' => time_intervals($students[$i]['dob'])['days'],
        'image' => $students[$i]['image'],
        'facebook' => $students[$i]['facebook'],
        'linkedin' => $students[$i]['linkedin'],
        'designation' => $students[$i]['designation'],
        'level' => $students[$i]['level']
    );

    return $person_info;
}
?>
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
    <title><?= 'ASE 230 - class of Fall 2022'; ?></title>
</head>

<body>
    <div class="container text-center">
        <h1><?= 'This is ASE 230 - Class of Fall 2022'; ?></h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
                <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h3>Our Creative<span> Team</span></h3>
                    <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php for ($i = 0; $i < count($students); $i++) : ?>
            <!-- # Single Advisor -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="advisor_thumb">
                        <a href=<?= 'details.php?id=' . $i; ?>>
                            <img src=<?= card($i)['image']; ?> alt="" width="250" height="315" />
                        </a>
                        <div class="social-info">
                            <a href=<?= card($i)['facebook']; ?>>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href=<?= card($i)['linkedin']; ?>>
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="single_advisor_details_info">
                        <h6><?= card($i)['name']; ?></h6>
                        <p><?= 'Age: ' . card($i)['age']; ?></p>
                        <p><?= 'Months Old: ' . card($i)['months_old']; ?></p>
                        <p><?= 'Days Old: ' . card($i)['days_old']; ?></p>
                        <p class="designation"><?= card($i)['designation']; ?></p>
                        <p><?= 'College Level:'; ?></p><?= card($i)['level']; ?>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
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