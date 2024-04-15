<?php
$id_conta = $_SESSION['id_conta'];

// Consulta SQL para calcular o total de combustíveis GNV de cada mês do ano
$sqlGNV = "SELECT DATE_FORMAT(dia, '%Y-%m') AS mes, SUM(valor_total) AS total_soma FROM cadastro_combustivel WHERE id_conta = $id_conta AND produto = 'GNV' GROUP BY mes";
$resultGNV = $conn->query($sqlGNV);

// Inicializa um array para armazenar os totais de GNV de cada mês
$totalsByMonthGNV = array();

if ($resultGNV->num_rows > 0) {
    while ($rowGNV = $resultGNV->fetch_assoc()) {
        $monthGNV = $rowGNV["mes"];
        $totalGNV = $rowGNV["total_soma"];
        
        // Adicione o valor total do mês ao array usando o mês como chave
        $totalsByMonthGNV[$monthGNV] = $totalGNV;
    }
} else {
    // Caso não haja registros de GNV para o ano, todos os totais serão zero
    $totalsByMonthGNV = array();
}

// Repita o mesmo processo para Etanol
$sqlEtanol = "SELECT DATE_FORMAT(dia, '%Y-%m') AS mes, SUM(valor_total) AS total_soma FROM cadastro_combustivel WHERE id_conta = $id_conta AND produto = 'Etanol' GROUP BY mes";
$resultEtanol = $conn->query($sqlEtanol);

// Inicializa um array para armazenar os totais de Etanol de cada mês
$totalsByMonthEtanol = array();

if ($resultEtanol->num_rows > 0) {
    while ($rowEtanol = $resultEtanol->fetch_assoc()) {
        $monthEtanol = $rowEtanol["mes"];
        $totalEtanol = $rowEtanol["total_soma"];
        
        // Adicione o valor total do mês ao array usando o mês como chave
        $totalsByMonthEtanol[$monthEtanol] = $totalEtanol;
    }
} else {
    // Caso não haja registros de Etanol para o ano, todos os totais serão zero
    $totalsByMonthEtanol = array();
}

// Consulta SQL para calcular o total de pedágio de cada mês do ano
$sqlPedagio = "SELECT DATE_FORMAT(dia, '%Y-%m') AS mes, SUM(valor_total) AS total_soma FROM cadastro_combustivel WHERE id_conta = $id_conta AND produto = 'Pedagio' GROUP BY mes";
$resultPedagio = $conn->query($sqlPedagio);

// Inicializa um array para armazenar os totais de pedágio de cada mês
$totalsByMonthPedagio = array();

if ($resultPedagio->num_rows > 0) {
    while ($rowPedagio = $resultPedagio->fetch_assoc()) {
        $monthPedagio = $rowPedagio["mes"];
        $totalPedagio = $rowPedagio["total_soma"];
        
        // Adicione o valor total do mês ao array usando o mês como chave
        $totalsByMonthPedagio[$monthPedagio] = $totalPedagio;
    }
} else {
    // Caso não haja registros de pedágio para o ano, todos os totais serão zero
    $totalsByMonthPedagio = array();
}

// Consulta SQL para calcular o total de gastos com gasolina de cada mês do ano
$sqlGasolina = "SELECT DATE_FORMAT(dia, '%Y-%m') AS mes, SUM(valor_total) AS total_soma FROM cadastro_combustivel WHERE id_conta = $id_conta AND produto = 'Gasolina' GROUP BY mes";
$resultGasolina = $conn->query($sqlGasolina);

// Inicializa um array para armazenar os totais de gastos com gasolina de cada mês
$totalsByMonthGasolina = array();

if ($resultGasolina->num_rows > 0) {
    while ($rowGasolina = $resultGasolina->fetch_assoc()) {
        $monthGasolina = $rowGasolina["mes"];
        $totalGasolina = $rowGasolina["total_soma"];
        
        // Adicione o valor total do mês ao array usando o mês como chave
        $totalsByMonthGasolina[$monthGasolina] = $totalGasolina;
    }
} else {
    // Caso não haja registros de gasolina para o ano, todos os totais serão zero
    $totalsByMonthGasolina = array();
}



// Lista de meses
$meses = [
    "01" => "Janeiro",
    "02" => "Fevereiro",
    "03" => "Março",
    "04" => "Abril",
    "05" => "Maio",
    "06" => "Junho",
    "07" => "Julho",
    "08" => "Agosto",
    "09" => "Setembro",
    "10" => "Outubro",
    "11" => "Novembro",
    "12" => "Dezembro"
];

// Loop para exibir totais para GNV e Etanol para cada mês
$dataGNV = array();
$dataEtanol = array();
$dataPedagio = array();
$dataGasolina = array();

foreach ($meses as $mes => $nomeMes) {
    // Totais de GNV para cada mês
    $totalGNV = isset($totalsByMonthGNV["2023-$mes"]) ? $totalsByMonthGNV["2023-$mes"] : 0;
    $dataGNV[] = $totalGNV;

    // Totais de Etanol para cada mês
    $totalEtanol = isset($totalsByMonthEtanol["2023-$mes"]) ? $totalsByMonthEtanol["2023-$mes"] : 0;
    $dataEtanol[] = $totalEtanol;

    // Totais de Pedágio para cada mês
    $totalPedagio = isset($totalsByMonthPedagio["2023-$mes"]) ? $totalsByMonthPedagio["2023-$mes"] : 0;
    $dataPedagio[] = $totalPedagio;

    // Totais de Gasolina para cada mês
    $totalGasolina = isset($totalsByMonthGasolina["2023-$mes"]) ? $totalsByMonthGasolina["2023-$mes"] : 0;
    $dataGasolina[] = $totalGasolina;
}

?>


