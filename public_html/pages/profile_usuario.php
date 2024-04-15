<?php 
    include_once ('../acesso/conexao.php');
    
    include ('../sql/lista_chamados_usuarios_id.php');
    include ('../sql/lista_consumo_individual.php');
    if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
        header("Location: error404.php");
        exit();
    }

    $nomeUsuario = $_SESSION['nome'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    <?php echo $dadosUsuario['nome'] ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  
</head>
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
      <div class="container-fluid py-1">
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">      
          </div>
          <ul class="navbar-nav justify-content-end mt-5">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-success btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online</a>
            </li>
            <li class="nav-item d-flex align-items-center">
              
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.png'); background-position-y: 50%;">
        <span class="mask bg-gradient-info opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
            <img src="../uploads/<?php echo $dadosUsuario['img_id']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>

          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               <?php  echo $dadosUsuario['nome'] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Este é sua central de atividades
              </p>
            </div>
          </div>
          <div class="col-lg-8 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-2">
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
                    <span class="ms-1">Chamados</span>
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
                    <span class="ms-1">Gastos</span>
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
                    <span class="ms-1">Ponto</span>
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
    
    <div class="tab-content mt-2">
          <div class="tab-pane fade show active" id="chamados">
            <!-- Container para o conteúdo de Chamados -->
            <div class="container-fluid">
              
              <!-- Adicione o conteúdo específico de Chamados aqui -->
            <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Ultimos chamados abertos</h6>
            </div>
            <div class="card-body p-2">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder"></h6>
              <ul class="list-group">
              <h2>Chamados</h2>
              <?php include ('../sql/cards_chamados_id.php');  ?>
              <div class="table-responsive">    
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Data de abertura</th>
                    <th>SLA</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if ($result_chamados->num_rows > 0) {
                while ($row = $result_chamados->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["titulo"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row['data_criacao'])) . "</td>";

                    $dataCriacao = strtotime($row['data_criacao']);
        $tempoDecorrido = time() - $dataCriacao;

        // Calcula a porcentagem de SLA
        $slaHoras = 8;
        $slaSegundos = $slaHoras * 28800;
        
        // Certifique-se de não dividir por zero
        $slaProgresso = ($tempoDecorrido > 0) ? number_format(($tempoDecorrido / $slaSegundos) * 100, 1) : 0;        
        // Limita a porcentagem a 100%
        $slaProgresso = min($slaProgresso, 100);

        // Use uma classe CSS personalizada para definir a largura da barra
        $barraStyle = 'width: ' . max($slaProgresso, 0) . '%; min-width: 0;';
        $barraClass = 'bg-gradient-info'; // Classe inicial, pode ser a cor que você deseja quando não atingir 100%
        
        // Verifica se atingiu 100% e muda a classe para vermelho (danger)
        if ($slaProgresso >= 100) {
          $barraClass = 'bg-gradient-danger';
      }
      
      // Adiciona a coluna da barra de progresso SLA à tabela
      echo "<td class='mb-0 text-sm'>";
      echo  "<div class='d-flex align-items-center justify-content-center'>";
      echo  "<span class='me-2 text-xs font-weight-bold'>" . number_format($slaProgresso, 1) . "%</span>";
      echo  "<div>";
      echo    "<div class='progress'>";
      echo "<div class='progress-bar $barraClass' role='progressbar' aria-valuenow='" . round($slaProgresso, 2) . "' aria-valuemin='0' aria-valuemax='100' style='$barraStyle'></div>";
      echo    "</div>";
      echo  "</div>";
      echo  "</div>";
      echo  "</td>";

                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='chamado_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' name='finalizar' class='btn btn-success'>FINALIZAR</button>";
                    echo "</form>";                    
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Nenhum chamado aberto encontrado.";
            }
            ?>
            </tbody>
        </table>
        </div>
              </ul>
            </div>
          </div>
            </div>
          </div>
          <div class="tab-pane fade" id="gastos">
            <!-- Container para o conteúdo de Gastos -->
            <div class="container-fluid">
              
              <!-- Adicione o conteúdo específico de Gastos aqui -->
              <button class="btn bg-gradient-info w-100 w-md-40 mt-4 mb-5 btn-lg btn-xs btn-block" data-bs-toggle="modal" data-bs-target="#consumoModal">Cadastrar consumo</button>
              <div class="card h-100">
            <div class="card-header pb-0 p-3">
      <?php 
        include ('../sql/meu_consumo.php');
      ?>
                    <div class="table-responsive">    
                            <?php
                            if ($totalRegistros > 0) {
                                
                                echo '<h3>Lista de notas de ' . $dadosUsuario['nome'] . '</h3>';
                                echo '<table class="table align-items-center mb-0">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Empresa</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Projeto</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Finalidade</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produto</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantidade</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor Unitário</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor Total</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Número da Nota</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Arquivo</th>';
                                echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Criado em</th>';
                                
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                            
                                while ($cadastro_data = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['id'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['empresa'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['projeto'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['finalidade'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['produto'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['quantidade'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . 'R$ ' . $cadastro_data['valor_unitario'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . 'R$ ' . $cadastro_data['valor_total'] . '</td>';
                                    echo '<td class="mb-0 text-sm">' . $cadastro_data['n_nota'] . '</td>';
                                    echo '<td class="mb-0 text-sm"><a href="download_imagem.php?id=' . $cadastro_data['id'] . '">Baixar Imagem ' . $cadastro_data['arquivo'] . '</a></td>';
                                    echo '<td class="mb-0 text-sm">' . date('d/m/Y', strtotime($cadastro_data['created'])) . '</td>';
                                    
                                    echo '</tr>';
                                }

                                echo '</tbody>';
                                echo '</table>';
                                
                                // Paginação
                                echo '<div class="container">';
                                echo '<ul class="pagination">';
                                
                                // Botão "Anterior"
                                if ($paginaAtual > 1) {
                                    $paginaAnterior = $paginaAtual - 1;
                                    echo '<li class="page-item"><a class="page-link" href="lista_combustiveis_usuarios.php?usuario_id=' . $usuario_id . '&page=' . $paginaAnterior . '">Anterior</a></li>';
                                }
                                
                                // Links para páginas
                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                    echo '<li class="page-item ';
                                    echo ($i == $paginaAtual) ? 'active' : '';
                                    echo '"><a class="page-link" href="lista_combustiveis_usuarios.php?usuario_id=' . $usuario_id . '&page=' . $i . '">' . $i . '</a></li>';
                                }
                                
                                // Botão "Próxima"
                                if ($paginaAtual < $totalPaginas) {
                                    $paginaSeguinte = $paginaAtual + 1;
                                    echo '<li class="page-item"><a class="page-link" href="lista_combustiveis_usuarios.php?usuario_id=' . $usuario_id . '&page=' . $paginaSeguinte . '">Próxima</a></li>';
                                }
                                
                                echo '</ul>';
                                echo '</div>';
                            } else {
                                echo '<p>Nenhum registro encontrado para este usuário.</p>';
                            }
                            ?>
                        </div>
        </div>
      </div>
            </div>
          </div>
          <div class="tab-pane fade" id="estoque">
            <!-- Container para o conteúdo de Estoque -->
            <div class="container-fluid">
              <h4>Marcação de Ponto</h4>
              <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Registro de Ponto</h2>
            
            <!-- Formulário de Registro de Ponto -->
            <form action="processar_ponto.php" method="post">
                <div class="form-group">
                    <label for="tipo_registro">Tipo de Registro:</label>
                    <select class="form-control" id="tipo_registro" name="tipo_registro" required>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Entrada Almoço</option>
                        <option value="saida">Saída Almoço</option>
                        <option value="saida">Saída</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary" disabled>Registrar Ponto</button>
            </form>
        </div>

        <div class="col-md-6">
            <h2>Histórico de Registros diario</h2>
            
            <!-- Tabela de Histórico de Registros -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Tipo de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aqui você deve buscar e exibir os registros do banco de dados -->
                    <tr>
                        <td>2023-01-01 08:00:00</td>
                        <td>Entrada</td>
                    </tr>
                    <tr>
                        <td>2023-01-01 12:00:00</td>
                        <td>Saída</td>
                    </tr>
                    <!-- Fim dos registros do banco de dados -->
                </tbody>
            </table>
        </div>
    </div>
</div>
            </div>
          </div>
          <div class="tab-pane fade" id="dadosPessoais">
            <!-- Container para o conteúdo de Dados Pessoais -->
            <div class="container-fluid">
              
              <!-- Adicione o conteúdo específico de Dados Pessoais aqui -->
              <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Dados do técnico</h6>
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
                Olá eu sou <?php echo $dadosUsuario['nome'] ?>, E esses são meus dados!
              </p>
              <hr class="horizontal gray-light my-4">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nome completo:</strong> &nbsp; <?php echo $dadosUsuario['nome'] ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Contato</strong> &nbsp; em breve</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $dadosUsuario['email'] ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Endereço</strong> &nbsp; Brasil</li>
                <li class="list-group-item border-0 ps-0 pb-0">
                  <strong class="text-dark text-sm">Social:</strong> &nbsp;
                  <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-facebook fa-lg"></i>
                  </a>
                  <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-twitter fa-lg"></i>
                  </a>
                  <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    <i class="fab fa-instagram fa-lg"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>    
        <?php include ('../components/footer.php')?> 
        
    </div>
  </div>
  <div class="dropdown p-5">
  <button class="btn bg-gradient-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Sair
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <li><a class="dropdown-item" href="../pages/logout.php">Sair</a></li>
  </ul>
</div>
  <div class="modal fade" id="consumoModal" tabindex="-1" role="dialog" aria-labelledby="ConsumoModalLabel" aria-hidden="true">
              <?php include '../modals/cadastro_consumo.php'; ?>
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
</body>

</html>