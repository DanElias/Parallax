--PROVEEDOR
CREATE TABLE proveedor(
	rfc char(13) NOT NULL,
	alias varchar(20),
	razon_social varchar(30),
	nombre_contacto varchar(40),
	telefono_contacto varchar(20),
	cuenta_bancaria char(20), --se supone que son 20 alfanumericos	
	banco varchar(40),

	--LLAVE PRIMARIA
	PRIMARY KEY(rfc)
)

sp_helpconstraint proveedor

--CUENTA CONTABLE
CREATE TABLE cuenta_contable(
	id_cuentacontable numeric(2) NOT NULL ,
	nombre varchar(20),
	descripcion varchar(40),

	--PRIMARIA
	PRIMARY KEY(id_cuentacontable)
)
sp_helpconstraint cuenta_contable

--EGRESO
CREATE TABLE egreso(
	folio_factura varchar(30) NOT NULL,
	concepto varchar(30),
	importe numeric(9,3), --nueve digitos con 3 decimales
	fecha datetime, ---como se declara la fecha ?
	observaciones varchar(100),
	cuenta_bancaria numeric(20),
	rfc char(13),
	id_cuentacontable numeric(2),

	--PRIMARIA
	PRIMARY KEY (folio_factura),
	 
	--FORANEAS
	FOREIGN KEY(rfc) REFERENCES proveedor,
	FOREIGN KEY(id_cuentacontable) REFERENCES cuenta_contable
)

sp_helpconstraint egreso

--BENEFICIARIO
CREATE TABLE beneficiario(
	id_beneficiario numeric(3) NOT NULL,
	nombre varchar(40),
	estado varchar(10),
	fecha_nacimiento date,
	edad numeric(3),
	sexo char(1),
	grado_escolar varchar(30),
	grupo varchar(20),
	domicilio varchar(40),
	nivel_socioeconomico varchar(30),
	nombre_escuela varchar(40),
	enfermedades_alergias varchar(50),
	cuota numeric(4),

	--PRIMARIA
	PRIMARY KEY(id_beneficiario)
)

sp_helpconstraint beneficiario


--TUTOR
CREATE TABLE tutor(
	id_tutor numeric(3) NOT NULL,
	nombre varchar(40),
	telefono varchar(20),
	fecha_nacimiento date,
	ocupacion varchar(30),
	nombre_empresa varchar(30),
	grado_estudio varchar(20),
	titulo_obtenido varchar(20)

	PRIMARY KEY(id_tutor)
)

sp_helpconstraint tutor

--TIENE TUTOR
CREATE TABLE beneficiario_tutor(

	id_beneficiario numeric(3) NOT NULL, 
	id_tutor numeric(3) NOT NULL, 
	parentesco varchar(30),

	--PRIMARIA COMPUESTA 
	PRIMARY KEY (id_beneficiario, id_tutor),

	--FORANEAS
	FOREIGN KEY (id_beneficiario) REFERENCES beneficiario,
	FOREIGN KEY (id_tutor) REFERENCES tutor
)

sp_helpconstraint beneficiario_tutor


--EVENTO
CREATE TABLE evento(
	id_evento numeric(2) NOT NULL,
	nombre varchar(30),
	fecha date,
	hora time,
	lugar varchar(40),
	descripcion varchar(50),
	--imagen FALTA 
	PRIMARY KEY(id_evento)
)

sp_helpconstraint evento

--ROL
CREATE TABLE rol(
	id_rol numeric(2) NOT NULL,
	descripcion varchar(50),

	--PRIMARIA
	PRIMARY KEY(id_rol)
)

sp_helpconstraint rol


--USUARIO
CREATE TABLE usuario(
	id_usuario numeric(2) NOT NULL,
	correo varchar(30),
	nombre varchar(20),
	apellido varchar(20),
	contrasena varchar(40), 
	fecha_nacimiento date, 
	fecha_creacio datetime,
	id_rol numeric(2),

	--PRIMARIA
	PRIMARY KEY (id_usuario)

	--FOREANEA
	FOREIGN KEY (id_rol) REFERENCES rol
)

sp_helpconstraint usuario


--PRIVELEGIO
CREATE TABLE privilegio(
	id_privilegio numeric(2) NOT NULL,
	permiso numeric(1),

	--PRIMARIA
	PRIMARY KEY(id_privilegio)
)

sp_helpconstraint privilegio

--POSEE PRIVILEGIO
CREATE TABLE rol_priviledio(
	id_rol numeric(2),
	id_privilegio numeric(2),

	--PRIMARIA
	PRIMARY KEY (id_rol, id_privilegio)
	--FORANEAS
	FOREIGN KEY(id_rol) REFERENCES rol,
	FOREIGN KEY(id_privilegio) REFERENCES privilegio
	
)

sp_helpconstraint rol_privilegio





