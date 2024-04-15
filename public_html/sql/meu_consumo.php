<?php
$id_conta = $_SESSION['id_conta'];
// Verifique se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Verifique se o parâmetro usuario_id está presente na URL
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Verifique se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Verifique se o parâmetro "id" está presente na URL e é um número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuario_id = $_GET['id'];
} else {
    // Redirecione ou exiba uma mensagem de erro, se necessário
    header("Location: erro.php");
    exit();
}
$registrosPorPagina = 5; // Número de registros por página

// Obtenha o número da página a partir do parâmetro "page" na URL
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $paginaAtual = $_GET['page'];
} else {
    $paginaAtual = 1;
}

// Consulta para contar o número total de registros para o usuário da sessão
$sqlCount = "SELECT COUNT(*) as total FROM cadastro_combustivel WHERE id_conta = $id_conta AND usuario_id = $usuario_id";
$countResult = $conn->query($sqlCount);
$row = mysqli_fetch_assoc($countResult);
$totalRegistros = $row['total'];

// Calcula o número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Calcule o deslocamento (offset) com base na página atual
$offset = ($paginaAtual - 1) * $registrosPorPagina;

// Consulta SQL para obter os registros do usuário
$sql = "SELECT * FROM cadastro_combustivel WHERE id_conta = $id_conta AND usuario_id = $usuario_id ORDER BY id DESC LIMIT $registrosPorPagina OFFSET $offset";
$result = $conn->query($sql);
?>



