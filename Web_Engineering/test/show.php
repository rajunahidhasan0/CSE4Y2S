<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Collection</title>
</head>

<body>
    <script>
        function onDelete() {
            return confirm("Do you want to delete this book?");
        }
    </script>
    <?php
        $bookJson = file_get_contents('books.json');
        $books = json_decode($bookJson, true);
    ?>
    <table border="10">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['pages']; ?></td>
                <td>
                <td>
                        <form action="delete.php" method="post" onsubmit="onDelete()">
                            <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
                            <button class="button">Delete</button>
                        </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h1>Add new book</h1>
    <form method="POST" action="create.php">
        <pre>Title: <input type="text"
            name="title">
        </pre>
        <pre>Author: <input type="text"
            name="author">
        </pre>
        <pre>Availabilty: <input type="text"
            name="available">
        </pre>
        <pre>Pages: <input type="text"
            name="pages">
        </pre>    
        <pre>ISBN: <input type="text"
            name="isbn">
        </pre> 
        
        <input type="submit" value="    Add">
    </form>
</body>

</html>