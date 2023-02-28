-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2023 a las 11:07:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw2_2022_01_comenta_libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(12) UNSIGNED NOT NULL,
  `patrocinador_id` int(12) UNSIGNED NOT NULL COMMENT 'Patrocinador relacionado con el anuncio.',
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para el anuncio.',
  `descripcion` text DEFAULT NULL COMMENT 'Descripción o texto del anuncio.',
  `prioridad` int(4) NOT NULL DEFAULT 0 COMMENT 'Indicador de importancia para dar más o menos visibilidad al anuncio.',
  `visible` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de anuncio visible a los usuarios o invisible (se está manteniendo o no publicado): 0=Invisible, 1=Visible.',
  `editorial_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Relación con una Editorial o NULL si no tiene nada que ver.',
  `libro_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Relación con un Libro o NULL si no tiene nada que ver.',
  `genero_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Relación con un Género o NULL si no tiene nada que ver.',
  `evento_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Relación con un Evento o NULL si no tiene nada que ver.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado el registro o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del registro o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado el registro por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del registro o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `patrocinador_id`, `titulo`, `descripcion`, `prioridad`, `visible`, `editorial_id`, `libro_id`, `genero_id`, `evento_id`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 'Titulo del anuncio 1', 'Descripcion del anuncio 1', 0, 0, 1, 1, 0, 0, 0, '2023-01-14 16:05:45', 0, NULL),
(2, 2, 'anuncio Victor 1', 'Este es el primer anuncio de victor', 1, 1, 0, 3, 0, 0, 0, '2023-02-27 12:06:38', 0, '2023-02-27 12:06:38'),
(3, 2, 'Anuncio Victor 2', 'Anuncio numero 2', 3, 1, 0, 2, 0, 0, 0, '2023-02-27 12:06:38', 0, '2023-02-27 12:06:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(150) DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` text DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre`, `url`, `descripcion`, `revisado`) VALUES
(1, 'Nombre del autor 1', 'https://es.wikipedia.org/wiki/Miguel_de_Cervantes', 'Descripcion del autor 1', 0),
(2, 'Charles Dickens', 'https://es.wikipedia.org/wiki/Charles_Dickens', 'Creó algunos de los personajes de ficción más conocidos en el mundo y muchos lo consideran el mejor novelista de la época victoriana', 0),
(3, 'Federico García Lorca', 'https://es.wikipedia.org/wiki/Federico_Garc%C3%ADa_Lorca', 'Poeta, dramaturgo y prosista español. Adscrito a la generación del 27, fue el poeta de mayor influencia y popularidad de la literatura española del siglo xx', 0),
(4, 'Ernest Hemingway', 'https://es.wikipedia.org/wiki/Ernest_Hemingway', 'Fue un escritor y periodista estadounidense, uno de los principales novelistas y cuentistas del siglo XX.', 0),
(5, 'Marqués de Sade', 'https://es.wikipedia.org/wiki/Marqu%C3%A9s_de_Sade', 'Escritor, ensayista y filósofo francés, autor de numerosas obras de diversos géneros que lo convirtieron en uno de los mayores y más crudos literatos de la literatura universal.', 0),
(6, 'Jane Austen', 'https://es.wikipedia.org/wiki/Jane_Austen', 'Novelista británica que vivió durante la época georgiana', 0),
(7, 'Mary Shelley', 'https://es.wikipedia.org/wiki/Mary_Shelley', 'Escritora,​ dramaturga, ensayista y biógrafa británica​ reconocida principalmente por ser la autora de la novela gótica Frankenstein o el moderno Prometeo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `variable` varchar(50) NOT NULL,
  `valor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`variable`, `valor`) VALUES
('configuracion1', 'valorconf1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(150) DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` text DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `nombre`, `url`, `descripcion`, `revisado`) VALUES
(1, 'Nombre editorial 1', 'https://www.planeta.es/es', 'Descripcion de la editorial 1', 0),
(2, 'ACEN', 'https://aceneditorial.es/', 'ACEN es una editorial que da una oportunidad a los autores/as noveles, para que puedan ver publicadas sus obras', 0),
(3, 'Alfaguara', 'https://es.wikipedia.org/wiki/Alfaguara_(editorial)', 'editorial española de la compañía Penguin Random House, que edita fundamentalmente narrativa y libros infantiles y juveniles.\r\n\r\nRecibió el Premio Nacional a la Mejor Labor Editorial Cultural 2021', 0),
(4, 'atonitos editorial', 'http://www.atonitos.es/', 'Atónitos es una apuesta por la edición independiente, cultural y crítica. Para nosotros, los libros continúan siendo la principal vía de conocimiento y diversión.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe la etiqueta o NULL si no es necesario.',
  `revisada` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de etiqueta aceptada o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`, `descripcion`, `revisada`) VALUES
(1, 'Etiqueta 1', 'Descripcion etiqueta 1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe al género o clasificación.',
  `icono` varchar(25) DEFAULT NULL COMMENT 'Nombre del icono relacionado de entre los disponibles en la aplicación (carpeta iconos posibles).',
  `genero_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Categoria relacionada, para poder realizar la jerarquía de géneros. Nodo padre de la jerarquía de género, o CERO si es nodo raiz (como si fuera NULL).',
  `revisado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de género aceptado o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `descripcion`, `icono`, `genero_id`, `revisado`) VALUES
(1, 'Genero 1', 'Descripcion genero 1', NULL, 1, 0),
(2, 'Drama', 'Obra de teatro en prosa o en verso, en especial aquella que constituye una síntesis de la comedia y la tragedia.', '', 0, 0),
(3, 'romance', 'Composición poética constituida por una serie indefinida de versos, generalmente octosílabos, que riman en asonante los pares y quedan sueltos los impares.', '', 0, 0),
(4, 'ciencia ficcion', 'uno de los géneros derivados de la literatura de ficción, junto con la literatura fantástica y la narrativa de terror', '', 0, 0),
(5, 'terror', 'Miedo intenso.', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) NOT NULL COMMENT 'Nombre del idioma.',
  `codigo` varchar(5) DEFAULT NULL COMMENT 'Codigo ISO del idioma o NULL si no es necesario.',
  `revisado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de idioma aceptado o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `codigo`, `revisado`) VALUES
(1, 'Español de España', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ilustradores`
--

CREATE TABLE `ilustradores` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(150) DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` text DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ilustradores`
--

INSERT INTO `ilustradores` (`id`, `nombre`, `url`, `descripcion`, `revisado`) VALUES
(1, 'Ilustrador1', 'https://es.wikipedia.org/wiki/Stan_Lee', 'Descrpcion del ilustrador1', 0),
(2, 'Maurice Sendak', 'https://es.wikipedia.org/wiki/Maurice_Sendak', 'ilustrador y escritor de literatura infantil estadounidense.', 0),
(3, 'Ray Caesar', 'http://www.raycaesar.com/', 'Ray Caesar es un artista surrealista digital inglés que vive y trabaja en Arcadia, Canadá', 0),
(4, 'George Barbier', 'https://es.wikipedia.org/wiki/George_Barbier', 'pintor francés, diseñador de moda y uno de los más importantes ilustradores del art déco en Francia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(12) UNSIGNED NOT NULL,
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para el libro.',
  `resumen` text DEFAULT NULL COMMENT 'Descripción breve del libro o NULL si no es necesaria.',
  `autor_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Autor principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `ilustrador_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Ilustrador principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `traductor_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Traductor principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `editorial_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Editorial del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `genero_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Género/Categoria de clasificación del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  `coleccion` text DEFAULT NULL COMMENT 'Descripcion de la colección a la que pertenece el libro o NULL si no se conoce.',
  `idioma_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Idioma de edición del libro o CERO si no existe o aún no está indicado (como si fuera NULL).',
  `clase_formato_id` char(1) NOT NULL DEFAULT 'M' COMMENT 'Código de clase de formato: P=Papel, B=Papel/Bolsillo, D=Digital, E=Digital/EBook, A=Digital/Audible, ...',
  `paginas` int(6) NOT NULL DEFAULT 0 COMMENT 'Número de páginas del libro o CERO si no se conoce aún.',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o "de portada" del libro, o NULL si no hay.',
  `visible` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de libro visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.',
  `terminado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de libro terminado o suspendido: 0=No, 1=Eliminado por usuario, 2=Suspendido, 3=Cancelado por inadecuado, ...',
  `fecha_terminacion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de terminación del libro. Debería estar a NULL si no está terminado.',
  `num_denuncias` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de denuncias del libro o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de libro bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del libro. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del libro o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  `cerrado_comentar` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de libro cerrado para comentarios: 0=No, 1=Si.',
  `sumaValores` int(9) NOT NULL DEFAULT 0 COMMENT 'Suma acumulada de las valoraciones para el libro.',
  `totalVotos` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de votos (valoraciones) emitidas para el libro.',
  `cerrado_eventos` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de libro cerrado para eventos: 0=No, 1=Si.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado el libro o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del libro o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado el libro por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del libro o NULL si no se conoce por algún motivo.',
  `notas_admin` text DEFAULT NULL COMMENT 'Notas adicionales para los moderadores/administradores sobre el libro o NULL si no hay.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `resumen`, `autor_id`, `ilustrador_id`, `traductor_id`, `editorial_id`, `genero_id`, `coleccion`, `idioma_id`, `clase_formato_id`, `paginas`, `imagen_id`, `visible`, `terminado`, `fecha_terminacion`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `cerrado_comentar`, `sumaValores`, `totalVotos`, `cerrado_eventos`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`, `notas_admin`) VALUES
(1, 'Titulo de prueba 1', 'Resumen de prueba 1 del libro 1', 1, 1, 1, 1, 1, NULL, 1, 'M', 300, NULL, 1, 1, '2023-01-14 16:02:17', 0, NULL, 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(2, 'La brisa de Oriente', 'Umberto de Quéribus, un joven monje blanco, emprende un viaje en 1204 acompañando a su abad con destino a Constantinopla. A partir de este momento, su vida cambia por completo, arrastrado a peligros y situaciones extremas en las que perderá toda candidez infantil. Durante el viaje de regreso a su monasterio conocerá la sinrazón de la guerra, la violencia desmedida, la inmoralidad de la avaricia; también será consciente de los verdaderos efectos de la obediencia debida, de la enorme incertidumbre de saber lo que está bien y lo que está mal, inmerso en una lucha constante entre lo que le han enseñado y lo que en realidad siente. Recibirá la punzada del amor irrefrenable y adolescente, el desasosiego producido por el sentimiento de la culpa, el zarpazo del resentimiento y, sobre todo, el sentido más profundo de la amistad encarnada en el caballero Esteban de Clary y en el monje Roger, de cuya mano aprenderá el significado de la cultura, la importancia de lo que se escribe, y la influencia y poder que tiene el copista para manejar, alterar o cambiar lo escrito. Su inconsciente acercamiento a la herejía le pondrá en peligro, hasta el punto de tener que abandonar su monasterio, después de haber visto sembrado el desastre a su alrededor.', 1, 1, 1, 1, 1, '', 1, 'M', 50, '', 1, 1, '2023-01-03 00:00:00', 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(3, 'Castillos de fuego', 'Muchos luchan por salir adelante en una ciudad marcada por el hambre, la penuria y el estraperlo. Como Eloy, un joven tullido que trata de salvar de la pena de muerte a su hermano encarcelado; Alicia, taquillera en un cine que pierde su empleo por seguir su corazón; Basilio, profesor de universidad que afronta un proceso de depuración; el falangista Matías, que trafica con objetos requisados, o Valentín, capaz de cualquier vileza con tal de purgar su anterior militancia. Costureras, estudiantes, policías: vidas de personas comunes en tiempos extraordinarios.', 2, 2, 3, 4, 3, '', 1, 'M', 222, '', 1, 1, '2023-01-19 00:51:26', 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(4, 'En la sombra', 'Katja, una mujer alemana, quiere vengarse de dos neonazis que asesinaron a su esposo y a su hijo de 6 años mediante un atentado con bomba.', 3, 4, 4, 3, 2, '', 1, 'M', 432, '', 1, 1, NULL, 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(5, 'Esperando al diluvio', 'Entre los años 1968 y 1969, el asesino al que la prensa bautizaría como John Biblia mató a tres mujeres en Glasgow.  Nunca fue identificado y el caso todavía sigue abierto hoy en día', 3, 2, 4, 4, 3, '', 1, 'M', 322, '', 1, 1, NULL, 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(6, 'Nosotros', 'Adelaide Wilson, su marido y sus dos hijos visitan la casa en la que ella creció junto a la playa. Allí, Adelaide tiene un presentimiento siniestro que precede a un encuentro espeluznante: cuatro enmascarados se presentan ante su casa.', 6, 2, 3, 2, 4, '', 1, 'M', 110, '', 1, 1, NULL, 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(7, 'Hijos de la fabula', 'Dos jóvenes exaltados, Asier y Joseba, se marchan en 2011 al sur de Francia con la intención de convertirse en militantes de ETA. Esperan instrucciones en una granja de pollos, acogidos por una pareja francesa con la que apenas se entienden. Allí se enteran de que la banda ha anunciado el cese de la actividad armada. ', 6, 4, 2, 4, 4, '', 1, 'M', 220, '', 1, 1, '2023-02-15 12:00:00', 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(8, 'El cuco de cristal', 'Nueva York, 2017. Cora Merlo, médico residente de primer año, sufre un infarto fulminante que la obliga a un trasplante de corazón. Aún convaleciente la joven recibe la visita de una extraña mujer con una enigmática oferta: pasar unos días en Steelville, un pequeño pueblo de interior, para conocer la vida de su hijo Charles, el donante de su corazón.', 7, 2, 3, 4, 4, '', 1, 'M', 0, '', 1, 1, '2023-01-19 22:44:33', 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(9, 'El ancho mundo', 'Beirut, París, Saigón, 1948. Una trepidante saga familiar llena de secretos, peripecias, aventuras amorosas, turbios negocios y crímenes', 5, 2, 3, 2, 3, '', 1, 'M', 2222, '', 1, 1, '2023-02-01 05:36:24', 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(10, 'El juego del alma', 'Despuésde alcanzar 1.700.000 de ejemplares vendidos, Javier Castillo pone en jaque al lector en su quinta novela.¿Quieres jugar?Nueva York, 2011. Una chica de quince años aparece crucificada en un suburbioa las afueras.', 4, 4, 4, 4, 4, '', 1, 'M', 660, '', 1, 0, NULL, 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, ''),
(11, 'Lejos de Luisiana', 'Persiguieron sus sueños a orillas del Misisipi. Sus vidas fueron más grandes que el río Después de años de colonización, la familia Girard acepta la controvertida decisión de su país, Francia,', 3, 2, 1, 3, 3, '', 1, 'M', 990, '', 0, 0, NULL, 0, NULL, 0, NULL, '', 0, 0, 0, 0, 0, NULL, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_autores`
--

CREATE TABLE `libros_autores` (
  `id` int(12) UNSIGNED NOT NULL,
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `autor_id` int(12) UNSIGNED NOT NULL COMMENT 'Autor relacionado.',
  `orden` int(4) NOT NULL DEFAULT 0 COMMENT 'Orden de aparición del autor dentro del grupo de autores del libro. Opcional.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_autores`
--

INSERT INTO `libros_autores` (`id`, `libro_id`, `autor_id`, `orden`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_comentarios`
--

CREATE TABLE `libros_comentarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `valoracion` int(9) NOT NULL DEFAULT 0 COMMENT 'Valoración dada al libro.',
  `texto` text NOT NULL COMMENT 'El texto del comentario.',
  `comentario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Comentario relacionado, si se permiten encadenar respuestas. Nodo padre de la jerarquia de comentarios, CERO si es nodo raiz.',
  `cerrado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de cierre de los comentarios: 0=No, 1=Si(No se puede responder al comentario)',
  `num_denuncias` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de denuncias del comentario o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de comentario bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del comentario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del comentario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado el comentario o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del comentario o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado el comentario por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del comentario o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_comentarios`
--

INSERT INTO `libros_comentarios` (`id`, `libro_id`, `valoracion`, `texto`, `comentario_id`, `cerrado`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 10, 'Texto del comentario1 del libro1', 1, 0, 0, NULL, 0, NULL, NULL, 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_etiquetas`
--

CREATE TABLE `libros_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_etiquetas`
--

INSERT INTO `libros_etiquetas` (`id`, `libro_id`, `etiqueta_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_eventos`
--

CREATE TABLE `libros_eventos` (
  `id` int(12) UNSIGNED NOT NULL,
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `texto` text NOT NULL COMMENT 'El texto del evento.',
  `fecha_desde` datetime DEFAULT NULL COMMENT 'Fecha y Hora de inicio del evento o NULL si no se conoce (mostrar próximamente).',
  `fecha_hasta` datetime DEFAULT NULL COMMENT 'Fecha y Hora de finalización del evento o NULL si no se conoce (no caduca automáticamente).',
  `num_denuncias` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de denuncias del evento o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de evento bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del evento. Debería estar a NULL si no está bloqueada o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del evento o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado el evento o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del evento o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado el evento por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del evento o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_eventos`
--

INSERT INTO `libros_eventos` (`id`, `libro_id`, `texto`, `fecha_desde`, `fecha_hasta`, `num_denuncias`, `fecha_denuncia1`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`) VALUES
(1, 1, 'Texto 1 del evento 1', '2023-01-13 16:17:16', '2023-01-16 16:17:16', 0, NULL, 0, NULL, NULL, 1, '2023-01-11 16:17:16', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_eventos_asistentes`
--

CREATE TABLE `libros_eventos_asistentes` (
  `id` int(12) UNSIGNED NOT NULL,
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado. Copia de la que tiene el evento por agilidad en búsquedas.',
  `evento_id` int(12) UNSIGNED NOT NULL COMMENT 'Evento relacionado.',
  `usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'usuario relacionado que asistira al evento.',
  `fecha_alta` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación de la asistencia al evento o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_eventos_asistentes`
--

INSERT INTO `libros_eventos_asistentes` (`id`, `libro_id`, `evento_id`, `usuario_id`, `fecha_alta`) VALUES
(1, 1, 1, 1, '2023-01-15 16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_imagenes`
--

CREATE TABLE `libros_imagenes` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero externo en carpeta custodiada) con la imagen del libro.',
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `orden` int(4) NOT NULL DEFAULT 0 COMMENT 'Orden de aparición de la imagen dentro del grupo de imagenes del libro. Opcional.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_urls`
--

CREATE TABLE `libros_urls` (
  `id` int(12) UNSIGNED NOT NULL,
  `libro_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `orden` int(4) NOT NULL DEFAULT 0 COMMENT 'Orden de aparición de la URL dentro del grupo de URLs del libro. Opcional.',
  `url` text NOT NULL COMMENT 'La dirección URL, supuestamente válida.',
  `titulo` text DEFAULT NULL COMMENT 'Título de la URL. Opcioinal.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_urls`
--

INSERT INTO `libros_urls` (`id`, `libro_id`, `orden`, `url`, `titulo`) VALUES
(1, 1, 1, 'https://www.planetadelibros.com/libro-stan-lee-asombroso-fantastico-increible-unas-memorias-maravillosas/262913', 'Titulo 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinadores`
--

CREATE TABLE `patrocinadores` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con los datos principales.',
  `nif_cif` varchar(12) NOT NULL COMMENT 'Identificador del patrocinador.',
  `razon_social` varchar(255) DEFAULT NULL COMMENT 'Razon social del patrocinador o NULL si con el "nombre y apellidos" del usuario es suficiente.',
  `telefono_comercial` varchar(25) NOT NULL,
  `telefono_contacto` varchar(25) NOT NULL,
  `url` text DEFAULT NULL COMMENT 'Dirección web del patrocinador o NULL si no hay o no se conoce.',
  `fecha_alta` datetime DEFAULT NULL COMMENT 'Fecha y Hora de alta como patrocinador, no como usuario o NULL si no se conoce por algún motivo (que no debería ser).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patrocinadores`
--

INSERT INTO `patrocinadores` (`id`, `usuario_id`, `nif_cif`, `razon_social`, `telefono_comercial`, `telefono_contacto`, `url`, `fecha_alta`) VALUES
(1, 1, '11111111A', NULL, '111111111', '111111111', 'https://www.marvel.com/', '2023-01-12 16:00:00'),
(2, 2, '11111', 'NULL', '666666', '666665', 'victor.es', '2023-02-27 12:05:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha_registro` datetime NOT NULL COMMENT 'Fecha y Hora del registro.',
  `clase_log_id` char(1) NOT NULL COMMENT 'código de clase de log: E=Error, A=Aviso, S=Seguimiento, I=Información, D=Depuración, ...',
  `modulo` varchar(50) DEFAULT 'app' COMMENT 'Modulo o Sección de la aplicación que ha generado el mensaje de registro.',
  `texto` text DEFAULT NULL COMMENT 'Texto con el mensaje de registro.',
  `ip` varchar(40) DEFAULT NULL COMMENT 'Dirección IP desde donde accede el usuario (vale para IPv4 e IPv6.',
  `browser` text DEFAULT NULL COMMENT 'Texto con información del navegador utilizado en el acceso.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fecha_registro`, `clase_log_id`, `modulo`, `texto`, `ip`, `browser`) VALUES
(1, '2023-01-15 16:29:06', '1', 'app', 'Texto del registro 1', '127.0.0.1', 'Google Chrome');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traductores`
--

CREATE TABLE `traductores` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(150) DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` text DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `traductores`
--

INSERT INTO `traductores` (`id`, `nombre`, `url`, `descripcion`, `revisado`) VALUES
(1, 'Nombre traductor 1', 'https://es.linkedin.com/in/uriel-l%C3%B3pez-dom%C3%ADnguez-13bb0b34', 'Descripcion traductor 1', 0),
(2, 'Sin traductor', '', 'El libro se encuentra en su idioma original', 0),
(3, 'Montserrat Abelló', 'https://es.wikipedia.org/wiki/Montserrat_Abell%C3%B3', 'fue una poetisa y traductora española que escribía en lengua catalana.', 0),
(4, 'Eduardo Acosta', 'https://es.wikipedia.org/wiki/Eduardo_Acosta', 'fue un filólogo, historiador, traductor, papirólogo, profesor universitario y helenista español, investigador y estudioso multidisciplinar que destacó por sus trabajos sobre Sócrates y Epicuro.', 0),
(5, 'Jesús Aguado', 'https://es.wikipedia.org/wiki/Jes%C3%BAs_Aguado', 'poeta, traductor y antólogo español.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Correo Electronico y "login" del usuario.',
  `password` varchar(60) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL COMMENT 'Fecha de nacimiento del usuario o NULL si no lo quiere informar.',
  `direccion` text DEFAULT NULL COMMENT 'Direccion del usuario o NULL si no quiere informar.',
  `fecha_registro` datetime DEFAULT NULL COMMENT 'Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).',
  `confirmado` tinyint(1) NOT NULL COMMENT 'Indicador de usuario ha confirmado su registro o no.',
  `fecha_acceso` datetime DEFAULT NULL COMMENT 'Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.',
  `num_accesos` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nick`, `nombre`, `apellidos`, `fecha_nacimiento`, `direccion`, `fecha_registro`, `confirmado`, `fecha_acceso`, `num_accesos`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`) VALUES
(1, 'usuario1@gmail.com', 'abc123.', 'usuario1', 'usuario1', 'apellido1usuario1', '2002-11-07', 'Direccion usuario 1', '2023-01-01 16:00:00', 0, '2023-01-13 16:33:14', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_avisos`
--

CREATE TABLE `usuarios_avisos` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha_aviso` datetime NOT NULL COMMENT 'Fecha y Hora de creación del aviso.',
  `clase_aviso_id` char(1) NOT NULL DEFAULT 'M' COMMENT 'código de clase de aviso: A=Aviso, N=Notificación, D=Denuncia, C=Consulta, B=Bloqueo, M=Mensaje Genérico,...',
  `texto` text DEFAULT NULL COMMENT 'Texto con el mensaje de aviso.',
  `destino_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario relacionado, destinatario del aviso, o NULL si no es para administración y aún no está gestionado.',
  `origen_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario relacionado, origen del aviso, o NULL si es del sistema.',
  `evento_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Evento relacionado o NULL si no tiene que ver directamente.',
  `libro_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Libro relacionado o NULL si no tiene que ver directamente.',
  `comentario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Comentario relacionado o NULL si no tiene que ver directamente con un comentario.',
  `fecha_lectura` datetime DEFAULT NULL COMMENT 'Fecha y Hora de lectura del aviso o NULL si no se ha leido o se ha desmarcado como tal.',
  `fecha_aceptado` datetime DEFAULT NULL COMMENT 'Fecha y Hora de aceptación del aviso o NULL si no se ha aceptado para su gestión por un moderador o administrador. No se usa en otros usuarios.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_avisos`
--

INSERT INTO `usuarios_avisos` (`id`, `fecha_aviso`, `clase_aviso_id`, `texto`, `destino_usuario_id`, `origen_usuario_id`, `evento_id`, `libro_id`, `comentario_id`, `fecha_lectura`, `fecha_aceptado`) VALUES
(1, '2023-01-15 16:36:55', 'M', 'Texto usuarios avisos 1', 1, 0, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_etiquetas`
--

CREATE TABLE `usuarios_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado.',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento de la etiqueta por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_etiquetas`
--

INSERT INTO `usuarios_etiquetas` (`id`, `usuario_id`, `etiqueta_id`, `fecha_seguimiento`) VALUES
(1, 1, 1, '2023-01-15 16:37:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_generos`
--

CREATE TABLE `usuarios_generos` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado.',
  `genero_id` int(12) UNSIGNED NOT NULL COMMENT 'Género relacionado.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento del género por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_generos`
--

INSERT INTO `usuarios_generos` (`id`, `usuario_id`, `genero_id`, `fecha_seguimiento`) VALUES
(1, 1, 1, '2023-01-15 16:38:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_generos_moderacion`
--

CREATE TABLE `usuarios_generos_moderacion` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con un Género para su moderación.',
  `genero_id` int(12) UNSIGNED NOT NULL COMMENT 'Género relacionado con el Usuario que puede moderarlo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_generos_moderacion`
--

INSERT INTO `usuarios_generos_moderacion` (`id`, `usuario_id`, `genero_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_libros`
--

CREATE TABLE `usuarios_libros` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado, seguidor del libro.',
  `local_id` int(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento del libro por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_libros`
--

INSERT INTO `usuarios_libros` (`id`, `usuario_id`, `local_id`, `fecha_seguimiento`) VALUES
(1, 1, 1, '2023-01-15 16:39:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`variable`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ilustradores`
--
ALTER TABLE `ilustradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_comentarios`
--
ALTER TABLE `libros_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_etiquetas`
--
ALTER TABLE `libros_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_eventos`
--
ALTER TABLE `libros_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_eventos_asistentes`
--
ALTER TABLE `libros_eventos_asistentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_imagenes`
--
ALTER TABLE `libros_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_urls`
--
ALTER TABLE `libros_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nif_cif_UNIQUE` (`nif_cif`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `traductores`
--
ALTER TABLE `traductores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nick_UNIQUE` (`nick`);

--
-- Indices de la tabla `usuarios_avisos`
--
ALTER TABLE `usuarios_avisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_etiquetas`
--
ALTER TABLE `usuarios_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_generos`
--
ALTER TABLE `usuarios_generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_generos_moderacion`
--
ALTER TABLE `usuarios_generos_moderacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_libros`
--
ALTER TABLE `usuarios_libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ilustradores`
--
ALTER TABLE `ilustradores`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros_comentarios`
--
ALTER TABLE `libros_comentarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros_etiquetas`
--
ALTER TABLE `libros_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros_eventos`
--
ALTER TABLE `libros_eventos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros_eventos_asistentes`
--
ALTER TABLE `libros_eventos_asistentes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros_imagenes`
--
ALTER TABLE `libros_imagenes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros_urls`
--
ALTER TABLE `libros_urls`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `traductores`
--
ALTER TABLE `traductores`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_avisos`
--
ALTER TABLE `usuarios_avisos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_etiquetas`
--
ALTER TABLE `usuarios_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_generos`
--
ALTER TABLE `usuarios_generos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_generos_moderacion`
--
ALTER TABLE `usuarios_generos_moderacion`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_libros`
--
ALTER TABLE `usuarios_libros`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
