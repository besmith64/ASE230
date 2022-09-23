<?php
    $users_json=file_get_contents('users.json');
    $users_array=json_decode($users_json,true);

    print_r($users_array);