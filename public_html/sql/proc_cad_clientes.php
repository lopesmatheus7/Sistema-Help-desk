<?php
include_once("../acesso/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $id_conta = filter_input(INPUT_POST, 'id_conta');
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];
    $endereco = $_POST["endereco"];
    $senha = $_POST["senha"]; // Supondo que o campo de senha se chama "senha"

    // Gere o hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    if (isset($_FILES['img_id'])) {
        $upload_dir = '../uploads/'; // Diretório onde você deseja salvar as imagens
        $file_extension = pathinfo($_FILES['img_id']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo
        $unique_filename = uniqid() . '.' . $file_extension; // Gere um nome de arquivo único
    
        $upload_file = $upload_dir . $unique_filename; // Caminho completo do arquivo
    
        if (move_uploaded_file($_FILES['img_id']['tmp_name'], $upload_file)) {
            // A imagem foi enviada com sucesso, agora você pode armazenar o nome do arquivo no banco de dados
            $img_nome = $unique_filename;
        }}


    $result_clientes = "INSERT INTO clientes (img_id ,nome, id_conta, email, tipo, endereco, senha, created) VALUES ('$img_nome','$nome', '$id_conta', '$email', '$tipo','$endereco', '$senhaHash', NOW())";
    $resultado_clientes = mysqli_query($conn, $result_clientes);

    if (mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: ../pages/gestao_clientes.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: ../pages/error404.php");
    }
}
?>
