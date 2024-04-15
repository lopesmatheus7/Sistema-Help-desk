-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 15/04/2024 às 22:12
-- Versão do servidor: 10.5.20-MariaDB
-- Versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id21451654_alutech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_combustivel`
--

CREATE TABLE `cadastro_combustivel` (
  `id` int(100) NOT NULL,
  `id_conta` int(11) NOT NULL,
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
  `modified` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_combustivel`
--

INSERT INTO `cadastro_combustivel` (`id`, `id_conta`, `dia`, `usuario_nome`, `fornecedor`, `usuario_id`, `empresa`, `projeto`, `finalidade`, `produto`, `quantidade`, `valor_unitario`, `valor_total`, `n_nota`, `arquivo`, `created`, `modified`) VALUES
(192, 2, '2023-11-14', 'Carlos Augusto', 'Auto Pòsto miguel', 65, 'Alutech', 'miguel pereira', 'atendimento', '', 12, 12, 144, 1651651, '6563cb049e4d5.jpg', '2023-11-26 19:47:32.000000', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `unidade` varchar(200) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `usuario_id` int(200) NOT NULL,
  `status` enum('Aberto','Fechado') DEFAULT 'Aberto',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `modificado` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `id_conta`, `unidade`, `titulo`, `descricao`, `usuario_id`, `status`, `data_criacao`, `modificado`) VALUES
(91, 0, '', 'Computador não liga', '', 22, 'Fechado', '2023-10-29 00:56:01', '2023-11-09 01:09:46.000000'),
(92, 0, '', '', '', 22, 'Fechado', '2023-10-29 00:56:37', '2023-11-09 01:09:47.000000'),
(93, 0, '', '', '', 29, 'Fechado', '2023-10-29 00:56:38', '2023-11-06 03:26:17.000000'),
(94, 0, '', 'Computador não liga', '', 31, 'Fechado', '2023-10-29 21:44:44', '2023-11-14 02:29:17.000000'),
(95, 0, '', 'estabilizador ruim', 'Estabilizador setor comercial não liga', 22, 'Fechado', '2023-11-02 19:02:44', '2023-11-14 01:37:42.000000'),
(96, 0, '', 'estabilizador ruim', 'ugjuyg', 35, 'Fechado', '2023-11-03 20:31:06', '2023-11-14 01:37:45.000000'),
(97, 0, '', 'monitor não liga', '', 37, 'Fechado', '2023-11-04 19:20:44', '2023-11-14 01:37:49.000000'),
(98, 0, '', 'estabilizador ruim', '', 38, 'Fechado', '2023-11-04 19:20:50', '2023-11-14 01:37:50.000000'),
(99, 0, '', 'Computador não liga', '', 39, 'Fechado', '2023-11-04 19:36:42', '2023-11-14 01:37:52.000000'),
(100, 0, '', 'estabilizador ruim', '', 36, 'Fechado', '2023-11-04 19:46:45', '2023-11-14 01:37:54.000000'),
(101, 0, '', 'Computador diplona não liga', 'computador apresenta problemas', 22, 'Fechado', '2023-11-05 17:42:33', '2023-11-15 14:59:37.000000'),
(102, 0, '', 'Computador não liga', '', 22, 'Fechado', '2023-11-05 18:56:59', '2023-11-15 14:59:39.000000'),
(103, 0, '', 'Computador não liga', 'Computador 201 não liga', 22, 'Fechado', '2023-11-06 10:17:51', '2023-11-15 14:59:41.000000'),
(104, 0, '', 'estabilizador ruim', '', 22, 'Fechado', '2023-11-06 10:26:04', '2023-11-15 14:59:43.000000'),
(105, 0, '', 'estabilizador ruim', '', 22, 'Fechado', '2023-11-06 10:35:10', '2023-11-15 14:59:45.000000'),
(106, 0, '', 'Computador não liga', 'juca balala', 22, 'Fechado', '2023-11-07 00:32:04', '2023-11-15 14:59:48.000000'),
(107, 0, '', 'tv smart não liga', 'setor almoxarifado', 22, 'Fechado', '2023-11-08 01:37:32', '2023-11-15 14:59:50.000000'),
(108, 0, '', 'Computador não liga', '', 22, 'Fechado', '2023-11-13 23:39:37', '2023-11-15 14:59:52.000000'),
(109, 0, '', 'estabilizador ruim', 'vamos nessa', 22, 'Fechado', '2023-11-14 00:49:30', '2023-11-15 14:59:54.000000'),
(110, 0, '', 'Computador não liga', '123', 22, 'Fechado', '2023-11-14 02:28:51', '2023-11-15 20:18:33.000000'),
(111, 0, '', 'Futebol', 'não loga', 22, 'Fechado', '2023-11-14 02:39:21', '2023-11-15 20:18:35.000000'),
(112, 0, '', 'Computador diplona não liga', 'defeito', 22, 'Fechado', '2023-11-14 02:55:15', '2023-11-20 14:15:14.000000'),
(113, 0, '', 'Computador não liga', 'fff', 22, 'Fechado', '2023-11-15 12:24:12', '2023-11-15 20:19:51.000000'),
(114, 0, '', 'Futebol', 'locaol', 22, 'Fechado', '2023-11-15 12:41:41', '2023-11-20 14:15:12.000000'),
(115, 0, '', 'Alutech problemas', '', 0, 'Fechado', '2023-11-15 13:39:39', '2023-11-20 14:15:10.000000'),
(116, 0, '', 'Futebol', 'FFF', 22, 'Fechado', '2023-11-15 13:43:48', '2023-11-20 14:15:08.000000'),
(117, 0, 'SPDM - ALOYSIO AMANCIO ', 'Computador não liga', 'COMPUTADOR RECEPÇÃO NÃO LIGA', 58, 'Fechado', '2023-11-15 19:38:13', '2023-11-20 14:14:56.000000'),
(118, 0, 'OFFICE LAB CARVALHO CRUZ', 'monitor não liga', 'MONITOR ESTÁ COM PROBLEMAS AO LIGAR', 0, 'Fechado', '2023-11-15 19:38:57', '2023-11-19 15:02:28.000000'),
(119, 0, 'computador não liga', 'Computador diplona não liga', 'tá ruim', 22, 'Fechado', '2023-11-15 21:07:18', '2023-11-19 13:43:07.000000'),
(120, 0, 'Rua visconde de Inhauma 103 Centro Rj', 'Computador não liga e apresenta falhas', 'Computador não liga e apresenta falhas', 58, 'Fechado', '2023-11-18 14:18:50', '2023-11-18 17:47:01.000000'),
(121, 0, 'Recreio', 'Computador diplona não liga', 'Não liga', 58, 'Fechado', '2023-11-18 15:56:15', '2023-11-18 17:49:36.000000'),
(122, 0, '', 'Computador spdm dom pedro não liga', 'Se encontra no sala amarela', 58, 'Fechado', '2023-11-18 17:11:02', '2023-11-20 14:14:15.000000'),
(123, 0, 'brasil', 'brasil', 'brasil', 58, 'Fechado', '2023-11-18 17:47:28', '2023-11-20 14:15:01.000000'),
(124, 0, 'rua', 'rua', 'rua', 58, 'Fechado', '2023-11-18 19:28:53', '2023-11-19 15:02:25.000000'),
(125, 0, 'lab', 'bl', 'adf', 57, 'Fechado', '2023-11-18 19:30:42', '2023-11-19 15:02:22.000000'),
(126, 0, 'ARGENTINA', 'ARGENTINA', 'ARGENTINA', 58, 'Fechado', '2023-11-18 20:02:52', '2023-11-19 15:02:16.000000'),
(127, 0, 'SPDM ALOYSIO AMANCIO DA SILVA', 'Monitor com defeito', 'Monitor não liga e apresenta falhas na tela', 58, 'Aberto', '2023-11-20 17:17:40', NULL),
(128, 0, 'recreio', 'não liga', 'defeito', 11, 'Aberto', '2023-11-25 23:30:05', NULL),
(129, 0, 'love', 'love', 'love', 11, 'Aberto', '2023-11-25 23:32:55', NULL),
(130, 0, 'love', 'love', 'love', 63, 'Aberto', '2023-11-25 23:34:49', NULL),
(131, 1, 'São Paulo', 'Problemas ao ligar', 'não liga', 58, 'Fechado', '2023-11-26 22:14:05', '2023-11-26 23:20:24.000000'),
(132, 2, 'Loja de colchoes', 'Não funciona essa droga', 'essa droga não funciona', 65, 'Fechado', '2023-11-26 22:53:27', '2024-02-03 17:34:40.000000'),
(133, 1, 'Recreio dos Bandeirantes', 'Computador não liga', 'Computador sala de agentes não liga', 22, 'Aberto', '2024-01-02 19:13:43', NULL),
(134, 2, 'teste01', 'TESTANDO  01', 'estou TESTANDO 01', 18, 'Aberto', '2024-02-03 17:52:43', NULL),
(135, 2, '465465465', '165465456', '55646565', 65, 'Fechado', '2024-02-06 01:01:23', '2024-02-06 01:01:50.000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(255) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `img_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `created` date NOT NULL,
  `solicitante` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `id_conta`, `nome`, `img_id`, `email`, `endereco`, `senha`, `tipo`, `created`, `solicitante`, `modified`) VALUES
(8, 1, 'OFFICE LAB', '6558b25cee694.jpg', 'officelab@kolke.com', 'Centro do Rio de Janeiro', '$2y$10$CshBRyhAE8L31ZSBaP7LY.9BDUHwHV/tk5Whrfn1uz9OOsv8VJx7q', 1, '2023-11-18', '', NULL),
(9, 1, 'SPDM - DOM PEDRO II', '6558b28c1f73f.jpg', 'dompedroii@alutech.com', 'Rua do Prado - Santa Cruz', '$2y$10$izBOPLTkEa8pZMQ9pzIgzu2g3BempP7dpgFy.xgpa8FaaCFsGBuKW', 1, '2023-11-18', '', NULL),
(10, 1, 'Bellaforma', '6558b2f9d084f.jpg', 'bellaforma@kolke.com', 'Nilopolis', '$2y$10$d99jhApB5OmA2kXBdZ.En.fuvnECdujmogq6XOOV1g8JQLsI3Zute', 1, '2023-11-18', '', NULL),
(13, 1, 'Mundo da Criança', '656282fc01638.jpg', 'mundocrianca@kolke.com', 'Recreio', '$2y$10$s/f31jI9PNh.Y142H0UukeHG9V.tBW0DyHMp561/Iw1xYQju.AGCy', 1, '2023-11-25', '', NULL),
(15, 2, 'Locadora olimpos', '6563cc3e13ec5.jpg', 'olimpos@hercules.com', '15 Aroma de Flores', '$2y$10$QeQCJTUR1c0mr1d6bWzMhO/QCKCHS0U1GU10rbCobXmBKnrQ6tsIO', 1, '2023-11-26', '', NULL),
(16, 2, 'Padaria 7 pães', '6563cf546aa4b.jpg', 'padaria@hercules.com', 'Rua Filismino de Moura número 1', '$2y$10$FUwdIeConf0OZLYhFs6aB.Gw.zkK2pdIRzjasxVULGj14v1Rpc46e', 1, '2023-11-26', '', NULL),
(18, 2, 'Teste 01', '', 'teste01@teste.com', '', '$2y$10$redsTs7x8qeWYKTLCpcFDuByiMEwtOrMKQ1nj0hTenzHGbk5Sqx9S', 1, '2024-02-03', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `produto` varchar(30) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `n_serie` varchar(100) NOT NULL,
  `patrimonio` int(30) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `id_conta`, `produto`, `marca`, `modelo`, `n_serie`, `patrimonio`, `created`) VALUES
(18, 0, 'Monitor', 'Tronos', 'TRS KAN-245', '1641651115', 18975, '2023-11-18'),
(19, 0, 'Monitor', 'Tronos', 'TRS KAN-245', '1641651117', 18976, '2023-11-18'),
(20, 0, 'Monitor', 'Tronos', 'TRS KAN-245', '16416511187', 18977, '2023-11-18'),
(21, 0, 'Monitor', 'Tronos', 'TRS KAN-245', '16416511678', 18978, '2023-11-18'),
(22, 0, 'Monitor', 'LG', 'LG FULL HD 22.5', '416516516516', 18980, '2023-11-18'),
(23, 0, 'Monitor', 'LG', 'LG FULL HD 22.5', '4165165164574', 18981, '2023-11-18'),
(24, 0, 'Monitor', 'LG', 'LG FULL HD 22.5', '4165165164577', 18982, '2023-11-18'),
(26, 1, 'Desktop', 'BRAZIL-PC', 'TRS KAN-245', '51651654981841', 18754, '2023-11-25'),
(27, 1, 'monitor', 'BRAZIL-PC', 'kolke pe55', '51651654981841', 19876, '2023-11-25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `img_id` varchar(200) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `tipo` int(10) NOT NULL,
  `id_conta` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `img_id`, `nome`, `email`, `cpf`, `senha`, `created`, `modified`, `tipo`, `id_conta`) VALUES
(65, '6563cad7a9284.jpg', 'Carlos Augusto', 'carlos@hercules.com', '165165156', '$2y$10$p.4G3SfGg/d8rD.GKPAQjuGi3EEqIR7kOQUj99UkriSMVuVODuxMi', '2023-11-26 19:46:47', NULL, 2, 2),
(64, '65498cae0f964.jpeg', 'Administrador', 'admin@admin', '156163737-88', '$2y$10$QVSxaXrHqQEWozwwP74XBObrPk7KkvnmUZK3uciBc8R4gg0DOxnju', '2023-10-20 20:12:56', '2023-11-05 15:51:15', 0, 2),
(67, '659461b9f25ac.png', 'Venicius ', 'venicius@teste.com', '00000000000000', '$2y$10$le3TFuUFt7fS06IZmhK2DuTchlws/5Fq3FTIgfHYalbUiO8D.N0Gi', '2024-01-02 19:19:21', NULL, 0, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_combustivel`
--
ALTER TABLE `cadastro_combustivel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_combustivel`
--
ALTER TABLE `cadastro_combustivel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
