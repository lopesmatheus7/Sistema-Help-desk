<?php 
    session_start();
    include_once '../acesso/conexao.php';
    if (!isset($_SESSION['tipo']) || ($_SESSION['tipo'] != 1 && $_SESSION['tipo'] != 2)) {
        header("Location: error404.php");
        exit();
    }

    $nomeUsuario = $_SESSION['nome'];
    $_SESSION['id']
?>

<?php 

$sqlCount = "SELECT COUNT(*) as total FROM chamados";
$countResult = $conn->query($sqlCount);
$row = mysqli_fetch_assoc($countResult);
$totalRegistros = $row['total'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="..assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
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
</head>
<body>

<!-- Menu de Navegação -->

<!-- Cabeçalho -->
<header class="container mt-3">
    <h1>Bem-vindo, <?php echo $_SESSION['nome']?></h1>
</header>

<!-- Conteúdo Principal -->
<main class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <?php
            // ...
            // Verifique se o usuário está autenticado e tem permissão

            // Consulta para buscar os 5 últimos chamados
            $sql = "SELECT * FROM chamados ORDER BY data_criacao DESC LIMIT 5";
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
            <form method="POST" action="../sql/criar_chamado.php">
                <input type="hidden" name="usuario_id" style="display: none;" value="<?php echo $_SESSION['id'] ?>">
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

<!-- Adicione os links para o JavaScript do Bootstrap no final do arquivo -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
