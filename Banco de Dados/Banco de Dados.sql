-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Abr-2017 às 14:30
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_at`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendentes`
--

CREATE TABLE `atendentes` (
  `id_atendente` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendentes`
--

INSERT INTO `atendentes` (`id_atendente`, `nome`, `usuario`, `senha`, `nivel`, `data_cadastro`) VALUES
(1, 'Luiz Otávio Rodrigues', 'luizotavio', 'a67bf113e19cf39393ae7b06cbdbbb8f56141fdd', 1, '2017-04-22 11:50:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id_atendimento` int(11) NOT NULL,
  `id_atendente` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `codigo` char(4) NOT NULL,
  `preenchido` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reclamacao` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `telefone` char(13) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ra` char(8) DEFAULT NULL,
  `nome` varchar(55) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `tempo_espera` int(11) NOT NULL,
  `atendente` int(11) NOT NULL,
  `problema_resolvido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendentes`
--
ALTER TABLE `atendentes`
  ADD PRIMARY KEY (`id_atendente`);

--
-- Indexes for table `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id_atendimento`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_atendente` (`id_atendente`),
  ADD KEY `id_nota` (`id_nota`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendentes`
--
ALTER TABLE `atendentes`
  MODIFY `id_atendente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id_atendimento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD CONSTRAINT `atendimentos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `atendimentos_ibfk_2` FOREIGN KEY (`id_atendente`) REFERENCES `atendentes` (`id_atendente`),
  ADD CONSTRAINT `atendimentos_ibfk_3` FOREIGN KEY (`id_nota`) REFERENCES `notas` (`id_nota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
