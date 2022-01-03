<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <?php
        $allOk = true;
        $book;
        if (isset($_POST['title'])) {
            $book['title'] = $_POST['title'];
        } else {
            $allOk = false;
            echo "Title not set";
        }
        if (isset($_POST['author'])) {
            $book['author'] = $_POST['author'];
        } else {
            $allOk = false;
            echo "Author not set";
        }
        if (isset($_POST['available'])) {
            $book['available'] = $_POST['available'];
        } else {
            $allOk = false;
            echo "Available not set";
        }
        if (isset($_POST['pages'])) {
            $book['pages'] = $_POST['pages'];
        } else {
            $allOk = false;
            echo "Pages not set";
        }
        if (isset($_POST['isbn'])) {
            $book['isbn'] = $_POST['isbn'];
        } else {
            $allOk = false;
            echo "ISBN not set";
        }
        if ($allOk) {
            $bookJson = file_get_contents('books.json');
            $books = json_decode($bookJson, true);
            $book['id'] = sizeof($books)+1;

            array_push($books, $book);
            $bookJson = json_encode($books);
            file_put_contents('books.json', $bookJson);
            echo "Book added";
        }
    ?>
</body>

</html>