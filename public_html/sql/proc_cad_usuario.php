<?php
session_start();
include_once("../acesso/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $tipo = mysqli_real_escape_string($conn, $_POST["tipo"]);
    $cpf = mysqli_real_escape_string($conn, $_POST["cpf"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);
    $id_conta = mysqli_real_escape_string($conn, $_POST["id_conta"]);
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    if (isset($_FILES['img_id'])) {
        $upload_dir = '../uploads/';
        $file_extension = pathinfo($_FILES['img_id']['name'], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . '.' . $file_extension;
        $upload_file = $upload_dir . $unique_filename;

        if (move_uploaded_file($_FILES['img_id']['tmp_name'], $upload_file)) {
            $img_nome = $unique_filename;
        }
    }

    $result_usuario = "INSERT INTO usuarios (img_id, nome, email, tipo, cpf, senha, id_conta, created) VALUES ('$img_nome', '$nome', '$email', '$tipo','$cpf', '$senhaHash', '$id_conta' , NOW())";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if ($resultado_usuario) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: ../pages/gestao_tecnicos.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro no cadastro: " . mysqli_error($conn) . "</p>";
        header("Location: cadastro.php");
    }
}
?>
