<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@700&display=swap" rel="stylesheet"> 
</head>

<body>
    <h1>
        Raamatud:
    </h1>
</body>

<?php

require_once 'connection.php';

$stmt = $pdo->query('SELECT * FROM books');
while ( $row = $stmt->fetch() ) {
    echo '<a href="book.php?id=' . $row['id'] . '">' . $row['title'] . '</a>' . '<br>';
}