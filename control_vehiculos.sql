-- DROP DATABASE control_vehiculos;

CREATE DATABASE control_vehiculos;

USE control_vehiculos;

CREATE TABLE usuario (
    id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) UNIQUE NOT NULL,
    pass_usuario varchar(260) NOT NULL,
	rol_usuario TINYINT NOT NULL DEFAULT 1
);

CREATE TABLE datos_personales(
    id_datos INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    datos_nombre VARCHAR(50) NOT NULL,
    datos_apellido VARCHAR(50) NOT NULL,
    datos_documento VARCHAR(15) not null,
    datos_email varchar(100) not null,
    datos_telefono varchar(15) not null,
    id_usuario_FK INT NOT NULL
);

-- CREATE TABLE rol (
--     id_rol INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     nombre_rol VARCHAR(30) not null,
--     id_usuario_FK INT NOT NULL
-- );

CREATE TABLE categoria (
    id_categoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_categoria VARCHAR(50) NOT NULL
);

CREATE TABLE vehiculo (
    id_vehiculo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    placa_vehiculo VARCHAR(10) UNIQUE NOT NULL,
    marca_vehiculo VARCHAR(30) NOT NULL,
    modelo_vehiculo VARCHAR(10) NOT NULL,
    color_vehiculo varchar(30) NOT NULL, 
    estado_vehiculo varchar(6) NOT NULL DEFAULT 1,
    precio_vehiculo DOUBLE NOT NULL,
    id_usuario_vendedor_FK INT NOT NULL,
    id_categoria_FK INT NOT NULL
);

ALTER TABLE datos_personales
ADD CONSTRAINT usuario_datos_FK
FOREIGN KEY (id_usuario_FK)
REFERENCES usuario(id_usuario);

-- ALTER TABLE rol
-- ADD CONSTRAINT usuario_rol_FK
-- FOREIGN KEY (id_usuario_FK)
-- REFERENCES usuario(id_usuario);

ALTER TABLE vehiculo
ADD CONSTRAINT usuario_vehiculo_FK
FOREIGN KEY (id_usuario_vendedor_FK)
REFERENCES usuario(id_usuario);

select * from usuario;

-- Insertar

INSERT INTO usuario VALUES(null, 'JhonCamargo21', '$2y$10$6bKNdJpL5OMaop78Lub0/eOxE2/O9fslzmsVRmei9xAwfo3O0k0NK', 3),
(null,'JhonCamargo20', '$2y$10$6bKNdJpL5OMaop78Lub0/eOxE2/O9fslzmsVRmei9xAwfo3O0k0NK', 2),
(null,'JhonCamargo19', '$2y$10$6bKNdJpL5OMaop78Lub0/eOxE2/O9fslzmsVRmei9xAwfo3O0k0NK', 1);

INSERT INTO categoria (nombre_categoria) VALUES ('Campero'), ('Automóvil'), ('Camioneta'), ('Tractor');

INSERT INTO datos_personales VALUES(null, 'Jhon Alexander', 'Camargo Cadena', '1014737507', 'jhoncamargo07@gmail.com', '3144781527', 1),
(null, 'Alexander', 'Cadena', '1014737508', 'alexander@gmail.com', '3142577567', 2),
(null, 'Jacc', 'Hernandez', '1014737509', 'jacc@gmail.com', '3132260083', 3);

select * from vehiculo inner join categoria on id_categoria = id_categoria_FK where id_categoria = 2;

SELECT * FROM datos_personales INNER JOIN usuario ON id_usuario = id_usuario_FK WHERE id_usuario = 1;

-- DROP TRIGGER insertarDatosDeUsuario;

Delimiter $$
CREATE TRIGGER insertarDatosDeUsuario
AFTER INSERT on usuario
FOR EACH ROW
BEGIN
	INSERT INTO datos_personales VALUES (null, 'Desconocido', 'Desconocido', 'Desconocido', 'Desconocido', 'Desconocido', NEW.id_usuario);
END $$
DELIMITER ;