<?php 
      include ('../components/navdashboard.php');
      
  ?>
   
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 
    <!-- Navbar -->
    <?php include ('../sql/cards_consumo_id.php');
      include ('../sql/lista_de_tecnicos.php');  ?>
    
        <div class="modal fade" id="CadastroModal" tabindex="-1" role="dialog" aria-labelledby="CadastroModalLabel" aria-hidden="true">
              <?php 
                include '../modals/cadastro_tecnico.php';
              ?>
            </div>
    </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <h6>Lista de técnicos</h6>
                
               
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matrícula</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nome</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CPF</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

$query_usuarios = "SELECT * FROM usuarios ORDER BY id DESC";
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
  echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['email']}</td>";
  echo "<td class='text-xs font-weight-bold mb-0'>{$user_data['cpf']}</td>";
  echo "<td class='text-xs font-weight-bold mb-0'>
  <button class='btn btn bg-gradient-info editar-btn' data-bs-toggle='modal' data-bs-target='#EditarModal' data-user-id='{$user_data['id']}'>
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
          <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
      </svg>
  </button>
</td>";
echo "<td><a class='btn bg-gradient-warning' href='profile.php?id={$user_data['id']}'>Visualizar</a></td>";     
echo "<td><a class='btn btn-danger' href='../sql/excluir_tecnicos.php?id={$user_data['id']}' onclick='return confirm(\"Tem certeza de que deseja excluir este registro?\")'>Excluir</a></td>";                                     
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
                                echo '<li class="page-item"><a class="page-link" href="gestao_tecnicos.php?page=' . $paginaAnterior . '">A</a></li>';
                            }

                            // Links para páginas
                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                echo '<li class="page-item ';
                                echo ($i == $paginaAtual) ? 'active' : '';
                                echo '"><a class="page-link" href="gestao_tecnicos.php?page=' . $i . '">' . $i . '</a></li>';
                            }

                            // Botão "Próxima"
                            if ($paginaAtual < $totalPaginas) {
                                $paginaSeguinte = $paginaAtual + 1;
                                echo '<li class="page-item"><a class="page-link" href="gestao_tecnicos.php?page=' . $paginaSeguinte . '">P</a></li>';
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
  

  <div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar técnico <?php echo isset($id_usuario) ? "ID do Usuário: " . $id_usuario : ''; ?></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../sql/proc_edit_usuario.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit_user_id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome completo</label>
                                <input type="text" class="form-control" id="name" name="nome" placeholder="Nome completo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img_id">Foto de perfil</label>
                                <input type="file" class="form-control" name="img_id" id="img_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select class="form-select" id="tipo" name="tipo">
                                    <option value="">SELECIONE</option>
                                    <option value="0">Administrador</option>
                                    <option value="2">Técnico</option>
                                    <option value="3">Estoquista</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="senha">Digite sua senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" name="update" id="update" class="btn bg-gradient-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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


  <!--   Core JS Files   -->


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