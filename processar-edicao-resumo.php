<?php
require "conexao.php";

// verifica se a requisição é do tipo POST e se os parâmetros ID e materia estão definidos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["materia"])) {
    $id = $_POST["id"];
    $materia = $_POST["materia"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $imagem = $_POST["imagem"];

    // consulta SQL para atualizar o resumo
    $sql = "UPDATE $materia SET titulo = '$titulo', descricao = '$descricao', imagem = '$imagem' WHERE id = $id";

    // executa a consulta e redireciona de acordo com o resultado
    if ($conn->query($sql) === TRUE) {
        header("Location: $materia.php?sucesso=1");
    } else {
        header("Location: $materia.php?erro=1");
    }
} else {
    echo "Requisição inválida."; // pagina em branco escrito "requisição invalida"
}
?>
