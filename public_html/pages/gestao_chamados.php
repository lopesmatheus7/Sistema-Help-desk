<?php 
      include ('../components/navdashboard.php');
      
      
  ?>
  <style>
        #progress-bar {
            width: 100%;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            height: 30px;
        }

        #progress {
            width: 0;
            height: 100%;
            background-color: #4caf50;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>
   
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 
    <!-- Navbar -->
    <?php include ('../sql/cards_chamados.php');
          include ('../sql/lista_chamados_usuarios.php');
      ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          
          <div class="card mb-4">
         
            <div class="card-header pb-0">
            <h2>Todos os chamados e encaminhamento de técnicos</h2>
    <div class="table-responsive">
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titulo</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descrição</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de abertura</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SLA</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Técnico Responsável</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php
if ($result_chamados->num_rows > 0) {
    while ($row = $result_chamados->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='mb-0 text-sm'>" . $row["id"] . "</td>";
        echo "<td class='mb-0 text-sm'>" . $row["titulo"] . "</td>";
        echo "<td class='mb-0 text-sm'>" . $row["descricao"] . "</td>";
        echo "<td class='mb-0 text-sm'>" . date('d/m/Y', strtotime($row['data_criacao'])) . "</td>";

        // Calcula o tempo decorrido desde a criação do chamado em segundos
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

        echo "<td class='mb-0 text-sm'>";
        // Adicione um campo de seleção para o técnico responsável
        echo '<form method="post">';
        echo '<div class="form-group">';
        echo '<select name="tecnico_id[' . $row["id"] . ']" class="form-control">';

        // Reset do ponteiro do resultado para o início
        $result_usuarios->data_seek(0);
        while ($row_usuario = $result_usuarios->fetch_assoc()) {
            $selecionado = ($row_usuario['id'] == $row['usuario_id']) ? 'selected' : ''; // Verifica se o usuário é o atribuído ao chamado
            echo "<option value='" . $row_usuario['id'] . "' $selecionado>" . $row_usuario['nome'] . "</option>";
        }

        echo '</select>';
        echo '</div>';
        echo '<input type="hidden" name="chamado_id" value="' . $row["id"] . '">';
        echo '<button type="submit" name="atribuir" class="btn btn-info">Atribuir</button>';
        echo '</form>';
        echo "</td>";

        echo "<td class='mb-0 text-sm'>" . $row["status"] . "</td>";
        echo "<td class='mb-0 text-sm'>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='chamado_id' value='" . $row["id"] . "'>";
        echo "<button type='submit' name='finalizar' class='btn btn-success'>FINALIZAR</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "Nenhum chamado encontrado.";
}
?>
</table>
    </div>
    </div>
      </div>
        </div>
         </div>
      </div>    
<?php include ('../components/footer.php'); ?>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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