-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2017 at 03:17 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site`;

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `Id_Aluno` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Login` int(10) DEFAULT NULL,
  `Id_Matricula` int(10) DEFAULT NULL,
  `Id_Turma` int(10) DEFAULT NULL,
  `Nome_Aluno` varchar(40) NOT NULL,
  `Sexo_Aluno` varchar(20) NOT NULL,
  `Bi_Aluno` varchar(40) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Email_Aluno` varchar(40) DEFAULT NULL,
  `telefone1` int(10) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`Id_Aluno`, `Id_Login`, `Id_Matricula`, `Id_Turma`, `Nome_Aluno`, `Sexo_Aluno`, `Bi_Aluno`, `Data_Nascimento`, `Email_Aluno`, `telefone1`, `rua`, `bairro`, `municipio`, `cidade`, `provincia`) VALUES
(6, 12, 6, 3, 'Marcia Dos Santo', 'F', '85215OPUW88', '2017-11-02', 'celinamarcel@gmail.com', 9896875, 'Rua 8', 'Bairro Do Prenda', 'Mainga', 'Cabo Verde', 'Cabo Verde'),
(5, 11, 5, 1, 'Fabio Almeida Melo', 'M', '02689POOI10', '2017-11-22', 'FabioAlmeidaMelo@dayrep.com', 85247, 'Rua Cimo ', 'Vila 16', 'FigueirÃ³', 'Lisboa', 'Lisboa'),
(10, 16, 11, 1, 'asdasd', 'M', 'asdsadsadas', '2017-11-10', 'asda', 852, 'asdasdas', 'asdadsd', 'asdasd', 'asdasa', 'asd'),
(9, 15, 10, 1, 'Evelyn Souza Silva', 'F', '2989JJSUA40', '2017-11-01', 'EvelynSouzaSilva@rhyta.com', 96274, 'Santo Miguel', 'Alameda', 'Kibala', 'Kibala', 'Kibala'),
(13, 19, 14, 4, 'ROdax', 'M', 'Motufa', '2017-11-21', 'ManuelaDiasFernandes@teleworm.us', 9658, 'Rua Cimo ', 'Vila 16', 'Sei la', 'Menongue', 'Cuando-Cubango'),
(12, 18, 13, 1, ' aad', 'M', '1115SDA47', '2017-11-21', 'ManuelaDiasFernandes@teleworm.us', 9658, 'Rua Cimo ', 'Vila 16', 'Sei la', 'Menongue', 'Cuando-Cubango'),
(14, 20, 15, 4, 'ROdaxx', 'M', 'Motufax', '2017-11-21', 'ManuelaDiasFernandes@teleworm.us', 9658, 'Rua Cimo ', 'Vila 16', 'Sei la', 'Menongue', 'Cuando-Cubango'),
(15, 21, 16, 4, 'ROdaxxx', 'M', 'Motufaxx', '2017-11-21', 'ManuelaDiasFernandes@teleworm.us', 9658, 'Rua Cimo ', 'Vila 16', 'Sei la', 'Menongue', 'Cuando-Cubango'),
(16, 22, 17, 4, 'ROdaxxxx', 'M', 'Motufaxxx', '2017-11-21', 'ManuelaDiasFernandes@teleworm.us', 9658, 'Rua Cimo ', 'Vila 16', 'Sei la', 'Menongue', 'Cuando-Cubango'),
(17, 23, 18, 4, 'as', 'M', '01888LOA78', '2017-11-17', 'anderson_rodax@hotmail.com', 963888, 'Rua Cimo ', 'Bairro Azul', 'Da Gabela', 'Luanda', 'Benguela'),
(18, 24, 19, 4, 'ass', 'M', '01888LOA78s', '2017-11-17', 'anderson_rodax@hotmail.com', 963888, 'Rua Cimo ', 'Bairro Azul', 'Da Gabela', 'Luanda', 'Benguela'),
(19, 25, 20, 4, 'Hugo Lucca Alves', 'M', '419.924.543-02', '2017-11-06', 'hugoluccaalves_@riobc.com.br', 93266758, 'Avenida JoÃ£o', 'Centro', 'Sardoeira ', 'Anapurus', 'Minas Gerais'),
(20, 26, 21, 3, 'Henry Bryan Almeida', 'M', '517.549.623-94', '2017-11-11', 'henrybryanalmeida-92@meteorus.com.br', 8874474, 'Quadra Quadra ', 'Conjunto 36', 'Recanto das Emas', 'Flamengo', 'Flamengo'),
(21, 27, 22, 4, 'Antonio Edwin Alexandre Femino', 'M', '000FEIO385MUITO000FEIO', '1996-01-01', 'edwin@site.com', 994818060, 'Rua Direita da Samba', 'Prenda', 'Samba', 'Luanda', 'Luanda'),
(22, 28, 23, 4, 'buuy', 'M', '74169PO', '2017-11-01', 'anderson_rodax@hotmail.com', 96885, 'as', 'as', 'as', 'as', 'as'),
(23, 29, 24, 4, 'Ameli as', 'M', 'as', '2017-11-08', 'ManuelaDiasFernandes@teleworm.us', 962, 'as', 'as', 'as', 'as', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `ano`
--

DROP TABLE IF EXISTS `ano`;
CREATE TABLE IF NOT EXISTS `ano` (
  `Id_Ano` int(10) NOT NULL AUTO_INCREMENT,
  `Nome_Ano` varchar(40) DEFAULT NULL,
  `Numero_Ano` int(10) NOT NULL,
  PRIMARY KEY (`Id_Ano`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ano`
--

INSERT INTO `ano` (`Id_Ano`, `Nome_Ano`, `Numero_Ano`) VALUES
(1, '10 Classe', 10),
(2, '11 Classe', 11),
(3, '12 Classe', 12);

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `Id_Avaliacao` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Aluno` int(10) DEFAULT NULL,
  `Id_Curso_Disciplina` int(10) DEFAULT NULL,
  `media1` int(10) DEFAULT NULL,
  `media2` int(10) DEFAULT NULL,
  `media3` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Avaliacao`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`Id_Avaliacao`, `Id_Aluno`, `Id_Curso_Disciplina`, `media1`, `media2`, `media3`) VALUES
(1, 9, 1, 0, 0, 0),
(2, 9, 2, 18, 20, 12),
(3, 9, 3, 18, 20, 12),
(4, 9, 4, 18, 20, 12),
(5, 9, 5, 18, 20, 12),
(6, 9, 6, 18, 20, 12),
(7, 9, 7, 18, 20, 12),
(8, 9, 8, 18, 20, 12),
(9, 9, 9, 18, 20, 12),
(10, 9, 10, 10, 10, 12),
(11, 19, 1, 20, 12, 10),
(12, 19, 2, NULL, NULL, NULL),
(13, 19, 3, NULL, NULL, NULL),
(14, 19, 4, NULL, NULL, NULL),
(15, 19, 5, NULL, NULL, NULL),
(16, 19, 6, NULL, NULL, NULL),
(17, 19, 7, NULL, NULL, NULL),
(18, 19, 8, NULL, NULL, NULL),
(19, 19, 9, NULL, NULL, NULL),
(20, 19, 10, NULL, NULL, NULL),
(21, 20, 1, 10, 20, 20),
(22, 20, 2, NULL, NULL, NULL),
(23, 20, 3, NULL, NULL, NULL),
(24, 20, 4, NULL, NULL, NULL),
(25, 20, 5, NULL, NULL, NULL),
(26, 20, 6, NULL, NULL, NULL),
(27, 20, 7, NULL, NULL, NULL),
(28, 20, 8, NULL, NULL, NULL),
(29, 20, 9, NULL, NULL, NULL),
(30, 20, 10, NULL, NULL, NULL),
(31, 21, 1, 0, 1, 2),
(32, 21, 2, NULL, NULL, NULL),
(33, 21, 3, NULL, NULL, NULL),
(34, 21, 4, NULL, NULL, NULL),
(35, 21, 5, NULL, NULL, NULL),
(36, 21, 6, NULL, NULL, NULL),
(37, 21, 7, NULL, NULL, NULL),
(38, 21, 8, NULL, NULL, NULL),
(39, 21, 9, NULL, NULL, NULL),
(40, 21, 10, NULL, NULL, NULL),
(41, 22, 1, 13, 5, 6),
(42, 22, 2, NULL, NULL, NULL),
(43, 22, 3, NULL, NULL, NULL),
(44, 22, 4, NULL, NULL, NULL),
(45, 22, 5, NULL, NULL, NULL),
(46, 22, 6, NULL, NULL, NULL),
(47, 22, 7, NULL, NULL, NULL),
(48, 22, 8, NULL, NULL, NULL),
(49, 22, 9, NULL, NULL, NULL),
(50, 22, 10, NULL, NULL, NULL),
(51, 23, 1, 15, 13, 16),
(52, 23, 2, NULL, NULL, NULL),
(53, 23, 3, NULL, NULL, NULL),
(54, 23, 4, NULL, NULL, NULL),
(55, 23, 5, NULL, NULL, NULL),
(56, 23, 6, NULL, NULL, NULL),
(57, 23, 7, NULL, NULL, NULL),
(58, 23, 8, NULL, NULL, NULL),
(59, 23, 9, NULL, NULL, NULL),
(60, 23, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `Id_Curso` int(10) NOT NULL AUTO_INCREMENT,
  `Nome_Curso` varchar(40) NOT NULL,
  `Sigla` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Curso`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`Id_Curso`, `Nome_Curso`, `Sigla`) VALUES
(1, 'Ciencias Economicas e Juridicas', 'CEJ'),
(2, 'Ciencias Fisicas e Biologicas', 'CFB'),
(3, 'Ciencias Humanas', 'CH');

-- --------------------------------------------------------

--
-- Table structure for table `curso_disciplina`
--

DROP TABLE IF EXISTS `curso_disciplina`;
CREATE TABLE IF NOT EXISTS `curso_disciplina` (
  `Id_Curso_Disciplina` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Curso` int(10) DEFAULT NULL,
  `Id_Disciplina` int(10) DEFAULT NULL,
  `Cod_Disciplina` varchar(20) DEFAULT NULL,
  `Id_Ano` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Curso_Disciplina`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso_disciplina`
--

INSERT INTO `curso_disciplina` (`Id_Curso_Disciplina`, `Id_Curso`, `Id_Disciplina`, `Cod_Disciplina`, `Id_Ano`) VALUES
(1, 1, 1, 'CEJ-LP', 1),
(2, 1, 4, 'CEJ-IAE', 1),
(3, 1, 5, 'CEJ-IAD', 1),
(4, 1, 2, 'CEJ-MAT', 1),
(5, 1, 3, 'CEJ-ING', 1),
(6, 1, 6, 'CEJ-GEO', 1),
(7, 1, 7, 'CEJ-HIST', 1),
(8, 1, 8, 'CEJ-PSIC', 1),
(9, 1, 9, 'CEJ-INF', 1),
(10, 1, 10, 'CEJ-EDFIS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `Id_Disciplina` int(10) NOT NULL AUTO_INCREMENT,
  `Nome_Disciplina` varchar(40) NOT NULL,
  `Sigla` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Disciplina`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`Id_Disciplina`, `Nome_Disciplina`, `Sigla`) VALUES
(1, 'Lingua Portuguesa', 'LP'),
(2, 'Matematica', 'MAT'),
(3, 'Ingles', 'ING'),
(4, 'Introducao a Economia', 'IAE'),
(5, 'Introducao a Direito', 'IAD'),
(6, 'Geografia', 'GEO'),
(7, 'Historia', 'HIST'),
(8, 'Psicologia', 'PSIC'),
(9, 'Informatica', 'INF'),
(10, 'Educacao Fisica', 'EDFIS'),
(11, 'Filosofia ', 'FILO'),
(12, 'Antopologia', 'ANT'),
(13, 'Desenvolvimento Economico Social', 'DES');

-- --------------------------------------------------------

--
-- Table structure for table `encarregado`
--

DROP TABLE IF EXISTS `encarregado`;
CREATE TABLE IF NOT EXISTS `encarregado` (
  `Id_Encarregado` int(10) NOT NULL AUTO_INCREMENT,
  `Nome_Encarregado` varchar(40) NOT NULL,
  `Profissao` varchar(40) NOT NULL,
  `Local_Profissao` varchar(40) DEFAULT NULL,
  `telefone` int(10) NOT NULL,
  PRIMARY KEY (`Id_Encarregado`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encarregado`
--

INSERT INTO `encarregado` (`Id_Encarregado`, `Nome_Encarregado`, `Profissao`, `Local_Profissao`, `telefone`) VALUES
(5, 'Pratrick Vieira Dias', 'Condutor', 'Odebretch', 9667),
(6, 'Celina Marcel de Paulo', 'Dona de Casa', '', 965985),
(10, 'Susana de Souza Silva', 'Cozinheira', 'Epic Sana', 96985),
(11, 'asdaaas', 'sda', 'asdsa', 9632),
(13, 'Susana de Souza Silva', 'Dona de Casa', 'Epic Sana', 93328),
(14, 'Susana de Souza Silva', 'Dona de Casa', 'Epic Sana', 93328),
(15, 'Susana de Souza Silva', 'Dona de Casa', 'Epic Sana', 93328),
(16, 'Susana de Souza Silva', 'Dona de Casa', 'Epic Sana', 93328),
(17, 'Susana de Souza Silva', 'Dona de Casa', 'Epic Sana', 93328),
(18, 'Pratrick Vieira Dias', 'Condutor', 'Odebretch', 93298),
(19, 'Pratrick Vieira Dias', 'Condutor', 'Odebretch', 93298),
(20, 'Diogo Correia Martins', 'Contabilista', 'Endiama', 9678852),
(21, 'Rosa Pereira Goncalves', 'Cabelereira', 'Rua Conjunto 36 ', 9687),
(22, 'Antonio de Jesus Ferreira', 'Mecanico', 'Chaparia da Famila Ferreira', 932454376),
(23, 'EAS', 'AS', 'AS', 9657),
(24, 'asas', 'as', 'as', 9632);

-- --------------------------------------------------------

--
-- Table structure for table `encarregado_aluno`
--

DROP TABLE IF EXISTS `encarregado_aluno`;
CREATE TABLE IF NOT EXISTS `encarregado_aluno` (
  `Id_Encarregado_Aluno` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Encarregado` int(10) NOT NULL,
  `Id_Aluno` int(10) NOT NULL,
  PRIMARY KEY (`Id_Encarregado_Aluno`,`Id_Encarregado`,`Id_Aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encarregado_aluno`
--

INSERT INTO `encarregado_aluno` (`Id_Encarregado_Aluno`, `Id_Encarregado`, `Id_Aluno`) VALUES
(1, 5, 5),
(2, 6, 6),
(5, 10, 9),
(6, 11, 10),
(8, 13, 12),
(9, 14, 13),
(10, 15, 14),
(11, 16, 15),
(12, 17, 16),
(13, 18, 17),
(14, 19, 18),
(15, 20, 19),
(16, 21, 20),
(17, 22, 21),
(18, 23, 22),
(19, 24, 23);

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `Id_Funcionario` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Login` int(10) DEFAULT NULL,
  `Nome_Funcionario` varchar(40) NOT NULL,
  `Grau_Academico` varchar(40) NOT NULL,
  `Bi_Funcionario` varchar(40) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Email_Funcionario` varchar(40) DEFAULT NULL,
  `telefone1` int(10) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`Id_Funcionario`, `Id_Login`, `Nome_Funcionario`, `Grau_Academico`, `Bi_Funcionario`, `Data_Nascimento`, `Email_Funcionario`, `telefone1`, `rua`, `bairro`, `municipio`, `cidade`, `provincia`, `perfil`) VALUES
(1, 2, 'Anderson Kabuya Lando', 'Licenciado', '005020357LA041', '1997-06-11', 'anderson_rodax@hotmail.com', 932337220, 'Dr. Antonio Agostinho Neto', 'Bairro Azul', 'Ingombotas', 'Luanda', 'Luanda', 'director geral'),
(2, 3, 'Teresa', 'Mestre', '0052485LO5269P', '2017-10-14', 'teresa@gmail.com', 968775996, 'Cheguevara', 'Neves Bendinha', 'Vila-Alice', 'Luanda', 'Luanda', 'director academico'),
(3, 6, 'Jeovana Meya', 'Licenciada', '03589LPO7820', '2017-10-07', 'jeovaegrande@gmail.com', 963378959, 'Rua 10', 'AmÃ©rico Boa-Vida', 'Rangel', 'Luanda', 'Luanda', 'secretaria');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Id_Login` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `perfil` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Login`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id_Login`, `nickname`, `password`, `perfil`) VALUES
(1, 'Administrador', 'administrador', 'administrador'),
(2, 'func1', '005020357LA041', 'director geral'),
(3, 'func2', '0052485LO5269P', 'director academico'),
(5, 'prof2', '150055LA5852', 'professor'),
(6, 'func3', '03589LPO7820', 'secretaria'),
(11, 'aluno5', '02689POOI10', 'aluno'),
(12, 'aluno6', '85215OPUW88', 'aluno'),
(15, 'aluno9', '2989JJSUA40', 'aluno'),
(16, 'aluno10', 'asdsadsadas', 'aluno'),
(18, 'aluno12', '1115SDA47', 'aluno'),
(19, 'aluno13', 'Motufa', 'aluno'),
(20, 'aluno14', 'Motufax', 'aluno'),
(21, 'aluno15', 'Motufaxx', 'aluno'),
(22, 'aluno16', 'Motufaxxx', 'aluno'),
(23, 'aluno17', '01888LOA78', 'aluno'),
(24, 'aluno18', '01888LOA78s', 'aluno'),
(25, 'aluno19', '419.924.543-02', 'aluno'),
(26, 'aluno20', '517.549.623-94', 'aluno'),
(27, 'aluno21', '000FEIO385MUITO000FEIO', 'aluno'),
(28, 'aluno22', '74169PO', 'aluno'),
(29, 'aluno23', 'as', 'aluno');

-- --------------------------------------------------------

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
CREATE TABLE IF NOT EXISTS `matricula` (
  `Id_Matricula` int(10) NOT NULL AUTO_INCREMENT,
  `Nome_Aluno` varchar(40) NOT NULL,
  `Sexo_Aluno` varchar(10) NOT NULL,
  `Filiacao_Primeiro` varchar(40) NOT NULL,
  `Filiacao_Segundo` varchar(40) NOT NULL,
  `Naturalidade` varchar(40) NOT NULL,
  `Provincia` varchar(40) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Bi_Aluno` varchar(40) NOT NULL,
  `Identificacao_Bi` varchar(40) NOT NULL,
  `Identificacao_Bi_Data` date NOT NULL,
  `Id_Curso` int(10) DEFAULT NULL,
  `Id_Ano` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matricula`
--

INSERT INTO `matricula` (`Id_Matricula`, `Nome_Aluno`, `Sexo_Aluno`, `Filiacao_Primeiro`, `Filiacao_Segundo`, `Naturalidade`, `Provincia`, `Data_Nascimento`, `Bi_Aluno`, `Identificacao_Bi`, `Identificacao_Bi_Data`, `Id_Curso`, `Id_Ano`) VALUES
(5, 'Fabio Almeida Melo', 'M', 'Almeida Melo', 'Margarida Sebas de Sousa', 'Portugal', 'Lisboa', '2017-11-22', '02689POOI10', 'PT', '2017-11-13', 1, 1),
(6, 'Marcia Dos Santo', 'F', 'Celina Marcel de Paulo', 'Paulino Sobrinho de Paulo', 'Cabo Verde', 'Nova Central', '2017-11-02', '85215OPUW88', 'Cabo Verde', '2017-11-14', 2, 3),
(10, 'Evelyn Souza Silva', 'F', 'Pedro Belgio', 'Suzana Souza Silva', 'Angola', 'Bengo', '2017-11-01', '2989JJSUA40', 'LL', '2017-11-07', 1, 1),
(11, 'asdasd', 'M', 'asdasdad', 'asdasdsada', 'asddasd', 'asdasdsad', '2017-11-10', 'asdsadsadas', 'asdasds', '2017-11-07', 1, 1),
(13, ' aad', 'M', 'Celina Marcel de Paulo', 'Margarida Sebas de Sousa', 'Cabo Verde', 'Nova Central', '2017-11-21', '1115SDA47', 'Cabo Verde', '2017-11-01', 1, 1),
(14, 'ROdax', 'M', 'Celina Marcel de Paulo', 'Margarida Sebas de Sousa', 'Cabo Verde', 'Nova Central', '2017-11-21', 'Motufa', 'Cabo Verde', '2017-11-01', 1, 1),
(15, 'ROdaxx', 'M', 'Celina Marcel de Paulo', 'Margarida Sebas de Sousa', 'Cabo Verde', 'Nova Central', '2017-11-21', 'Motufax', 'Cabo Verde', '2017-11-01', 1, 1),
(16, 'ROdaxxx', 'M', 'Celina Marcel de Paulo', 'Margarida Sebas de Sousa', 'Cabo Verde', 'Nova Central', '2017-11-21', 'Motufaxx', 'Cabo Verde', '2017-11-01', 1, 1),
(17, 'ROdaxxxx', 'M', 'Celina Marcel de Paulo', 'Margarida Sebas de Sousa', 'Cabo Verde', 'Nova Central', '2017-11-21', 'Motufaxxx', 'Cabo Verde', '2017-11-01', 1, 1),
(18, 'as', 'M', 'Celina Marcel de Paulo', 'Paulino Sobrinho de Paulo', 'Angola', 'Nova Central', '2017-11-17', '01888LOA78', 'LUa', '2017-11-07', 1, 1),
(19, 'ass', 'M', 'Celina Marcel de Paulo', 'Paulino Sobrinho de Paulo', 'Angola', 'Nova Central', '2017-11-17', '01888LOA78s', 'LUa', '2017-11-07', 1, 1),
(20, 'Hugo Lucca Alves', 'M', 'Diogo Correia Martins', 'Sandra Correia Martins', 'Brasil', 'Anapurus', '2017-11-06', '419.924.543-02', 'MA', '2017-11-20', 1, 1),
(21, 'Henry Bryan Almeida', 'M', 'Rosa Pereira Goncalves', 'Bryan Giovanni Souza', 'Brasil', 'Rio de Janeiro', '2017-11-11', '517.549.623-94', 'Brasilia', '2017-11-23', 1, 1),
(22, 'Antonio Edwin Alexandre Femino', 'M', 'Antonio de Jesus Ferreira', 'Maria Jose Alexandre Ferreira', 'Congo', 'Brazzaville', '1996-01-01', '000FEIO385MUITO000FEIO', 'LDA', '1967-05-05', 1, 1),
(23, 'buuy', 'M', 'Celina Marcel de Paulo', 'Paulino Sobrinho de Paulo', 'Cabo Verde', 'Nova Central', '2017-11-01', '74169PO', 'LL', '2017-11-06', 1, 1),
(24, 'Ameli as', 'M', 'as', 'as', 'as', 'as', '2017-11-08', 'as', 'as', '2017-11-07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `Id_Professor` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Login` int(10) DEFAULT NULL,
  `Nome_Professor` varchar(40) NOT NULL,
  `Grau_Academico` varchar(40) NOT NULL,
  `Bi_Professor` varchar(40) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Email_Professor` varchar(40) DEFAULT NULL,
  `telefone1` int(10) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Professor`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`Id_Professor`, `Id_Login`, `Nome_Professor`, `Grau_Academico`, `Bi_Professor`, `Data_Nascimento`, `Email_Professor`, `telefone1`, `rua`, `bairro`, `municipio`, `cidade`, `provincia`) VALUES
(1, 5, 'Manuela Dias Fernandes', 'Doutorado', '150055LA5852', '2017-10-13', 'JuliaFerreiraDias@dayrep.com', 932337220, 'Caminho Cruz', 'Bairro Popular', 'ERMESINDE', 'Luz Sagrada', 'Benguela');

-- --------------------------------------------------------

--
-- Table structure for table `professor_curso_disciplina`
--

DROP TABLE IF EXISTS `professor_curso_disciplina`;
CREATE TABLE IF NOT EXISTS `professor_curso_disciplina` (
  `Id_Professor_Curso_Disciplina` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Professor` int(10) DEFAULT NULL,
  `Id_Curso_Disciplina` int(10) DEFAULT NULL,
  `Id_Turma` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Professor_Curso_Disciplina`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_curso_disciplina`
--

INSERT INTO `professor_curso_disciplina` (`Id_Professor_Curso_Disciplina`, `Id_Professor`, `Id_Curso_Disciplina`, `Id_Turma`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 3),
(3, 1, 1, 4),
(4, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `Id_Sala` int(10) DEFAULT NULL,
  `Numero_Sala` int(10) DEFAULT NULL,
  `Capacidade_Sala` int(10) DEFAULT NULL,
  `Id_Curso` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`Id_Sala`, `Numero_Sala`, `Capacidade_Sala`, `Id_Curso`) VALUES
(1, 1, 60, 1),
(2, 2, 30, 2),
(3, 3, 40, 3),
(4, 4, 20, 2),
(5, 5, 60, 3);

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `idTelefone` int(10) NOT NULL AUTO_INCREMENT,
  `telefone1` int(10) DEFAULT NULL,
  `telefone2` int(10) DEFAULT NULL,
  `telefone3` int(10) DEFAULT NULL,
  `idProfessor` int(10) DEFAULT NULL,
  PRIMARY KEY (`idTelefone`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`idTelefone`, `telefone1`, `telefone2`, `telefone3`, `idProfessor`) VALUES
(1, 852, NULL, NULL, 6),
(2, 952, 965, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `Id_Turma` int(10) NOT NULL AUTO_INCREMENT,
  `Nome_Turma` varchar(40) NOT NULL,
  `Capacidade_Turma` int(10) NOT NULL,
  `Id_Curso` int(10) DEFAULT NULL,
  `Id_Ano` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Turma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`Id_Turma`, `Nome_Turma`, `Capacidade_Turma`, `Id_Curso`, `Id_Ano`) VALUES
(1, 'CEJ10AM', 1, 1, 1),
(2, 'CFB10AT', 98, 2, 1),
(3, 'CEJ10AM-N', 2, 1, 1),
(4, 'CEJ10AM-I', 10, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
