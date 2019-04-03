CREATE TABLE evento(
	id_evento int NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(30),
	fecha DATE,
    	hora TIME,
	lugar VARCHAR(100),
	descripcion VARCHAR(255),
    	imagen VARCHAR(500),
	CONSTRAINT pk_evento PRIMARY KEY (id_evento)
)