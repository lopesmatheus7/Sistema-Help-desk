<?php
include '../acesso/conexao.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email']; // O e-mail fornecido pelo usuário
    $senha = $_POST['senha']; // A senha fornecida pelo usuário

    // Busque o registro do usuário com base no e-mail na tabela 'usuarios'
    $sql_usuarios = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_usuarios = $conn->query($sql_usuarios);

 //    Busque o registro do usuário com base no e-mail na tabela 'clientes'
    $sql_clientes = "SELECT * FROM clientes WHERE email = '$email'";
    $resultado_clientes = $conn->query($sql_clientes);

    // Verifique se o e-mail foi encontrado em alguma das tabelas
    if ($resultado_usuarios->num_rows === 1 || $resultado_clientes->num_rows === 1) {
        // Determine de qual tabela veio o registro
        $tabela = ($resultado_usuarios->num_rows === 1) ? 'usuarios' : 'clientes';

        // Obtenha os dados do usuário ou cliente
        $row = ($tabela === 'usuarios') ? $resultado_usuarios->fetch_assoc() : $resultado_clientes->fetch_assoc();

        $senha_hash = $row['senha']; // A senha criptografada no banco de dados

        // Verifique se a senha fornecida corresponde à senha no banco de dados
        if (password_verify($senha, $senha_hash)) {
            // As senhas correspondem, o login é bem-sucedido
            // Inicie a sessão e armazene informações do usuário ou cliente na sessão
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['tipo'] = $row['tipo'];
            $_SESSION['id_conta'] = $row['id_conta'];
 
            // Redirecione o usuário para a página apropriada após o login
            if ($_SESSION['tipo'] == 0) {
                header("Location: ../pages/dashboard.php");
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
        // Usuário ou cliente com o e-mail fornecido não foi encontrado
        echo "Usuário ou cliente não encontrado.";
    }
}
?>