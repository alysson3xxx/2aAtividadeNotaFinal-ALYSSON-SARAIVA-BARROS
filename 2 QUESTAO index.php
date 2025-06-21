<?php
include 'database.php';
$todas = $db->query("SELECT * FROM tarefas ORDER BY vencimento ASC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Lista de Tarefas</title>
</head>
<body>
<h1>Gerenciador de Tarefas</h1>

<h2>Adicionar Tarefa</h2>
<form action="add_tarefa.php" method="POST">
<input type="text" name="descricao" placeholder="Descrição da tarefa" required>
<input type="date" name="vencimento" required>
<button type="submit">Adicionar</button>
  </form>

<h2>Tarefas</h2>
  <ul>
        <?php while ($tarefa = $todas->fetchArray()) : ?>
  <li>
<?= htmlspecialchars($tarefa['descricao']) ?> -
    Vencimento: <?= $tarefa['vencimento'] ?> -
<?= $tarefa['concluida'] ? "<strong>Concluída</strong>" : "<em>Pendente</em>" ?>

<?php if (!$tarefa['concluida']) : ?>
<form action="update_tarefa.php" method="POST" style="display:inline;">
<input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
<button type="submit">Marcar como concluída</button>
   </form>
<?php endif; ?>

<form action="delete_tarefa.php" method="POST" style="display:inline;">
<input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
<button type="submit">Excluir</button>
</form>
</li>
<?php endwhile; ?>
</ul>
</body>
</html>
