<?php

require_once 'connection.php';

$stmt = $pdo ->prepare ('SELECT * FROM books WHERE id=:id');

$stmt-> execute([':id' => $_GET['id']]);
$book = $stmt->fetch();
?>
<html>
<p>Raamatu nimi: <?php echo $book['title']; ?></p>
<p>Väljalaske aasta: <?php echo $book['release_date']; ?></p>
</html>