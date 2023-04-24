-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Mar-2023 às 06:12
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sparking`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(4) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data_msg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empregados`
--

CREATE TABLE `empregados` (
  `id_empregados` int(4) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `cargo` enum('adm','func') DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estacionamento`
--

CREATE TABLE `estacionamento` (
  `id_estacionamento` int(4) NOT NULL,
  `dia` date DEFAULT NULL,
  `lucro_total` decimal(6,2) DEFAULT NULL,
  `qtd_carros` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(4) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `placa` char(7) DEFAULT NULL,
  `entrada` datetime DEFAULT NULL,
  `saida` datetime DEFAULT NULL,
  `pagamento` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `marca`, `modelo`, `placa`, `entrada`, `saida`, `pagamento`) VALUES
(1, 'VW', 'Santana', 'abc1234', '2023-03-29 19:29:20', '2023-03-30 10:16:47', '147.11'),
(3, 'Chevrolet', 'Camaro', 'DEF1024', '2023-03-29 19:49:59', '2023-03-30 10:12:32', '143.42'),
(5, 'Jeep', 'seila', 'zty1234', '2023-03-29 20:05:03', '2023-03-30 10:24:31', '142.88'),
(6, 'BMW', 'Tiger', 'JFF8924', '2023-03-29 21:41:17', '2023-03-31 00:36:58', '32.00'),
(7, 'Oda', 'Thousand', 'ONE5656', '2023-03-29 22:33:22', '2023-03-31 01:07:29', '253.13'),
(8, 'Seila', 'Seila', 'BRA2E39', '2023-03-29 22:46:48', '2023-03-30 09:49:37', NULL),
(9, 'kaefb', 'lana', 'LIE6674', '2023-03-30 10:18:43', '2023-03-30 10:21:37', '0.00'),
(10, 'Ferrari', 'Roma', 'KAI0809', '2023-03-30 10:52:14', NULL, NULL),
(12, 'Chevrolet', 'Comodoro', 'KAI0809', '2023-03-30 21:38:10', NULL, NULL),
(13, 'Chevrolet', 'Comodoro', 'KAI0809', '2023-03-30 21:38:20', NULL, NULL),
(14, 'Chevrolet', 'Black', 'ABC1234', '2023-03-30 22:51:42', NULL, NULL),
(15, 'Hyundai', 'HB20', 'CAR3333', '2023-03-30 22:52:39', NULL, NULL),
(16, 'BMW', 'Tiger', 'JFF8924', '2023-03-30 22:56:18', '2023-03-31 00:36:58', '32.00'),
(17, 'HIV', 'DLBA', 'RER1212', '2023-03-30 23:34:50', '2023-03-31 00:34:36', '27.00'),
(18, 'aleatorio', 'aleatorio', 'ALE5673', '2023-03-31 00:10:12', '2023-03-31 00:31:43', '27.00'),
(19, 'adhc', 'jhcba', 'CGH2089', '2023-03-31 00:11:01', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `empregados`
--
ALTER TABLE `empregados`
  ADD PRIMARY KEY (`id_empregados`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `estacionamento`
--
ALTER TABLE `estacionamento`
  ADD PRIMARY KEY (`id_estacionamento`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `placa_3` (`placa`),
  ADD KEY `placa_4` (`placa`),
  ADD KEY `placa` (`placa`) USING BTREE,
  ADD KEY `placa_2` (`placa`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empregados`
--
ALTER TABLE `empregados`
  MODIFY `id_empregados` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estacionamento`
--
ALTER TABLE `estacionamento`
  MODIFY `id_estacionamento` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
