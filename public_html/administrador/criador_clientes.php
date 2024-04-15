<?php session_start();
    include_once ('../acesso/hercules.php');
    if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 100) {
        header("Location: error404.php");
        exit();
    }

    $nomeUsuario = $_SESSION['nome'];

?>
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
  

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  
</head>

<div class="container mt-5">
  <!-- Formulário para inserir o nome do banco de dados -->
  <form action="criar_banco.php" method="post">
    <div class="mb-3">
      <label for="nomeBanco" class="form-label">Nome do Banco de Dados</label>
      <input type="text" class="form-control" id="nomeBanco" name="nomeBanco" required>
    </div>
    <button type="submit" class="btn btn-primary">Criar Banco de Dados</button>
  </form>
</div>