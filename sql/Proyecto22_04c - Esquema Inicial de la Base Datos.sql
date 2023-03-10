-- MySQL Script generated by MySQL Workbench
-- 12/19/22 03:15:40
-- Model: DAW2-Libros    Version: 1.1

-- Proyecto en Grupo - Recomendación y Comentarios de Libros.
-- Desarrollo de Aplicaciones Web II.
-- Escuela Politécnica Superior de Zamora.
-- Universidad de Salamanca.
-- 

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema daw2_2022_01_comenta_libros
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `daw2_2022_01_comenta_libros` ;

-- -----------------------------------------------------
-- Schema daw2_2022_01_comenta_libros
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `daw2_2022_01_comenta_libros` DEFAULT CHARACTER SET utf8 ;
USE `daw2_2022_01_comenta_libros` ;

-- -----------------------------------------------------
-- Table `libros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros` ;

CREATE TABLE IF NOT EXISTS `libros` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` TEXT NOT NULL COMMENT 'Titulo corto o slogan para el libro.',
  `resumen` TEXT NULL DEFAULT NULL COMMENT 'Descripción breve del libro o NULL si no es necesaria.',
  -- Autor principal: Relación con la tabla de entidades-autor.
  `autor_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Autor principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  -- Autores adicionales: Tabla adicional con la relación entre libro y autor.
  -- Ilustrador: Relación con la tabla de entidades-ilustrador.
  `ilustrador_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Ilustrador principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  -- Traductor: Relación con la tabla de entidades-traductor.
  `traductor_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Traductor principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  -- Editorial: Relación con la tabla de entidades-editoriales.
  `editorial_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Editorial del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  -- Genero: Relación con la tabla de géneros.
  `genero_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Género/Categoria de clasificación del libro o CERO si no existe o aún no está indicada (como si fuera NULL).',
  -- Etiquetas temáticas: Tabla adicional con la relación entre libro y etiquetas.
  `coleccion` TEXT NULL DEFAULT NULL COMMENT 'Descripcion de la colección a la que pertenece el libro o NULL si no se conoce.',
  -- Idioma: Relación con la tabla de idiomas.
  `idioma_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Idioma de edición del libro o CERO si no existe o aún no está indicado (como si fuera NULL).',
  -- Formato: Código de la enumeración fija.
  `clase_formato_id` CHAR(1) NOT NULL DEFAULT 'M' COMMENT 'Código de clase de formato: P=Papel, B=Papel/Bolsillo, D=Digital, E=Digital/EBook, A=Digital/Audible, ...',
  `paginas` INT(6) NOT NULL DEFAULT '0' COMMENT 'Número de páginas del libro o CERO si no se conoce aún.',
  -- Portada o Imagen Principal:
  `imagen_id` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o \"de portada\" del libro, o NULL si no hay.',
  -- Imágenes adicionales: Tabla adicional con la relacion y datos de la imagen.
  -- URLs externas: Tabla adicional con la relacion y datos de la URL.
  -- `url` TEXT NULL DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página \"oficial\" del libro o NULL si no hay o no se conoce.',
  -- Estados Libro:
  `visible` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de libro visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.',
  `terminado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de libro terminado o suspendido: 0=No, 1=Eliminado por usuario, 2=Suspendido, 3=Cancelado por inadecuado, ...',
  `fecha_terminacion` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de terminación del libro. Debería estar a NULL si no está terminado.',
  `num_denuncias` INT(9) NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias del libro o CERO si no ha tenido.',
  `fecha_denuncia1` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de libro bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del libro. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` TEXT NULL DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del libro o NULL si no hay -se muestra por defecto según indique \"bloqueado\"-.',
  -- Comentarios: Tabla adicional con la relacion y datos del comentario.
  `cerrado_comentar` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de libro cerrado para comentarios: 0=No, 1=Si.',
  -- Valoracion Resumen:
  `sumaValores` INT(9) NOT NULL DEFAULT '0' COMMENT 'Suma acumulada de las valoraciones para el libro.',
  `totalVotos` INT(9) NOT NULL DEFAULT '0' COMMENT 'Contador de votos (valoraciones) emitidas para el libro.',
  -- Seguimientos: Tabla adicional con la relacion y datos del seguimiento.
  -- Eventos: Tabla adicional con la relacion y datos del evento.
  `cerrado_eventos` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de libro cerrado para eventos: 0=No, 1=Si.',
  -- Registro de Usuario
  `crea_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha creado el libro o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de creación del libro o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha modificado el libro por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del libro o NULL si no se conoce por algún motivo.',
  -- Notas Administrador
  `notas_admin` TEXT NULL DEFAULT NULL COMMENT 'Notas adicionales para los moderadores/administradores sobre el libro o NULL si no hay.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `autores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `autores` ;

CREATE TABLE IF NOT EXISTS `autores` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` TEXT NULL DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página \"oficial\" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `libros_autores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_autores` ;

CREATE TABLE IF NOT EXISTS `libros_autores` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `autor_id` INT(12) UNSIGNED NOT NULL COMMENT 'Autor relacionado.',
  `orden` INT(4) NOT NULL DEFAULT '0' COMMENT 'Orden de aparición del autor dentro del grupo de autores del libro. Opcional.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `ilustradores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ilustradores` ;

CREATE TABLE IF NOT EXISTS `ilustradores` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` TEXT NULL DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página \"oficial\" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `traductores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `traductores` ;

CREATE TABLE IF NOT EXISTS `traductores` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` TEXT NULL DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página \"oficial\" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `editoriales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `editoriales` ;

CREATE TABLE IF NOT EXISTS `editoriales` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL COMMENT 'Texto Nombre o Razón Social de la Entidad.',
  `url` TEXT NULL DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página \"oficial\" de la Entidad o NULL si no hay o no se conoce.',
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Texto adicional que describe a la entidad.',
  `revisado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de entidad aceptada o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `generos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `generos` ;

CREATE TABLE IF NOT EXISTS `generos` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Texto adicional que describe al género o clasificación.',
  `icono` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Nombre del icono relacionado de entre los disponibles en la aplicación (carpeta iconos posibles).',
  `genero_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Categoria relacionada, para poder realizar la jerarquía de géneros. Nodo padre de la jerarquía de género, o CERO si es nodo raiz (como si fuera NULL).',
  `revisado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de género aceptado o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `etiquetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `etiquetas` ;

CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Texto adicional que describe la etiqueta o NULL si no es necesario.',
  `revisada` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de etiqueta aceptada o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `libros_etiquetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_etiquetas` ;

CREATE TABLE IF NOT EXISTS `libros_etiquetas` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `etiqueta_id` INT(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `idiomas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `idiomas` ;

CREATE TABLE IF NOT EXISTS `idiomas` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL COMMENT 'Nombre del idioma.',
  `codigo` VARCHAR(5) NULL DEFAULT NULL COMMENT 'Codigo ISO del idioma o NULL si no es necesario.',
  `revisado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de idioma aceptado o no por los moderadores/administradores: 0=No, 1=Si.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `libros_imagenes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_imagenes` ;

CREATE TABLE IF NOT EXISTS `libros_imagenes` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Nombre identificativo (fichero externo en carpeta custodiada) con la imagen del libro.',
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `orden` INT(4) NOT NULL DEFAULT '0' COMMENT 'Orden de aparición de la imagen dentro del grupo de imagenes del libro. Opcional.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `libros_urls`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_urls` ;

CREATE TABLE IF NOT EXISTS `libros_urls` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `orden` INT(4) NOT NULL DEFAULT '0' COMMENT 'Orden de aparición de la URL dentro del grupo de URLs del libro. Opcional.',
  `url` TEXT NOT NULL COMMENT 'La dirección URL, supuestamente válida.',
  `titulo` TEXT NULL DEFAULT NULL COMMENT 'Título de la URL. Opcioinal.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `libros_comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_comentarios` ;

CREATE TABLE IF NOT EXISTS `libros_comentarios` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `valoracion` INT(9) NOT NULL DEFAULT '0' COMMENT 'Valoración dada al libro.',
  `texto` TEXT NOT NULL COMMENT 'El texto del comentario.',
  `comentario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Comentario relacionado, si se permiten encadenar respuestas. Nodo padre de la jerarquia de comentarios, CERO si es nodo raiz.',
  `cerrado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de cierre de los comentarios: 0=No, 1=Si(No se puede responder al comentario)',
  `num_denuncias` INT(9) NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias del comentario o CERO si no ha tenido.',
  `fecha_denuncia1` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de comentario bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del comentario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` TEXT NULL DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del comentario o NULL si no hay -se muestra por defecto según indique \"bloqueado\"-.',
  `crea_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha creado el comentario o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de creación del comentario o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha modificado el comentario por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del comentario o NULL si no se conoce por algún motivo.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `libros_eventos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_eventos` ;

CREATE TABLE IF NOT EXISTS `libros_eventos` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `texto` TEXT NOT NULL COMMENT 'El texto del evento.',
  `fecha_desde` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de inicio del evento o NULL si no se conoce (mostrar próximamente).',
  `fecha_hasta` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de finalización del evento o NULL si no se conoce (no caduca automáticamente).',
  `num_denuncias` INT(9) NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias del evento o CERO si no ha tenido.',
  `fecha_denuncia1` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de evento bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del evento. Debería estar a NULL si no está bloqueada o si se desbloquea.',
  `notas_bloqueo` TEXT NULL DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del evento o NULL si no hay -se muestra por defecto según indique \"bloqueado\"-.',
  `crea_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha creado el evento o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de creación del evento o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha modificado el evento por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del evento o NULL si no se conoce por algún motivo.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `libros_eventos_asistentes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `libros_eventos_asistentes` ;

CREATE TABLE IF NOT EXISTS `libros_eventos_asistentes` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libro_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado. Copia de la que tiene el evento por agilidad en búsquedas.',
  `evento_id` INT(12) UNSIGNED NOT NULL COMMENT 'Evento relacionado.',
  `usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'usuario relacionado que asistira al evento.',
  `fecha_alta` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de creación de la asistencia al evento o NULL si no se conoce por algún motivo.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios` ;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL COMMENT 'Correo Electronico y \"login\" del usuario.',
  `password` VARCHAR(60) NOT NULL,
  `nick` VARCHAR(25) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL COMMENT 'Fecha de nacimiento del usuario o NULL si no lo quiere informar.',
  `direccion` TEXT NULL DEFAULT NULL COMMENT 'Direccion del usuario o NULL si no quiere informar.',
  `fecha_registro` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).',
  `confirmado` TINYINT(1) NOT NULL COMMENT 'Indicador de usuario ha confirmado su registro o no.',
  `fecha_acceso` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.',
  `num_accesos` INT(9) NOT NULL DEFAULT '0' COMMENT 'Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.',
  `bloqueado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` TEXT NULL DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique \"bloqueado\"-.',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `nick_UNIQUE` (`nick` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `patrocinadores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `patrocinadores` ;

CREATE TABLE IF NOT EXISTS `patrocinadores` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con los datos principales.',
  `nif_cif` VARCHAR(12) NOT NULL COMMENT 'Identificador del patrocinador.',
  `razon_social` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Razon social del patrocinador o NULL si con el \"nombre y apellidos\" del usuario es suficiente.',
  `telefono_comercial` VARCHAR(25) NOT NULL,
  `telefono_contacto` VARCHAR(25) NOT NULL,
  `url` TEXT NULL DEFAULT NULL COMMENT 'Dirección web del patrocinador o NULL si no hay o no se conoce.',
  `fecha_alta` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de alta como patrocinador, no como usuario o NULL si no se conoce por algún motivo (que no debería ser).',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nif_cif_UNIQUE` (`nif_cif` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `anuncios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `anuncios` ;

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patrocinador_id` INT(12) UNSIGNED NOT NULL COMMENT 'Patrocinador relacionado con el anuncio.',
  `titulo` TEXT NOT NULL COMMENT 'Titulo corto o slogan para el anuncio.',
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'Descripción o texto del anuncio.',
  `prioridad` INT(4) NOT NULL DEFAULT '0' COMMENT 'Indicador de importancia para dar más o menos visibilidad al anuncio.',
  `visible` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de anuncio visible a los usuarios o invisible (se está manteniendo o no publicado): 0=Invisible, 1=Visible.',
  `editorial_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Relación con una Editorial o NULL si no tiene nada que ver.',
  `libro_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Relación con un Libro o NULL si no tiene nada que ver.',
  `genero_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Relación con un Género o NULL si no tiene nada que ver.',
  `evento_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Relación con un Evento o NULL si no tiene nada que ver.',
  -- Registro de Usuario
  `crea_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha creado el registro o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de creación del registro o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario que ha modificado el registro por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del registro o NULL si no se conoce por algún motivo.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `usuarios_libros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios_libros` ;

CREATE TABLE IF NOT EXISTS `usuarios_libros` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado, seguidor del libro.',
  `local_id` INT(12) UNSIGNED NOT NULL COMMENT 'Libro relacionado.',
  `fecha_seguimiento` DATETIME NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento del libro por parte del usuario.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `usuarios_generos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios_generos` ;

CREATE TABLE IF NOT EXISTS `usuarios_generos` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado.',
  `genero_id` INT(12) UNSIGNED NOT NULL COMMENT 'Género relacionado.',
  `fecha_seguimiento` DATETIME NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento del género por parte del usuario.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `usuarios_etiquetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios_etiquetas` ;

CREATE TABLE IF NOT EXISTS `usuarios_etiquetas` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado.',
  `etiqueta_id` INT(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.',
  `fecha_seguimiento` DATETIME NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento de la etiqueta por parte del usuario.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `usuarios_generos_moderacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios_generos_moderacion` ;

CREATE TABLE IF NOT EXISTS `usuarios_generos_moderacion` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con un Género para su moderación.',
  `genero_id` INT(12) UNSIGNED NOT NULL COMMENT 'Género relacionado con el Usuario que puede moderarlo.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `usuarios_avisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios_avisos` ;

CREATE TABLE IF NOT EXISTS `usuarios_avisos` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_aviso` DATETIME NOT NULL COMMENT 'Fecha y Hora de creación del aviso.',
  `clase_aviso_id` CHAR(1) NOT NULL DEFAULT 'M' COMMENT 'código de clase de aviso: A=Aviso, N=Notificación, D=Denuncia, C=Consulta, B=Bloqueo, M=Mensaje Genérico,...',
  `texto` TEXT NULL COMMENT 'Texto con el mensaje de aviso.',
  `destino_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario relacionado, destinatario del aviso, o NULL si no es para administración y aún no está gestionado.',
  `origen_usuario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Usuario relacionado, origen del aviso, o NULL si es del sistema.',
  `evento_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Evento relacionado o NULL si no tiene que ver directamente.',
  `libro_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Libro relacionado o NULL si no tiene que ver directamente.',
  `comentario_id` INT(12) UNSIGNED NULL DEFAULT '0' COMMENT 'Comentario relacionado o NULL si no tiene que ver directamente con un comentario.',
  `fecha_lectura` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de lectura del aviso o NULL si no se ha leido o se ha desmarcado como tal.',
  `fecha_aceptado` DATETIME NULL DEFAULT NULL COMMENT 'Fecha y Hora de aceptación del aviso o NULL si no se ha aceptado para su gestión por un moderador o administrador. No se usa en otros usuarios.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `configuraciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `configuraciones` ;

CREATE TABLE IF NOT EXISTS `configuraciones` (
  `variable` VARCHAR(50) NOT NULL,
  `valor` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`variable`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `registros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `registros` ;

CREATE TABLE IF NOT EXISTS `registros` (
  `id` INT(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_registro` DATETIME NOT NULL COMMENT 'Fecha y Hora del registro.',
  `clase_log_id` CHAR(1) NOT NULL COMMENT 'código de clase de log: E=Error, A=Aviso, S=Seguimiento, I=Información, D=Depuración, ...',
  `modulo` VARCHAR(50) NULL DEFAULT 'app' COMMENT 'Modulo o Sección de la aplicación que ha generado el mensaje de registro.',
  `texto` TEXT NULL DEFAULT NULL COMMENT 'Texto con el mensaje de registro.',
  `ip` VARCHAR(40) NULL DEFAULT NULL COMMENT 'Dirección IP desde donde accede el usuario (vale para IPv4 e IPv6.',
  `browser` TEXT NULL DEFAULT NULL COMMENT 'Texto con información del navegador utilizado en el acceso.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
