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


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuario_id = $_GET['id'];

    // Consulta SQL para obter os dados do usuário
    $sqlUsuario = "SELECT * FROM usuarios WHERE id_conta = $id_conta AND id = $usuario_id";
    $resultUsuario = $conn->query($sqlUsuario);

    // Verifique se a consulta foi bem-sucedida
    if ($resultUsuario) {
        // Obtenha os dados do usuário
        $dadosUsuario = $resultUsuario->fetch_assoc();

        // Exiba o nome do usuário
       // echo $dadosUsuario['nome'];
    } else {
        // Exiba uma mensagem de erro ou redirecione, se necessário
        echo "Erro ao buscar dados do usuário";
    }
} else {
    // Redirecione ou exiba uma mensagem de erro, se necessário
    header("Location: erro.php");
    exit();
}

$sqlNomeUsuario = "SELECT nome FROM usuarios WHERE id_conta = $id_conta AND id = $usuario_id"; // Substitua 'tabela_de_usuarios' pelo nome da tabela de usuários no seu banco de dados
    $resultNomeUsuario = $conn->query($sqlNomeUsuario);
    $nomeUsuario = "";
    if ($resultNomeUsuario && $resultNomeUsuario->num_rows > 0) {
        $rowNomeUsuario = $resultNomeUsuario->fetch_assoc();
        $nomeUsuario = $rowNomeUsuario['nome'];
    }

    
?>

