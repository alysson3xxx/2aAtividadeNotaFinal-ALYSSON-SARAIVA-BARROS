<?php
include 'database.php';

if (isset($_POST['id'])) {
$stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = :id");
$stmt->bindValue(':id', $_POST['id'], SQLITE3_INTEGER);
$stmt->execute();
}
header("Location: index.php");
exit;
?>
