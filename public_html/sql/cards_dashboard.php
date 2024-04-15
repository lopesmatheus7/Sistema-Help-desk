<?php
$usuario_id = $_SESSION['id'];
$id_conta = $_SESSION['id_conta'];
// Defina $kolke com o valor da empresa "kolke"
// Defina $kolke com o valor da empresa "kolke"
$kolke = "kolke";

// Obtenha o mês atual
$mes_atual = date('m');

// Consulta SQL para calcular a soma da coluna "valor_total" para "kolke" no mês atual
$sql_kolke = "SELECT SUM(valor_total) AS soma_kolke FROM cadastro_combustivel WHERE id_conta = $id_conta AND empresa = '$kolke' AND MONTH(dia) = $mes_atual";
$result_kolke = $conn->query($sql_kolke);

if ($result_kolke) {
    $row_kolke = $result_kolke->fetch_assoc();
    $soma_kolke = $row_kolke["soma_kolke"];
} else {
    $soma_kolke = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para "alutech" no mês atual
$alutech = "alutech"; // Defina $alutech com o valor da empresa "alutech"
$sql_alutech = "SELECT SUM(valor_total) AS soma_alutech FROM cadastro_combustivel WHERE id_conta = $id_conta AND empresa = '$alutech' AND MONTH(dia) = $mes_atual";
$result_alutech = $conn->query($sql_alutech);

if ($result_alutech) {
    $row_alutech = $result_alutech->fetch_assoc();
    $soma_alutech = $row_alutech["soma_alutech"];
} else {
    $soma_alutech = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Fechar a conexão com o banco de dados
 //// TOTAL DE USUARIOS DO SISTEMA 
    $sql = "SELECT COUNT(*) AS total_usuarios FROM usuarios WHERE id_conta = $id_conta";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalUsuarios = $row["total_usuarios"];}


$sql = "SELECT SUM(valor_total) AS total_soma FROM cadastro_combustivel WHERE id_conta = $id_conta";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSoma = $row["total_soma"];
}

// Defina a variável $usuario_id a partir da sessão, como você fez anteriormente


// Consulta SQL para calcular a soma do valor total
$sqlSomaValorTotal = "SELECT SUM(valor_total) as total_valor FROM cadastro_combustivel WHERE id_conta = $id_conta AND usuario_id = $usuario_id";
$somaValorResult = $conn->query($sqlSomaValorTotal);

// Verifique se a consulta foi bem-sucedida antes de buscar os resultados
if ($somaValorResult !== false) {
    $somaValorRow = mysqli_fetch_assoc($somaValorResult);
    $totalValor = $somaValorRow['total_valor'];
} else {
    // Lida com erros na consulta, se houver
    echo "Erro na consulta SQL: " . mysqli_error($conn);
    // Ou defina $totalValor como 0 ou outro valor padrão
    $totalValor = 0;
}


// Obter a data atual no formato AAAA-MM (Ano-Mês)
$mesAtual = date('Y-m');

// Consulta SQL para calcular o total de combustíveis do mês atual
$sql = "SELECT SUM(valor_total) AS total_soma FROM cadastro_combustivel WHERE id_conta = $id_conta AND DATE_FORMAT(dia, '%Y-%m') = '$mesAtual'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSoma = $row["total_soma"];
} else {
    // Caso não haja registros para o mês atual, o total será zero ou nulo
    $totalSoma = 0;
}

$sql = "SELECT COUNT(*) AS total_chamados FROM chamados WHERE usuario_id = $usuario_id AND status = 'ABERTO'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalChamadosAbertosId = $row["total_chamados"];
        //echo "Total de chamados ABERTO associados ao usuário com ID $usuario_id: $totalChamadosAbertos";
    } else {
        echo "Nenhum chamado ABERTO encontrado para o usuário com ID $usuario_id.";
    }

    $sqlCount = "SELECT COUNT(*) as total FROM chamados WHERE id_conta = $id_conta AND status = 'ABERTO'";
    $countResult = $conn->query($sqlCount); 
    $row = mysqli_fetch_assoc($countResult);
    $totalChamadosAbertos = $row['total'];

    $sqlCount = "SELECT COUNT(*) as total FROM chamados WHERE id_conta = $id_conta AND status = 'FECHADO'";
    $countResult = $conn->query($sqlCount); 
    $row = mysqli_fetch_assoc($countResult);
    $totalChamadosFechados = $row['total'];

?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total de técnicos</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $totalUsuarios?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Chamados abertos</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php  echo $totalChamadosAbertos; ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Chamados fechados</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?php  echo $totalChamadosFechados; ?>
                      <span class="text-danger text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Consumo total</p>
                    <h5 class="font-weight-bolder mb-0">R$
                    <?php  echo number_format($totalSoma, 2, ',', '.'); ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>