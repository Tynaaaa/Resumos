<?php
require "conexao.php";

// verifica se a requisição é do tipo GET e se os parâmetros ID e materia estão definidos
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["materia"])) {
    $id = $_GET["id"];
    $materia = $_GET["materia"];

    // consulta SQL para deletar o resumo onde tem o id
    $sql = "DELETE FROM $materia WHERE id = $id";

    // executa a consulta e redireciona de acordo com o resultado
    if ($conn->query($sql) === TRUE) {
        header("Location: $materia.php?sucesso=1");
    } else {
        header("Location: $materia.php?erro=1");
    }
} else {
    echo "ID do resumo ou matéria não existente."; // pagina em branco escrito "id do resumo..."
}
?>
