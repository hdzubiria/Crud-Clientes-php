CREATE TABLE Usuario (
    id int(11) not null auto_increment,
    nombre varchar(100) not null,
    password varchar(100) not null,
    primary key(id)
);

CREATE TABLE Clientes (
    id int(11) not null auto_increment,
    nombres varchar(100) not null,
    apellidos varchar(100) not null,
    telefono varchar(29) not null,
    direccion varchar(255)  not null,
    correo varchar(100) not null,
    idUsuario int(11) null,
    primary key(id),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(id)
);