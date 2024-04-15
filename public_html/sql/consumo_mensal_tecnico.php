<?php
$id_conta = $_SESSION['id_conta'];

$mesAtual = date('m');
$sql_gastos = "SELECT u.nome, SUM(cc.valor_total) as total_gasto
FROM usuarios u
JOIN cadastro_combustivel cc ON u.id = cc.usuario_id AND u.id_conta = ?
WHERE MONTH(cc.dia) = ?
GROUP BY u.nome, u.id";

// Preparar a instrução SQL
$stmt = $conn->prepare($sql_gastos);

// Vincular os parâmetros
$stmt->bind_param("ii", $id_conta, $mesAtual);

// Executar a consulta
$stmt->execute();

// Obter resultados
$result_gastos = $stmt->get_result();

// Inicializar um array associativo para armazenar os resultados dos gastos
$resultados = array();

$nomes = array();


// Preparar a instrução SQL
$stmt = $conn->prepare($sql_gastos);

if ($result_gastos->num_rows > 0) {
    while ($row = $result_gastos->fetch_assoc()) {
        $resultados[$row['nome']] = $row['total_gasto'];
        $nomes[] = $row['nome']; // Adicione o nome do usuário ao array de nomes
    }
} else {
   // echo "Nenhum resultado de gastos encontrado.";
}

// Fechar a instrução preparada
$stmt->close();
?>
