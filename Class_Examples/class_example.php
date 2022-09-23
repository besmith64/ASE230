<?php
    // Writing php array into a JSON file
    $beatles=[
        ['firstname'=>'John','lastname'=>'Lennon'],
        ['firstname'=>'Paul','lastname'=>'McCartney'],
        ['firstname'=>'Ringo','lastname'=>'Starr'],
        ['firstname'=>'George','lastname'=>'Harrison']
    ];
    
    $beatles_json=json_encode($beatles);
    echo $beatles_json;

    $fh = fopen('beatles.json', 'w');
    fputs($fh, $beatles_json);
    fclose($fh);

    file_put_contents('beatles2.json', $beatles_json);
    die();

    
    $json_text = file_get_contents('assets/data/data.json'); // Get data from file


    $json_text2='';
    $fh = fopen('assets/data/data.json', 'r');
    while($line=fgets($fh)) $json_text2.=$line;
    fclose($fh);
    $json_array2 = json_decode($json_text2,true);
    print_r($json_array2);
    echo $json_text2;
    die();

    echo $json_text;

    $json_array = json_decode($json_text,true);
    if(!isset($json_array)) die('error while converting json');
    print_r($json_array);
    echo '<hr/>';
    var_dump($json_array);

    echo '<hr/>';
    foreach($json_array as $musician) {
        echo '<h1>'.$musician['firstname'].'</h1>';
    }

?>