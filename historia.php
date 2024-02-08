<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

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
<body>
<header>
        <h1 onclick="window.location.href='index.php'">Study.com</h1>

        <div id="botoes">
            <div>
                <a href="historia.php" class="botoes">História</a>
                <a href="geografia.php" class="botoes">Geografia</a>
                <a href="biologia.php" class="botoes">Biologia</a>
            </div>

            <div class="nome">
                <a href="<?php echo $linkBotao; ?>" class="botoes"><?php echo $nomeBotao; ?></a>

                <?php
            // Exibe o botão "Encerrar Sessão" se o usuário estiver logado
            if (isset($_SESSION['nome'])) {
                echo '<form method="post"><button type="submit" name="logout" class="botoes">Encerrar Sessão</button></form>';
            }
            ?>
            </div>
        </div>
    </header>

    <?php
    // requer o arquivo de conexão
    require "conexao.php";

    // define a matéria como "historia"
    $materia = "historia";

    // consulta SQL para selecionar resumos de historia
    $sql = "SELECT * FROM $materia";
    $result = $conn->query($sql);

    // verifica se existem resumos
    if ($result->num_rows > 0) {
        // loop para exibir cada resumo
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="resumos">
                <!-- exibe a imagem, título e descrição do resumo -->
                <img src="imagens/<?= $row['imagem'] ?>">
                <div class="infoResumos">
                    <h2><?= $row['titulo'] ?></h2>
                    <p><?= $row['descricao'] ?></p>
                    <!-- botões para excluir e modificar resumo -->
                    <button class="excluir"><a href="processar-exclusao-resumo.php?materia=<?= $materia ?>&id=<?= $row['id'] ?>" class="excluir">Excluir</a></button>
                    <button class="modificar"><a href="editar-resumo.php?materia=<?= $materia ?>&id=<?= $row['id'] ?>" class="modificar">Modificar</a></button>
                </div>
            </div>
    <?php
        }
    } else {
        echo "Nenhum resumo encontrado.";
    }
    ?>
    </section>

    <!-- botão para mostrar o formulário -->
    <button type="button" onclick="mostrarFormulario()" class="novoResumo">Adicionar Novo Resumo</button>

    <footer>
        <br>
        <p>Tayna Dias Sampaio</p>
        <p>Yasmin Alves Novaes</p>
        <p>Projeto Final - Banco de Dados</p>
        <br>
    </footer>

    <script src="js/formulario.js"></script>

</body>
</html>

