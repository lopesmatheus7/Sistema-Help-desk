<?php //// TOTAL DE USUARIOS DO SISTEMA 
$usuario_id = $_SESSION['id'];
$id_conta = $_SESSION['id_conta'];

    $sql = "SELECT COUNT(*) AS total_chamados FROM chamados WHERE usuario_id = $usuario_id AND status = 'ABERTO'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalChamadosAbertosId = $row["total_chamados"];
        //echo "Total de chamados ABERTO associados ao usuário com ID $usuario_id: $totalChamadosAbertos";
    } else {
        echo "Nenhum chamado ABERTO encontrado para o usuário com ID $usuario_id.";
    }

    $sqlCount = "SELECT COUNT(*) as total FROM chamados WHERE id_conta = $id_conta AND status = 'ABERTO'";
    $countResult = $conn->query($sqlCount); 
    $row = mysqli_fetch_assoc($countResult);
    $totalChamadosAbertos = $row['total'];

    $sqlCount = "SELECT COUNT(*) as total FROM chamados WHERE id_conta = $id_conta AND status = 'FECHADO'";
    $countResult = $conn->query($sqlCount); 
    $row = mysqli_fetch_assoc($countResult);
    $totalChamadosFechados = $row['total'];

?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Chamados abertos</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $totalChamadosAbertos ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-user" style="color: #f5f5f5;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Chamados fechados</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php  echo $totalChamadosFechados; ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                  <i class="fa fa-credit-card"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
   

