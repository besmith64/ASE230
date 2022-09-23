<?php
    // retrieve data from query string
    $user=$_GET;
    print_r($user);

    $user_json=json_encode($user);
    echo $user_json;
    file_put_contents('users.json', $user_json);

    //url
    // http://localhost/ASE230/create.php?user=ben&psw=12345