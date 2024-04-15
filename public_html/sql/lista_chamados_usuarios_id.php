<?php
include_once '../acesso/conexao.php';


$nomeUsuario = $_SESSION['nome'];
$usuarioId = $_SESSION['id']; // Supondo que você tenha um campo 'id' na tabela de usuários.
$id_conta = $_SESSION['id_conta'];


if (isset($_POST['finalizar'])) {
    $chamado_id = $_POST['chamado_id'];
    
    // Obtém a data e hora atual
    $dataFechamento = date('Y-m-d H:i:s');
    
    // Atualize o status do chamado para 'fechado' e defina a data de finalização no banco de dados
    $sql = "UPDATE chamados SET status = 'fechado', modificado = '$dataFechamento' WHERE id_conta = $id_conta AND id = $chamado_id AND usuario_id = $usuarioId";
    $conn->query($sql);
}
if (isset($_POST['reabrir'])) {
    $chamado_id = $_POST['chamado_id'];
    
    // Atualize o status do chamado para 'aberto' e a coluna 'modificado' com a data atual
    $dataFechamento = date('Y-m-d H:i:s'); // Obtém a data e hora atual
    $sql = "UPDATE chamados SET status = 'aberto', modificado = '$dataFechamento' WHERE id_conta = $id_conta AND id = $chamado_id";
    $conn->query($sql);
}


// Consulta o banco de dados para obter a lista de chamados associados ao seu ID de usuário
$sql = "SELECT * FROM chamados WHERE id_conta = $id_conta AND status = 'aberto' AND usuario_id = $usuarioId";
$result_chamados = $conn->query($sql);

$sql_fechados = "SELECT * FROM chamados WHERE id_conta = $id_conta AND status = 'fechado' AND usuario_id = $usuarioId ORDER BY id DESC LIMIT 50";
$result_fechados = $conn->query($sql_fechados);


?>


