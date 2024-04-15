<?php 
      include ('../components/navdashboard.php');
    
  ?>
  

    <!-- End Navbar -->
    <?php 
      include ('../sql/cards_financeiro.php');
      
    
    ?>
<div class="row my-4">
    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12 col-12"> <!-- Ajuste aqui para col-lg-12 -->
                        <h3 class="card-title text-info">Relatório de pagamento</h3>
                        <form action="../sql/relatorios/relatoriojan.php" method="POST">
                            <label for="">Periodo entre:</label>
                            <input name="datainicial" class="form-control" type="date">
                            <label for="" class="mt-3">Até a data: </label>
                            <input name="datafinal" class="form-control" type="date">
                            <button class="btn btn-danger mt-5" type="submit">RELATÓRIO EM PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12 col-12"> <!-- Ajuste aqui para col-lg-12 -->
                        <h3 class="card-title text-info text-gradient">Relatório de pagamento online</h3>
                        <form action="../sql/relatorios/relatorioAsaaspagantes.php" method="POST">
                        <input type="hidden" name="status" value="RECEIVED,RECEIVED_IN_CASH">
                        <input type="hidden" name="value" value="netValue">
                            <label for="">Periodo entre:</label>
                            <input name="datainicial" class="form-control" type="date">
                            <label for="" class="mt-3">Até a data: </label>
                            <input name="datafinal" class="form-control" type="date">
                            <button class="btn btn-danger mt-5" type="submit">RELATÓRIO EM PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12 col-12"> <!-- Ajuste aqui para col-lg-12 -->
                    <h3 class="card-title text-danger">Relatório de mensalidades pendentes</h3>
                        <form action="../sql/relatorios/relatoriopendente.php" method="POST">
                            <label for="">Periodo entre:</label>
                            <input name="datainicial" class="form-control" type="date">
                            <label for="" class="mt-3">Até a data: </label>
                            <input name="datafinal" class="form-control" type="date">
                            <button class="btn btn-danger mt-5" type="submit">RELATÓRIO EM PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12 col-12"> <!-- Ajuste aqui para col-lg-12 -->
                        <h3 class="card-title text-danger text-gradient">Relatório de mensalidades pendentes online</h3>
                        <form action="../sql/relatorios/relatorioAsaasPendente.php" method="POST">
                            <input type="hidden" name="status" value="PENDING,OVERDUE">
                            <input type="hidden" name="value" value="value">
                            
                            <label for="">Periodo entre:</label>
                            <input name="datainicial" class="form-control" type="date">
                            <label for="" class="mt-3">Até a data: </label>
                            <input name="datafinal" class="form-control" type="date">
                            <button class="btn btn-danger mt-5" type="submit">RELATÓRIO EM PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12 col-12"> <!-- Ajuste aqui para col-lg-12 -->
                    <h3 class="card-title text-warning">Relatório de frequência</h3>
                        <form action="../sql/relatorios/relatoriofrequencia.php" method="POST">
                            <label for="">Data:</label>
                            <input name="data" class="form-control" type="date">
                            <button class="btn btn-danger mt-5" type="submit">RELATÓRIO EM PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12 col-12"> <!-- Ajuste aqui para col-lg-12 -->
                    <h3 class="card-title text-warning">Relatório de Total de alunos ativos</h3>
                        <form action="../sql/relatorios/relatorioAlunos.php" method="POST">
                            <label for="">Alunos ativos data de hoje</label><br>
                            <button class="btn btn-danger mt-5" type="submit">RELATÓRIO EM PDF</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="card bg-gradient-default mt-5">
  <div class="card-body">
    <h3 class="card-title text-info text-gradient">Relatório de produtos</h3>
    
 
 
  </div>
</div>
</div>
<script>
  // Obtém o botão pelo ID
  var botaojan = document.getElementById('relatoriojan');

  // Adiciona um ouvinte de evento para o clique no botão
  botaojan.onclick = function() {
    // Redireciona para a outra página desejada
    window.location.href = '../sql/relatorios/relatoriojan.php';
  };
  botaofev.onclick = function() {
    // Redireciona para a outra página desejada
    window.location.href = '../sql/relatorios/relatoriofev.php';
  };
</script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

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