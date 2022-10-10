<?php
// print_r($_POST);
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

if(isset($_FILES['file'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], 'img/'.$_FILES['file'])
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <div style="color: <?= $color; ?>"><?php if (isset($msg)) echo  $msg; ?></div>
    <form method="POST" action="form.php">
        <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo  $_POST['email']; ?>" /><br />
        <input type="text" name="password"
            value="<?php if (isset($_POST['password'])) echo  $_POST['password']; ?>" /><br />
        <button type="submit">Submit</button>
    </form>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">Choose File</input>
        <button type="submit">Submit</button>
    </form>
</body>

</html>