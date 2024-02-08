<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Extra+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <title>Login</title>
</head>
<body style="background-image: url('imagens/formulario.gif');">

    <div class="login">
        <h1> Acesse a sua conta </h1>

        <form action="processar-login.php" method="POST">
            <p>
                <label>E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite aqui o seu E-mail" required>
            </p>

            <p>
                <label>Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite aqui a sua senha" required>
            </p>

            <div id="botoes">
                <button class="botoesLogin" type="submit" name="login">Login</button> 
                <button class="botoesLogin"><a href="cadastreSe.php">Cadastre-se</a></button>
            </div>
            
        </form> 
    </div>
</body>
</html>





