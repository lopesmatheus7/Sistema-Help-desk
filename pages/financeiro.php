<?php 
      include ('../components/navdashboard.php');
    
  ?>
  

    <!-- End Navbar -->
    <?php 
      include ('../sql/cards_financeiro.php');
      
    
    ?>
   
      <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <h5 >Planos e mensalidades</h5>
               
                    <button class="btn bg-gradient-info  btn-lg btn-xs btn-block" data-bs-toggle="modal" data-bs-target="#CadastroModal">Novo Plano</button>
                    
                      
              <?php 
                $sql = "SELECT * FROM planos WHERE id_conta = $id_conta AND produto = 'mensalidade'";
                $result = $conn->query($sql);


              
              ?>
              <!--END MODAL CADASTRO-->
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Plano</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desconto</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vencimento</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
    </thead>
    <tbody>
            <?php
            // Exibir dados usando um loop while
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['plano'] . "</td>";
                echo "<td>R$ " . $row['valor'] . "</td>";
                echo "<td>" . $row['desconto'] . "</td>";
                echo "<td>" . $row['vencimento'] . "</td>";
                echo "<td> 
        <button class='btn bg-gradient-info' onclick='abrirModal({$row['id']})'>Editar</button>
        <a style='margin-left: 10px;' class='btn btn-danger' href='../sql/excluir_plano.php?id={$row['id']}' onclick='return confirm(\"Tem certeza de que deseja excluir este registro?\")'>Excluir</a>
      </td>";
                echo "</tr>";

            }
            ?>
        </tbody>
              </table></div>
          </div>
        </div></div>
        <div class="col-lg-4 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <h5 >Cadastro de produtos</h5>
               
                    <button class="btn bg-gradient-info  btn-lg btn-xs btn-block" data-bs-toggle="modal" data-bs-target="#ProdutoModal">Novo Produto</button>
                    
                      
              <?php 
                $sql = "SELECT * FROM planos WHERE id_conta = $id_conta AND produto = 'produto'";
                $result = $conn->query($sql);


              
              ?>
              <!--END MODAL CADASTRO-->
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
    </thead>
    <tbody>
            <?php
            // Exibir dados usando um loop while
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['plano'] . "</td>";
                echo "<td>R$ " . $row['valor'] . "</td>";
                echo "<td> 
        <button class='btn bg-gradient-info' onclick='abrirprodutoModal({$row['id']})'>Editar</button>
        <a style='margin-left: 10px;' class='btn btn-danger' href='../sql/excluir_plano.php?id={$row['id']}' onclick='return confirm(\"Tem certeza de que deseja excluir este registro?\")'>Excluir</a>
      </td>";
                echo "</tr>";

            }
            ?>
        </tbody>
              </table></div>
          </div>
        </div></div></div>
        
      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h4>Alunos em aberto</h4>
                  <p class="text-sm mb-0">
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                </div>
              </div>
            </div>
            <?php 
              include ('../sql/alunos_devedores.php');
            ?>
            <div class="card-body px-0 pb-2">
                <td><a class='btn bg-gradient-danger m-3' href='financeiro_devedores.php'>Todos os devedores</a></td>
                <td><a class='btn bg-gradient-danger m-3' href='financeiro_devedores.php'>Devedores do mês</a></td>
                 <td><a class='btn bg-gradient-danger m-3' href='financeiro_sem_plano_manual.php'>Alunos sem plano</a></a></td>
                <td><a class='btn bg-gradient-danger m-3' href='financeiro_plano_vencimento_mes.php'>Plano vencendo no mês</a></a></td>
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matrícula</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">foto</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    
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
      echo "<td class='text-xs font-weight-bold mb-0'>R$ {$user_data['valor']}</td>";
    echo "<td><a class='btn bg-gradient-warning' href='profile.php?id={$user_data['id']}'>Visualizar</a></td>";     
    }
    ?>
                  </tbody>
                
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>ULTIMOS PAGAMENTOS</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> Completos
              </p>
            </div>
            <div class="card-body p-3">
            <?php 
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
            echo "<td class='text-xs font-weight-bold mb-0'>R$ {$valor}</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<td><a class='btn bg-gradient-success m-3' href='financeiro_pagantes.php'>Visualizar todos os pagantes</a></td>


              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>FATURAMENTO ANUAL</h6>
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
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Tipo de pagamento  </h6>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold"></span>
              </p>
            </div>
            <div class="card mb-3">
  <div class="card-body p-3">
    <div class="chart">
              <canvas id="meuGrafico" width="400" height="200"></canvas>
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

    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [""],
        datasets: [{
          label: "ALUNOS",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: 0,
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
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
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
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
              color: '#b2b9bf',
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
              color: '#b2b9bf',
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
  <?php  
   
  ?>
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

          <!-- MODAL CADASTRO PLANO-->
            <div class="modal fade" id="CadastroModal" tabindex="-1" role="dialog" aria-labelledby="CadastroModalLabel" aria-hidden="true">
              <?php 
               include '../modals/novo_plano.php';
              ?>
            </div>
               <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Editar plano</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form method="POST" action="../sql/proc_edit_planos.php" enctype="multipart/form-data">
  <input type="hidden" class="form-control" id="idPlano" name="id">
    <div class="row">
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="nomePlano">Nome do Plano</label>
        <input type="text" class="form-control" id="nomePlano" name="plano">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="valorPlano">Valor do Plano</label>
        <input type="number" class="form-control" id="valorPlano" name="valor">
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="descricaoPlano">Descrição do Plano (não obrigatório)</label>
        <input type="text" class="form-control" id="descricaoPlano" name="descricao">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="descricaoPlano">Desconto</label>
        <input type="text" class="form-control" id="descontoPlano" name="desconto">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
        <div class="form-group has-success">
        <label for="descricaoPlano">Editar data de vencimento</label>
            <select id="vencimentoPlano" name="vencimento" class="form-control">
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>
   
    <div class="col-md-6">
            <div class="form-group has-success">
              <label for="descricaoPlano">Editar ciclo de cobrança</label>
              <select id="cicloPlano" name="ciclo" class="form-control">
                <?php
                $ciclos = array("Mensal", "Trimestral", "Semestral", "Anual");
                foreach ($ciclos as $ciclo) {
                  echo "<option value='" . strtolower($ciclo) . "'>$ciclo</option>";
                }
                ?>
              </select>
            </div>
          </div>
        </div>
              </div>
              
  
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="update" id="update" class="btn bg-gradient-success">Cadastrar</button>
      </div>
      </form> 
    </div>
</div></div>
<div class="modal fade" id="ProdutoModal" tabindex="-1" role="dialog" aria-labelledby="CadastroProdutoModalLabel" aria-hidden="true">
              <?php 
               include '../modals/novo_produto.php';
              ?>
            </div>
               <div class="modal fade" id="produtoEditModal" tabindex="-1" role="dialog" aria-labelledby="produtoModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="produtoModalLabel">Editar produto</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form method="POST" action="../sql/proc_edit_produto.php" enctype="multipart/form-data">
  <input type="hidden" class="form-control" id="idProduto" name="id">
    <div class="row">
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="nomePlano">Nome do Produto</label>
        <input type="text" class="form-control" id="nomeProduto" name="plano">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="valorPlano">Valor do Produto</label>
        <input type="number" class="form-control" id="valorProduto" name="valor">
      </div>
    </div>
    </div>
    <div class="col-md-6">
      <div class="form-group has-success">
        <label for="descricaoPlano">Descrição do Produto</label>
        <input type="text" class="form-control" id="descricaoProduto" name="descricao">
      </div>
    </div>
  </div>
  
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="update" id="update" class="btn bg-gradient-success">Cadastrar</button>
      </div>
      </form> 
    </div>
</div></div>

<script>
  function abrirModal(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var data = JSON.parse(xhr.responseText);
        preencherModal(data);
      }
    };
    xhr.open('GET', '../sql/obter_dados_plano.php?id=' + id, true);
    xhr.send();
  }

  function preencherModal(data) {
    document.getElementById('nomePlano').value = data.plano;
    document.getElementById('valorPlano').value = data.valor;
    document.getElementById('descricaoPlano').value = data.descricao;
    document.getElementById('idPlano').value = data.id;
    document.getElementById('descontoPlano').value = data.desconto;
    document.getElementById('vencimentoPlano').value = data.vencimento;
    document.getElementById('cicloPlano').value = data.ciclo;

    

    var modal = new bootstrap.Modal(document.getElementById('EditModal'));
    modal.show();
  }
</script>
<script>
   function abrirprodutoModal(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var data = JSON.parse(xhr.responseText);
        preencherprodutoModal(data);
      }
    };
    xhr.open('GET', '../sql/obter_dados_produto.php?id=' + id, true);
    xhr.send();
  }

  function preencherprodutoModal(data) {
    document.getElementById('nomeProduto').value = data.plano;
    document.getElementById('valorProduto').value = data.valor;
    document.getElementById('descricaoProduto').value = data.descricao;
    document.getElementById('idProduto').value = data.id;

    var modal = new bootstrap.Modal(document.getElementById('produtoEditModal'));
    modal.show();
  }
</script>

                     
              <!--END MODAL CADASTRO-->
            </div>
</html>