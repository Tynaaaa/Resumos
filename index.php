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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/estilizacao.css" media="screen"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <title>Study.com</title>
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
                echo '<form method="post"><button type="submit" name="logout" id="botaoEncerrar" >Encerrar Sessão</button></form>';
            }
            ?>
            </div>
        </div>
</header>

    <main> 
        <section id="apresentacao">
            <h2>Procurando um local para guardar os seus resumos de forma eficiente?</h2>

            <div id="infoApresentacao">
                <img src="imagens/apresentacao.jpg">

                <div id="textoApresentacao">
                    <p>Você já imaginou uma plataforma que não apenas armazena seus resumos, mas também catalisa seu potencial de aprendizado? Bem-vindo ao Sudy.com, o seu novo companheiro na jornada do conhecimento!</p>
                    <p>Adeus papéis perdidos e anotações esparsas. Mantenha seus resumos organizados em um só lugar, acessíveis a qualquer momento.</p>
                    <p>Estude em qualquer lugar, a qualquer hora. Seus resumos estarão sempre disponíveis na ponta dos seus dedos, seja no computador, tablet ou smartphone.</p>
                    <P>Compartilhe facilmente seus resumos com colegas de classe, amigos ou grupos de estudo. O conhecimento é mais poderoso quando compartilhado!</P>
                    <p>Seus resumos são pessoais, e nós levamos isso a sério. Garantimos a segurança dos seus dados para que você possa estudar com tranquilidade.</p>
                </div>
            </div>
<br>
            <div>
                <h2> Selecione uma matéria: </h2>
                <a href="historia.php" class="botoes-materia">História</a>
                <a href="geografia.php" class="botoes-materia">Geografia</a>
                <a href="biologia.php" class="botoes-materia">Biologia</a>
            </div>

        </section>
    </main>

    <footer>
        <br>
        <p>Tayna Dias Sampaio</p>
        <p>Yasmin Alves Novaes</p>
        <p>Projeto final - Banco de Dados</p>
        <br>
    </footer>


    
    <script src="js/modificacao.js"></script>



</body>
</html>