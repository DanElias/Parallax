SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-06:00";

CREATE TABLE `beneficiario` (
  `id_beneficiario` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_paterno` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado_escolar` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grupo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_calle` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_socioeconomico` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_escuela` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `enfermedades_alergias` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuota` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `beneficiario_tutor` (
  `id_beneficiario` int(11) NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `parentesco` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `cuenta_contable` (
  `id_cuentacontable` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `egreso` (
  `folio_factura` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `importe` decimal(11,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuenta_bancaria` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cuentacontable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `privilegio` (
  `id_privilegio` decimal(2,0) NOT NULL,
  `permiso` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `proveedor` (
  `rfc` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `alias` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `razon_social` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_contacto` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_contacto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuenta_bancaria` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `banco` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `rol` (
  `id_rol` decimal(2,0) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
('1', 'Administrador');

CREATE TABLE `rol_privilegio` (
  `id_rol` decimal(2,0) NOT NULL,
  `id_privilegio` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ocupacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_empresa` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado_estudio` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_obtenido` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `passwd` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `id_rol` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id_beneficiario`);

ALTER TABLE `beneficiario_tutor`
  ADD PRIMARY KEY (`id_beneficiario`,`id_tutor`),
  ADD KEY `fk_idtutor` (`id_tutor`);

ALTER TABLE `cuenta_contable`
  ADD PRIMARY KEY (`id_cuentacontable`);

ALTER TABLE `egreso`
  ADD PRIMARY KEY (`folio_factura`),
  ADD KEY `fk_rfc` (`rfc`),
  ADD KEY `fk_cuentacontable` (`id_cuentacontable`);

ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`id_privilegio`);

ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`rfc`);

ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `id_rol` (`id_rol`),
  ADD KEY `id_rol_2` (`id_rol`);

ALTER TABLE `rol_privilegio`
  ADD PRIMARY KEY (`id_rol`,`id_privilegio`),
  ADD KEY `id_privilegio` (`id_privilegio`);

ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

ALTER TABLE `beneficiario`
  MODIFY `id_beneficiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `cuenta_contable`
  MODIFY `id_cuentacontable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `beneficiario_tutor`
  ADD CONSTRAINT `fk_idbeneficiario` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiario` (`id_beneficiario`),
  ADD CONSTRAINT `fk_idtutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`);

ALTER TABLE `egreso`
  ADD CONSTRAINT `fk_cuentacontable` FOREIGN KEY (`id_cuentacontable`) REFERENCES `cuenta_contable` (`id_cuentacontable`),
  ADD CONSTRAINT `fk_rfc` FOREIGN KEY (`rfc`) REFERENCES `proveedor` (`rfc`);

ALTER TABLE `rol_privilegio`
  ADD CONSTRAINT `rol_privilegio_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `rol_privilegio_ibfk_2` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegio` (`id_privilegio`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
