<?php 
      include ('../components/navdashboard.php');
    
  ?>
  

    <!-- End Navbar -->
    <?php 
      include ('../sql/cards_financeiro.php');
      
    
    ?>

      <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                <h4 id="mes-atual">Alunos em aberto</h4>
                <script>
    // JavaScript para obter o mês atual e atualizar o elemento h4
    var meses = [
        "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
    ];

    var dataAtual = new Date();
    var mesAtual = meses[dataAtual.getMonth()];

    document.getElementById("mes-atual").textContent = "Alunos em aberto - " + mesAtual;
</script>
                  <p class="text-sm mb-0">
                  
                    
                  </p>
                 
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                </div>
              </div>
            </div>
            <?php 
              include ('../sql/asaas/listarCobrancapendenteMes.php');
            ?>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <table class="table align-items-center mb-0">  
                  </tbody>
                </table>
               
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
              <!--END MODAL CADASTRO-->
            </div>
</html>