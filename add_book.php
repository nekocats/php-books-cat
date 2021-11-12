<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisamine</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@700&display=swap" rel="stylesheet"> 
</head>
<body>
    <form action="add_book.php" method="post">
        Pealkiri: <input type="text" name="title">
        <br><br>
        Autor: <select name="author">
            <?php while ( $author = $stmt->fetch() ): ?>
                <option value="<?= $author['id']; ?>"> <?= $author['first_name']; ?> <?= $author['last_name']; ?></option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Lisa">
    </form>
</body>
</html>