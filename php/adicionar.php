<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alunos (nome, email, curso) VALUES ('$nome', '$email', '$curso')";
    
    if ($conn->query($sql)) {
        echo "<script>
                alert('Usuário adicionado com sucesso!');
                window.location.href = '../index.php';
              </script>";
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="conteiner">
        <h1 id="titulo">Formulario de Aluno</h1>

        <form action="adicionar.php" method="POST">
            <p>
                <label>Nome:</label><br>
                <input type="text" name="nome" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </p>
            <p>
                <label>E-mail:</label><br>
                <input type="email" name="email" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </p>
            <p>
                <label>Curso:</label><br>
                <input type="text" name="curso" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </p>
            <br>
            <button type="submit" class="botao adicionar" style="border: none; cursor: pointer;">Salvar</button>
            <a href="../index.php" class="botao excluir">Cancelar</a>
        </form>
    </div>
</body>

</html>