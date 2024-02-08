<?php
session_start();

if (!isset($_SESSION['nome'])) {
    $nomeBotao = "Login";
    $linkBotao = "login.php";
} else {
    $nomeBotao = $_SESSION['nome'];
    $linkBotao = "index.php";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <title>Study.com - História</title>
</head>
<body class="editarResumoBody" style="background-image: url('imagens/fundo.gif');">

<section id="pagina-formulario">

<div id="form-resumo">
    <!-- formulário para adicionar novo resumo -->
    <form id="novo-resumo" action="processar-novo-resumo.php" method="post" enctype="multipart/form-data">

    <section id="editar">

    <h2>Novo Resumo</h2>

    <div class="inputEditar">

        <label for="materia">Matéria:</label>
        <select name="materia" id="materia" required>
            <option value="" disabled selected>Selecione a matéria</option>
            <option value="geografia">Geografia</option>
            <option value="historia">História</option>
            <option value="biologia">Biologia</option>
        </select><br>
    </div>

        <div class="inputEditar">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" placeholder="Insira um título" required><br>
        </div>

        <div class="inputEditar">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" placeholder="Insira uma descrição" required></textarea><br>
        </div>

        <div class="inputEditar">
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" accept="image/*" required><br>
        </div>

        <button type="submit" class="salvarNovoResumo">Salvar</button>
        <button type="button" onclick="cancelarFormulario()" class="cancelarNovoResumo">Cancelar</button>
</section>
    </form>
</div>

</section>

<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // recebe dados do form
    $materia = $_POST['materia'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // processa a imagem
    $imagem = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $imagem_destino = "imagens/" . $imagem;

    move_uploaded_file($imagem_temp, $imagem_destino);

    // insere no banco de dados
    $sql = "INSERT INTO $materia (materia, titulo, descricao, imagem) VALUES ('$materia', '$titulo', '$descricao', '$imagem')";
    if ($conn->query($sql) === TRUE) {
        $mensagem = "Resumo adicionado com sucesso!";
    } else {
        $mensagem = "Erro ao adicionar resumo" . $conn->error;
    }

    // mensagem para o usuário
    echo "<script>alert('$mensagem');</script>";

    // redirecionar para a página da materia
    header("Location: $materia.php");
    exit;
}

$conn->close();
?>


    <script src="js/formulario.js"></script>
</body>

</html>