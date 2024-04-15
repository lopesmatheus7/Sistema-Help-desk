<?php
include_once '../acesso/conexao.php';

$nomeUsuario = $_SESSION['nome'];
$usuarioId = $_SESSION['id'];
$id_conta = $_SESSION['id_conta'];

// Verifica se o parâmetro 'id_usuario' está presente na URL
if (isset($_GET['id'])) {
    $idUsuarioURL = $_GET['id'];

    // Consulta o banco de dados para obter os dados do usuário da URL
    $sql_usuario = "SELECT * FROM usuarios WHERE id_conta = $id_conta AND id = $idUsuarioURL";
    $result_usuario = $conn->query($sql_usuario);

    // Verifica se o usuário foi encontrado
    if ($result_usuario->num_rows > 0) {
        $usuario = $result_usuario->fetch_assoc();

        // Agora, você pode acessar os dados específicos do usuário
        $usuarioNome = $usuario['nome'];
        $usuarioEmail = $usuario['email'];
        // ... e assim por diante

        // Consulta a contagem total de chamados abertos para o usuário específico
        $sql_contagem_chamados = "SELECT COUNT(*) as total_chamados FROM chamados WHERE id_conta = $id_conta AND usuario_id = $idUsuarioURL AND status = 'Aberto'";
        $result_contagem_chamados = $conn->query($sql_contagem_chamados);

        // Verifica se a consulta de contagem foi bem-sucedida
        if ($result_contagem_chamados) {
            $row_contagem_chamados = $result_contagem_chamados->fetch_assoc();
            $totalChamadosAbertos = $row_contagem_chamados['total_chamados'];

            // Exibe o total de chamados abertos para o usuário
           // echo "Total de chamados abertos para o usuário $idUsuarioURL: $totalChamadosAbertos";
        } else {
            // Trate o erro na consulta de contagem, se necessário
            echo "Erro na consulta de contagem de chamados: " . $conn->error;
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não especificado na URL.";
}
?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-1">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $totalChamadosAbertos ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                  <i class="fa fa-user" style="color: #f5f5f5;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

