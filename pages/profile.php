<?php 
      
      include ('../components/navdashboard.php');
     include ('../sql/lista_consumo_individual.php');

     $id_conta = $_SESSION['id_conta'];
  ?>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
 
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
      <div class="container-fluid py-1">
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved_fut.png'); background-position-y: 50%;">
        <span class="mask bg-gradient-info opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-1 mt-n5 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
            <img src="../uploads/<?php echo $dadosUsuario['img_id']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <input type="hidden" id="urlInput" value="www.herculestecnology.com/sql/frequencia/proc_frequencia_qrcode.php?usuario_id=<?php echo $dadosUsuario['id']  ?>">
          
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               <?php  echo $dadosUsuario['nome'] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              Este é o perfil do aluno</p>
              </p>
            </div>
          </div>
          <div class="col col-auto my-auto">
          <div id="qrcode" class="w-100 border-radius-lg shadow-sm"></div>
    <script>
        function gerarQRCode() {
            // Obtenha o valor do input
            var url = document.getElementById('urlInput').value;

            // Crie o QR code
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: url,
                width: 78,
                height: 78,
                correctLevel: QRCode.CorrectLevel.H, // Ajuste o nível de correção de erro
            });
          
        }

        document.addEventListener('DOMContentLoaded', function() {
    gerarQRCode();
});
    </script>
</div>
        
          
          <div class="col-lg-7 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-toggle="pill" href="#chamados" role="tab" aria-selected="true">                                      <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                              </path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Financeiro</span>
                  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-toggle="pill" href="#gastos" role="tab" aria-selected="false">                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>document</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(154.000000, 300.000000)">
                              <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                              <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Matrícula</span>
                  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-toggle="pill" href="#estoque" role="tab" aria-selected="false">                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>settings</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                              </polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Avaliação</span>
                  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-toggle="pill" href="#dadosPessoais" role="tab" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>settings</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                              </polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Dados Pessoais</span>
                  </a>
                </li>
              </ul>
            </div>
           
          </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Tab content containers -->
  <div class="tab-content">
  <div class="tab-pane fade show active" id="chamados">
    <div class="container mt-3">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
            </div>
            <div class="card-body p-2">
                <h6 class="text-uppercase text-body text-xs font-weight-bolder"></h6>
                <div class="d-flex justify-content-between">
                    <button class="btn bg-gradient-info w-md-30 mt-4 mb-5 btn-xs btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#cobrancaModal">NOVA COBRANÇA</button>
                    <button class="btn bg-gradient-info w-md-30 mt-4 mb-5 btn-xs btn-lg btn-block" data-toggle="modal" data-target="#onlineModal">COBRANÇA ONLINE</button>
                    <button id="btnGerarBoletos" class="btn bg-gradient-info w-md-30 mt-4 mb-5 btn-xs btn-lg btn-block" <?php if($dadosUsuario['assinatura'] == ''): ?>disabled<?php endif; ?> data-toggle="modal" data-target="#myModal">Gerar Boletos do aluno</button>

<!-- Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Quantidade de Boletos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <label for="quantidadeBoletos">Quantidade:</label>
                <input type="number" id="quantidadeBoletos" class="form-control" placeholder="Informe a quantidade de boletos" />
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnEnviarModal">Enviar</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // Lidar com o clique no botão de envio dentro do modal
        $('#btnEnviarModal').on('click', function(){
            // Obter a quantidade de boletos do input
            var quantidadeBoletos = $('#quantidadeBoletos').val();

            // Redirecionar para a página com a quantidade de boletos no parâmetro GET
            var redirectUrl = "../sql/asaas/gerarcarnealuno.php?usuario_id=<?=$dadosUsuario['id']?>&quantidade=" + quantidadeBoletos;
            window.location.href = redirectUrl;
        });
    });
</script>
                    <button class="btn bg-gradient-warning w-md-30 mt-4 mb-5 btn-xs btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#produtoModal" disabled>COBRANÇA DE PRODUTOS</button>
                </div>
                <h3>Mensalidades cobrança online</h3>
                <?php include ('../sql/asaas/listarCobrancaAssinatura.php'); ?>
                <?php include ('../sql/lista_mensalidades_aluno_vizualizar.php'); ?>
                
                <div class="modal fade" id="cobrancaModal" tabindex="-1" role="dialog" aria-labelledby="cobrancaModalLabel" aria-hidden="true">
                    <?php include '../modals/nova_cobranca.php'; ?>
                </div>
                
                
                
            </div>
        </div>
    </div>
</div>
  <div class="tab-content">
    <div class="tab-pane fade" id="estoque">
      <!-- Content for Financeiro -->
      <div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <?php include('../sql/criar_avaliacao.php');?>
        </div>

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3 text-center">
                    <h2>Gráficos</h2>
                    <canvas id="radarChart" width="400" height="400"></canvas>
                    
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

    <div class="tab-content">
    <div class="tab-pane fade" id="gastos">
      <!-- Content for Financeiro -->
      <div class="container mt-3">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
        <?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se a turma foi selecionada
    if (isset($_POST["id_turma"])) {
        $turmaSelecionada = $_POST["id_turma"];

        // Atualize a tabela turmas com o usuario_id da URL
        $sqlUpdate = "UPDATE turmas SET usuario_id = $usuario_id WHERE nome = '$turmaSelecionada'";
        $conn->query($sqlUpdate);

        // Redirecione para evitar envios duplicados ao recarregar a página
        header("Location: sua_pagina.php");
        exit();
    }
}

// Consulta para obter as turmas

$sql = "SELECT * FROM turmas WHERE id_conta = $id_conta";
$result = $conn->query($sql);

$turmas = array(); // Inicialize um array para armazenar os IDs das turmas
$nomeTurmas = array(); // Inicialize um array para armazenar os nomes das turmas

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $turmas[] = $row['id'];
        $nomeTurmas[] = $row['nome']; // Adicione o ID da turma ao array
    }
}
$plano = array(); // Inicialize um array para armazenar os IDs dos planos
$nomeplano = array(); // Inicialize um array para armazenar os nomes dos planos

$sql = "SELECT * FROM planos WHERE id_conta = $id_conta";
$resultPlano = $conn->query($sql);

if ($resultPlano !== false && $resultPlano->num_rows > 0) {
    while ($row = $resultPlano->fetch_assoc()) {
        $plano[] = $row['id'];
        $nomeplano[] = $row['plano']; // Adicione o ID do plano ao array
    }
}

$usuario_id = $_GET['id']; // Substitua isso com a forma real de obter o usuario_id na sua aplicação

// Realizar a consulta SQL para obter o nome do plano associado ao usuario_id
$queryplanos = "SELECT planos.plano AS nome_planos
          FROM usuarios
          JOIN planos ON usuarios.id_plano = planos.id
          WHERE usuarios.id = $usuario_id";
$resultplanos = $conn->query($queryplanos);

// Verificar se a consulta foi bem-sucedida
if ($resultplanos) {
    // Extrair os dados da consulta
    $row = $resultplanos->fetch_assoc();

    // Verificar se há resultados
    if ($row) {
        $nomeplanos = $row['nome_planos'];

        // Agora você pode usar $nomeplano onde desejar
    } else {
        // Tratar caso não haja resultados
        $nomeplanos = "Plano não definido";
    }
} else {
    // Tratar caso haja um erro na consulta
    $nomeplanos = "Erro na consulta: " . $conn->error;
}



?>
<?php
$sqlHorarios = "SELECT turmas.nome
FROM turmas
JOIN matriculas_horarios ON turmas.id = matriculas_horarios.id_turma
WHERE matriculas_horarios.usuario_id = $usuario_id;";

$resultHorarios = $conn->query($sqlHorarios);

$horarios = [];

if ($resultHorarios->num_rows > 0) {
    while ($row = $resultHorarios->fetch_assoc()) {
        $horarios[] = $row['nome'];  // Corrigido para acessar a coluna 'nome'
    }
}

// Agora $horarios contém os nomes das turmas relacionadas ao usuário 291
?>

<div class="row">
    <div class="col-md-6">
        <form method="post" action="../sql/proc_aluno_turmas.php">
            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
            <div class="form-group">
                <label for="tipo">Turma</label>
                <select class="form-select" id="selectTurma" name="id_turma">
                    <option value=""><?php echo $nomeTurma; ?></option>
                    <?php foreach (array_combine($turmas, $nomeTurmas) as $idTurma => $nome): ?>
                        <option value="<?php echo htmlspecialchars($idTurma); ?>"><?php echo htmlspecialchars($nome); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-info mt-2">Matricular na Turma</button>
            </div>
        </form>
        </div>
        <div class="col-md-6">
<form method="post" action="../sql/proc_aluno_plano.php">
    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
    <div class="form-group">
        <label for="tipo">Plano de mensalidade manual</label>
        <select class="form-select" id="selectPlano" name="id_plano">
            <option value=""><?php echo $nomeplanos ?></option>
            <?php foreach (array_combine($plano, $nomeplano) as $idPlano => $nome): ?>
                <option value="<?php echo htmlspecialchars($idPlano); ?>"><?php echo htmlspecialchars($nome); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Cadastrar plano</button>

    <!-- Novo botão -->
    <button type="submit" formaction="../sql/proc_aluno_plano_remover.php" class="btn btn-danger">Remover do Plano</button>
</form>
</div>
<div class="row">
    <div class="col-md-6">
    <?php if (!empty($horarios)): ?>
        <div>
            <label for="horarios">Turmas cadastradas</label>
            <ul class="list-group">
                <?php foreach ($horarios as $horario): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($horario); ?>
                        <form method="post" action="../sql/turmas/removerturmas.php" class="remove-form" onsubmit="return confirm('Tem certeza que deseja remover o aluno da turma?');">
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="turma" value="<?php echo htmlspecialchars($horario); ?>">
                            <button type="submit" class="btn btn-danger">Remover</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
 <div class="col-md-6">
<?php 
if (!empty($dadosUsuario['id_plano'])) {
    // Consulta SQL para selecionar o ciclo onde id_plano corresponde ao id do usuário
    $sqlciclo = "SELECT ciclo FROM planos WHERE id = " . $dadosUsuario['id_plano'];

    $resultciclo = $conn->query($sqlciclo);

    if ($resultciclo->num_rows > 0) {
        // Output dos dados de cada linha
        while($rowciclo = $resultciclo->fetch_assoc()) {
            $ciclo = $rowciclo["ciclo"];
        }
    } else {
        $ciclo = "Nenhum ciclo encontrado";
    } 
} else {
    $ciclo = "Plano manual desativado";
}

// Se $ciclo estiver vazio, defina-o como "mensal"
if (empty($ciclo)) {
    $ciclo = "Plano Mensal";
}
?>
<div>
    <?php if ($ciclo !== "mensal" && $ciclo !== "") { ?>
        <h1><?php echo date('d/m/Y', strtotime($dadosUsuario['datafim'])) ?></h1>
    <?php } ?>
    <h3><?php echo $ciclo ?></h3>
</div>


  
</div>
</div>
</div>


<?php
// Certifique-se de que $conn está definido como a sua conexão com o banco de dados.

// Obtém o usuário_id a partir da URL
$usuario_id = isset($_GET['id']) ? $_GET['id'] : null;

// Verifica se o ID do usuário é válido
if ($usuario_id === null) {
    die("ID do usuário não fornecido na URL");
}

// Monta a consulta SQL para obter o status do usuário
$statusaluno = "SELECT status FROM usuarios WHERE id = $usuario_id";
$resultstatus = $conn->query($statusaluno);

// Verifica se a consulta SQL foi bem-sucedida
if (!$resultstatus) {
    die("Erro na consulta SQL: " . $conn->error);
}

// Obtém o status do usuário
$row = $resultstatus->fetch_assoc();

// Certifique-se de que $status está definido corretamente como $row['status'].
$status = $row['status'];


?>

<div class="col-md-6">
    <form method="post" action="../sql/proc_aluno_plano.php">
    <div class="form-group">
        <label for="tipo">Plano de boletos PIX</label>
        <h5 class="text <?php echo ($dadosUsuario['assinatura'] != '') ? 'text-success' : 'text-danger'; ?>">
    <?php echo ($dadosUsuario['assinatura'] != '') ? 'ATIVO' : 'DESATIVADO'; ?>
</h5>
    </div>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#boletoModal">Plano de boletos PIX</button>
</form>
</div>  
<div class="row">
<div class="col-md-6">
  <form method="post" action="../sql/proc_aluno_status.php">
      <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
      <input type="hidden" name="customer" value="<?php echo $customer; ?>">
      <div class="form-group">
          <label for="tipo">Situação do aluno</label>
          <select class="form-select" id="selectPlano" name="status">
              <option value=""><?php echo $status; ?></option>
              <option value="ativo">ATIVO</option>
              <option value="inativo">INATIVO</option>
          </select>
      </div>
      <button type="submit" class="btn btn-danger">Alterar situação do aluno</button>
  </form>
</div>
<div class="col-md-6">
    <form method="post" action="../sql/asaas/deletarAssinatura.php">
        <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
        <input type="hidden" name="id" value="<?php echo $dadosUsuario['assinatura']; ?>">
        <div class="form-group">
            <h5>Deseja retirar da cobrança automática online?</h5>
        </div>
        <button type="submit" class="btn btn-danger">Remover do plano automático online</button>
    </form>
</div>
</div>
</div>
</div>
      </div>
    </div>
    <div class="tab-content">
    <div class="tab-pane fade" id="dadosPessoais">
      <!-- Content for Financeiro -->
      <div class="container mt-3">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Dados do aluno</h6>
                
                
                </div>
                <div class="col-md-4 text-end">
                <button class="btn btn-success m-4" onclick="window.location.href='../sql/carteirinha/carteirinha.php?nome=<?php echo $dadosUsuario['nome'] ?>&usuario_id=<?php echo $dadosUsuario['id'] ?>'">Gerar Carteirinha</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
    <p class="text-sm">
        Olá, <?php echo $dadosUsuario['nome'] ?>, Aqui estão seus principais dados para nosso contato. Pedimos que sempre mantenham-os atualizados.
    </p>
    <hr class="horizontal gray-light my-4">
    <ul class="list-group">
    <form method="POST" action="../sql/proc_edit_usuario.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $dadosUsuario['id']; ?>">
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome">Inscrição pagamento automático</label>
            <input type="text" class="form-control" id="customer" name="customer" placeholder="Código não ativo" value="<?php echo $dadosUsuario['customer']; ?>" readonly>
        </div>
    </div></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome">Nome do aluno</label>
            <input type="text" class="form-control" id="name" name="nome" placeholder="Nome completo" value="<?php echo $dadosUsuario['nome']; ?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="img_id">Como ficou sabendo da escola de futebol?</label>
            <select class="form-control" name="pesquisa" id="pesquisa">
                <option value="<?php echo $dadosUsuario['pesquisa']; ?>"><?php echo $dadosUsuario['pesquisa']; ?></option>
                <option value="google">Google</option>
                <option value="amigo">Amigos</option>
                <option value="Escola">Escola</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="img_id">Foto de perfil do aluno</label>
            <input type="file" class="form-control" name="img_id" id="img_id">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nascimento">Data de Nascimento do aluno</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $dadosUsuario['nascimento']; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="rg_aluno">RG do Aluno</label>
            <input type="number" class="form-control" id="rg_aluno" name="rg_aluno" placeholder="RG se não tiver deixar em branco" value="<?php echo $dadosUsuario['rg_aluno']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cpf">CPF ALUNO</label>
            <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $dadosUsuario['cpf']; ?>">
        </div>
    </div>
</div>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Dados do Responsavel</h5>
</div><br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">E-mail do responsavel</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $dadosUsuario['email']; ?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="contato">Contato do Responsavel colocar DD sem parenteses</label>
            <input type="text" class="form-control" name="contato" id="contato" oninput="limitarNumero(this, 11)" value="<?php echo $dadosUsuario['contato']; ?>" required>
        </div>
    </div>
</div>
<script>
    function limitarNumero(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }
</script>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nascimento">RESPONSAVEL FINANCEIRO</label>
            <input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo $dadosUsuario['responsavel']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="RG">RG DO RESPONSAVEL</label>
            <input type="number" class="form-control" id="rg_responsavel" name="rg_responsavel" placeholder="RG Responsavel" value="<?php echo $dadosUsuario['rg_responsavel']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="cpf">CPF DO RESPONSAVEL</label>
            <input type="number" class="form-control" id="cpf_responsavel" name="cpf_responsavel" placeholder="CPF Responsavel" value="<?php echo $dadosUsuario['cpf_responsavel']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" onblur="buscarEnderecoPorCep(this.value)" value="<?php echo $dadosUsuario['cep']; ?>">
        </div>
    </div>
</div>
<div class="row" >
<div class="col-md-6">
    <div class="form-group">
        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="<?php echo $dadosUsuario['endereco']; ?>">
    </div>
</div>
<script>
    function buscarEnderecoPorCep(cep) {
        const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => preencherCamposEndereco(data))
            .catch(error => console.error('Erro ao buscar endereço por CEP:', error));
    }

    function preencherCamposEndereco(data) {
        const enderecoInput = document.getElementById('endereco');

        if (data.erro) {
            alert('CEP não encontrado. Por favor, verifique e tente novamente.');
            enderecoInput.value = '';
        } else {
            enderecoInput.value = `${data.logradouro}, ${data.bairro}, ${data.localidade}, ${data.uf}`;
        }
    }
</script>
<div class="col-md-6">
    <div class="form-group">
        <label for="senha">Digite sua senha</label>
        <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $dadosUsuario['senha']; ?>" placeholder="Digite sua senha">
    </div>
</div></div>
                <div class="row">

</div>
        
        
            <button type="submit" class="btn bg-gradient-success w-100 w-md-40 mt-4 mb-5 btn-xg btn-block" onclick="return confirm('Tem certeza de que deseja editar este aluno?')" >Editar dados do aluno</button>
              </form>      
        </div>
    </ul>
</div>
          </div>
      </div>
    </div>

</div>

<script>
  // Hide all tab-panes when a new one is shown
  $('.nav-link').on('click', function () {
    $('.tab-pane').removeClass('show active');
  });
</script>
<script>
    var ctx = document.getElementById('radarChart').getContext('2d');
    var myRadarChart = new Chart(ctx, {
      type: 'radar',
      data: {
        labels: ['Chute', 'Técnica', 'Passe', 'Drible', 'Mentalidade'],
        datasets: [{
          label: 'Dados',
          data: [ 
    <?php echo isset($dadosAvaliacao['chute']) ? $dadosAvaliacao['chute'] : 0; ?>, 
    <?php echo isset($dadosAvaliacao['tecnica']) ? $dadosAvaliacao['tecnica'] : 0; ?>, 
    <?php echo isset($dadosAvaliacao['passe']) ? $dadosAvaliacao['passe'] : 0; ?>,
    <?php echo isset($dadosAvaliacao['drible']) ? $dadosAvaliacao['drible'] : 0;  ?>, 
    <?php echo isset($dadosAvaliacao['mentalidade']) ? $dadosAvaliacao['mentalidade'] : 0; ?>
],
backgroundColor: 'rgba(0, 123, 255, 0.2)',
borderColor: 'rgba(0, 123, 255, 1)',
borderWidth: 1
}]

      },
      options: {
        scale: {
          angleLines: {
            display: true
          },
          ticks: {
            min: 0,
            max: 100,
            stepSize: 100 // Define o intervalo entre os ticks
          }
        }
      }
    });
  </script>


    </div>
  <?php include('../components/footer.php');?>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Inclua estas bibliotecas no final do seu arquivo HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

            </div>
</body>
<div class="modal fade" id="boletoModal" tabindex="-1" role="dialog" aria-labelledby="boletosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="../sql/asaas/assinaturaAsaasBoleto.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="boletosModalLabel">Assinar Plano Anual 12 boletos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <input type="text" name="customer" id="customerBoleto" value="">
                <input type="text" name="usuario_id" id="usuario_id" value="">
                    <!-- Adicione aqui os campos necessários para a assinatura -->
                    <div class="form-group">
                        <label for="desconto">Valor da mensalidade?</label>
                        <input type="text" name="valor" id="valor" placeholder="Exemplo: 100" class="form-control" required>
                        <label for="desconto">Desconto pagamento antecipado!</label>
                        <input type="text" name="desconto" id="desconto" placeholder="Exemplo: 10" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="vencimento">Quantidade de Cobranças a serem Geradas?</label>
                        <input type="number" name="cobranca" id="cobranca" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="vencimento">Data do primeiro vencimento?</label>
                        <input type="date" name="vencimento" id="vencimento" class="form-control" required>
                    </div>
                    <!-- Adicione outros campos conforme necessário -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Assinar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="onlineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Cobrança</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cobrancaForm" method="$_POST" action="../sql/asaas/cobrancaAvulsa.php">
          <div class="form-group">
            <label for="usuario_id">Usuário ID:</label>
            <input type="text" class="form-control" id="usuario_id" name="usuario_id" value="<?php echo $dadosUsuario['id'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="customer">Customer:</label>
            <input type="text" class="form-control" id="customer" name="customer" value='<?php echo $dadosUsuario['customer']; ?>' readonly>
          </div>
          <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" required>
          </div>
          <div class="form-group">
            <label for="vencimento">Vencimento:</label>
            <input type="date" class="form-control" id="vencimento" name="vencimento" required>
          </div>

          <div class="form-group">
            <label for="desconto">Desconto:</label>
            <input type="number" class="form-control" id="desconto" name="desconto" required>
          </div>
          <button type="submit" class="btn btn-success">Criar nova cobrança</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    var customerValue = "<?php echo $dadosUsuario['customer']; ?>";
    var usuario_idValue = "<?php echo $dadosUsuario['id']; ?>";
    document.getElementById('customerBoleto').value = customerValue;
    document.getElementById('usuario_id').value = usuario_idValue;

    function preencherModal(data) {
        // Se necessário, adicione lógica adicional para preencher outros campos no modal
        var modal = new bootstrap.Modal(document.getElementById('boletoModal'));
        modal.show();
    }
</script>


<div class="modal fade" id="produtoModal" tabindex="-1" role="dialog" aria-labelledby="cobrancaModalLabel" aria-hidden="true">
                    <?php include '../modals/nova_cobranca.php'; ?>
                </div>
                
</html>
