# Script Creacion Entidades

CREATE TABLE db_paraisoTico.Rol (
    id_rol INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(10) NOT NULL,
    activo BOOLEAN NOT NULL
) ENGINE = InnoDB;

CREATE TABLE db_paraisoTico.Usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    nombre VARCHAR(25) NOT NULL,
    primer_apellido VARCHAR(25) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    telefono VARCHAR(15),
    ruta_imagen VARCHAR(1022),
    activo BOOLEAN NOT NULL
) ENGINE = InnoDB;

CREATE TABLE db_paraisoTico.Usuarios_Roles (
    id_rol INT NOT NULL,
    id_usuario INT NOT NULL,
    PRIMARY KEY (id_rol, id_usuario),
    FOREIGN KEY (id_rol) REFERENCES Rol(id_rol),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
) ENGINE = InnoDB;

CREATE TABLE db_paraisoTico.Blog (
    id_blog INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    contenido VARCHAR(1022),
    fecha_publicacion DATE NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
) ENGINE = InnoDB;
