<?php 
    session_start();
    include_once ("../acesso/conexao.php");


    $produto = filter_input (INPUT_POST, 'produto');
    $marca = filter_input (INPUT_POST, 'marca');
    $modelo = filter_input (INPUT_POST, 'modelo');
    $n_serie = filter_input (INPUT_POST, 'n_serie');
    $patrimonio = filter_input (INPUT_POST, 'patrimonio');
    $id_conta = filter_input(INPUT_POST, 'id_conta');
    

    $result_estoque = "INSERT INTO `estoque`(`produto`, `marca`, `modelo`, `n_serie`, `patrimonio`, `id_conta`, `created`) VALUES ('$produto','$marca','$modelo','$n_serie','$patrimonio', '$id_conta', NOW())";

    $resultado_estoque = mysqli_query($conn, $result_estoque);

    if(mysqli_insert_id($conn)){
        $_SESSION['msg_estoque'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
        header("Location: ../pages/gestao_estoque.php");
    }else{
        $_SESSION['msg_estoque'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: cadastro.php");
    }
    ?>;

?>

