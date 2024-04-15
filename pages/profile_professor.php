<?php 
      
      include_once ('../acesso/conexao.php');
      // Inicia a sessão


// Verifica se o usuário está logado usando a variável de sessão
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'professor') {
    // Verifica se o cookie de login intermitente está presente
    if (isset($_COOKIE['id']) && $_COOKIE['tipo'] == 'professor') {
        // Renova o cookie para prolongar a sessão (por exemplo, mais 7 dias)
        setcookie('id', $_COOKIE['id'], time() + (7 * 24 * 60 * 60), '/');
        setcookie('tipo', $_COOKIE['tipo'], time() + (7 * 24 * 60 * 60), '/');
        
        // Define a variável de sessão para indicar que o usuário está logado
        $_SESSION['tipo'] = 2;
    } else {
        // Se o cookie não estiver presente ou o tipo não for 0, redirecione para a página de erro
        header('Location: error404.php');
        exit();
    }


    }
     include ('../sql/professores/dadosProfessor.php');

     $id_conta = $_SESSION['id_conta'];
     $unidade = $_SESSION['unidade'];
      $id = $_GET['id'];



    

  ?>
  <!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logos/HERCULES.png">
  <title>
    Hercules Tecnology
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  
</head>
<div class="m-4 pt-1">
              <h4 style="padding-right: 20px";> Unidade: <?php echo $unidade?></h4>
            </li>
            <li class="nav-item d-flex align-items-center">
            <div class="dropdown">
  <button class="btn bg-gradient-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Sair
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <li><a class="dropdown-item" href="../pages/logout.php">Sair</a></li>
  </div></div>
    <!-- Navbar -->
    
 
    
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
          <input type="hidden" id="urlInput" value="www.herculestecnology.com/sql/frequencia/proc_frequencia_qrcode.php?usuario_id=<?php echo $dadosUsuario['id'] ?>">
          
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               <?php  echo $dadosUsuario['nome'] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              Este é o perfil do Professor</p>
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
    <!--            <li class="nav-item">
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
                </li> -->
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
                    <span class="ms-1">Turmas</span>
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
    <div class="tab-pane fade" id="chamados">
      <div class="container mt-3">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
            </div>
            <div class="card-body p-2">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder"></h6>
              
              </div>
            </div>
      </div>
    </div>
  <div class="tab-content">
    <div class="tab-pane fade" id="estoque">
      <!-- Content for Financeiro -->
      <?php
    
    // Exibir os dados usando tags <h3>
    ?>
      <div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
           <?php 
$dadosAvaliacao = array(
    'altura' => 0,
    'peso' => 0,
    'chute' => 0,
    'tecnica' => 0,
    'drible' => 0,
    'passe' => 0,
    'mentalidade' => 0
);

$recuperarAvaliacao = "SELECT * FROM avaliacao WHERE id_conta = '$id_conta' AND usuario_id = '" . $dadosUsuario['id'] . "' ORDER BY data_avaliacao DESC LIMIT 1";
$resultado = mysqli_query($conn, $recuperarAvaliacao);
if ($resultado) {
    $dadosAvaliacao = mysqli_fetch_assoc($resultado);

}
?>
<?php
 // Preparar a consulta SQL para recuperar os dados do usuário
$sqlbiografia = "SELECT usuario_id, id_conta, link_perfil_instagram, altura, peso, posicao, biografia, conquistas, link_youtube
FROM biografia
WHERE usuario_id = '$usuario_id'";

// Executar a consulta
$resultadobiografia = $conn->query($sqlbiografia);



// Verificar se a consulta foi bem-sucedida
if ($resultadobiografia->num_rows > 0) {
// Recuperar os dados do banco de dados
$dadosDoBanco = $resultadobiografia->fetch_assoc();
}
?>
<div class="card h-100">
    <div class="card-header pb-0 p-3">
        <div class="card-body">
        <a href="<?php echo !empty($dadosDoBanco['link_youtube']) ? $dadosDoBanco['link_youtube'] : ''; ?>" target="_blank" rel="noopener noreferrer"> <button type="button" class="btn btn-youtube btn-icon">
    <span class="btn-inner--icon"><i class="fab fa-youtube"></i></span>
    <span class="btn-inner--text">Youtube</span>
</button></a>
<a href="<?php echo !empty($dadosDoBanco['link_perfil_instagram']) ? trim($dadosDoBanco['link_perfil_instagram']) : ''; ?>" target="_blank" rel="noopener noreferrer"> 
    <button type="button" class="btn btn-instagram btn-icon">
        <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
        <span class="btn-inner--text">Instagram</span>
    </button>
</a>


            <p class="card-text"></p>
            <label for="mediaTotal">Média Total:</label>
            <h3 id="mediaTotal" class="font-weight-bold text-danger"><?php echo intval(($dadosAvaliacao['chute'] + $dadosAvaliacao['passe'] + $dadosAvaliacao['tecnica'] + $dadosAvaliacao['drible'] + $dadosAvaliacao['mentalidade']) / 5)?></h3>
 <!-- Inicializado com 0 -->
        </div>
        <form action="../sql/proc_avaliacao.php" method="post">
            <ul class="list-group list-group-flush">
                <input type="hidden" name="id_conta" value="<?php echo $id_conta; ?>">
                <input type="hidden" name="usuario_id" value="<?php echo $dadosUsuario['id']; ?>">

                <input type="hidden" class="form-control" name="data_avaliacao" value="<?php echo date('Y-m-d H:i'); ?>" placeholder="Data da avaliação">

                <div class="card-body">
                    <h5 class="card-title">Informações Físicas</h5>
                    <strong class="text-dark">Altura:</strong>
                    <h2><?php echo empty($dadosDoBanco['altura']) ? 'Dado não cadastrado' : $dadosDoBanco['altura']; ?></h2>

                    <strong class="text-dark">Peso:</strong>
                    <h2><?php echo empty($dadosDoBanco['peso']) ? 'Dado não cadastrado' : $dadosDoBanco['peso']; ?></h2>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Habilidades</h5>

                    <div class="form-group">
                        <label for="chute">Chute:</label>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo isset($dadosAvaliacao['chute']) ? $dadosAvaliacao['chute'] : 0; ?>%;" aria-valuenow="<?php echo isset($dadosAvaliacao['chute']) ? $dadosAvaliacao['chute'] : 0; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo isset($dadosAvaliacao['chute']) ? $dadosAvaliacao['chute'] : 0; ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tecnica">Técnica:</label>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo isset($dadosAvaliacao['tecnica']) ? $dadosAvaliacao['tecnica'] : 0; ?>%;" aria-valuenow="<?php echo isset($dadosAvaliacao['tecnica']) ? $dadosAvaliacao['tecnica'] : 0; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo isset($dadosAvaliacao['tecnica']) ? $dadosAvaliacao['tecnica'] : 0; ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="drible">Drible:</label>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo isset($dadosAvaliacao['drible']) ? $dadosAvaliacao['drible'] : 0; ?>%;" aria-valuenow="<?php echo isset($dadosAvaliacao['drible']) ? $dadosAvaliacao['drible'] : 0; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo isset($dadosAvaliacao['drible']) ? $dadosAvaliacao['drible'] : 0; ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passe">Passe:</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo isset($dadosAvaliacao['passe']) ? $dadosAvaliacao['passe'] : 0; ?>%;" aria-valuenow="<?php echo isset($dadosAvaliacao['passe']) ? $dadosAvaliacao['passe'] : 0; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo isset($dadosAvaliacao['passe']) ? $dadosAvaliacao['passe'] : 0; ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mentalidade">Mentalidade:</label>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo isset($dadosAvaliacao['mentalidade']) ? $dadosAvaliacao['mentalidade'] : 0; ?>%;" aria-valuenow="<?php echo isset($dadosAvaliacao['mentalidade']) ? $dadosAvaliacao['mentalidade'] : 0; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo isset($dadosAvaliacao['mentalidade']) ? $dadosAvaliacao['mentalidade'] : 0; ?></div>
                        </div>
                    </div>
                    <h2>Gráficos</h2>
                    <canvas id="radarChart" width="400" height="400"></canvas>

                </div>

                <div class="modal-footer">
                </div>
            </ul>
        </form>
    </div>
</div>



        </div>

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3 text-center">
                    <div class="card-body p-1">
                        <h5 class="card-title">Melhores momentos</h5>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="300" height="220" src="https://www.youtube.com/embed/<?php echo $dadosDoBanco['link_youtube'] ?? 'hZPLgaiIJiU?si=Pq5DWKm3Rz7aX9VP'; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <button type="button" class="btn bg-gradient btn-info" data-bs-toggle="modal" data-bs-target="#formularioModal">
                            Editar currículo
                        </button>
                    </div>

                    <div class="mb-3">
                        <h2 class="text-uppercase text-body text-xl font-weight-bolder">Posição: <?php echo empty($dadosDoBanco['posicao']) ? 'Dado não cadastrado' : $dadosDoBanco['posicao']; ?></h2>
                    </div>

                    <div class="mb-3">
                        <h2 class="text-uppercase text-body text-xl font-weight-bolder">Biografia: <?php echo empty($dadosDoBanco['biografia']) ? 'Dado não cadastrado' : $dadosDoBanco['biografia']; ?></h2>
                    </div>

                    <div class="mb-3">
                        <h2 class="text-uppercase text-body text-xl font-weight-bolder">Conquistas: <?php echo empty($dadosDoBanco['conquistas']) ? 'Dado não cadastrado' : $dadosDoBanco['conquistas']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
                      

    <div class="tab-content">
    <div class="tab-pane fade show active" id="gastos">
      <!-- Content for Financeiro -->
      <div class="container mt-3">

        <?php
      include ('../sql/turmas/listadeTurmasProfessor.php')

?>
            <div class="row">
<div class="col-md-6">
    
</div>

<div class="col-md-6">
    
</div>
 </div>

<div class="row">
<div class="col-md-6">
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
                  <h6 class="mb-0">Dados do professor</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
    <p class="text-sm">
        Olá, <?php echo $dadosUsuario['nome'] ?>, Aqui estão seus principais dados para nosso contato. Pedimos que sempre mantenham-os atualizados.
    </p>
    <hr class="horizontal gray-light my-4">
    <ul class="list-group">
    <form method="POST" action="../sql/proc_edit_professor.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $dadosUsuario['id']; ?>">
    <div class="row">
    <div class="col-md-6">
    </div></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome">Nome do Professor</label>
            <input type="text" class="form-control" id="name" name="nome" placeholder="Nome completo" value="<?php echo $dadosUsuario['nome']; ?>" required>
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
            <label for="rg_aluno">RG</label>
            <input type="number" class="form-control" id="rg_aluno" name="rg_aluno" placeholder="RG se não tiver deixar em branco" value="<?php echo $dadosUsuario['rg_aluno']; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $dadosUsuario['cpf']; ?>">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $dadosUsuario['email']; ?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="contato">Contato </label>
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
    
    
</div>
<div class="row">

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
        
        
            <button type="submit" class="btn bg-gradient-success w-100 w-md-40 mt-4 mb-5 btn-xg btn-block" onclick="return confirm('Tem certeza de que deseja editar este aluno?')" >Editar dados do professor</button>
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

<div class="modal fade" id="formularioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulário de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <!-- Seu formulário aqui -->
      

        <form action="../sql/perfilUsuario/proc_bio_aluno.php" method="post">
        <div class="mb-3">
       
        <input type="hidden" class="form-control" name="usuario_id" value="<?php echo !empty($dadosUsuario['id']) ? $dadosUsuario['id'] : ''; ?>">
    </div>
            <div class="mb-3">
        <label for="peso" class="form-label">Altura:</label>
        <input class="form-control" name="altura" value="<?php echo !empty($dadosDoBanco['altura']) ? $dadosDoBanco['altura'] : ''; ?>">
    </div>
            <div class="mb-3">
        <label for="peso" class="form-label">Peso:</label>
        <input class="form-control" name="peso" value="<?php echo !empty($dadosDoBanco['peso']) ? $dadosDoBanco['peso'] : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="posicao" class="form-label">Posição:</label>
        <select class="form-select" name="posicao" required>
            <option value="" disabled <?php echo empty($dadosDoBanco['posicao']) ? 'selected' : ''; ?>>
                Selecione a posição
            </option>
            <option>
                Goleiro
            </option>
            <option>
                Zagueiro
            </option>
            <option>
                Lateral Direito
            </option>
            <option>
                Lateral Esquerdo
            </option>
            <option>
                Volante
            </option>
            <option>
                Meio-Campista
            </option>
            <option>
                Atacante
            </option>
            <option>
                Centroavante
            </option>
            <option>
                Ponta Direita
            </option>
            <option>
                Ponta Esquerda
            </option>
        </select>
    </div>
    <div class="mb-3">
        <label for="biografia" class="form-label">Biografia:</label>
        <textarea class="form-control" name="biografia" rows="4">
            <?php echo !empty($dadosDoBanco['biografia']) ? $dadosDoBanco['biografia'] : ''; ?>
        </textarea>
    </div>
    <div class="mb-3">
        <label for="conquistas" class="form-label">Conquistas:</label>
        <input type="text" class="form-control" name="conquistas" value="<?php echo !empty($dadosDoBanco['conquistas']) ? $dadosDoBanco['conquistas'] : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Link do YouTube:</label>
        <input type="text" class="form-control" name="link" value="<?php echo !empty($dadosDoBanco['link_youtube']) ? $dadosDoBanco['link_youtube'] : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">link url Instagram</label>
        <input type="text" class="form-control" name="instagram" value="<?php echo !empty($dadosDoBanco['link_perfil_instagram']) ? $dadosDoBanco['link_perfil_instagram'] : ''; ?>">
    </div>
</div>


  
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
        
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {
        $('#formularioModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var userData = <?php echo json_encode($dadosUsuario); ?>;
            
            // Defina os valores com base em IDs

            $('#altura').val(userData.altura);
            $('#peso').val(userData.peso);
            $('#posicao').val(userData.posicao);
            $('#biografia').val(userData.biografia);
            $('#conquistas').val(userData.conquistas);
            $('#link').val(userData.link_youtube);
            $('#instagram').val(userData.link_perfil_instagram);
        });
    });
</script>

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

</html>
