------------------ PROVEEDOR --------------------------
CREATE TABLE Proveedor(
	rfc char(13) NOT NULL,
	alias varchar(20),
	razon_social varchar(30),
	nombre_contacto varchar(40),
	telefono_contacto varchar(20),
	cuenta_bancaria char(18), --se supone que son 18
	banco varchar(40),
	CONSTRAINT [pk_proveedor] PRIMARY KEY (rfc)
)

------------------- Cuenta Contable-----------------
CREATE TABLE Cuenta_Contable(
	id_cuentacontable int IDENTITY(1,1) NOT NULL,
	nombre varchar(20),
	descripcion varchar(40),
	CONSTRAINT [pk_cuentacontable] PRIMARY KEY (id_cuentacontable)
)

------------------Egreso ----------------------------------
CREATE TABLE Egreso(
	folio_factura varchar(30) NOT NULL,
	concepto varchar(30),
	importe numeric(9,2), --nueve digitos con 2 decimales
	fecha date, 
	observaciones varchar(100),
	cuenta_bancaria varchar(20),
	rfc char(13),
	id_cuentacontable int,
	CONSTRAINT [pk_egreso] PRIMARY KEY (folio_factura),
	CONSTRAINT [fk_rfc] FOREIGN KEY (rfc) REFERENCES Proveedor(rfc),
	CONSTRAINT [fk_cuentacontable] FOREIGN KEY (id_cuentacontable) REFERENCES Cuenta_Contable(id_cuentacontable)
)

-------------------- BENEFICIARIO --------------------------
CREATE TABLE Beneficiario(
	id_beneficiario int IDENTITY(1,1) NOT NULL,
	nombre varchar(40),
	estado varchar(10),
	fecha_nacimiento date,
	sexo char(1),
	grado_escolar varchar(30),
	grupo varchar(20),
	domicilio varchar(40),
	nivel_socioeconomico varchar(30),
	nombre_escuela varchar(40),
	enfermedades_alergias varchar(50),
	cuota numeric(4,2),
	CONSTRAINT [pk_beneficiario] PRIMARY KEY (id_beneficiario)
)

--------------------------- TUTOR ---------------------------------
CREATE TABLE Tutor(
	id_tutor int IDENTITY(1,1) NOT NULL,
	nombre varchar(40),
	telefono varchar(20),
	fecha_nacimiento date,
	ocupacion varchar(30),
	nombre_empresa varchar(30),
	grado_estudio varchar(20),
	titulo_obtenido varchar(20)
	CONSTRAINT [pk_tutor] PRIMARY KEY (id_tutor)
)
-------------------------------------------------------------------

----------------------- TIENE TUTOR ---------------------------------
CREATE TABLE Beneficiario_Tutor(
	id_beneficiario int NOT NULL, 
	id_tutor int NOT NULL, 
	parentesco varchar(30),
	CONSTRAINT [pk_beneficiariotutor] PRIMARY KEY (id_beneficiario,id_tutor),
	CONSTRAINT [fk_idbeneficiario] FOREIGN KEY (id_beneficiario) REFERENCES Beneficiario(id_beneficiario),
	CONSTRAINT [fk_idtutor] FOREIGN KEY (id_tutor) REFERENCES Tutor(id_tutor)
)
---------------------------------------------------------------------

---------------------- EVENTO ----------------------------------------
CREATE TABLE evento(
	id_evento int IDENTITY(1,1) NOT NULL,
	nombre varchar(30),
	fecha date,
	lugar varchar(40),
	descripcion varchar(50),
	--imagen FALTA 
	CONSTRAINT [pk_evento] PRIMARY KEY (id_evento)
)
------------------------------------------------------------------------

------------------------------ ROL ------------------------------------------
CREATE TABLE rol(
	id_rol numeric(2) NOT NULL,
	descripcion varchar(50),
	CONSTRAINT [pk_rol] PRIMARY KEY (id_rol)
)
-------------------------------------------------

------------------------ PRIVELEGIO --------------------------
CREATE TABLE privilegio(
	id_privilegio numeric(2) NOT NULL,
	permiso numeric(1),
	CONSTRAINT [pk_privilegio] PRIMARY KEY (id_privilegio)
)
---------------------------------------------------------------

-------------------------- USUARIO -------------------------------
CREATE TABLE usuario(
	id_usuario int IDENTITY(1,1) NOT NULL,
	correo varchar(30),
	nombre varchar(30),
	apellido varchar(30),
	contrasena varchar(40), 
	fecha_nacimiento date, 
	fecha_creacion date,
	id_rol numeric(2),
	CONSTRAINT [pk_usuario] PRIMARY KEY (id_usuario),
	CONSTRAINT [fk_idrol] FOREIGN KEY (id_rol) REFERENCES rol
)
--------------------------------------------------------------

--------------------- Rol Privilegio ------------------------
CREATE TABLE rol_privilegio(
	id_rol numeric(2) NOT NULL,
	id_privilegio numeric(2) NOT NULL,
	CONSTRAINT [pk_rolprivilegio] PRIMARY KEY (id_rol,id_privilegio),
	CONSTRAINT [fk_idrolpri] FOREIGN KEY (id_rol) REFERENCES Rol(id_rol),
	CONSTRAINT [fk_idprivilegio] FOREIGN KEY (id_privilegio) REFERENCES Privilegio(id_privilegio)
)	
-------------------------------------------------------------------