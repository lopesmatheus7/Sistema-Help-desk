<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["imagem"])) {
    $diretorioDestino = "uploads/";
    $caminhoArquivo = $diretorioDestino . basename($_FILES["imagem"]["name"]);

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoArquivo)) {
        echo json_encode(["sucesso" => true, "mensagem" => "Imagem enviada com sucesso"]);
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Erro ao enviar a imagem"]);
    }
} else {
    echo json_encode(["sucesso" => false, "mensagem" => "Nenhuma imagem foi enviada"]);
}
?>


