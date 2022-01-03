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
        if (isset($_GET['title'])) {
            $book['title'] = $_GET['title'];
        } else {
            $allOk = false;
            echo "Title not set";
        }
        if (isset($_GET['author'])) {
            $book['author'] = $_GET['author'];
        } else {
            $allOk = false;
            echo "Author not set";
        }
        if (isset($_GET['available'])) {
            $book['available'] = $_GET['available'];
        } else {
            $allOk = false;
            echo "Available not set";
        }
        if (isset($_GET['pages'])) {
            $book['pages'] = $_GET['pages'];
        } else {
            $allOk = false;
            echo "Pages not set";
        }
        if (isset($_GET['isbn'])) {
            $book['isbn'] = $_GET['isbn'];
        } else {
            $allOk = false;
            echo "ISBN not set";
        }
        if ($allOk) {
            $bookJson = file_get_contents('books.json');
            $books = json_decode($bookJson, true);
            array_push($books, $book);
            $bookJson = json_encode($books);
            file_put_contents('books.json', $bookJson);
            echo "Book added";
        }
    ?>
</body>

</html>