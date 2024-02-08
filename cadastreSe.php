<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Cadastre-se</title>
</head>
<body style="background-image: url('imagens/formulario.gif');">

    <div class="login">
        <h1>Cadastre-se</h1>

        <form action="processar-cadastro.php" method="post">

        <p>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o seu nome" required>
        </p>

        <p>
            <label for="data">Data de nascimento:</label>
            <input type="date" id="data" name="data" required>
        </p>

        <p>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite o seu email" required>
        </p>

        <p>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" required>
        </p>

        <p>
            <label for="confirmarsenha">Confirmar Senha:</label>
            <input type="password" id="confirmarsenha" name="confirmarsenha" placeholder="Digite a sua senha" required>
        </p>

        <?php if (isset($_GET['erro2'])){?>
            <label for="invalido" class="erro" style="color: red;">E-mail ou senha inválido</label>
        <?php } ?>

        <div id="botoes">
                <button class="botoesLogin" type="submit" name="cadastro">Cadastrar usuário</button> 
                <button class="botoesLogin"><a href="login.php">Login</a></button>
            </div>

        </form>
    </div>

</body>
</html>
