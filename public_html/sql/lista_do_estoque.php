<body>
    
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          
          <div class="card mb-4">
         
            <div class="card-header pb-0">
                    <div class="table-responsive">    
                    <button class="btn bg-gradient-info w-100 w-md-40 mt-4 mb-5 btn-lg btn-xs btn-block" data-bs-toggle="modal" data-bs-target="#CadastroModal">Cadastrar Produto</button>
                    <div class="row">
        <div class="col">
            
            <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
        </div>
        
        <div class="col">
            <button onclick="searchData()" class="btn btn-warning">Pesquisar</button>
        </div>
    </div>
                 
<script>
    function searchData() {
        var search = document.getElementById('pesquisar').value;
        window.location = 'gestao_estoque.php?search=' + search;
    }
</script>
<?php
$id_conta = $_SESSION['id_conta'];
// Defina a página atual
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
$paginaAtual = $_GET['page'];
} else {
$paginaAtual = 1;
}

// Defina o número de registros por página
$registrosPorPagina = 5;

// Calcule o valor de $offset com base na página atual
$offset = ($paginaAtual - 1) * $registrosPorPagina;

// Construa a consulta de contagem de registros
$sqlCount = "SELECT COUNT(*) as total FROM estoque WHERE id_conta = $id_conta";
$countResult = $conn->query($sqlCount);
$row = mysqli_fetch_assoc($countResult);
$totalRegistros = $row['total'];

if (!empty($_GET['search'])) {
    $data = '%' . $_GET['search'] . '%';
    $sql = "SELECT id, produto, marca, modelo, n_serie, patrimonio, created FROM estoque WHERE id_conta = ? AND (id LIKE ? OR produto LIKE ? OR marca LIKE ? OR modelo LIKE ? OR n_serie LIKE ? OR patrimonio LIKE ? OR created LIKE ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $id_conta, $data, $data, $data, $data, $data, $data, $data);
} else {
    $sql = "SELECT id, produto, marca, modelo, n_serie, patrimonio, created FROM estoque WHERE id_conta = ? ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_conta, $registrosPorPagina, $offset);
}


$stmt->execute();
$result = $stmt->get_result();

// Calcula o número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Agora você pode iterar pelos resultados e exibir a paginação
?>

<?php
                        if ($totalRegistros > 0) {
                            echo '<h3>Lista de produtos cadastrados</h3>';
                            echo '<table class="table align-items-center mb-0"">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produto</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Marca</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modelo</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nº série</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patrimônio</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cadastrado em</th>';
                            echo '<th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>' ;
                            
                            
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                        

                            
                            while ($cadastro_data = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $cadastro_data['id'] . '</td>';
                                echo '<td class="mb-0 text-sm">' . $cadastro_data['produto'] . '</td>';
                                echo '<td class="text-xs font-weight-bold mb-0">' . $cadastro_data['marca'] . '</td>';
                                echo '<td class="text-xs font-weight-bold mb-0">' . $cadastro_data['modelo'] . '</td>';
                                echo '<td class="text-xs font-weight-bold mb-0">' . $cadastro_data['n_serie'] . '</td>';
                                echo '<td class="text-xs font-weight-bold mb-0">' . $cadastro_data['patrimonio'] . '</td>';
                                echo '<td class="text-xs font-weight-bold mb-0">' . date('d/m/Y', strtotime($cadastro_data['created'])) . '</td>';
                                echo "<td>
                                <a class='btn btn-warning' href='dashbord_gerador_termo.php?id=$cadastro_data[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                    </svg>
                              </a>
                                <a class='btn btn-primary' href='dashbord_editar_estoque.php?id=$cadastro_data[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                    </svg>
                              </a>
                            
                              <a class='btn btn-danger' href='../sql/excluir_estoque.php?id=$cadastro_data[id]' onclick='return confirm(\"Tem certeza de que deseja excluir este registro?\")'>Excluir
 
</a>
                                    
                            </td>"; 
                              
                                
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                            
                            // Paginação
                            echo '<div class="container">';
                            echo '<ul class="pagination">';
                            
                            // Botão "Anterior"
                            if ($paginaAtual > 1) {
                                $paginaAnterior = $paginaAtual - 1;
                                echo '<li class="page-item"><a class="page-link" href="gestao_estoque.php?page=' . $paginaAnterior . '">Anterior</a></li>';
                            }
                            
                            // Links para páginas
                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                echo '<li class="page-item ';
                                echo ($i == $paginaAtual) ? 'active' : '';
                                echo '"><a class="page-link" href="gestao_estoque.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                            
                            // Botão "Próxima"
                            if ($paginaAtual < $totalPaginas) {
                                $paginaSeguinte = $paginaAtual + 1;
                                echo '<li class="page-item"><a class="page-link" href="gestao_estoque.php?page=' . $paginaSeguinte . '">Próxima</a></li>';
                            }
                            
                            echo '</ul>';
                            echo '</div>';
                        } else {
                            echo '<p>Nenhum registro encontrado para este usuário.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
         
            
            
            
    <script>
var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
if (event.key === "Enter") {
    searchData();
}
});

function searchData() {
var searchValue = search.value;
window.location = 'gestao_estoque.php?search=' + searchValue;
}
</script>