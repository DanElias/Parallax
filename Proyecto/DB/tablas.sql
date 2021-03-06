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

INSERT INTO `beneficiario` (`id_beneficiario`, `nombre`, `apellido`, `estado`, `fecha_nacimiento`, `sexo`, `grado_escolar`, `grupo`, `domicilio`, `nivel_socioeconomico`, `nombre_escuela`, `enfermedades_alergias`, `cuota`) VALUES
(21, 'Gerianne', 'Howis', 0, '2007-12-30', 'H', '1 de primaria', 'Toros', '14009 4th Drive', 'pobreza extrema', 'Spring Arbor College', 'alergia al aguacate', '58.64'),
(22, 'Malvin', 'Gretton', 1, '2010-06-17', 'M', '2 de secundaria', 'Toros', '47 Roth Avenue', 'pobreza extrema', 'Lulea University of Technology', 'alergia al aguacate', '87.49'),
(23, 'Giorgio', 'Kleinert', 1, '2008-12-05', 'H', '2 de primaria', 'Toros', '71609 Merchant Junction', 'pobreza extrema', 'Fachhochschulstudiengänge Steyr', 'alergia al aguacate', '36.98'),
(24, 'Honey', 'Corsan', 1, '2006-01-31', 'H', '3 de secundaria', 'Chirris', '35 Spenser Junction', 'media', 'Universidad de Cádiz', 'alergia al aguacate', '11.15'),
(25, 'Godart', 'de Mullett', 0, '2006-03-15', 'M', '3 de primaria', 'Toros', '321 Oakridge Point', 'media', 'Faculdades Integradas Toledo', 'ninguna', '99.99'),
(26, 'Wendye', 'Cane', 0, '2009-07-04', 'M', '3 de kinder', 'Chirris', '9244 North Parkway', 'media', 'Centro Universitário Barao de Maua', 'alergia al aguacate', '99.99'),
(27, 'Maggie', 'Hyde', 0, '2007-07-22', 'M', '3 de kinder', 'Chirris', '5176 Namekagon Trail', 'pobreza extrema', 'Charles Darwin University', 'ninguna', '8.85'),
(28, 'Maison', 'Buesden', 1, '2010-09-05', 'M', '2 de primaria', 'Toros', '403 Meadow Vale Terrace', 'pobreza', 'National Taiwan College of Physical Educ', 'alergia al aguacate', '99.99'),
(29, 'Gabie', 'Norris', 1, '2006-09-06', 'M', '2 de secundaria', 'Chirris', '30426 Meadow Vale Avenue', 'media', 'Center for Humanistic Studies', 'ninguna', '99.99'),
(30, 'Glynn', 'Anslow', 0, '2011-02-28', 'M', '3 de primaria', 'Chirris', '45072 Dwight Center', 'pobreza', 'Hiiraan University', 'alergia al aguacate', '23.65'),
(31, 'Aguste', 'Bungey', 1, '2007-02-24', 'H', '2 de kinder', 'Chirris', '3 Dapin Terrace', 'media', 'South-West University \"Neofit Rilski\"', 'alergia al aguacate', '98.89'),
(32, 'Shalne', 'Willetts', 1, '2007-06-08', 'M', '2 de secundaria', 'Ponis', '94 Maryland Lane', 'pobreza', 'Western International University', 'alergia al aguacate', '2.42'),
(33, 'Joeann', 'Bugbird', 1, '2010-07-26', 'H', '3 de secundaria', 'Ponis', '9 Rowland Lane', 'media', 'Nicola Valley Institute of Technology', 'alergia al aguacate', '48.11'),
(34, 'Alric', 'Wheldon', 0, '2008-07-25', 'M', '1 de secundaria', 'Toros', '33353 Graedel Parkway', 'media', 'Franklin Pierce Law Center', 'ninguna', '90.43'),
(35, 'Perren', 'Puttergill', 0, '2006-02-13', 'H', '3 de primaria', 'Chirris', '6654 Sachtjen Way', 'pobreza extrema', 'Soka University', 'ninguna', '9.99'),
(36, 'Ardath', 'Harfleet', 0, '2009-08-28', 'H', '1 de primaria', 'Toros', '337 Blue Bill Park Park', 'media', 'Universidad Nacional de Villa María', 'ninguna', '99.99'),
(37, 'Theodora', 'Thrussell', 1, '2006-09-06', 'M', '2 de secundaria', 'Toros', '717 Susan Trail', 'media', 'Université Épiscopale d\'Haiti', 'ninguna', '16.46'),
(38, 'Lorraine', 'Sancroft', 1, '2011-02-28', 'H', '3 de secundaria', 'Chirris', '40606 Hudson Street', 'media', 'Fachhochschule Neu-Ulm', 'ninguna', '99.99'),
(39, 'Reena', 'Hirthe', 1, '2009-11-09', 'M', '3 de secundaria', 'Chirris', '251 Browning Junction', 'pobreza extrema', 'Tay Nguyen University', 'alergia al aguacate', '53.14'),
(40, 'Randie', 'Jauncey', 0, '2005-11-27', 'M', '2 de secundaria', 'Ponis', '21 Stang Way', 'pobreza', 'Wirtschaftsuniversität Wien', 'ninguna', '99.99');

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

INSERT INTO `cuenta_contable` (`id_cuentacontable`, `nombre`, `descripcion`) VALUES
(1, 'Papeler&iacute;aaaa', 'Tijeras  hojas colores'),
(2, 'Alimentos', 'Carnes frutas verduras'),
(3, 'Mobiliario', 'Sillas mesas pupitres'),
(4, 'Ropa', 'Camisetas pantalones '),
(5, 'Wjidcerf', 'nunc commodo placerats'),
(6, 'Rtmoyspv', 'neque duis bibendum morbi non'),
(7, 'Iyhocfqt', 'vestibulum vestibulum ante ipsum primis'),
(8, 'Qxbyznqu', 'consequat in consequat'),
(9, 'Bqflecjo', 'non mauris morbi non lectus'),
(10, 'Lesiowrq', 'diam vitae quam suspendisse'),
(11, 'Wdkayqtl', 'maecenas rhoncus aliquam lacus'),
(12, 'Dmgedsjk', 'duis at velit eu'),
(13, 'Jrfbxset', 'eu felis fusce posuere felis'),
(14, 'Ucfdkwzt', 'justo aliquam quis turpis eget'),
(15, 'Uhtcbrlu', 'turpis adipiscing lorem vitae'),
(16, 'Uqgbcriy', 'vulputate nonummy maecenas tincidunt'),
(17, 'Vwdcuesz', 'congue etiam justo'),
(18, 'Xgtkopne', 'nec molestie sed justo'),
(19, 'Jshrknog', 'sodales sed tincidunt eu felis'),
(20, 'Jxujfzer', 'magna vestibulum aliquet ultrices erat'),
(21, 'Utilerias', 'Bancas de papel'),
(22, 'Papeleria', 'Pues papelitos y lapices'),
(23, 'bLAH', 'SHDHS'),
(24, 'Lmao', 'lmao'),
(25, 'sjn djqw', 'jsjs'),
(26, 'jsjsjs', 'kksks'),
(27, 'jsjsj', 'kkss'),
(28, 'kssk', 'ossos'),
(30, 'sjsjs', 'adms'),
(31, 'ksmsmls', 'a&ntilde;lmal&ntilde;'),
(32, 'ksmak', 'aklsmpKA'),
(44, 'ssssss', 'ssss'),
(45, 'sss', 'sss'),
(46, 'sss', 'sss'),
(47, 'Papler&iacute;a', 'aaa');

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

INSERT INTO `egreso` (`folio_factura`, `concepto`, `importe`, `fecha`, `observaciones`, `cuenta_bancaria`, `rfc`, `id_cuentacontable`) VALUES
('13Cr9P3NjvtsgLPU3LTvAxadSBeRt5', 'Consumer Services', '14724.81', '2018-10-03', 'curabitur convallis duis consequat dui nec nisi volutpat eleifend donec', '63030421376480058546', 'FUPE025693AY', 5),
('13HpH8eKVeZYcvK1B9hRqHv7xtrR4g', 'Basic Industries', '12002.12', '2018-03-01', 'eget nunc donec quis orci eget orci vehicula condimentum curabitur', '48609460426510610388', 'CXWM498660EC', 4),
('14NJxqwmbpwDvuPYqKo9wdetuagDRZ', 'Consumer Services', '7916.33', '2018-10-15', 'mauris vulputate elementum nullam varius nulla facilisi cras non', '71603920457095811805', 'RBFN062312RK', 9),
('16JRus5JntFHrWbamD54EeekqeMCjd', 'n/a', '19576.83', '2019-01-25', 'odio porttitor id consequat in consequat', '21243195072380213433', 'SKVE824052WY', 9),
('173edALiqtLVbJiWiUFTTU6fdkzfsy', 'Health Care', '3481.25', '2018-04-21', 'sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci', '42111254710606815152', 'CXWM498660EC', 5),
('17jZSpVY947MbH9whT6qmxDGvpSqgH', 'Consumer Services', '19052.33', '2018-10-13', 'primis in faucibus orci luctus et ultrices posuere', '57413066583683924971', 'NYHC844754IT', 6),
('184HuohfaYuLG7nSMVdVUa6ncsLioN', 'Finance', '14267.55', '2018-09-01', 'laoreet ut rhoncus aliquet pulvinar sed nisl nunc', '70960153676476813985', 'EUWV623379UL', 5),
('18ANKC4cFbLmuSEKUtJQevT8D5DBJM', 'Health Care', '11153.83', '2018-09-27', 'nulla tempus vivamus in felis eu sapien cursus', '83289404259315866620', 'NPFU029525FN', 1),
('192USeihqkkGMu6a4FQWEJQNZLZY23', 'n/a', '240.24', '2018-06-25', 'lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl', '00537831500719920384', 'PUBY290953PC', 3),
('1DYkdcq6fE7akMREM6oUWMd9PayAUT', 'Health Care', '6414.70', '2019-01-02', 'at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam', '54192496055722001385', 'QMDJ719065EB', 7),
('1FJv4axwtKpPcbW7XQ6rTTP5siBrPJ', 'Health Care', '4529.90', '2019-02-04', 'porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non', '43194864562102227078', 'QWCN641728YZ', 9),
('1JXKQAPjoK3YZe4sYDkf4gwWbyukPx', 'Public Utilities', '715.59', '2018-09-07', 'vel est donec odio justo sollicitudin', '16154410676445384765', 'EUWV623379UL', 10),
('1LSWsvD4VPuzq3igjKexjZZUuSXNVQ', 'Capital Goods', '6597.37', '2018-10-27', 'rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id', '09816639380546957457', 'QMDJ719065EB', 3),
('1M5yrtjoBghReyuBzazZ9e2YL2yeND', 'Capital Goods', '2592.42', '2018-11-26', 'eleifend quam a odio in hac habitasse platea', '25243124024879889264', 'RBFN062312RK', 1),
('1Mz5ngVZfN2DB4RbwWU1vuUpn8Z8pq', 'n/a', '17935.06', '2018-12-10', 'erat quisque erat eros viverra eget congue eget semper', '97371497160049725678', 'MJSL952548VE', 7),
('1N4kMinzMhyempNhRfD1p9k9tyxrT2', 'Technology', '3791.51', '2018-03-02', 'parturient montes nascetur ridiculus mus etiam vel augue', '42457882706619872388', 'NYHC844754IT', 2),
('1PfApN9WYdfEX8vh5vDyzHB7mNf95c', 'Health Care', '8264.70', '2018-04-23', 'suscipit ligula in lacus curabitur at ipsum ac', '17807271246639711761', 'PFAC121686FE', 1),
('1Pho1itogdWs4WE5vj3SMzUCwFvGGq', 'Health Care', '9234.24', '2018-03-21', 'donec quis orci eget orci vehicula condimentum curabitur in', '43549438703861392980', 'PUBY290953PC', 7),
('1Q8xjYBo4pFhtcthBHV7W5FpsemWkG', 'n/a', '17094.39', '2018-04-06', 'rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia', '24020928945628710895', 'ZPUI835795SZ', 3),
('1uQ9LpdEWJErsUR3is5ZgUjooUJu7c', 'Consumer Services', '4270.41', '2018-08-21', 'pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum', '16600728360187658232', 'FUPE025693AY', 4);


CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `evento` (`id_evento`, `nombre`, `fecha`, `hora`, `lugar`, `descripcion`, `imagen`) VALUES
(93, 'Science Kids', '2019-03-28', '19:30:00', 'Mariana Sala', 'Hola', '../eventos/uploads/1556043596SmartSelect_20180909-113626_Instagram.jpg');

CREATE TABLE `privilegio` (
  `id_privilegio` int(2) NOT NULL,
  `permiso` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `privilegio` (`id_privilegio`, `permiso`) VALUES
(1, 'Beneficiarios'),
(2, 'Reporte Beneficiarios'),
(3, 'Egresos'),
(4, 'Reporte Egresos'),
(5, 'Proveedores'),
(6, 'Cuentas Contables'),
(7, 'Eventos'),
(8, 'Usuarios');


CREATE TABLE `proveedor` (
  `rfc` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `alias` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `razon_social` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_contacto` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_contacto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuenta_bancaria` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `banco` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `proveedor` (`rfc`, `alias`, `razon_social`, `nombre_contacto`, `telefono_contacto`, `cuenta_bancaria`, `banco`) VALUES
('cabl720603', 'sra juana', 'El alamo', 'maria', '4422600885', '123123123123', 'banmex'),
('CXWM498660EC', 'porttitor pede', 'Camimbo', 'Vinson Ucchino', '246 5189743', '453591507794938749', 'maestro'),
('EUWV623379UL', 'sit amet', 'Jabberstorm', 'Benedikta Peedell', '301 9193414', '834658905897119827', 'jcb'),
('FUPE025693AY', 'in', 'Dynabox', 'Danny Chateau', '034 2826610', '310783338789045996', 'jcb'),
('JHJG878977C56', 'Agua', 'Epura', 'Juan P&eacute;rez', '5512345678', '007976859342938428', 'Bancomer'),
('MJSL952548VE', 'convallis', 'Skalith', 'Xerxes Mackinder', '075 5912589', '529686389032165273', 'maestro'),
('NPFU029525FN', 'semper interdum', 'Fanoodle', 'Ange Hyslop', '390 7329328', '917118140719343760', 'jcb'),
('NYHC844754IT', 'at nibh', 'Mydo', 'Brittany Lowbridge', '672 5809337', '901349768198984450', 'maestro'),
('PFAC121686FE', 'sapien a', 'Roodel', 'Oliver Bulley', '986 4879664', '065243698109114594', 'maestro'),
('PUBY290953PC', 'erat curabitur', 'Realfire', 'Codee Bramich', '545 1186773', '902545775700003090', 'maestro'),
('QMDJ719065EB', 'quis', 'Flashdog', 'Jaquenetta Pendrich', '337 6650650', '606060975933598992', 'solo'),
('QWCN641728YZ', 'luctus', 'Blogtag', 'Lacey Akister', '662 7261329', '605809955600146177', 'jcb'),
('RBFN062312RK', 'proin interdum', 'Trudeo', 'Brigid Netherwood', '888 8193376', '679251581871443126', 'jcb'),
('SKVE824052WY', 'nunc viverra', 'Wordware', 'Lora Darrigoe', '385 7486331', '374038619249652879', 'jcb'),
('SOIT819987ZA', 'tellus in', 'Skinder', 'Katya Sedgmond', '356 7400374', '132257633953717055', 'laser'),
('STNX178949HQ', 'quam nec', 'Tambee', 'Dalia Antonijevic', '166 8434547', '637646082164016635', 'jcb'),
('UODG311763PD', 'magnis dis', 'Divape', 'Taryn Kybbye', '185 6543673', '452909057956644377', 'jcb'),
('UTKH699471KD', 'pede malesuada', 'Oloo', 'Angelika Labern', '339 7658356', '763824649786345830', 'maestro'),
('XDKA581204DG', 'vehicula condimentum', 'Cogibox', 'Wylma Kovnot', '511 9187255', '217176924579376409', 'instapayment'),
('XEAV404341YN', 'non pretium', 'Jaxworks', 'Monica Freed', '943 2692254', '210234610866163495', 'jcb'),
('XEBA788297RP', 'ut', 'Dynabox', 'Prinz Cristofori', '606 4372571', '012076150870997896', 'jcb'),
('ZPUI835795SZ', 'luctus', 'Yata', 'Malvina Upcraft', '016 3477452', '018780767027369493', 'jcb');


CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Secretaria');

CREATE TABLE `rol_privilegio` (
  `id_privilegio_rol` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_privilegio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `rol_privilegio` (`id_privilegio_rol`, `id_rol`, `id_privilegio`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8);

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

INSERT INTO `tutor` (`id_tutor`, `nombre`, `apellido`, `telefono`, `fecha_nacimiento`, `ocupacion`, `nombre_empresa`, `grado_estudio`, `titulo_obtenido`) VALUES
(1, 'Travus', 'Whithorn', '572 8379603', '1978-10-28', 'Quality Engineer', 'Bogan, Pacocha and Bechtelar', 'Secundaria', 'Licenciatura'),
(2, 'Nikoletta', 'Winsiowiecki', '225 9756775', '1980-04-20', 'Staff Accountant III', 'Kautzer, Deckow and Cartwright', 'Secundaria', 'Licenciatura'),
(3, 'Richie', 'Galsworthy', '569 9942924', '1978-09-22', 'Statistician I', 'Mayer-Reichel', 'Preparatoria', 'Licenciatura'),
(4, 'Heidi', 'Klimp', '829 6375138', '1975-08-16', 'Marketing Assistant', 'Prosacco-Hansen', 'Licenciatura', 'Licenciatura'),
(5, 'Lilyan', 'Ambrogetti', '820 4803962', '1980-02-11', 'VP Quality Control', 'Smith and Sons', 'Licenciatura', 'Preparatoria'),
(6, 'Ellene', 'Ryton', '259 8491562', '1974-04-13', 'Compensation Analyst', 'Waelchi, Yost and Pouros', 'Licenciatura', 'Licenciatura'),
(7, 'Allene', 'Monahan', '289 7135974', '1982-01-10', 'Web Developer III', 'Bauch-Parker', 'Licenciatura', 'Licenciatura'),
(8, 'Gorden', 'Clack', '308 2533425', '1972-10-30', 'Health Coach I', 'Lowe-Beahan', 'Secundaria', 'Preparatoria'),
(9, 'Brodie', 'Barden', '024 1256331', '1978-12-28', 'Marketing Assistant', 'Rath-Reichert', 'Licenciatura', 'Preparatoria'),
(10, 'Glenda', 'Pobjoy', '976 5162006', '1976-02-13', 'Quality Control Specialist', 'Feest, Walsh and Weimann', 'Licenciatura', 'Licenciatura'),
(11, 'Hetty', 'Cossons', '517 6267808', '1976-03-15', 'Graphic Designer', 'Stroman-Miller', 'Secundaria', 'Preparatoria'),
(12, 'Edan', 'Grosier', '086 7147553', '1984-11-29', 'Account Executive', 'Johnston-Emmerich', 'Secundaria', 'Licenciatura'),
(13, 'Englebert', 'Sutworth', '205 9320216', '1983-02-28', 'Assistant Manager', 'Raynor and Sons', 'Licenciatura', 'Licenciatura'),
(14, 'Freddie', 'Hubbucke', '435 0246299', '1985-02-03', 'Financial Analyst', 'Reichert LLC', 'Preparatoria', 'Preparatoria'),
(15, 'Darcy', 'Chater', '355 2231903', '1983-12-27', 'Social Worker', 'Mayer, Cole and O\'Kon', 'Preparatoria', 'Licenciatura'),
(16, 'Kendricks', 'Cruickshank', '485 5870983', '1973-09-24', 'Web Designer II', 'Feil-Dicki', 'Licenciatura', 'Licenciatura'),
(17, 'Car', 'Steinson', '803 1057830', '1971-03-09', 'Quality Engineer', 'Hudson, Stracke and Hirthe', 'Preparatoria', 'Licenciatura'),
(18, 'Burg', 'Boots', '236 6351220', '1982-03-31', 'Payment Adjustment Coordinator', 'Stoltenberg Inc', 'Licenciatura', 'Licenciatura'),
(19, 'Anna-diane', 'Brychan', '539 8004197', '1972-07-20', 'Account Coordinator', 'Kertzmann-Vandervort', 'Licenciatura', 'Licenciatura'),
(20, 'Dominica', 'Stockdale', '039 0935217', '1970-09-01', 'Research Nurse', 'Reynolds-Collins', 'Licenciatura', 'Licenciatura');


CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `passwd` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_rol` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario` (`id_usuario`, `email`, `nombre`, `apellido`, `passwd`, `fecha_nacimiento`, `fecha_creacion`, `id_rol`) VALUES
(1, 'hugo@gmail.com', 'Hugos', 'Francos', '$2y$10$jFEQX0/LhBw9KkfxnsYDRubWMbdpkxMBzP2Tq/yFD7ro0y7MY7HLC', '0013-12-14', '0000-00-00 00:00:00', 1),
(2, 'masterdan@gmail.com', 'Daniel', 'Elias', '$2y$10$P4vWcdiTilcMVnYDmPmFQ.8NKXrNqLx9ppEO5RjpY7Den3KlrsbFK', '1998-03-28', '1998-03-28 06:00:00', 1),
(17, 'jose@gmail.com', 'Jose Carlos', 'Pacheco Sanchez', '$2y$10$a2ZfgiBoENORHHijhU1CH.Wwsp4g8JGAuAZChTj/327af/XZ7bB1W', '1998-03-13', '1998-03-13 06:00:00', 1),
(18, 'yaf@gmail.com', 'Manuel Yaffte', 'Lopez', '$2y$10$ZB33PDP3kQtnrkzERJJPKO725bpqHXnO6jGJOek3pYSQUtl9jSruG', '1998-03-13', '1998-03-13 06:00:00', 2);

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
  ADD PRIMARY KEY (`id_privilegio_rol`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_privilegio` (`id_privilegio`);

ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

ALTER TABLE `beneficiario`
  MODIFY `id_beneficiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

ALTER TABLE `cuenta_contable`
  MODIFY `id_cuentacontable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
  
ALTER TABLE `privilegio`
  MODIFY `id_privilegio` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
  
ALTER TABLE `rol_privilegio`
  MODIFY `id_privilegio_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
