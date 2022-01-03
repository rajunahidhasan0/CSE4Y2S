<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <?php
        if (!isset($_POST['id'])) {
            echo 'No such Book-id';
        } else {
            $bookJson = file_get_contents('books.json');
            $books = json_decode($bookJson, true);
            $arr = [];
            foreach ($books as $book) {
                if ($book['id'] != $_POST['id']) {
                    array_push($arr, $book);
                }
            }
            $books = json_encode($arr);
            file_put_contents('books.json', $books);
            echo 'Book deleted';
        }
    ?>
</body>

</html>