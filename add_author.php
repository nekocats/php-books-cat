<?php
    require_once "connection.php";

    if ( isset($_POST['save'])) {
        $stmt = $pdo->prepare('INSERT INTO authors(first_name, last_name) VALUES (:first_name, :last_name)');
        $stmt->execute(['first_name' => $_POST["first_name"] , 'last_name' => $_POST["last_name"]]);
        header('Location: index.php');
    }
    $stmt = $pdo->query('SELECT * FROM authors order by id desc');

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autori lisamine</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@700&display=swap" rel="stylesheet"> 
</head>
<body>
<h1>Lisa autor:</h1>
<form action="add_author.php" method="post">
        <input type="text" name="first_name">
        <input type="text" name="last_name">
        <input type="submit" name="save" value="salvesta">
    </form>
    <h1>
        Autorid:
    </h1>
    <?php while( $authors = $stmt->fetch()): ?>
        <option value="<?= $authors['id']; ?>"> <?= $authors['first_name']; ?> <?= $authors['last_name']; ?></option>
    <?php endwhile; ?>
    
</body>
</html>