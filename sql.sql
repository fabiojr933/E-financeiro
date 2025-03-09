-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Mar-2025 às 20:34
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `erp_financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carteiras`
--

CREATE TABLE `carteiras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carteiras`
--

INSERT INTO `carteiras` (`id`, `nome`, `criado_em`, `id_usuario`) VALUES
(1, 'carteira fabio', '2025-03-08 00:37:20', 1),
(2, 'carteira flavia', '2025-03-08 00:37:27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `id` int(11) NOT NULL,
  `titular` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cartoes`
--

INSERT INTO `cartoes` (`id`, `titular`, `nome`, `tipo`, `criado_em`, `id_usuario`) VALUES
(1, 'fabio', 'nu', 'Debito', '2025-03-08 00:37:39', 1),
(2, 'flavia', 'sicredi', 'Credito', '2025-03-08 00:37:54', 1),
(3, 'fabio', 'caixa', 'Debito', '2025-03-08 01:27:26', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `criado_em`, `id_usuario`) VALUES
(1, 'jo', '2025-03-08 00:38:32', 1),
(2, 'cliente 01', '2025-03-09 17:34:49', 1),
(3, 'cliente 02', '2025-03-09 17:34:59', 1),
(4, 'cliente 03', '2025-03-09 17:35:07', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `condicoes_pagamento`
--

CREATE TABLE `condicoes_pagamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `condicoes_pagamento`
--

INSERT INTO `condicoes_pagamento` (`id`, `nome`, `criado_em`, `id_usuario`) VALUES
(1, 'vista', '2025-03-08 00:38:04', 1),
(2, 'cartao', '2025-03-08 00:38:11', 1),
(3, 'Pix', '2025-03-09 17:33:24', 1),
(4, 'transferencia', '2025-03-09 17:33:44', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `valor_pago` decimal(15,2) DEFAULT 0.00,
  `vencimento` date NOT NULL,
  `pago` tinyint(1) DEFAULT 0,
  `pago_em` date DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_nembro` int(11) DEFAULT NULL,
  `id_carteira` int(11) DEFAULT NULL,
  `id_cartao` int(11) DEFAULT NULL,
  `id_condicao_pagamento` int(11) DEFAULT NULL,
  `id_fluxo_financeiro` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `valor`, `valor_pago`, `vencimento`, `pago`, `pago_em`, `observacao`, `id_usuario`, `id_nembro`, `id_carteira`, `id_cartao`, `id_condicao_pagamento`, `id_fluxo_financeiro`, `id_fornecedor`, `criado_em`) VALUES
(11, 'Roupas na loja avenida de sinop', 100.00, 0.00, '2025-03-19', 0, NULL, NULL, 1, 1, NULL, NULL, NULL, 2, 1, '2025-03-09 18:49:27'),
(12, 'Credito para celular', 55.00, 55.00, '2025-03-19', 1, '2025-03-09', NULL, 1, 1, 1, NULL, 1, 2, 1, '2025-03-09 18:49:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `valor_pago` decimal(15,2) DEFAULT 0.00,
  `vencimento` date NOT NULL,
  `pago` tinyint(1) DEFAULT 0,
  `pago_em` date DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_nembro` int(11) DEFAULT NULL,
  `id_carteira` int(11) DEFAULT NULL,
  `id_cartao` int(11) DEFAULT NULL,
  `id_condicao_pagamento` int(11) DEFAULT NULL,
  `id_fluxo_financeiro` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `valor`, `valor_pago`, `vencimento`, `pago`, `pago_em`, `observacao`, `id_usuario`, `id_nembro`, `id_carteira`, `id_cartao`, `id_condicao_pagamento`, `id_fluxo_financeiro`, `id_cliente`, `criado_em`) VALUES
(5, 'Roupas na loja avenida de sinop', 9.00, NULL, '2025-03-22', 1, '2025-01-25', NULL, 1, 1, 1, NULL, 1, 1, 1, '2025-03-09 19:06:02'),
(6, 'Roupas na loja avenida de sinop', 89.88, 0.00, '2025-03-12', 0, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 1, '2025-03-09 19:15:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxo_financeiro`
--

CREATE TABLE `fluxo_financeiro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fluxo_financeiro`
--

INSERT INTO `fluxo_financeiro` (`id`, `nome`, `tipo`, `criado_em`, `id_usuario`) VALUES
(1, 'salario', 'Entrada', '2025-03-08 00:38:41', 1),
(2, 'mercado', 'Saida', '2025-03-08 00:38:52', 1),
(3, 'feira', 'Saida', '2025-03-09 17:35:28', 1),
(4, 'vendas', 'Entrada', '2025-03-09 17:36:04', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `criado_em`, `id_usuario`) VALUES
(1, 'ze', '2025-03-08 00:38:23', 1),
(2, 'teste 123', '2025-03-09 17:34:19', 1),
(3, 'teste 458', '2025-03-09 17:34:28', 1),
(4, 'teste 107sd8', '2025-03-09 17:34:36', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamentos`
--

CREATE TABLE `lancamentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `data_pag` date NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `id_nembro` int(11) DEFAULT NULL,
  `id_carteira` int(11) DEFAULT NULL,
  `id_cartao` int(11) DEFAULT NULL,
  `id_condicao_pagamento` int(11) DEFAULT NULL,
  `id_fluxo_financeiro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lancamentos`
--

INSERT INTO `lancamentos` (`id`, `descricao`, `valor`, `data_pag`, `tipo`, `observacao`, `criado_em`, `id_usuario`, `id_nembro`, `id_carteira`, `id_cartao`, `id_condicao_pagamento`, `id_fluxo_financeiro`) VALUES
(4, 'fdgdf', 54.43, '2025-03-07', 'Entrada', 'eter', '2025-03-08 01:40:36', 1, 1, 1, NULL, 1, 1),
(6, 'teste 123', 125.98, '2025-03-09', 'Saida', 'dsdsd', '2025-03-09 17:37:33', 1, 1, NULL, 3, 2, 3),
(7, 'teste f458', 1226.61, '2025-03-09', 'Entrada', 'd', '2025-03-09 17:37:59', 1, 1, NULL, 1, 2, 4),
(8, 'teste 488 ', 48.89, '2025-03-09', 'Saida', 'dsdsd', '2025-03-09 17:38:40', 1, 1, NULL, 2, 4, 2),
(9, 'Credito para celular', 32.32, '2025-03-09', 'Saida', '', '2025-03-09 17:41:32', 1, 1, NULL, 2, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nembros`
--

CREATE TABLE `nembros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `nembros`
--

INSERT INTO `nembros` (`id`, `nome`, `criado_em`, `id_usuario`) VALUES
(1, 'fabio', '2025-03-08 00:37:02', 1),
(2, 'flavia', '2025-03-08 00:37:07', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `senha_hash` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha_hash`, `criado_em`) VALUES
(1, 'fabio', 'fabiojr933@gmail.com', '66999539490', '202cb962ac59075b964b07152d234b70', '2025-03-08 00:36:46');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carteiras`
--
ALTER TABLE `carteiras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `condicoes_pagamento`
--
ALTER TABLE `condicoes_pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_nembro` (`id_nembro`),
  ADD KEY `id_carteira` (`id_carteira`),
  ADD KEY `id_cartao` (`id_cartao`),
  ADD KEY `id_condicao_pagamento` (`id_condicao_pagamento`),
  ADD KEY `id_fluxo_financeiro` (`id_fluxo_financeiro`),
  ADD KEY `id_fornecedor` (`id_fornecedor`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_nembro` (`id_nembro`),
  ADD KEY `id_carteira` (`id_carteira`),
  ADD KEY `id_cartao` (`id_cartao`),
  ADD KEY `id_condicao_pagamento` (`id_condicao_pagamento`),
  ADD KEY `id_fluxo_financeiro` (`id_fluxo_financeiro`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `fluxo_financeiro`
--
ALTER TABLE `fluxo_financeiro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_nembro` (`id_nembro`),
  ADD KEY `id_carteira` (`id_carteira`),
  ADD KEY `id_cartao` (`id_cartao`),
  ADD KEY `id_condicao_pagamento` (`id_condicao_pagamento`),
  ADD KEY `id_fluxo_financeiro` (`id_fluxo_financeiro`);

--
-- Índices para tabela `nembros`
--
ALTER TABLE `nembros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carteiras`
--
ALTER TABLE `carteiras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `condicoes_pagamento`
--
ALTER TABLE `condicoes_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fluxo_financeiro`
--
ALTER TABLE `fluxo_financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `lancamentos`
--
ALTER TABLE `lancamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `nembros`
--
ALTER TABLE `nembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carteiras`
--
ALTER TABLE `carteiras`
  ADD CONSTRAINT `carteiras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD CONSTRAINT `cartoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `condicoes_pagamento`
--
ALTER TABLE `condicoes_pagamento`
  ADD CONSTRAINT `condicoes_pagamento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `contas_pagar_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `contas_pagar_ibfk_2` FOREIGN KEY (`id_nembro`) REFERENCES `nembros` (`id`),
  ADD CONSTRAINT `contas_pagar_ibfk_3` FOREIGN KEY (`id_carteira`) REFERENCES `carteiras` (`id`),
  ADD CONSTRAINT `contas_pagar_ibfk_4` FOREIGN KEY (`id_cartao`) REFERENCES `cartoes` (`id`),
  ADD CONSTRAINT `contas_pagar_ibfk_5` FOREIGN KEY (`id_condicao_pagamento`) REFERENCES `condicoes_pagamento` (`id`),
  ADD CONSTRAINT `contas_pagar_ibfk_6` FOREIGN KEY (`id_fluxo_financeiro`) REFERENCES `fluxo_financeiro` (`id`),
  ADD CONSTRAINT `contas_pagar_ibfk_7` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id`);

--
-- Limitadores para a tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD CONSTRAINT `contas_receber_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `contas_receber_ibfk_2` FOREIGN KEY (`id_nembro`) REFERENCES `nembros` (`id`),
  ADD CONSTRAINT `contas_receber_ibfk_3` FOREIGN KEY (`id_carteira`) REFERENCES `carteiras` (`id`),
  ADD CONSTRAINT `contas_receber_ibfk_4` FOREIGN KEY (`id_cartao`) REFERENCES `cartoes` (`id`),
  ADD CONSTRAINT `contas_receber_ibfk_5` FOREIGN KEY (`id_condicao_pagamento`) REFERENCES `condicoes_pagamento` (`id`),
  ADD CONSTRAINT `contas_receber_ibfk_6` FOREIGN KEY (`id_fluxo_financeiro`) REFERENCES `fluxo_financeiro` (`id`),
  ADD CONSTRAINT `contas_receber_ibfk_7` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `fluxo_financeiro`
--
ALTER TABLE `fluxo_financeiro`
  ADD CONSTRAINT `fluxo_financeiro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fornecedores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD CONSTRAINT `lancamentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `lancamentos_ibfk_2` FOREIGN KEY (`id_nembro`) REFERENCES `nembros` (`id`),
  ADD CONSTRAINT `lancamentos_ibfk_3` FOREIGN KEY (`id_carteira`) REFERENCES `carteiras` (`id`),
  ADD CONSTRAINT `lancamentos_ibfk_4` FOREIGN KEY (`id_cartao`) REFERENCES `cartoes` (`id`),
  ADD CONSTRAINT `lancamentos_ibfk_5` FOREIGN KEY (`id_condicao_pagamento`) REFERENCES `condicoes_pagamento` (`id`),
  ADD CONSTRAINT `lancamentos_ibfk_6` FOREIGN KEY (`id_fluxo_financeiro`) REFERENCES `fluxo_financeiro` (`id`);

--
-- Limitadores para a tabela `nembros`
--
ALTER TABLE `nembros`
  ADD CONSTRAINT `nembros_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
