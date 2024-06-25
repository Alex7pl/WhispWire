-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2023 a las 17:01:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `whispwire`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `Id` int(6) NOT NULL,
  `Emisor` varchar(255) NOT NULL,
  `Receptor` varchar(255) NOT NULL,
  `Asunto` varchar(255) NOT NULL,
  `Mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  `Abierto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`Id`, `Emisor`, `Receptor`, `Asunto`, `Mensaje`, `Fecha`, `Abierto`) VALUES
(140, 'alex7pl', 'roberto', 'Hola', 'Hola tío que tal todo? Bien espero. Por aquí todo está tranquilo desde que te fuiste.', '2023-04-25', 1),
(150, 'pablo1', 'alex7pl', 'Trabajo Historia', 'La guerra civil española o guerra de España,15​16​17​18​ también conocida en ese país como la Guerra Civil por antonomasia,19​20​ o simplemente como la Guerra, fue un conflicto bélico —que más tarde repercutiría también en una crisis económica— que se desencadenó en España tras el fracaso parcial del golpe de Estado del 17 y 18 de julio de 1936 perpetrado por una parte de las fuerzas armadas contra el Gobierno electo de la Segunda República. Tras el bloqueo del estrecho de Gibraltar y el posterior puente aéreo que, gracias a la rápida colaboración de la Alemania nazi y la Italia fascista, trasladó las tropas rebeldes desde el territorio marroquí a la España peninsular en las últimas semanas de julio,21​22​ comenzando así una guerra civil que concluiría el sábado 1 de abril de 1939 con el último parte de guerra firmado por Francisco Franco, quien declaró su victoria y estableció una dictadura que duraría hasta su muerte, el jueves, 20 de noviembre de 1975.\r\n\r\nLa guerra tuvo múltiples facetas, pues incluyó lucha de clases, guerra de religión, enfrentamiento de nacionalismos opuestos, lucha entre dictadura militar y democracia republicana, entre contrarrevolución y revolución, entre fascismo y comunismo.23​', '2022-07-03', 1),
(160, 'alex7pl', 'pablo7', 'Problema', 'Tenemos un problema con la aplicación tío.', '2023-04-25', 1),
(170, 'alex7pl', 'roberto', 'Quedada', 'Sigue en pie?', '0000-00-00', 1),
(210, 'pablo1', 'alex7pl', 'Mensaje Importante', 'Abre Gmail.\r\nArriba a la derecha, haz clic en Configuración Ver todos los ajustes..\r\nHaz clic en la pestaña Etiquetas.\r\nDesplázate hasta la sección Etiquetas y haz clic en Crear etiqueta.\r\nEscribe el nombre de la etiqueta, como URGENTE o IMPORTANTE y haz clic en Crear.', '2020-07-20', 1),
(220, 'roberto', 'alex7pl', 'Matrices', 'Para encontrar la adjunta de una matriz, primero encuentre la matriz cofactor de la matriz dada. Luego encuentre la traspuesta de la matriz cofactor. Ahora encuentre la traspuesta A ij .', '2023-03-23', 1),
(240, 'alex7pl', 'pablo7', '¿Cómo buscar una canción con Google?', 'En la barra de búsqueda, toca el micrófono . Pregunta \"¿Cuál es esta canción?\", o toca Buscar canción. Reproduce una canción, o bien tararea, silba o canta la melodía. Si reproduces una canción, Google la identificará.', '2023-04-28', 0),
(250, 'pablo7', 'roberto', '505', 'I\'m going back to 505\r\nIf it\'s a seven hour flight or a forty-five minute drive\r\nIn my imagination, you\'re waitin\' lyin\' on your side\r\nWith your hands between your thighs\r\nStop and wait a sec\r\nWhen you look at me like that, my darlin\', what did you expect?\r\nI\'d probably still adore you with your hands around my neck\r\nOr I did last time I checked\r\nNot shy of a spark\r\nThe knife twists at the thought that I should fall short of the mark\r\nFrightened by the bite, though it\'s no harsher than the bark\r\nThe middle of adventure, such a perfect place to start\r\nI\'m going back to 505\r\nIf it\'s a seven hour flight or a forty-five minute drive\r\nIn my imagination, you\'re waitin\' lyin\' on your side\r\nWith your hands between your thighs\r\nBut I crumble completely when you cry\r\nIt seems like once again you\'ve had to greet me with goodbye\r\nI\'m always just about to go and spoil the surprise\r\nTake my hands off of your eyes too soon\r\nI\'m going back to 505\r\nIf it\'s a seven hour flight or a forty-five minute drive\r\nIn my imagination, you\'re waitin\' lyin\' on your side\r\nWith your hands between your thighs and a smile', '2023-04-27', 0),
(260, 'pablo7', 'pablo1', 'Significado 505', 'Significado. Alex Turner contó que escribió la canción mientras viajaba solo en un tren, por la noche, desde Filadelfia a Nueva York, para encontrarse con la que entonces era su novia (Alexa Chung), quien lo esperaba en una habitación de hotel cuyo número era el 505.', '2023-04-28', 0),
(270, 'roberto', 'pablo7', 'Problema', 'Tenemos otro problema', '2023-04-28', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Contraseña`) VALUES
('admin', 'admin'),
('alex7pl', 'alex7pl'),
('manolo29', 'manolo29'),
('pablo1', 'pablo1'),
('pablo7', 'pablo7'),
('roberto', 'roberto'),
('sergio', 'sergio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
