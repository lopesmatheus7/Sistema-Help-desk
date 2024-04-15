<?php
include_once '../acesso/conexao.php';


$nomeUsuario = $_SESSION['nome'];
$id_conta = $_SESSION['id_conta'];

if (isset($_POST['finalizar'])) {
    $chamado_id = $_POST['chamado_id'];

    // Obtém a data e hora atual
    $dataFechamento = date('Y-m-d H:i:s');

    // Atualize o status do chamado para 'fechado' e defina a data de finalização no banco de dados
    $sql = "UPDATE chamados SET status = 'fechado', modificado = '$dataFechamento' WHERE id_conta = $id_conta AND id = $chamado_id";
    $conn->query($sql);

    
}

if (isset($_POST['atribuir'])) {
    $chamado_id = $_POST['chamado_id'];
    $tecnico_id = $_POST['tecnico_id'][$chamado_id]; // Obtenha o valor apropriado com base no chamado_id

    // Certifique-se de validar e sanitizar o valor de $tecnico_id para evitar injeção de SQL.

    // Atualize o técnico responsável na tabela "chamados"
    $sql = "UPDATE chamados SET usuario_id = $tecnico_id WHERE id_conta = $id_conta AND id = $chamado_id";
    $conn->query($sql);
}

// Consulta o banco de dados para obter a lista de chamados
$sql = "SELECT * FROM chamados WHERE id_conta = $id_conta AND status = 'aberto' ORDER BY data_criacao DESC LIMIT 4";
$result_chamados = $conn->query($sql);


// Consulta o banco de dados para obter a lista de técnicos
$sql_usuarios = "SELECT id, nome FROM usuarios WHERE id_conta = $id_conta";
$result_usuarios = $conn->query($sql_usuarios);

?>

