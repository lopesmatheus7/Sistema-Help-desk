<?php 
      include ('../components/navdashboard.php');
    
  ?>
  
  <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
 
    <?php 
      include ('../sql/cards_dashboard.php');
      // Seu código de consulta SQL
$query = "SELECT t.nome AS nome_turma, COUNT(DISTINCT mh.usuario_id) AS quantidade_alunos
FROM matriculas_horarios mh
JOIN turmas t ON mh.id_turma = t.id
WHERE mh.id_turma = t.id AND t.id_conta = $id_conta
GROUP BY t.nome";

// Executar a consulta
$result = mysqli_query($conn, $query);

// Verificar se a consulta foi bem-sucedida
if ($result) {
// Inicializar um array para armazenar os dados da turma
$dadosturma = array();

// Loop pelos resultados da consulta
while ($data = mysqli_fetch_assoc($result)) {
    // Nome da turma
    $nome_turma = $data['nome_turma'];

    // Total de alunos na turma
    $quantidade_alunos = $data['quantidade_alunos'];

    // Adicionar os dados ao array
    $dadosturma[$nome_turma] = $quantidade_alunos;
}
}
    
    ?>
            </div></div></div></div>
   
      <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                <div class="chart">
                <h6 class="ms-2 mt-4 mb-0 text-center text-white pb-2">Alunos por turma</h6>
                <div>
                <!-- O gráfico terá largura 100% em todos os dispositivos, mas altura automática -->
                <canvas id="donutChart" class="w-100 h-auto" width="400" height="300"></canvas>
            </div>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>FATURAMENTO ANUAL PAGAMENTO MANUAL</h6>
              <p class="text-sm">
                
                <span class="font-weight-bold"></span>Ano 2024
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-1">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Alunos novos</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">Resumo dos ultimos alunos cadastrados</span>
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                </div>
              </div>
            </div>
            <?php 
              include ('../sql/alunos_novos.php');
            ?>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matrícula</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nascimento</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query_usuarios = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 5";
    $result_usuarios = $conn->prepare($query_usuarios);
    
    
    while ($user_data = mysqli_fetch_assoc($result)) {
      
        echo "<tr>";
        echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['id']}</td>";
    
        if (isset($user_data['img_id'])) {
          $imagePath = '../uploads/' . trim($user_data['img_id']);
          echo "<td class='text-sm font-weight-bold mb-0'><img src='{$imagePath}' alt='User Image' style='width: 50px; height: 50px;'></td>";
          // Debugging
          //echo "<td>{$imagePath}</td>";
      } else {
          echo "<td>No Image</td>";
      }
    
      echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['nome']}</td>";
      echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['nascimento']}</td>";
    echo "<td><a class='btn bg-gradient-warning' href='profile.php?id={$user_data['id']}'>Visualizar</a></td>";                                       
    echo "</tr>";
    }
    ?>
                  </tbody>
                 <img src="/uploads/" alt="">
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
            <h6>ULTIMOS PAGAMENTOS ONLINE</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> Completos
              </p>
            </div>
            <div class="card-body p-3">
            <?php 
            include ('../sql/asaas/listarCobrancapaga.php');
              include ('../sql/ultimos_pagantes.php');
              
            ?>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php
        

        while ($user_data = mysqli_fetch_assoc($result)) {
            echo "<tr>";

            // Exibição da Foto
            if (isset($user_data['img_id'])) {
                $imagePath = '../uploads/' . trim($user_data['img_id']);
                echo "<td class='text-sm font-weight-bold mb-0'><img src='{$imagePath}' alt='User Image' style='width: 50px; height: 50px;'></td>";
            } else {
                echo "<td>No Image</td>";
            }

            // Exibição do Nome
            echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['nome']}</td>";

            // Exibição do Valor
            $valor = isset($user_data['valor']) ? $user_data['valor'] : 'N/A';
            echo "<td class='text-xs font-weight-bold mb-0'>{$valor}</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
            <div class="row my-1">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Aniversariantes</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">Aniversáriantes da semana</span>
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                </div>
              </div>
            </div>
            <?php 
              include ('../sql/aniversariantes.php');
            ?>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matrícula</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nascimento</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Whatsapp</th>
        </tr>
    </thead>
    <tbody>
<?php
while ($user_data = mysqli_fetch_assoc($result)) {
    // Verificar se a data de nascimento é igual à data atual
    $hoje = date('Y-m-d');
    $data_nascimento = date('Y-m-d', strtotime($user_data['nascimento']));

    // Verificação para depuração
  

    $classeDestaque = ($data_nascimento == $hoje) ? 'bg-success text-black font-weight-bold rounded' : '';

    // Iniciar a linha da tabela com a classe condicional
    echo "<tr class='{$classeDestaque}'>";

    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['id']}</td>";

    if (isset($user_data['img_id'])) {
        $imagePath = '../uploads/' . trim($user_data['img_id']);
        echo "<td class='text-sm font-weight-bold mb-0'><img src='{$imagePath}' alt='User Image' style='width: 50px; height: 50px;'></td>";
    } else {
        echo "<td>No Image</td>";
    }

    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['nome']}</td>";
    echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['nascimento']}</td>";

    echo "<td class='text-xs font-weight-bold mb-0'><a href='https://api.whatsapp.com/send?phone=55{$user_data['contato']}' target='_blank'><img src='../assets/img/small-logos/whatsapp.png' alt='Ícone do WhatsApp' style='width: 50px;'>{$user_data['contato']}</a></td>";

    echo "<td><a class='btn bg-gradient-warning' href='profile.php?id={$user_data['id']}'>Visualizar</a></td>";
    echo "</tr>";
}
?>

                  </tbody>
                 <img src="/uploads/" alt="">
                </table>
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
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>

<?php 
// Obtém o ano atual
$anoAtual = date('Y');

// Consulta SQL para obter os valores mensais da tabela de pagamentos com status "pago" apenas para o ano atual
$sql = "SELECT MONTH(data_pagamento) as mes, SUM(valor) as total FROM pagamentos WHERE status = 'pago' AND id_conta = $id_conta AND YEAR(data_pagamento) = $anoAtual GROUP BY mes";

$resultado = $conn->query($sql);

$dados = array_fill(1, 12, 0); // Inicializa array com zeros para todos os meses

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $mes = $row['mes'];
        $dados[$mes] = $row['total'];
    }
}

// Saída em formato JSON
echo json_encode(array_values($dados)); // Garante que o array seja indexado numericamente
?>

var ctx1 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

// Lista de meses
var meses = [
    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
];

new Chart(ctx1, {
    type: "line",
    data: {
        labels: meses,
        datasets: [
            {
                label: "",
                tension: 0.4,
                borderWidth: 3,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                fill: true,
                data: <?php echo json_encode(array_values($dados)); ?>,
                maxBarThickness: 6
            }
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false, // Mostra a legenda
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#fbfbfb',
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#ccc',
                    padding: 20,
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});
  </script>
<script>
// Dados para o gráfico
var data = {
    labels: [],
    datasets: [{
        data: [],
        backgroundColor: [
            '#FF5733', // Cor fixa para o primeiro item
            '#33FF57', // Cor fixa para o segundo item
            '#5733FF', // Cor fixa para o terceiro item
            // Adicione mais cores fixas conforme necessário
        ],
        hoverBackgroundColor: [
            '#FF5733', // Cor fixa para o hover do primeiro item
            '#33FF57', // Cor fixa para o hover do segundo item
            '#5733FF', // Cor fixa para o hover do terceiro item
            // Adicione mais cores fixas conforme necessário
        ]
    }]
};
</script>
<script>
    // Restante do código permanece o mesmo
    
    // Restante do código permanece o mesmo
    var options = {
        cutoutPercentage: 70,
        responsive: false,
        plugins: {
            legend: {
                    display: 'true', // Alinha a legenda na parte superior
                labels: {
                    color: 'white',
                    fontSize: 12 // Define o tamanho da fonte da legenda
                }
            }
        }
    };

    // Obtenha o contexto do canvas
    var ctx = document.getElementById('donutChart').getContext('2d');

    // Crie o gráfico de rosca
    var donutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
           labels: <?php echo json_encode(array_keys($dadosturma)); ?>,
            datasets: [{
                data: <?php echo json_encode(array_values($dadosturma)); ?>,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF5733']
            }]
        },
        options: options
    });
</script>

  <script>
        // Dados para o gráfico de barras
        var categorias = 0;
        var valores = 0;
        
        // Crie um contexto para o gráfico
        var ctx = document.getElementById("meuGrafico").getContext("2d");

        // Crie o gráfico de barras
        function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

var cores = [];
for (var i = 0; i < valores.length; i++) {
    cores.push(getRandomColor());
}

var meuGrafico = new Chart(ctx, {
    type: 'bar',
    data: { 
        labels: categorias,
        datasets: [{
            label: 'Valores',
            data: valores,
            backgroundColor: cores, // Use as cores geradas aleatoriamente
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

    </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>