<?php
session_start(); // Apenas uma chamada é necessária no início do arquivo

include '../acesso/hercules.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email']; // O e-mail fornecido pelo usuário
    $senha = $_POST['senha']; // A senha fornecida pelo usuário

    // Busque o registro do usuário com base no e-mail na tabela 'usuarios'
    $sql_usuarios = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_usuarios = $conn->query($sql_usuarios);

    // Verifique se o e-mail foi encontrado na tabela 'usuarios'
    if ($resultado_usuarios->num_rows === 1) {
        // Obtenha os dados do usuário
        $row = $resultado_usuarios->fetch_assoc();
        $senha_hash = $row['senha']; // A senha criptografada no banco de dados

        // Verifique se a senha fornecida corresponde à senha no banco de dados
        if (password_verify($senha, $senha_hash)) {
            // As senhas correspondem, o login é bem-sucedido
            // Inicie a sessão e armazene informações do usuário na sessão
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['tipo'] = $row['tipo'];

            // Redirecione o usuário para a página apropriada após o login
            if ($_SESSION['tipo'] == 100) {
                header("Location: ../administrador/criador_clientes.php");
            } else if ($_SESSION['tipo'] == 1) {
                header("Location: ../users/chamados_usuarios.php");
            } else if ($_SESSION['tipo'] == 2) {
                header("Location: ../pages/profile_usuario.php?id={$_SESSION['id']}");
            }
            exit();
        } else {
            // Senha incorreta, exiba uma mensagem de erro
            echo "Senha incorreta.";
        }
    } else {
        // Usuário com o e-mail fornecido não foi encontrado
        echo "Usuário não encontrado.";
    }
}
?>