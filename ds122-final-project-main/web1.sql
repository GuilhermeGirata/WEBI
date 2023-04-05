-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2022 às 20:04
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `web1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id_post` int(11) NOT NULL,
  `data_post` date NOT NULL DEFAULT current_timestamp(),
  `fk_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id_post`, `data_post`, `fk_usuario`, `titulo`, `texto`, `ativo`) VALUES
(3, '2022-05-04', 1, 'Lorem Ipsum!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt lobortis feugiat vivamus at augue eget arcu. Lorem sed risus ultricies tristique nulla aliquet enim. Sit amet luctus venenatis lectus magna fringilla. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Urna condimentum mattis pellentesque id nibh tortor id. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. In mollis nunc sed id. Mi quis hendrerit dolor magna eget est. At augue eget arcu dictum varius duis at. Eget egestas purus viverra accumsan. Non curabitur gravida arcu ac tortor.\r\n\r\nScelerisque eu ultrices vitae auctor eu augue ut lectus. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie a iaculis at erat pellentesque adipiscing commodo. Porta nibh venenatis cras sed felis eget velit. Eu ultrices vitae auctor eu augue ut lectus arcu. Ut lectus arcu bibendum at varius. Mi eget mauris ', 1),
(4, '2022-05-04', 2, 'Lorem Ipsum Arthur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt lobortis feugiat vivamus at augue eget arcu. Lorem sed risus ultricies tristique nulla aliquet enim. Sit amet luctus venenatis lectus magna fringilla. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Urna condimentum mattis pellentesque id nibh tortor id. Adipiscing bibendum est ultricies integer quis auctor elit sed vulputate. In mollis nunc sed id. Mi quis hendrerit dolor magna eget est. At augue eget arcu dictum varius duis at. Eget egestas purus viverra accumsan. Non curabitur gravida arcu ac tortor.\r\n\r\nScelerisque eu ultrices vitae auctor eu augue ut lectus. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie a iaculis at erat pellentesque adipiscing commodo. Porta nibh venenatis cras sed felis eget velit. Eu ultrices vitae auctor eu augue ut lectus arcu. Ut lectus arcu bibendum at varius. Mi eget mauris ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_completo_usuario` varchar(255) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nome_completo_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `reg_date`) VALUES
(1, 'Guilherme Girata', 'Giratinha', 'guilherme_girata@hotmail.com', '9ef20ec6832a9c4adfb35c2ae1d86f85', '2022-05-04'),
(2, 'Arthur Borges Toso', 'Arthur', 'arthur@gmail.com', '68830aef4dbfad181162f9251a1da51b', '2022-05-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
