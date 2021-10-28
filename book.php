<?php

require_once 'connection.php';
$bookId = $_GET['id'];
$stmt = $pdo ->prepare ('SELECT * FROM books b LEFT JOIN book_authors ba ON b.id=ba.book_id LEFT JOIN authors a ON a.id=ba.author_id WHERE b.id=:id');

$stmt-> execute([':id' => $_GET['id']]);
$book = $stmt->fetch();
?>
    <!DOCTYPE html>
    <html lang="en">
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
    <body>
        <div class="tekst">
            <p>Väljalaske aasta: <?php echo $book['release_date']; ?></p>
            <p>Autor: <?php echo $book['first_name']; ?> <?php echo $book['last_name']; ?></p>
            <p>Hind: <?php echo round($book['price'],2) ?></p>
        </div>
    
    <div class="neko">
        <a href="edit.php?id=<?=$bookId?>">
            Muuda
        </a>
        <a href="delete.php?id=<?=$bookId?>">Kustuta</a>
    </div>
   
    </body>




</html>