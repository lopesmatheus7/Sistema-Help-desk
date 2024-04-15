<?php
session_start();
include_once '../acesso/conexao.php';

if (!isset($_SESSION['tipo']) || ($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2)) {
    header("Location: error404.php");
    exit();
}

$nomeUsuario = $_SESSION['id'];

// Captura os dados do formulário
$unidade = $_POST['unidade'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$usuario_id = $_POST['usuario_id'];
$id_conta = filter_input(INPUT_POST, 'id_conta');

// Verifica se os campos foram fornecidos
if (isset($titulo, $descricao, $unidade)) {
    // Preparar a declaração SQL
    $sql = "INSERT INTO chamados (usuario_id, unidade, titulo, descricao, id_conta, data_criacao) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular os parâmetros e executar a consulta
        $stmt->bind_param("isssi", $usuario_id, $unidade, $titulo, $descricao, $id_conta);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: chamados_usuarios.php");
            exit(); // Garante que o script pare após o redirecionamento
        } else {
            echo "Erro ao criar o chamado: " . $stmt->error;
        }
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
} else {
    echo "Campos 'titulo', 'descricao' e 'unidade' não foram fornecidos.";
}
?>
