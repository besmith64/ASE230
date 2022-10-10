<?php

//print_r($_GET);
$fh = fopen('form_data.csv', 'a+');


if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
    fputs($fh, $_POST['email'] . ';' . $_POST['password'] . PHP_EOL);
    fclose($fh);
    $msg = 'Data has been saved';
    $color = 'green';
} else {
    $msg = 'Error';
    $color = 'red';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="color: <?= $color; ?>"><?= $msg ?></h1>
</body>

</html>