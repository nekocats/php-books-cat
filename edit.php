<?php

require_once 'connection.php';

$bookId = $_GET['id'];
if ( isset($_POST['save']) ) {
    $stmt = $pdo->prepare('UPDATE books SET title=:title WHERE id=:id');
    $stmt->execute([':id' => $bookId, ':title' => $_POST['title']]);

    header('Location: book.php?id=' . $bookId);
}

$stmt = $pdo ->prepare ('SELECT * FROM books b LEFT JOIN book_authors ba ON b.id=ba.book_id LEFT JOIN authors a ON a.id=ba.author_id WHERE b.id=:id');

$stmt-> execute([':id' => $_GET['id']]);
$book = $stmt->fetch();
?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muuda</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body>

<form action="edit.php?id=<?= $bookId; ?>" method="post">
    <input class="input" type="text" name="title" value="<?= $book ['title']; ?>">
    <input class="editing" type="submit" name="save" value="Salvesta">
</form>

    
</body>
</html>

</html>