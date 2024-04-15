<?php
$usuario_id = $_SESSION['id'];
$id_conta = $_SESSION['id_conta'];
// Defina $kolke com o valor da empresa "kolke"
// Defina $kolke com o valor da empresa "kolke"
$kolke = "kolke";

$sqlCountClientes = "SELECT COUNT(*) as totalClientes FROM clientes WHERE id_conta = $id_conta";
$countResultClientes = $conn->query($sqlCountClientes);
$rowClientes = mysqli_fetch_assoc($countResultClientes);
$totalClientes = $rowClientes['totalClientes'];

?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total de clientes</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $totalClientes?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        