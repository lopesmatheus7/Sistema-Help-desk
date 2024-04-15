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
    $sql = "SELECT COUNT(*) AS total_usuarios FROM usuarios WHERE id_conta = $id_conta AND tipo = '0'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAdministradores = $row["total_usuarios"];}

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

?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Técnicos</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $totalUsuarios?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-user" style="color: #f5f5f5;"></i>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Administradores</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php  echo $totalAdministradores; ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-credit-card"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        