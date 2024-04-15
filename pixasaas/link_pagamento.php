<?php
include ('../acesso/conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['id_conta'])) {
    // Redireciona para a página de login ou trata a situação adequadamente
    header("Location: login.php");
    exit;
}

$id_conta = $_SESSION['id_conta'];
$valor = floatval($_POST['valor']);
$_SESSION['id_pagamento'] = $_POST['id'];

// Obtém o token de acesso do banco de dados
$sqltk = "SELECT pass FROM materiais WHERE id_conta = $id_conta";
$result = $conn->query($sqltk);

if ($result) {
    $row = $result->fetch_assoc();
    $access_token = $row['pass'];
    $result->free_result();
} else {
    // Trata o erro na consulta do banco de dados
    echo "Erro: " . $conn->error;
    exit;
}

// Fecha a conexão com o banco de dados
$conn->close();

// Cria a requisição cURL para a API da Asaas
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://asaas.com/api/v3/paymentLinks');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array(
    'accept: application/json',
    'access_token:'.$access_token,
    'content-type: application/json',
);

$currentDate = date("Y-m-d");

// Adiciona um dia à data atual
$endDate = date("Y-m-d", strtotime($currentDate . " +1 day"));

// Agora, você pode usar $endDate no seu array de dados
$data = array(
    "billingType" => "PIX",
    "chargeType" => "DETACHED",
    "callback" => array(
        "successUrl" => "https://www.herculestecnology.com/sql/proc_pix_aluno.php"
    ),
    "name" => "Mensalidade",
    "description" => "Mensalidade",
    "endDate" => $endDate,
    "value" => $valor,
    "dueDateLimitDays" => 1
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$result = curl_exec($ch);

if (curl_errno($ch)) {
    // Trata o erro da requisição cURL
    echo 'Erro: ' . curl_error($ch);
    exit;
}

curl_close($ch);

$response = json_decode($result, true);

// Verifica a resposta da API da Asaas
if ($response !== null && isset($response['url'])) {
    // Redireciona para o link de pagamento
    header("Location: " . $response['url']);
    exit;
} else {
    // Trata o caso em que a resposta não contém os dados esperados
    echo 'Erro ao obter o link de pagamento.';
}

// Exibe o resultado do serviço da API da Asaas
echo 'Resposta do serviço: ' . $result;
?>