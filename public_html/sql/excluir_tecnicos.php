<?php
include '../acesso/conexao.php';

$id_conta = $_SESSION['id_conta'];

// Verifique se o ID está presente na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    

    // Verifique a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Execute a consulta SQL para excluir o registro
    $sql = "DELETE FROM usuarios WHERE id_conta = $id_conta AND id = $id";
    if ($conn->query($sql) === TRUE) {
        // Redirecione de volta para a página de listagem após a exclusão
        header("Location: ../pages/gestao_tecnicos.php");
        exit();
    } else {
        echo "Erro ao excluir o registro: " . $conn->error;
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID inválido para exclusão.";
}
?>
