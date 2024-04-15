<?php 
      include ('../components/navdashboard.php');
 
error_reporting(E_ALL);
ini_set('display_errors', 1);


$id_Conta = $_SESSION['id_conta'];
  ?>
  

    <!-- End Navbar -->
   <?php 
// Primeiro, obtenha o mês atual
$currentMonth = date('Y-m');

// Sua consulta SQL
$sql = "SELECT u.id, u.nome, u.datafim, u.img_id, p.ciclo
        FROM usuarios u
        LEFT JOIN planos p ON u.id_plano = p.id
        WHERE u.id_conta = $id_Conta 
        AND u.status = 'ativo'
        AND (u.id_plano = '' OR u.id_plano IS NULL)";

// Executar a consulta SQL e obter o resultado
$result = mysqli_query($conn, $sql);

// Verificar se há erros na consulta
if (!$result) {
    die('Erro na consulta: ' . mysqli_error($conn));
}
?>

<div class="row my-4">
    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h4>Alunos sem Plano</h4>
                        <p class="text-sm mb-0"></p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end"></div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matrícula</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data do fim do Plano</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ciclo</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Verificar se há resultados retornados
                            if (mysqli_num_rows($result) > 0) {
                                while ($user_data = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['id']}</td>";

                                    if (isset($user_data['img_id'])) {
                                        $imagePath = '../uploads/' . trim($user_data['img_id']);
                                        echo "<td class='text-sm font-weight-bold mb-0'><img src='{$imagePath}' alt='User Image' style='width: 50px; height: 50px;'></td>";
                                    } else {
                                        echo "<td>No Image</td>";
                                    }

                                    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['nome']}</td>";
                                    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['datafim']}</td>";
                                    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['ciclo']}</td>";
                                    echo "<td><a class='btn bg-gradient-warning' href='profile.php?id={$user_data['id']}'>Visualizar</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                // Nenhum resultado retornado, exibir uma mensagem
                                echo "<tr><td colspan='6'>Nenhum plano vencendo para este mês.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

        

      <?php include ('../components/footer.php'); ?>
    </div>
  </main>
  <?php 
  // include ('../components/barra_edicao.php')
  ;?>
    <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>