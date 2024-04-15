<?php
session_start();

// Inclua o arquivo de conexão com o banco de dados
include_once("../acesso/conexao.php");

$dia = filter_input(INPUT_POST, 'dia');
$usuario_id = filter_input(INPUT_POST, 'usuario_id');
$id_conta = filter_input(INPUT_POST, 'id_conta');
$usuario_nome = filter_input(INPUT_POST, 'usuario_nome');
$fornecedor = filter_input(INPUT_POST, 'fornecedor');
$empresa = filter_input(INPUT_POST, 'empresa');
$projeto = filter_input(INPUT_POST, 'projeto');
$finalidade = filter_input(INPUT_POST, 'finalidade');
$produto = filter_input(INPUT_POST, 'produto');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$valor_unitario = filter_input(INPUT_POST, 'valor_unitario');
$valor_total = filter_input(INPUT_POST, 'valor_total');
$n_nota = filter_input(INPUT_POST, 'n_nota');

// Verifica se foi feito upload de uma imagem
if (isset($_FILES['arquivo'])) {
    $upload_dir = '../uploads/'; // Diretório onde você deseja salvar as imagens
    $file_extension = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo
    $unique_filename = uniqid() . '.' . $file_extension; // Gere um nome de arquivo único

    $upload_file = $upload_dir . $unique_filename; // Caminho completo do arquivo

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload_file)) {
        // A imagem foi enviada com sucesso, agora você pode armazenar o nome do arquivo no banco de dados
        $arquivo_nome = $unique_filename;

        // Inserir no banco de dados, incluindo a coluna "arquivo"
        $result_combustivel = "INSERT INTO cadastro_combustivel (dia, usuario_id, id_conta, usuario_nome, fornecedor, empresa, projeto, finalidade, produto, quantidade, valor_unitario, valor_total, n_nota, arquivo, created) VALUES ('$dia', '$usuario_id', '$id_conta', '$usuario_nome','$fornecedor', '$empresa', '$projeto', '$finalidade', '$produto', '$quantidade', '$valor_unitario', '$valor_total', '$n_nota', '$arquivo_nome', NOW())";

        $resultado_combustivel = mysqli_query($conn, $result_combustivel);

        if ($resultado_combustivel) {
            $_SESSION['msg_pro'] = "<p style='color:green;'>Combustível cadastrado com sucesso</p>";
            header("Location: ../pages/profile_usuario.php?id={$_SESSION['id']}");
        } else {
            $_SESSION['msg_pro'] = "<p style='color:red;'>Erro na inserção de dados: " . mysqli_error($conn) . "</p>";
            header("Location: cad_combustivel.php");
        }
    } else {
        // O upload falhou
        $_SESSION['msg_pro'] = "<p style='color:red;'>Falha no upload do arquivo.</p>";
        header("Location: cad_combustivel.php");
    }
} else {
    // Trate a situação em que nenhum arquivo foi enviado
    $_SESSION['msg_pro'] = "<p style='color:red;'>Nenhum arquivo enviado.</p>";
    header("Location: cad_combustivel.php");
}
?>