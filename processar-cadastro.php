<?php

require_once "conexao.php";

if (isset($_POST['cadastro'])) {

    // Obter os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $nascimento = $_POST["data"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    if ($senha == $confirmarsenha) {

        // Use password_hash() para armazenar a senha com segurança
        $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir os dados na tabela 'usuario'
        $sql = "INSERT INTO usuario (nome, email, senha, nascimento) VALUES ('$nome', '$email', '$senha_hashed', '$nascimento')";

        if ($conn->query($sql) === TRUE) {
            // Redirecionar para a página de login se o cadastro for bem-sucedido
            header("Location: login.php");
            exit();
        } else {
            // Redirecionar para a página de cadastro com mensagem de erro específica
            echo "<script>alert('Erro no cadastro!'); window.location='cadastreSe.php';</script>";
            exit();
        }
    } else {
        // Redirecionar para a página de cadastro com mensagem de erro específica
        echo "<script>alert('Senhas não coincidem! Erro no cadastro.'); window.location='cadastreSe.php';</script>";
        exit();
    }

    $conn->close();
}
?>
