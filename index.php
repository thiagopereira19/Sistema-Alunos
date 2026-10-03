<?php
require_once "php/config.php";

$sql = "SELECT * FROM alunos";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Alunos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="conteiner">
        <h1 id="titulo">Sistema de Alunos</h1>

        <h2>Alunos Cadastrados</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($aluno = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['email']; ?></td>
                    <td><?php echo $aluno['curso']; ?></td>
                    <td>
                        <a href="php/editar.php?id=<?php echo $aluno['id']; ?>" class="botao editar">Editar</a>
                        <a href="php/excluir.php?id=<?php echo $aluno['id']; ?>" class="botao excluir" onclick="return confirm('Deseja excluir este aluno?')">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div id="area-adicionar">
            <a href="php/adicionar.php" class="botao adicionar">Adicionar aluno</a>
        </div>

    </div>
    <script src="js/script.js"></script>
</body>

</html>