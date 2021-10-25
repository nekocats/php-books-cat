<?php

require_once 'connection.php';

$stmt = $pdo ->prepare ('SELECT * FROM books b LEFT JOIN book_authors ba ON b.id=ba.book_id LEFT JOIN authors a ON a.id=ba.author_id WHERE b.id=:id');

$stmt-> execute([':id' => $_GET['id']]);
$book = $stmt->fetch();
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>

<h1><?php echo $book['title']; ?></h1>

<div class="kaanepilt">
    <img src="<?php echo $book['cover_path']; ?>" alt="Raamatu kaas"> <br>
</div>

<div class="tekst">
    <p>Väljalaske aasta: <?php echo $book['release_date']; ?></p>

    <p>Keel: <?php echo $book['language']; ?></p>

    <p>Kirjeldus: <?php echo $book['summary']; ?></p>

    <p>Autor: <?php echo $book['first_name']; ?> <?php echo $book['last_name']; ?></p>

    <p>Lehti: <?php echo $book['pages']; ?></p>

    <p>Hind: <?php echo $book['price']; ?></p>

</div>

<div class="neko">
    <a href="edit.php?id=<?php echo $book['id']; ?>">Muuda</a>
</div>


</html>