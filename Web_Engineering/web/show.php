<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $bookJson = file_get_contents('books.json');
        $books = json_decode($bookJson, true);
    ?>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['pages']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>