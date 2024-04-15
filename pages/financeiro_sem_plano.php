<?php 
      include ('../components/navdashboard.php');
      
  ?>
   
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 
    <!-- Navbar --><?php
$id_conta = $_SESSION['id_conta'];

$sqlCount = "SELECT COUNT(*) as total FROM usuarios WHERE id_conta = ? AND status = 'ativo' AND assinatura IS NULL ORDER BY id DESC";
$stmtCount = $conn->prepare($sqlCount);
$stmtCount->bind_param("i", $id_conta);
$stmtCount->execute();
$countResult = $stmtCount->get_result();
$row = mysqli_fetch_assoc($countResult);
$totalRegistros = $row['total'];

$registrosPorPagina = 50; // Número de registros por página

// Obtenha o número da página a partir do parâmetro "page" na URL
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $paginaAtual = $_GET['page'];
} else {
    $paginaAtual = 1;
}

// Calcula o número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Calcule o deslocamento (offset) com base na página atual
$offset = ($paginaAtual - 1) * $registrosPorPagina;

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT id, nome, email, nascimento, cpf, assinatura, img_id FROM usuarios WHERE id_conta = ? AND tipo = 2 AND assinatura IS NULL AND (id LIKE ? OR nome LIKE ? OR email LIKE ?) ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%$data%";
    $stmt->bind_param("isssii", $id_conta, $searchParam, $searchParam, $searchParam, $registrosPorPagina, $offset);
} else {
    $sql = "SELECT id, nome, email, nascimento, cpf, assinatura, img_id FROM usuarios WHERE id_conta = ? AND tipo = 2 AND assinatura IS NULL ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_conta, $registrosPorPagina, $offset);
}

$stmt->execute();
$result = $stmt->get_result();
?>
<div class="container-fluid py-4">
    
      <div class="row">
        <div class="col-12">
          
          <div class="card mb-4">
         
            <div class="card-header pb-0">

           
            <h5>ALUNOS SEM PLANO DE BOLETOS</h5>
                    <div class="row">
                       
        <div class="col">
            
            <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
        </div>
        
        <div class="col">
            <button onclick="searchData()" class="btn btn-warning">Pesquisar</button>
        </div>

 <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'financeiro_sem_plano.php?search=' + search.value;
    }
</script>  ?>
    
        <div class="modal fade" id="CadastroModal" tabindex="-1" role="dialog" aria-labelledby="CadastroModalLabel" aria-hidden="true">
             
            </div>
    </div>
            </div>
            
<div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matrícula</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Nascimento</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CPF</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query_usuarios = "SELECT * FROM usuarios  ORDER BY id DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();
    
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
      echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['email']}</td>";
      echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['cpf']}</td>";
    echo "<td><a class='btn bg-gradient-warning' href='profile.php?id={$user_data['id']}'>Painel do aluno</a></td>";     
    echo "<td><a class='btn btn-danger btn-sm' href='../sql/excluir_tecnicos.php?id={$user_data['id']}' onclick='return confirm(\"Tem certeza de que deseja excluir este registro?\")'>Excluir</a></td>";
    echo "</tr>";
    }
    ?>
                  </tbody>
                 <img src="/uploads/" alt="">
                </table>
                
                <div class="container">
                        <ul class="pagination">
                            <?php
                            // Botão "Anterior"
                            if ($paginaAtual > 1) {
                                $paginaAnterior = $paginaAtual - 1;
                                echo '<li class="page-item"><a class="page-link" href="financeiro_sem_plano.php?page=' . $paginaAnterior . '">A</a></li>';
                            }

                            // Links para páginas
                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                echo '<li class="page-item ';
                                echo ($i == $paginaAtual) ? 'active' : '';
                                echo '"><a class="page-link" href="financeiro_sem_plano.php?page=' . $i . '">' . $i . '</a></li>';
                            }

                            // Botão "Próxima"
                            if ($paginaAtual < $totalPaginas) {
                                $paginaSeguinte = $paginaAtual + 1;
                                echo '<li class="page-item"><a class="page-link" href="financeiro_sem_plano.php?page=' . $paginaSeguinte . '">P</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php 
        include ('../components/footer.php')
      ?>
    </div>
  </main>
  


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Função para preencher automaticamente os campos do formulário
    function preencherFormulario(usuario) {
        $("#edit_user_id").val(usuario.id); // Define o valor do input hidden para o ID do usuário
        $("#name").val(usuario.nome);
        $("#email").val(usuario.email);
        // Supondo que img_id seja um input do tipo file, você não pode definir seu valor programaticamente por razões de segurança.
        // Se desejar exibir a imagem, considere atualizar a origem da imagem em vez disso.
        // $("#img_id").val(usuario.img_id);
        $("#tipo").val(usuario.tipo);
        $("#data_nascimento").val(usuario.data_nascimento);
        $("#cpf").val(usuario.cpf);
        // Preencha outros campos conforme necessário
    }

    document.addEventListener('DOMContentLoaded', function () {
        var editarModal = new bootstrap.Modal(document.getElementById('EditarModal'));

        // Event listener para o botão de Edição
        document.querySelectorAll('.editar-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                // Obtém o ID do usuário do atributo data
                var userId = this.getAttribute('data-user-id');

                // Verifica se $user_data está definido e contém dados do usuário
                <?php if (isset($user_data) && is_array($user_data)): ?>
                    // Filtra o array $user_data para obter os dados do usuário com o ID correspondente
                    var usuario = <?php echo json_encode(array_filter($user_data, function ($user) use ($userId) {
                        return $user['id'] == $userId;
                    })); ?>;

                    // Verifica se há dados do usuário antes de abrir o modal
                    if (usuario.length > 0) {
                        // Chama a função para preencher o formulário e, em seguida, abre o modal
                        preencherFormulario(usuario[0]);
                        editarModal.show();
                    }
                <?php endif; ?>
            });
        });
    });
</script>
<script>
$(document).ready(function() {
    $('#exampleModal').on('show.bs.modal', function (event) {
        $.ajax({
            url: "get_turmas.php", // substitua por seu arquivo PHP que retorna os dados da turma
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#turmaSelect').empty();
                $('#turmaSelect').append('<option value="">SELECIONE A TURMA</option>');
                $.each(data, function(key, value) {
                    $('#turmaSelect').append('<option value="' + value.id + '">' + value.nome + '</option>');
                });
            }
        });
    });
});





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