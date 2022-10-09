<?php
include('csv_util.php');
// the file lists all the available quotes, together with their authors (e.g., "I try to dress classy and dance cheesy" - Psy)
// the quote links to the  detail page described below
// a "create" button enables you to go to the create page described above
$authors = read_csv('data\authors.csv');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Great Quotes!</title>
</head>

<body>
    <div class="d-grid gap-2 col-6 mx-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Author</th>
                    <th scope="col">Quote</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $key => $val) : ?>
                <tr>
                    <th scope="row"><?= $val[0]; ?></th>
                    <td><?= $val[1]; ?></td>
                    <td><?= read_one_csv_element('data\quotes.csv', $val[0]); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href='create.php'>
            <button class="btn btn-primary" type="button">Create</button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>