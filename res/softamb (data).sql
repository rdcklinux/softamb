-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 02:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softamb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulancia`
--

CREATE TABLE `ambulancia` (
  `id` int(11) NOT NULL,
  `patente` varchar(45) NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ambulancia`
--

INSERT INTO `ambulancia` (`id`, `patente`, `persona_id`) VALUES
(1, 'XX6754', 2),
(2, 'BD7865', 3),
(3, 'HY6798', NULL),
(4, 'JI9000', 4),
(5, 'LB2367', NULL),
(6, 'YY5634', 5),
(7, 'PY6745', NULL),
(8, 'KJ9870', NULL),
(9, 'QA1243', NULL),
(10, 'GH6666', NULL),
(11, 'JU7743', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carga`
--

CREATE TABLE `carga` (
  `persona_id` int(11) NOT NULL,
  `carga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carga`
--

INSERT INTO `carga` (`persona_id`, `carga_id`) VALUES
(2, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nombre`) VALUES
(1, 'Estomago'),
(2, 'Cabeza'),
(3, 'Ojos'),
(4, 'Espalda'),
(5, 'Manos'),
(6, 'Pies');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `gestor` tinyint(1) DEFAULT '0',
  `cliente` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `telefono`, `direccion`, `activo`, `gestor`, `cliente`) VALUES
(2, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'Admin', 'Admin', '0000-00-00', '234234', 'dir', 1, 1, 0),
(3, 'cliente', '356a192b7913b04c54574d18c28d46e6395428ab', 'Cliente', 'Cliente', '0000-00-00', '234234', 'dir', 1, 0, 1),
(4, 'ambos', '356a192b7913b04c54574d18c28d46e6395428ab', 'Ambos', 'Ambos', '0000-00-00', '234234', 'dir', 1, 1, 1),
(5, '9999999999', NULL, '', '', '0000-00-00', NULL, '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sintoma`
--

CREATE TABLE `sintoma` (
  `id` int(11) NOT NULL,
  `descripcion_sintomas` varchar(255) NOT NULL,
  `primeros_auxilios` mediumtext,
  `ambulancia` tinyint(1) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sintoma`
--

INSERT INTO `sintoma` (`id`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES
(11, '1 Inapetencia\r\n2 Náuseas o vómitos\r\n*Dolor en la parte superior del vientre o el abdome', '1- Poner Guatero caliente en la sona con dolor\r\n2- Tomar infuciones calientes\r\n3- ingerir 25 gotas de viadil forte\r\n\r\nConsulte con el médico si presenta:\r\n\r\n- Dolor en la parte superior del vientre o el abdomen que no desaparece.\r\n\r\n- Vómito con sangre o material con aspecto de cuncho de café.', 0, 1),
(12, '1 Dolor Abdominar superios\r\n2 Colicos e hinchazon\r\n3 Perdida de apetito\r\n4 Resequedad bucal ', '1 Tomar infusiones tales como:Matico, Menta, Manzanilla\r\n\r\n2 Ingerir 25 gotas de Viadil forte\r\n\r\nSi los dolores persiste luego de haber transcurrido 45 minutos\r\n\r\nAcuda a medicina general', 0, 1),
(13, '1 Fuerte dolor abdominar\r\n2 Vomitos \r\n3 Deposiciones con sangre', 'Acudir de inmediato a un centro medico ', 1, 1),
(14, '1 Dolor de cabeza de leve a moderado y presión que puede empezar en la parte de atrás de la cabeza/cuello y avanzar hacia adelante, o viceversa.\r\n2 Dolor en el cuello o los hombros', '1 ingerir analgésicos de venta libre, como ácido acetilsalicílico (aspirin), ibuprofeno o paracetamol\r\n\r\n2 Descansar la vista en una habitación oscura.\r\n\r\n3 Poner compresas fria sobre la sona con dolor', 0, 2),
(15, '1 Dolor detrás de los ojos y en la parte de atrás de la cabeza\r\n2 Sensibilidad a la luz y al ruido \r\n3 Náusea y vómitos', '1 Beba agua para evitar la deshidratación, especialmente si ha vomitado\r\n\r\n2 Descanse en una habitación tranquila y oscura\r\n\r\n3 Coloque compresa frío sobre la cabeza\r\n\r\n4 Tomar al analgesico tal como: aspirina, ibuprofeno, colmax', 0, 2),
(17, '1 Dolor de cabeza causado por un traumatimos ', 'Acudir de inmediato a un centro medioc', 1, 2),
(18, '1 Ojos enrojecidos\r\n2 Constantes lagrimas\r\n3 Argor\r\n4 Sensación de tener un cuerpo extraño dentro del ojo', '1  Utilizar compresas de agua tibia o fría.\r\n\r\n2 Quitar maquillaje o lentes de contactos\r\n\r\n3 Es necesario acudir a un especialista ya que si la infección es bacteriana', 0, 3),
(19, '1 Visión borrosa\r\n2 Ojos rojos o inyectado en sangre\r\n3  Picor y dolor\r\n4 Sensación de cuerpo extraño en el ojo\r\n5 Pus o secreción\r\n6 Sensibilidad a la luz', '1 Aplicar gotas para el ardor ocular.\r\n\r\nSi los sintomas persisten despues de 45 minutos de haber aplicado las gotas.\r\n\r\nEs necesario acudir a un especialista ya que puede ser una ulcera ocular.', 1, 3),
(20, '1 Dolor o enrojecimiento de los ojos. \r\n2 Malestar al moverlos.\r\n3 Perdida de la visión\r\n4 Hinchazón\r\n5 Ojo negro o sangrado', '1 Lavar los ojos con agua tibia para quitar elementos extraños \r\n\r\nAcudir de urgencia a un centro medico en caso de: Sandrago o inflamación. \r\n', 1, 3),
(21, '1 Inmovilización temporal o permanente.\r\n2 Fuerte dolor en la zona afectada \r\n3 Zona afiebrada', '1. Cambio de postura. Si trabajas frente a una computadora los brazos deben estar apoyados sobre el escritorio hasta al nivel de los codos.\r\n2. Hacer ejercicios de estiramiento.\r\n3. Si ya tienes la lesión la puedes tratar con rehabilitación.\r\n\r\nAcudir a un centro asistencial si el dolor perdura más de 5 dias. ', 0, 4),
(22, '1 Sensación de hormigueo o ardor\r\n2 Sensación de dolor sordo o dolor agudo\r\n3 inmobilidad corporal', '1 Aplicar compresa calientes\r\n2 Tomar antiinflamatorio\r\n\r\nSi el dolor persiste por más de 3 dias acudir de inmeditado a un centro asistencial ', 0, 4),
(23, '1 Normalmente, el dolor en la pierna es peor que el dolor lumbar.\r\n2 Entumecimiento, debilidad u hormigueo en la pierna.\r\n3 Dolor lumbar o dolor de espalda en los glúteos.\r\n4 Pérdida del control de esfínteres', 'Acudir de inmediato a un centro medico', 1, 4),
(24, '1 Torpeza de la mano al agarrar objetos\r\n2 Entumecimiento u hormigueo en el pulgar y en los dos o tres dedos siguientes de una o ambas manos.\r\n3 Dolor que se extiende al codo.\r\n4 Dolor en la mano o la muñeca en una o ambas manos.\r\n', '1 Usar una férula en la noche por algunas semanas. Si esto no ayuda, posiblemente sea necesario usarla también durante el día.\r\n\r\n2 Evitar dormir sobre las muñecas.\r\n\r\n3 Aplicar compresas frías o calientes en la zona afectada.\r\n\r\nSi el dolor persiste despues de 7 dias acudir a un centro medico. ', 0, 5),
(25, '1 Rigidez matutina, que dura por más de 1 hora\r\n2 Las articulaciones pueden sentirse calientes, sensibles\r\n3 El dolor articular a menudo se siente en la misma articulación en ambos lados de las manos', '1 ingerir un antinflamatorio\r\n\r\n2 Aplicar compresas calientes \r\n\r\nAcudir a un centro medico', 0, 5),
(26, '1 Calambres\r\n2 Fatiga\r\n3 Debilidad muscular\r\n4 Entumecimiento, hormigueo o sensación de hormigueo\r\n5 Fasciculaciones\r\n6 Movimientos rápidos, sin propósito e incontrolables', '1 Tomar un vaso de agua con una cucharada sopera de melaza de caña y otra de vinagre de manzana .\r\n\r\nAcudir a un centro medico ya que debe ser un espasmo o calmbre', 0, 6),
(27, '1 inflamacion y sensibilizará el área del medio del pie\r\n2 Moretones en esa área (pigmentación azul y negra).\r\n3 Dolor constante', '1 Reposo de la articulación\r\n2 Hielo en el área lesionada para disminuir la inflamación (hinchazón)\r\n3 Compresión de la inflamación (hinchazón) con un vendaje elástico\r\n4 Elevación del área lesionada\r\n\r\nSi el dolor persiste pasado 24 hrs, acuda un centro medico', 0, 6),
(28, '1 Podemos encontrar dolor en los movimientos de flexo-extensión del tobillo y al intentar colocarnos de puntillas.\r\n\r\n2 Por otro lado puede aparecer inflamación y rigidez en el tendón sobre todo tras periodos de descanso ( por las mañanas).', '1 Aplique hielo sobre el tendón de Aquiles por 15 a 20 minutos, de 2 a 3 veces al día. Utilice una compresa de hielo envuelta en un trapo. NO aplique hielo directamente sobre la piel.\r\n\r\n2 Tome analgésicos, como ácido acetilsalicílico (aspirin), ibuprofeno (Advil o Motrin) o naproxeno (Aleve, Naprosyn) para reducir la inflamación y el dolor.\r\n\r\nSi el dolor persiste mas de 24 hrs acudir a un centro medico', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulancia`
--
ALTER TABLE `ambulancia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ambulancia_persona_idx` (`persona_id`);

--
-- Indexes for table `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`carga_id`,`persona_id`),
  ADD KEY `fk_persona_idx` (`persona_id`),
  ADD KEY `fk_carga_idx` (`carga_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sintoma`
--
ALTER TABLE `sintoma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sintoma_category1_idx` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulancia`
--
ALTER TABLE `ambulancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sintoma`
--
ALTER TABLE `sintoma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambulancia`
--
ALTER TABLE `ambulancia`
  ADD CONSTRAINT `fk_ambulancia_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `fk_carga_carga` FOREIGN KEY (`carga_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carga_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sintoma`
--
ALTER TABLE `sintoma`
  ADD CONSTRAINT `fk_sintoma_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
