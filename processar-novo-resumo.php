<?php
require "conexao.php";

// Verifica se o formulário foi enviado (método post)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    // Recupera o nome da matéria (URL)
    $materia = $_POST["materia"];

    // Processa a imagem
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $imagem_nome = basename($_FILES['imagem']['name']);
    $imagem_destino = "imagens/" . $imagem_nome;

    if (move_uploaded_file($imagem_temp, $imagem_destino)) {
        // A imagem foi movida com sucesso, agora você pode inserir no banco de dados
        $sql = "INSERT INTO $materia (titulo, descricao, imagem) VALUES ('$titulo', '$descricao', '$imagem_nome')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Novo resumo adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar resumo: " . $conn->error;
        }
    } else {
        $mensagem = "Erro ao fazer upload da imagem.";
    }

    // Exibe a mensagem para o usuário
    echo "<script>alert('$mensagem');</script>";

    // Redireciona de volta para a página principal da matéria específica
    header("Location: $materia.php");
    exit();
}
?>
