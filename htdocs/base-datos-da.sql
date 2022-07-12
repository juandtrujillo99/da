CREATE DATABASE da
	DEFAULT CHARACTER SET utf8;

USE da;

CREATE TABLE usuarios (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	nombre VARCHAR(25),
	telefono VARCHAR(25),
	email VARCHAR(255) UNIQUE,
	password VARCHAR(255),
	fecha_registro DATETIME NOT NULL,
	activo TINYINT NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1000;


CREATE TABLE editar_datos(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	usuario_id INT NOT NULL,
	url_secreta VARCHAR(255) NOT NULL,
	fecha DATETIME NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(usuario_id)
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);

CREATE TABLE productos (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    url VARCHAR(255) NOT NULL UNIQUE,
    imagen TEXT CHARACTER SET utf8 NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    detalles TEXT CHARACTER SET utf8 NOT NULL,
    precio VARCHAR(255) NOT NULL,
    descuento VARCHAR(255),
    precio_final VARCHAR(255),
    fecha DATETIME NOT NULL,
    activa TINYINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);


CREATE TABLE entradas(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	autor_id INT NOT NULL,
	url VARCHAR(255) NOT NULL UNIQUE,
	imagen TEXT CHARACTER SET utf8 NOT NULL,
	titulo VARCHAR(255) NOT NULL UNIQUE,	
	texto TEXT CHARACTER SET utf8 NOT NULL,
	fecha DATETIME NOT NULL,
	activa TINYINT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(autor_id)
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)ENGINE=InnoDB AUTO_INCREMENT=1000;

CREATE TABLE comentarios (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id VARCHAR(255) NOT NULL,
    producto_id INT,
    entrada_id INT,    
    titulo VARCHAR(255),
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(entrada_id)
        REFERENCES entradas(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY(producto_id)
        REFERENCES productos(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE recuperacion_clave(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	usuario_id INT NOT NULL,
	url_secreta VARCHAR(255) NOT NULL,
	fecha DATETIME NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(usuario_id)
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);





