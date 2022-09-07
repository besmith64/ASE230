<?php
    //pass id to detail page in order to show different information
    $link='detail.php?id='.$i

    //passing parameter to detail.php
    echo $_GET['id'];

    // Use this to get specific values from the array
    echo $beatles[$_GET['id']]['name'];
?>