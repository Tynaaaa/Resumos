<?php
// requer o arquivo de conexão
require "conexao.php";

// Certifique-se de que o usuário está autenticado antes de permitir a edição
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

// Define $nomeBotao fora do bloco condicional
$nomeBotao = "";
$linkBotao = "";

// Inicializa a mensagem como vazia
$mensagem = "";

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $materia = mysqli_real_escape_string($conn, $_POST["materia"]);
    $titulo = mysqli_real_escape_string($conn, $_POST["titulo"]);
    $descricao = mysqli_real_escape_string($conn, $_POST["descricao"]);

    // Processa a nova imagem se ela for fornecida
    if (!empty($_FILES['imagem']['name'])) {
        $novaImagem_temp = $_FILES['imagem']['tmp_name'];
        $novaImagem_nome = basename($_FILES['imagem']['name']);
        $novaImagem_destino = "imagens/" . $novaImagem_nome;

        // Move a nova imagem para o destino
        if (move_uploaded_file($novaImagem_temp, $novaImagem_destino)) {
            // Atualiza o banco de dados com o novo nome da imagem
            $sqlUpdateImagem = "UPDATE $materia SET imagem = '$novaImagem_nome' WHERE id = $id";

            if ($conn->query($sqlUpdateImagem) === TRUE) {
                $mensagem .= "Nova imagem adicionada com sucesso. ";
            } else {
                $mensagem .= "Erro ao adicionar nova imagem ao banco de dados: " . $conn->error;
            }
        } else {
            $mensagem .= "Erro ao fazer upload da nova imagem para o servidor. ";
        }
    } else {
        $mensagem .= "Nenhuma nova imagem foi enviada. ";
    }

    // Atualiza os valores no banco de dados (título e descrição)
    $sqlUpdate = "UPDATE $materia SET titulo = '$titulo', descricao = '$descricao' WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        $mensagem .= "Resumo editado com sucesso!";
    } else {
        $mensagem .= "Erro ao editar resumo: " . $conn->error;
    }

    // Exibe a mensagem para o usuário
    echo "<script>alert('$mensagem'); window.location='$materia.php';</script>";

    // Redireciona de volta para a página principal
    exit();
}

// Verifica se a requisição é do tipo GET e se os parâmetros ID e materia estão definidos
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["materia"])) {
    // Validação no lado do servidor e proteção contra injeção de SQL
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $materia = mysqli_real_escape_string($conn, $_GET["materia"]);
    $sql = "SELECT * FROM $materia WHERE id = $id";
    $result = $conn->query($sql);

    // Tratamento de erros
    if ($result === false) {
        die("Erro ao consultar o banco de dados: " . $conn->error);
    }

    // Verifica se existem resultados
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Atualiza $nomeBotao de acordo
        $nomeBotao = $_SESSION['nome'];
        $linkBotao = "index.php";
    } else {
        // mensagem se o resumo não for encontrado
        echo "Resumo não encontrado.";
        exit(); // Encerra o script se o resumo não for encontrado
    }
} else {
    // mensagem se o ID do resumo ou matéria não forem fornecidos
    echo "ID do resumo ou matéria não fornecidos.";
    exit(); // Encerra o script se o ID do resumo ou matéria não for fornecido
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Resumo - Study.com</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body class="editarResumoBody" style="background-image: url('imagens/fundo.gif');">

    <section id="editar">
        <h2>Editar Resumo</h2>
        <!-- formulário para editar o resumo -->
        <form id="editar-resumo" action="" method="POST" enctype="multipart/form-data">
            <!-- campos ocultos para ID e materia -->
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="materia" value="<?= $materia ?>"><br>

            <div class="inputEditar">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" placeholder="Digite o tema o resumo" value="<?= $row['titulo'] ?>">
            </div>

            <div class="inputEditar">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" placeholder="Redija uma breve descrição sobre o tema"><?= $row['descricao'] ?></textarea>
            </div>

            <div class="inputEditar">
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" accept="image/*">
            </div>

            <input type="submit" value="Salvar" class="salvar">
        </form>
    </section>

</body>

</html>

<?php
$conn->close();
?>
