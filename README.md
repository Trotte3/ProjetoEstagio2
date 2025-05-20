# ProjetoEstagio2
Este projeto foi feito utilizando PHP 8, Javascript e a versão mais recente do Bootstrap. É uma aplicação de CRUD com login.

- Baixe o xampp : https://www.apachefriends.org/pt_br/download.html

- Após a conclusão do download abra o xampp como adm e de 'start' na linha do apache e do mysql.

- Abra em seu navegador e cole o link http://localhost/phpmyadmin/ para acessar o phpmyadmin .

- clique em "Novo".

- Coloque como nome do projeto : projetoestag.

- Crie uma tabela com o nome produto com 6 colunas e outra chamada usuario com 3 colunas e leia abaixo a descrição do banco de dados e siga passo a passo do que estiver descrito ou cole na aba sql os dados do banco de dados e não esqueça de apagar as partes escritas com intuito de organização como : "banco de dados" "usuário" "produto".

- Baixe o zip da pasta Crud e crie uma pasta "ProjetoEstagio2"coloque-a dentro desta pasta e utilize o winrar para descomprimir a 
pasta caso necessário.

- Abra o explorar de arquivos, encontre o local que foi instalado o xampp,  va para pasta xampp, depois htdocs e coloque a pasta ProjetoEstagio2.,

- Agora abra o vscode ou seu editor de código de preferencia e abra a pasta "ProjetoEstagio2" que voce colocou na pasta do xampp

- Digite em seu navegador: http://localhost/ProjetoEstagio2/CRUD/Pagina-login.php

- No banco de dados na parte "SQL" apague tudo e digite : insert into usuario (usuario, senha) VALUES ('o nome que você quiser', md5('senha que você quiser'));

- Após fazer isso sera posssivel ver o CRUD de produtos.
 


BANCO DE DADOS

usuário :

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2025 às 02:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoestag`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

produto: 

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2025 às 04:07
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: projetoestag
--

-- --------------------------------------------------------

--
-- Estrutura para tabela produto
--

CREATE TABLE produto (
  id int(50) NOT NULL,
  Nome varchar(50) NOT NULL,
  Descricao varchar(50) DEFAULT NULL,
  Valor float NOT NULL DEFAULT 0,
  Quantidade int(50) NOT NULL,
  Status enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela produto
--
ALTER TABLE produto
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela produto
--
ALTER TABLE produto
  MODIFY id int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

