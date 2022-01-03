<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Books</title>
</head>
 
<body>
    <script>
        function onDelete() {
            return confirm("Do you want to delete this book?");
        }
    </script>
    <div class="container">
        <?php
            $bookJson = file_get_contents('books.json');
            $books = json_decode($bookJson, true);
        ?>
        <h1>Books</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Pages</th>
                <th>Available</th>
                <th>ISBN</th>
            </tr>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['pages']; ?></td>
                    <td><?php echo $book['available'] ? "available" : "not available"; ?></td>
                    <td><?php echo $book['isbn']; ?></td>
                    <td>
                        <form action="delete.php" method="post" onsubmit="onDelete()">
                            <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="add.php">Add new</a>
    </div>
</body>
 
</html>