-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jun-2018 às 02:56
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oficina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_carro`
--

CREATE TABLE `cadastro_carro` (
  `idcarro` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `placa` varchar(45) NOT NULL,
  `chassi` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `fabricacao` decimal(20,0) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro_carro`
--

INSERT INTO `cadastro_carro` (`idcarro`, `marca`, `modelo`, `placa`, `chassi`, `cor`, `fabricacao`, `id_cliente`) VALUES
(1, 'CHEVROLET', 'CORSA', 'PLK7768', '23472349762345', 'BRANCO', '2018', 1),
(2, 'FIAT', 'UNO', 'POI9098', '656591263512', 'AMARELO', '2000', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_cliente`
--

CREATE TABLE `cadastro_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(150) NOT NULL,
  `tel_cliente` decimal(15,0) NOT NULL,
  `cpf_cliente` varchar(45) NOT NULL,
  `rua_cliente` varchar(80) NOT NULL,
  `num_cliente` varchar(45) NOT NULL,
  `bairro_cliente` varchar(45) NOT NULL,
  `estado_cliente` varchar(45) NOT NULL,
  `cidade_cliente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro_cliente`
--

INSERT INTO `cadastro_cliente` (`id_cliente`, `nome_cliente`, `tel_cliente`, `cpf_cliente`, `rua_cliente`, `num_cliente`, `bairro_cliente`, `estado_cliente`, `cidade_cliente`) VALUES
(1, 'DENNYSSON GALVÃƒO', '63992221118', '04496085143', 'RUA DOS PINHEIROS', '45', 'RAIZAL', 'TO', 'ARAGUAÃNA'),
(2, 'RICARDO SILVA', '6332324565', '00100100111', 'RUA SÃƒO JOÃƒO', '87', 'CENTRO', 'TO', 'ARAGUAÃNA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_especialidade`
--

CREATE TABLE `cadastro_especialidade` (
  `id_especialidade` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro_especialidade`
--

INSERT INTO `cadastro_especialidade` (`id_especialidade`, `descricao`, `valor`) VALUES
(1, 'LANTERNAGEM', 200),
(2, 'MOTOR', 400),
(3, 'SUSPENSÃƒO', 300),
(4, 'PINTURA', 555.55),
(5, 'FREIO', 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_funcionario`
--

CREATE TABLE `cadastro_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `esp_funcionario` varchar(45) NOT NULL,
  `tel_funcionario` varchar(45) NOT NULL,
  `rg_funcionario` decimal(15,0) NOT NULL,
  `cpf_funcionario` varchar(45) NOT NULL,
  `rua_funcionario` varchar(100) NOT NULL,
  `num_funcionario` decimal(10,0) NOT NULL,
  `bairro_funcionario` varchar(45) NOT NULL,
  `estado_funcionario` varchar(45) NOT NULL,
  `cidade_funcionario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_os`
--

CREATE TABLE `item_os` (
  `id_item_os` int(11) NOT NULL,
  `especialidade` int(11) DEFAULT NULL,
  `id_ordem` int(11) DEFAULT NULL,
  `quantidade` decimal(50,0) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item_os`
--

INSERT INTO `item_os` (`id_item_os`, `especialidade`, `id_ordem`, `quantidade`, `status`) VALUES
(1, 1, 1, '3', 'Aguardando...'),
(2, 1, 1, '2', 'Aguardando...'),
(3, 3, 1, '1', 'Aguardando...'),
(4, 2, 1, '1', 'Aguardando...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_servico`
--

CREATE TABLE `ordem_servico` (
  `id_ordem` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `carro` varchar(45) NOT NULL,
  `data_entrega` date NOT NULL,
  `valor` float NOT NULL,
  `data_pedido` date NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro_carro`
--
ALTER TABLE `cadastro_carro`
  ADD PRIMARY KEY (`idcarro`),
  ADD KEY `id_cliente_idx` (`id_cliente`);

--
-- Indexes for table `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `cadastro_especialidade`
--
ALTER TABLE `cadastro_especialidade`
  ADD PRIMARY KEY (`id_especialidade`);

--
-- Indexes for table `cadastro_funcionario`
--
ALTER TABLE `cadastro_funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `item_os`
--
ALTER TABLE `item_os`
  ADD PRIMARY KEY (`id_item_os`),
  ADD KEY `id_ordem` (`id_ordem`);

--
-- Indexes for table `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD PRIMARY KEY (`id_ordem`),
  ADD KEY `cliente_idx` (`cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro_carro`
--
ALTER TABLE `cadastro_carro`
  MODIFY `idcarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cadastro_especialidade`
--
ALTER TABLE `cadastro_especialidade`
  MODIFY `id_especialidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cadastro_funcionario`
--
ALTER TABLE `cadastro_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_os`
--
ALTER TABLE `item_os`
  MODIFY `id_item_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordem_servico`
--
ALTER TABLE `ordem_servico`
  MODIFY `id_ordem` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastro_carro`
--
ALTER TABLE `cadastro_carro`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cadastro_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`cliente`) REFERENCES `cadastro_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
