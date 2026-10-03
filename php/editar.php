<?php
require_once "config.php";

// 1. Pega o ID enviado pela URL para buscar os dados do aluno
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = $conn->query("SELECT * FROM alunos WHERE id = $id");
    $aluno = $resultado->fetch_assoc();
}

// 2. Quando o formulário for enviado (POST), atualiza os dados no MySQL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "UPDATE alunos SET nome='$nome', email='$email', curso='$curso' WHERE id=$id";
    
    if ($conn->query($sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="conteiner">
        <h1 id="titulo">Editar Aluno</h1>

        <form action="editar.php" method="POST">
            <!-- Campo oculto guardando o ID do aluno -->
            <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">

            <p>
                <label>Nome:</label><br>
                <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </p>
            <p>
                <label>E-mail:</label><br>
                <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </p>
            <p>
                <label>Curso:</label><br>
                <input type="text" name="curso" value="<?php echo $aluno['curso']; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </p>
            <br>
            <button type="submit" class="botao editar" style="border: none; cursor: pointer;">Salvar Alterações</button>
            <a href="../index.php" class="botao excluir">Cancelar</a>
        </form>
    </div>
</body>

</html>