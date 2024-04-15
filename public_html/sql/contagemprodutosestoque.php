<?php // TOTAL DE USUARIOS DO SISTEMA 
    $id_conta = $_SESSION['id_conta'];

    $sql = "SELECT COUNT(*) AS total_estoque FROM estoque WHERE id_conta = $id_conta";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalEstoque = $row["total_estoque"];
    }
?>
<?php
$monitor = 'monitor';
$impressora = 'impressora';
$desktop = 'desktop';
$notebooks = 'notebook';
$totens = 'totens';
$mouse = 'mouse';
$teclado = 'teclado';
$processador = 'processador';
$placaMae = 'placa mae';
$hd = 'hdd';
$ssd = 'ssd';
$ram = 'ram';

// Consulta SQL para calcular a soma da coluna "valor_total" para monitores
$sql_monitores = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$monitor'";
$result_monitores = $conn->query($sql_monitores);

if ($result_monitores !== false && $result_monitores->num_rows > 0) {
    $row_monitores = $result_monitores->fetch_assoc();
    $soma_monitores = $row_monitores["soma"];
} else {
    $soma_monitores = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para impressoras
$sql_impressoras = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$impressora'";
$result_impressoras = $conn->query($sql_impressoras);

if ($result_impressoras !== false && $result_impressoras->num_rows > 0) {
    $row_impressoras = $result_impressoras->fetch_assoc();
    $soma_impressoras = $row_impressoras["soma"];
} else {
    $soma_impressoras = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para desktops
$sql_desktop = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$desktop'";
$result_desktop = $conn->query($sql_desktop);

if ($result_desktop !== false && $result_desktop->num_rows > 0) {
    $row_desktop = $result_desktop->fetch_assoc();
    $soma_desktop = $row_desktop["soma"];
} else {
    $soma_desktop = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para notebooks
$sql_notebooks = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$notebooks'";
$result_notebooks = $conn->query($sql_notebooks);

if ($result_notebooks !== false && $result_notebooks->num_rows > 0) {
    $row_notebooks = $result_notebooks->fetch_assoc();
    $soma_notebooks = $row_notebooks["soma"];
} else {
    $soma_notebooks = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para totens
$sql_totens = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$totens'";
$result_totens = $conn->query($sql_totens);

if ($result_totens !== false && $result_totens->num_rows > 0) {
    $row_totens = $result_totens->fetch_assoc();
    $soma_totens = $row_totens["soma"];
} else {
    $soma_totens = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para mouse
$sql_mouse = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$mouse'";
$result_mouse = $conn->query($sql_mouse);

if ($result_mouse !== false && $result_mouse->num_rows > 0) {
    $row_mouse = $result_mouse->fetch_assoc();
    $soma_mouse = $row_mouse["soma"];
} else {
    $soma_mouse = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para teclado
$sql_teclado = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$teclado'";
$result_teclado = $conn->query($sql_teclado);

if ($result_teclado !== false && $result_teclado->num_rows > 0) {
    $row_teclado = $result_teclado->fetch_assoc();
    $soma_teclado = $row_teclado["soma"];
} else {
    $soma_teclado = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para processador
$sql_processador = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$processador'";
$result_processador = $conn->query($sql_processador);

if ($result_processador !== false && $result_processador->num_rows > 0) {
    $row_processador = $result_processador->fetch_assoc();
    $soma_processador = $row_processador["soma"];
} else {
    $soma_processador = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para placa mãe
$sql_placaMae = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$placaMae'";
$result_placaMae = $conn->query($sql_placaMae);

if ($result_placaMae !== false && $result_placaMae->num_rows > 0) {
    $row_placaMae = $result_placaMae->fetch_assoc();
    $soma_placaMae = $row_placaMae["soma"];
} else {
    $soma_placaMae = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para hd
$sql_hd = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$hd'";
$result_hd = $conn->query($sql_hd);

if ($result_hd !== false && $result_hd->num_rows > 0) {
    $row_hd = $result_hd->fetch_assoc();
    $soma_hd = $row_hd["soma"];
} else {
    $soma_hd = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para ssd
$sql_ssd = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$ssd'";
$result_ssd = $conn->query($sql_ssd);

if ($result_ssd !== false && $result_ssd->num_rows > 0) {
    $row_ssd = $result_ssd->fetch_assoc();
    $soma_ssd = $row_ssd["soma"];
} else {
    $soma_ssd = 0; // Defina um valor padrão ou maneje o erro de outra forma
}

// Consulta SQL para calcular a soma da coluna "valor_total" para ram
$sql_ram = "SELECT COUNT(*) AS soma FROM estoque WHERE id_conta = $id_conta AND produto = '$ram'";
$result_ram = $conn->query($sql_ram);

if ($result_ram !== false && $result_ram->num_rows > 0) {
    $row_ram = $result_ram->fetch_assoc();
    $soma_ram = $row_ram["soma"];
} else {
    $soma_ram = 0; // Defina um valor padrão ou maneje o erro de outra forma
}
?>
