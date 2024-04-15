<?php
include_once '../acesso/conexao.php';

$nomeUsuario = $_SESSION['nome'];
$usuarioId = $_SESSION['id'];
$id_conta = $_SESSION['id_conta'];


if (isset($_POST['finalizar'])) {
    $chamado_id = $_POST['chamado_id'];

    // Obtém a data e hora atual
    $dataFechamento = date('Y-m-d H:i:s');

    // Atualize o status do chamado para 'fechado' e defina a data de finalização no banco de dados
    $sql = "UPDATE chamados SET status = 'fechado', modificado = '$dataFechamento' WHERE id_conta = $id_conta AND id = $chamado_id";
    $conn->query($sql);

    
}
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

        // Consulta os chamados abertos para o usuário específico
        $sql_chamados = "SELECT * FROM chamados WHERE id_conta = $id_conta AND usuario_id = $idUsuarioURL AND status = 'Aberto'";
        $result_chamados_detalhes = $conn->query($sql_chamados);
        
        $sql_contagem_chamados = "SELECT COUNT(*) as total_chamados FROM chamados WHERE id_conta = $id_conta AND usuario_id = $idUsuarioURL AND status = 'Aberto'";
        $result_contagem_chamados = $conn->query($sql_contagem_chamados);

        // Verifica se a consulta de contagem foi bem-sucedida
        if ($result_contagem_chamados) {
            $row_contagem_chamados = $result_contagem_chamados->fetch_assoc();
            $totalChamadosAbertos = $row_contagem_chamados['total_chamados'];

        
            // Verifica se existem detalhes de chamados abertos para o usuário
            if ($result_chamados_detalhes->num_rows > 0) {
                ?>
       <div class="table-responsive">
                <table class="table align-items-center mb-0" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descrição</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Criação</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SLA Progresso</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            while ($row = $result_chamados_detalhes->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='mb-0 text-xs'>" . $row["id"] . "</td>";
                echo "<td class='mb-0 text-xs'>" . $row["titulo"] . "</td>";
                echo "<td class='mb-0 text-xs'>" . $row["descricao"] . "</td>";
                echo "<td class='mb-0 text-xs'>" . date('d/m/Y', strtotime($row['data_criacao'])) . "</td>";

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


                echo "<td class='mb-0 text-xs'>" . $row["status"] . "</td>";
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