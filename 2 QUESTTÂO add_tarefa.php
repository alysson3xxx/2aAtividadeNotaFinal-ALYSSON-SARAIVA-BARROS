<?php
include 'database.php';

if (isset($_POST['descricao'], $_POST['vencimento'])) {
    $stmt = $db->prepare("INSERT INTO tarefas (descricao, vencimento) VALUES (:descricao, :vencimento)");
$stmt->bindValue(':descricao', $_POST['descricao']);
$stmt->bindValue(':vencimento', $_POST['vencimento']);
$stmt->execute();
}
header("Location: index.php");
exit;
?>
