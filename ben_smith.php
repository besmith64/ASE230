<html lang="en">
<!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<body>
    <?php
      //Declare Variables
      $Intro= "Hello! My name is Ben, I am a Computer Information Technology major with a minor in Information Security. 
              This is my senior year at NKU and previously I graduated from Cincinnati State with an Associates of Applied Science with my field of
              study being Business Programming and Administration. I also work at Greater Cincinnati Water Works as a Technical Systems Analyst, where 
              I oversee some of our custom web applications as well as data analysis and reporting. I have two dogs and two cats and enjoy spending time
              with my wife and her family as well as being an avid gamer and tech enthusiast.";
      $Quote="For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.";
      $FunFact="A fun fact about me is that I enjoy cooking and learning new recipes, if I didn't persue a career in Information Technology then I would 
              have like to have become a chef and have my own food truck.";
    ?>
    <link rel="stylesheet" href="assets/css/detail.css" />
    <title>
        <?php echo 'ASE 230 - Benjamin Smith'; ?>
    </title>
    <div class="container text-center mb-5">
        <h1>
            <?php echo 'This is ASE 230 - Benjamin Smith'; ?>
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="mb-2">
                    <?php echo '<img class="w-100" src="img/me.jpg" alt="" />'; ?>
                </div>
                <div class="mb-2 d-flex">
                    <h4 class="font-weight-normal">
                        <?php echo 'Benjamin Smith'; ?>
                    </h4>
                    <div class="social d-flex ml-auto">
                        <p class="pr-2 font-weight-normal">
                            <?php echo 'Follow me on:'; ?>
                        </p>
                        <a href="#" class="text-muted mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-muted mr-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-muted mr-1">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-muted">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="mb-2">
                    <ul class="list-unstyled">
                        <li class="media">
                            <?php echo '<span class="w-25 text-black font-weight-normal">Dream profession:</span>'; ?>
                            <?php echo '<label class="media-body">Developer/System Administrator</label>'; ?>
                        </li>
                        <li class="media">
                            <?php echo '<span class="w-25 text-black font-weight-normal">Dream company:</span>'; ?>
                            <?php echo '<label class="media-body">Microsoft</label>'; ?>
                        </li>
                        <li class="media">
                            <?php echo '<span class="w-25 text-black font-weight-normal">Email: </span>'; ?>
                            <?php echo '<label class="media-body">smithb77@mymail.nku.edu</label>'; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 pl-xl-3">
                <?php echo '<h5 class="font-weight-normal">Short intro</h5>'; ?>
                <p>
                    <?php echo $Intro; ?>
                </p>
                <div class="my-2 bg-light p-2">
                    <p class="font-italic mb-0">
                        <?php echo $Quote; ?>
                    </p>
                </div>
                <div class="mb-2 mt-2 pt-1">
                    <h5 class="font-weight-normal">
                        <?php echo 'Top skills'; ?>
                    </h5>
                </div>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?php echo 'Data Analysis'; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?php echo '85%'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?php echo 'Development'; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?php echo '70%'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="py-1">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar-title">
                                <?php echo 'Data Administration'; ?>
                            </div>
                            <span class="progress-bar-number">
                                <?php echo '60%'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <h5 class="font-weight-normal">
                    <?php echo 'Fun fact'; ?>
                </h5>
                <p>
                    <?php echo $FunFact; ?>
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