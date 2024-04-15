<?php 

    include_once '../acesso/conexao.php';
    if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
        header("Location: error404.php");
        exit();
    }

    $nomeUsuario = $_SESSION['nome'];
    $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logos/HERCULES.png">
  <title>
    Chamados
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
<body>

<!-- Menu de Navegação -->
<nav
  class="navbar navbar-expand-lg top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
  <div class="container">

  <h1>Bem-vindo, <?php echo $_SESSION['nome']?></h1>
    <a class="navbar-brand  text-white " href="" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <div class="row">
          <div class="col-auto m-auto">
            <a class="text-white cursor-pointer">
              <i class="fa fa-cog fixed-plugin-button-nav"></i>
            </a>
          </div>
          <div class="col-auto m-auto">
            <div class="dropdown">
              <a class="text-white cursor-pointer" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                ...
              </ul>
            </div>
          </div>
          <div class="col-auto">
            <div class="bg-white border-radius-lg d-flex me-2">
            <button class="btn bg-gradient-secondary" type="button" onclick="location.href='../pages/logout.php'">
  Sair
</button>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<!-- Cabeçalho -->
<header class="container mt-3">

    
    
</header>

<!-- Conteúdo Principal -->
<main class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <?php
$id_conta = $_SESSION['id_conta'];
$usuario_id = $_SESSION['id'];


// Verifique se o usuário está autenticado e tem permissão

// Consulta para buscar os 5 últimos chamados
$sql = "SELECT * FROM chamados WHERE id_conta = $id_conta AND usuario_id = $usuario_id ORDER BY data_criacao DESC LIMIT 5";
$result = $conn->query($sql);

// Verifique se há resultados
if ($result->num_rows > 0) {
    echo '<h2>Seus Chamados</h2>';
    echo '<ul>';
    while ($row = $result->fetch_assoc()) {
        // Exiba cada chamado na lista
        echo '<li>'.'#'. $row['id'] . ' - ' . $row['titulo'] . '</li>';
    }
    echo '</ul>';
}
// ...
?>
        </div>

        <div class="col-md-6">
            <img src="../assets/img//logos/HERCULES.png" width="200px" alt="">
            <h2>Criar Novo Chamado</h2>
            <form method="POST" action="criar_chamado.php">
                <input type="hidden" name="usuario_id" style="display: none;" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="id_conta" value="<?php echo $_SESSION['id_conta']; ?>">
            <div class="mb-3">
                    <label for="descricao" class="form-label">Local e unicade de atendimento</label>
                    <textarea class="form-control" id="unidade" name="unidade" rows="1"></textarea>
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título do Chamado</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
                </div>
                
                <button type="submit" class="btn bg-gradient-warning">Criar Chamado</button>
            </form>
        </div>
    </div>
</main>

<!-- Rodapé -->
<?php 
    include '../components/footer.php';
?>
<script>
  // Inicialize o Bootstrap
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

 <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
<!-- Adicione os links para o JavaScript do Bootstrap no final do arquivo -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Inclua as bibliotecas JavaScript no final do arquivo -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
