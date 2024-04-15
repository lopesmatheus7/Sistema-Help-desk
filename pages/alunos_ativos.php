<?php 
      include ('../components/navdashboard.php');
      
  ?>
   
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 
    <!-- Navbar -->
    <?php include ('../sql/cards_alunos.php');
      include ('../sql/lista_de_ativos.php');  ?>
    
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
                                echo '<li class="page-item"><a class="page-link" href="alunos_ativos.php?page=' . $paginaAnterior . '">A</a></li>';
                            }

                            // Links para páginas
                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                echo '<li class="page-item ';
                                echo ($i == $paginaAtual) ? 'active' : '';
                                echo '"><a class="page-link" href="alunos_ativos.php?page=' . $i . '">' . $i . '</a></li>';
                            }

                            // Botão "Próxima"
                            if ($paginaAtual < $totalPaginas) {
                                $paginaSeguinte = $paginaAtual + 1;
                                echo '<li class="page-item"><a class="page-link" href="alunos_ativos.php?page=' . $paginaSeguinte . '">P</a></li>';
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