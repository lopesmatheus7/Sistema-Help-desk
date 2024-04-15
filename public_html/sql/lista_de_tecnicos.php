<?php 
$id_conta = $_SESSION['id_conta'];

$sqlCount = "SELECT COUNT(*) as total FROM usuarios WHERE id_conta = ?";
$stmtCount = $conn->prepare($sqlCount);
$stmtCount->bind_param("i", $id_conta);
$stmtCount->execute();
$countResult = $stmtCount->get_result();
$row = mysqli_fetch_assoc($countResult);
$totalRegistros = $row['total'];

$registrosPorPagina = 5; // Número de registros por página

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
    $sql = "SELECT id, nome, email, cpf, img_id FROM usuarios WHERE id_conta = ? AND (id LIKE ? OR nome LIKE ? OR email LIKE ?) ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%$data%";
    $stmt->bind_param("isssii", $id_conta, $searchParam, $searchParam, $searchParam, $registrosPorPagina, $offset);
} else {
    $sql = "SELECT id, nome, email, cpf, img_id FROM usuarios WHERE id_conta = ? ORDER BY id DESC LIMIT ? OFFSET ?";
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
   
                    <button class="btn bg-gradient-info w-100 w-md-40 mt-4 mb-5 btn-lg btn-xs btn-block" data-bs-toggle="modal" data-bs-target="#CadastroModal">Cadastrar Técnico</button>
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
        window.location = 'gestao_tecnicos.php?search=' + search.value;
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    document.getElementById('generate-pdf').addEventListener('click', function () {
        var table = document.getElementById('table');
        var pdf = new jsPDF();
        
        pdf.autoTable({ html: '#table' });
        
        // Salva o PDF ou exibe no navegador
        pdf.save('tabela.pdf');
    });
</script>
