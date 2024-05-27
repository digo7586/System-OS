-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Abr-2024 às 06:12
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `os`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem`
--

CREATE TABLE `ordem` (
  `id_os` int(11) NOT NULL,
  `veiculo` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `km` int(11) DEFAULT NULL,
  `qtd1` int(11) NOT NULL,
  `qtd2` int(11) NOT NULL,
  `qtd3` int(11) NOT NULL,
  `qtd4` int(11) NOT NULL,
  `qtd5` int(11) NOT NULL,
  `qtd6` int(11) NOT NULL,
  `qtd7` int(11) NOT NULL,
  `qtd8` int(11) NOT NULL,
  `peca1` varchar(250) NOT NULL,
  `peca2` varchar(240) NOT NULL,
  `peca3` varchar(240) NOT NULL,
  `peca4` varchar(240) NOT NULL,
  `peca5` varchar(240) NOT NULL,
  `peca6` varchar(240) NOT NULL,
  `peca7` varchar(240) NOT NULL,
  `peca8` varchar(240) NOT NULL,
  `preco1` decimal(10,2) NOT NULL,
  `preco2` decimal(10,2) NOT NULL,
  `preco3` decimal(10,2) NOT NULL,
  `preco4` decimal(10,2) NOT NULL,
  `preco5` decimal(10,2) NOT NULL,
  `preco6` decimal(10,2) NOT NULL,
  `preco7` decimal(10,2) NOT NULL,
  `preco8` decimal(10,2) NOT NULL,
  `defeito` varchar(255) DEFAULT NULL,
  `solucao` varchar(255) DEFAULT NULL,
  `valorTotal` decimal(10,2) DEFAULT NULL,
  `valorPecas` decimal(10,2) DEFAULT NULL,
  `valorMobra` decimal(10,2) DEFAULT NULL,
  `valorTerceiros` decimal(10,2) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_entrada` datetime DEFAULT NULL,
  `data_saida` datetime DEFAULT NULL,
  `idOs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ordem`
--

INSERT INTO `ordem` (`id_os`, `veiculo`, `modelo`, `placa`, `km`, `qtd1`, `qtd2`, `qtd3`, `qtd4`, `qtd5`, `qtd6`, `qtd7`, `qtd8`, `peca1`, `peca2`, `peca3`, `peca4`, `peca5`, `peca6`, `peca7`, `peca8`, `preco1`, `preco2`, `preco3`, `preco4`, `preco5`, `preco6`, `preco7`, `preco8`, `defeito`, `solucao`, `valorTotal`, `valorPecas`, `valorMobra`, `valorTerceiros`, `status`, `id_cliente`, `data_entrada`, `data_saida`, `idOs`) VALUES
(19, 'Carro', 'ferrari', 'ofofof', 7888, 1, 2, 0, 0, 0, 0, 0, 0, 'portas, coxim do motor, , , , , , ', 'coxim do motor', '', '', '', '', '', '', '66.00', '55.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'de', 'fr', '221.00', '121.00', '100.00', '0.00', b'1', 8, '2024-04-06 00:00:00', '2024-04-06 16:49:31', NULL),
(20, 'Moto', 'xre300', 'DIP3E22', 9000, 1, 2, 0, 0, 0, 0, 0, 0, 'manete', 'rodas', '', '', '', '', '', '', '450.00', '1500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'roda torta', 'troca das rodas e manetes', '2760.00', '1950.00', '750.00', '60.00', b'1', 8, '2024-04-07 00:00:00', '2024-04-07 22:50:04', NULL),
(21, 'Carro', 'tesla', '232dd4', 8900, 1, 0, 0, 0, 0, 0, 0, 0, 'volante', '', '', '', '', '', '', '', '400.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '400.00', '400.00', '0.00', '0.00', b'1', 8, '2024-04-07 00:00:00', '2024-04-08 00:43:53', NULL),
(23, 'Carro', 'ferrari', 'DIP3E22', 179000, 1, 2, 1, 0, 0, 0, 0, 0, 'porta', 'rodas', 'pinça de freio', '', '', '', '', '', '400.00', '2000.00', '450.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'barulho', 'troca', '4150.00', '2850.00', '1300.00', '0.00', b'0', 8, '2024-04-08 00:00:00', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ordem`
--
ALTER TABLE `ordem`
  ADD PRIMARY KEY (`id_os`),
  ADD UNIQUE KEY `idOs` (`idOs`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ordem`
--
ALTER TABLE `ordem`
  MODIFY `id_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ordem`
--
ALTER TABLE `ordem`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
