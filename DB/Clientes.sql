CREATE TABLE Clientes (
    id int(11) not null auto_increment,
    nombres varchar(100) not null,
    apellidos varchar(100) not null,
    telefono varchar(29) not null,
    direccion varchar(255)  not null,
    correo varchar(100) not null,
    primary key(id)
);


insert into Clientes(nombres,apellidos,telefono,direccion,correo)
values 
    ('Karen','Realp','312 455799595','Calle 55 34-34','karen.realpe@gmail.com'),
    ('Andres','Andres Zapata','312 4557466','Calle 83 25-34','karen.realpe@gmail.com'),
    ('Sara','Lopez','312 455356595','Calle 55 25-34','Sara.lopez@gmail.com'),
    ('Juan','Paez','312 45535342','Calle 80 24-31','Juan.Paez@gmail.com'),
    ('Ferderico','Saenz','312 23455667','Carrera 20 91-14','Ferderico.Saenz@gmail.com');