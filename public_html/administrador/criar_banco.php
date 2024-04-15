<?php session_start();
    include_once ('../acesso/hercules.php');
    if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 100) {
        header("Location: error404.php");
        exit();
    }

    $nomeUsuario = $_SESSION['nome'];

?>
<?php
// Recupera o nome do banco de dados do formulário
$nomeBanco = $_POST['nomeBanco'];

    $server = "localhost";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($server, $usuario, $senha);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    // Cria ou seleciona o banco de dados
    $sqlCriarBanco = "CREATE DATABASE IF NOT EXISTS $nomeBanco";
    if ($conn->query($sqlCriarBanco) === TRUE) {
        echo "Banco de dados criado ou selecionado com sucesso.<br>";
    } else {
        echo "Erro ao criar ou selecionar o banco de dados: " . $conn->error;
        exit();
    }
    
    // Seleciona o banco de dados
    $conn->select_db($nomeBanco);
    
    // Executa os comandos SQL para criar as tabelas
    $sqlCriarTabelas = "
        -- Estrutura para tabela `cadastro_combustivel`
        CREATE TABLE `cadastro_combustivel` (
          `id` int(100) NOT NULL AUTO_INCREMENT,
          `dia` date NOT NULL,
          `usuario_nome` varchar(200) NOT NULL,
          `fornecedor` varchar(200) NOT NULL,
          `usuario_id` int(200) NOT NULL,
          `empresa` varchar(30) NOT NULL,
          `projeto` varchar(200) NOT NULL,
          `finalidade` varchar(200) NOT NULL,
          `produto` varchar(40) NOT NULL,
          `quantidade` float NOT NULL,
          `valor_unitario` float NOT NULL,
          `valor_total` float NOT NULL,
          `n_nota` int(20) NOT NULL,
          `arquivo` varchar(200) NOT NULL,
          `created` datetime(6) NOT NULL,
          `modified` datetime(6) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
        -- Estrutura para tabela `chamados`
        CREATE TABLE `chamados` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `unidade` varchar(200) NOT NULL,
          `titulo` varchar(255) DEFAULT NULL,
          `descricao` text DEFAULT NULL,
          `usuario_id` int(200) NOT NULL,
          `status` enum('Aberto','Fechado') DEFAULT 'Aberto',
          `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
          `modificado` datetime(6) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
        -- Estrutura para tabela `clientes`
        CREATE TABLE `clientes` (
          `id` int(255) NOT NULL AUTO_INCREMENT,
          `nome` varchar(200) NOT NULL,
          `img_id` varchar(200) NOT NULL,
          `email` varchar(200) NOT NULL,
          `endereco` varchar(300) NOT NULL,
          `senha` varchar(100) NOT NULL,
          `tipo` int(11) NOT NULL,
          `created` date NOT NULL,
          `solicitante` varchar(200) NOT NULL,
          `modified` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
        -- Estrutura para tabela `estoque`
        CREATE TABLE `estoque` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `produto` varchar(30) NOT NULL,
          `marca` varchar(50) NOT NULL,
          `modelo` varchar(200) NOT NULL,
          `n_serie` varchar(100) NOT NULL,
          `patrimonio` int(30) NOT NULL,
          `created` date NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
        -- Estrutura para tabela `usuarios`
        CREATE TABLE `usuarios` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `img_id` varchar(200) NOT NULL,
          `nome` varchar(220) NOT NULL,
          `email` varchar(220) NOT NULL,
          `cpf` varchar(200) NOT NULL,
          `senha` varchar(100) NOT NULL,
          `created` datetime NOT NULL,
          `modified` datetime DEFAULT NULL,
          `tipo` int(10) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
    
        -- Dados para a tabela `usuarios`
        INSERT INTO `usuarios` (`id`, `img_id`, `nome`, `email`, `cpf`, `senha`, `created`, `modified`, `tipo`) VALUES
        (22, '65498cae0f964.jpeg', 'Admin', 'admin@admin', '000000', '$2y$10$51muHB.AZYl20Jdia5dxY.A9J14geKKYTqnvH.92HHnUAcconlZPq', '2023-10-20 20:12:56', '2023-11-05 15:51:15', 0);
    ";
    
    if ($conn->multi_query($sqlCriarTabelas)) {
        echo "Tabelas criadas com sucesso.<br>";
    } else {
        echo "Erro ao criar tabelas: " . $conn->error;
    }
    
    // Fecha a conexão
    $conn->close();
    ?>