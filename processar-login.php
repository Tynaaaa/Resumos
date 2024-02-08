<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        echo "<script>alert('Preencha seu e-mail e senha');</script>";
    } else {

        $sql_code = "SELECT * FROM usuario WHERE email = '$email'";
        $result = $conn->query($sql_code);

        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();

            // Verifica a senha usando password_verify
            if (password_verify($senha, $usuario['senha'])) {

                // Inicia a sessão se ainda não foi iniciada
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['nome'] = $usuario['nome'];

                echo "<script> window.location='index.php';</script>";
            } else {
                echo "<script>alert('Senha incorreta para o e-mail fornecido'); window.location='login.php';</script>";
            }
        } else {
            echo "<script>alert('E-mail não encontrado no sistema'); window.location='login.php';</script>";
        }
    }
}
?>
