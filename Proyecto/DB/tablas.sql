--PROVEEDOR
CREATE TABLE proveedor(
	rfc char(13) NOT NULL PRIMARY KEY,
	alias varchar(20),
	razon_social varchar(30),
	nombre_contacto varchar(40),
	telefono_contacto varchar(20),
	cuenta_bancaria char(18), --se supone que son 18
	banco varchar(40),
)

drop table proveedor
SELECT * FROM proveedor

--LLAVE PRIMARIA
ALTER TABLE proveedor add constraint pk_proveedor PRIMARY KEY (rfc)
sp_helpconstraint proveedor
-------------------------------------------------

--CUENTA CONTABLE
CREATE TABLE cuenta_contable(
	id_cuentacontable numeric(2) NOT NULL ,
	nombre varchar(20),
	descripcion varchar(40),
	
)

--PRIMARIA
ALTER TABLE cuenta_contable add constraint pk_cuenta PRIMARY KEY (id_cuentacontable)
sp_helpconstraint cuenta_contable

-------------------------------------------------
--EGRESO
CREATE TABLE egreso(
	folio_factura varchar(30) NOT NULL,
	concepto varchar(30),
	importe numeric(9,3), --nueve digitos con 3 decimales
	fecha datetime, ---como se declara la fecha ?
	observaciones varchar(100),
	cuenta_bancaria numeric(20),
	rfc char(13),
	id_cuentacontable numeric(2)
)

ALTER TABLE egreso add constraint pk_egreso PRIMARY KEY (folio_factura)	--PRIMARIA
--FORANEAS
ALTER TABLE egreso add constraint pf_id FOREIGN KEY (id_cuentacontable) REFERENCES cuenta_contable
ALTER TABLE egreso add constraint pf_rfc FOREIGN KEY(rfc) REFERENCES proveedor
sp_helpconstraint egreso


-------------------------------------------------
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

)

ALTER TABLE beneficiario add constraint pk_beneficiario PRIMARY KEY (id_beneficiario)	--PRIMARIA
sp_helpconstraint beneficiario
drop 
-------------------------------------------------
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
)

ALTER TABLE tutor add constraint pk_tutor PRIMARY KEY (id_tutor)	--PRIMARIA
sp_helpconstraint tutor


-------------------------------------------------
--TIENE TUTOR
CREATE TABLE beneficiario_tutor(

	id_beneficiario numeric(3) NOT NULL, 
	id_tutor numeric(3) NOT NULL, 
	parentesco varchar(30),

)

ALTER TABLE beneficiario_tutor add constraint pk_beneficiario_tutor PRIMARY KEY (id_beneficiario, id_tutor)	--PRIMARIA COMPUESTA 
ALTER TABLE beneficiario_tutor add constraint fk_id_beneficiario FOREIGN KEY (id_beneficiario) REFERENCES beneficiario	--FORANEA
ALTER TABLE beneficiario_tutor add constraint fk_id_tutor FOREIGN KEY(id_tutor)	 REFERENCES tutor--FORANEA
sp_helpconstraint beneficiario_tutor

drop table beneficiario_tutor
-------------------------------------------------
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

--ALTER TABLE evento DROP CONSTRAINT  PK__evento__AF150CA51B0907CE
ALTER TABLE evento add constraint pk_evento PRIMARY KEY (id_evento)
sp_helpconstraint evento


-------------------------------------------------
--ROL
CREATE TABLE rol(
	id_rol numeric(2) NOT NULL,
	descripcion varchar(50),
)
ALTER TABLE rol add constraint pk_rol PRIMARY KEY (id_rol)	--PRIMARIA 
sp_helpconstraint rol


-------------------------------------------------
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

)
ALTER TABLE usuario add constraint pk_usuario PRIMARY KEY (id_usuario)	--PRIMARIA COMPUESTA 
ALTER TABLE usuario add constraint fk_usuario FOREIGN KEY (id_rol) REFERENCES rol	--FORANEA
sp_helpconstraint usuario

drop table usuario
-------------------------------------------------

--PRIVELEGIO
CREATE TABLE privilegio(
	id_privilegio numeric(2) NOT NULL,
	permiso numeric(1),

)
ALTER TABLE privilegio add constraint pk_privilegio PRIMARY KEY (id_privilegio)	--PRIMARIA COMPUESTA 
sp_helpconstraint privilegio
-------------------------------------------------
drop table privilegio


--POSEE PRIVILEGIO
CREATE TABLE rol_privilegio(
	id_rol numeric(2) NOT NULL,
	id_privilegio numeric(2) NOT NULL,
	
)

DROP TABLE rol_privilegio

ALTER TABLE rol_privilegio add constraint pk_rol_privilegio PRIMARY KEY (id_rol, id_privilegio)	--PRIMARIA COMPUESTA 
ALTER TABLE rol_privilegio add constraint fk_id_rol FOREIGN KEY (id_rol) REFERENCES	rol--FORANEA
ALTER TABLE rol_privilegio add constraint fk_id_privilegio FOREIGN KEY(id_privilegio) REFERENCES	privilegio--FORANEA
sp_helpconstraint rol_privilegio

drop table rol_privilegio
------------------------------
SET DATEFORMAT dmy
BULK INSERT eq02.eq02.[proveedor] 
	FROM 'e:\wwwroot\eq02\proveedor.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'
	
	)


SELECT * 
FROM Proveedor