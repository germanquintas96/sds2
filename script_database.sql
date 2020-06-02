-- tabla de usuarios
CREATE TABLE usuarios(
id    					int(255) auto_increment not null,
nombre	 				varchar(255) not null,
apellidos	 			varchar(255) not null,
password 				varchar(255) not null,
fecha_alta 	 			date not null,
fecha_actualizacion 	date not null,
activo  				boolean,
tipo                                    varchar(255) not null,
CONSTRAINT pk_usuarios PRIMARY KEY (id)
)ENGINE=InnoDB;


-- tabla de productos
CREATE TABLE productos (
  	id_producto int(255) auto_increment NOT NULL,
  	cod_producto varchar(255) NOT NULL,
 	nombre text COLLATE utf8_spanish_ci NOT NULL,
  	id_marca int(255) not null,
    id_caracteristica int(255) not null,
  	tamanio double(255,2) not null,     -- metro cubico NO ESTA EN DIAGRAMA 
    CONSTRAINT pk_productos PRIMARY KEY (id_producto)  
)ENGINE=InnoDB;


CREATE TABLE marcas(
    id_marca int(255) auto_increment not null,
    cod_marca varchar(255) not null,
    descripcion varchar(255) not null,
    CONSTRAINT pk_marcas PRIMARY KEY (id_marca)    
)ENGINE=InnoDB;

CREATE TABLE caracteristicas(
    id_caracteristica int(255) auto_increment not null,
    temperatura int(255),
    cubierto boolean,
    CONSTRAINT pk_caracteristicas PRIMARY KEY (id_caracteristica)    
)ENGINE=InnoDB;

CREATE TABLE lotes(
    id_lote int(255) auto_increment NOT NULL,
    id_producto int(255) NOT NULL,
    id_ubicacion int(255) NOT NULL,
    vencimiento date,
    cantidad int(255) NOT NULL, 
    CONSTRAINT pk_lotes PRIMARY KEY (id_lote)  
)ENGINE=InnoDB;

CREATE TABLE ubicaciones(
    id_ubicacion int(255) auto_increment not null,
    nombre_ubicacion varchar(255) not null, -- VER EN DIAGRAMA
    id_rack int(255) not null,
    capacidad double(255,2) not null,
    CONSTRAINT pk_ubicaciones PRIMARY KEY (id_ubicacion) 
)ENGINE=InnoDB;

CREATE TABLE racks(   -- NO ESTA EN DIAGRAMA
    id_rack int(255) auto_increment not null, -- NO ESTA EN DIAGRAMA
    nombre_rack varchar(255) not null, -- NO ESTA EN DIAGRAMA
    CONSTRAINT pk_racks PRIMARY KEY (id_rack) 
)ENGINE=InnoDB;


CREATE TABLE almacenes(
    id_almacen int(255) auto_increment not null,
    cod_almacen varchar(255) not null, -- NO ESTA EN DIAGRAMA, PARA USUARIO
    descripcion varchar(255), -- NO ESTA EN DIAGRAMA
    CONSTRAINT pk_almacenes PRIMARY KEY (id_almacen)    
)ENGINE=InnoDB;



-- usuario admin
INSERT INTO `usuarios` VALUES (NULL, 'CARLOS', 'PEREZ', '123456', CURDATE(), CURDATE(), 1, 'ADMIN');


-- PRODUCTOS
INSERT INTO `productos` (`id_producto`, `cod_producto`, `nombre`, `id_marca`, `id_caracteristica`, `tamanio`) VALUES 
(NULL, 'MAT', 'MATERIALES ELECTRICOS', '1', '1', '23.4'), 
(NULL, 'MAT', 'LAMPARA', '2', '2', '2.3');

-- MARCAS
INSERT INTO `marcas` (`id_marca`, `cod_marca`, `descripcion`) VALUES 
(NULL, 'RJ45', 'CABLE ELECTRICO PARA INTERNET'), 
(NULL, 'PHLLIPS23', 'LAMPARA FRIA 20W');

-- LOTES
INSERT INTO `lotes` (`id_lote`, `id_producto`, `id_ubicacion`, `vencimiento`, `cantidad`) VALUES 
(NULL, '1', '1', NULL, '20'), 
(NULL, '2', '1', NULL, '300');

