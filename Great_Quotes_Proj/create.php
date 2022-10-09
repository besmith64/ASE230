<?php
include('csv_util.php');
// the file displays a form with a text field where users can type the quote and a select box that displays all the available authors
// as the form gets submitted, a new quote is added to quotes.csv
$author = array(
    1 => "Edgar Allen Poe",
    2 => "Dr. Seus",
    3 => "Walt Disney"
);
$quote = '';
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['author'])) {
        $error .= '<div class="alert alert-danger" role="alert">Please select an author.</div>';
    }
    if (empty($_POST['quote'])) {
        $error .= '<div class="alert alert-danger" role="alert">Please enter a quote.</div>';
    }
    if ($error == '') {
        $file = 'data\quotes.csv';
        $values = array(
            'author' => $_POST['author'],
            'quote' => $_POST['quote']
        );
        write_csv($file, $values);
        $error = '<div class="alert alert-success" role="alert">Successfully Submitted!</div>';
        $p_author = '';
        $p_quote = '';
    }
}

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
    <div id="liveAlertPlaceholder"><?= $error ?></div>
    <form method="POST">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect">Author</label>
            <select name="author" class="form-select" id="inputGroupSelect">
                <option selected>Choose...</option>
                <?php foreach ($author as $key => $val) : ?>
                <option value=<?= $key; ?>><?= $val; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group">
            <span class="input-group-text">Add Quote</span>
            <textarea name="quote" class="form-control" placeholder="Enter Quote"
                aria-label="Add Quote"><?php echo $quote; ?></textarea>
        </div>
        <br></br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>