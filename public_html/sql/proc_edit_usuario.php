<?php
session_start();
include_once("../acesso/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

// Recupere a nova senha do campo de formulário
$nova_senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT); // Não aplique sanitize à senha

// Verifique se uma nova senha foi fornecida
if (!empty($nova_senha)) {
    // Criptografe a nova senha
    $senha = password_hash($nova_senha, PASSWORD_BCRYPT);
} else {
    // Se nenhum valor foi fornecido, mantenha a senha existente no banco de dados
    $query = "SELECT senha FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $senha = $row['senha'];
}

// Query de atualização
$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', tipo='$tipo', cpf='$cpf', senha='$senha', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg_edit'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
    header("Location: dashbord_tecnicos.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
    header("Location: editar.php?id=$id");
}
?>
