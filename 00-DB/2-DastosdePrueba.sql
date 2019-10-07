
insert into Usuario(nombre,password,rol)
values 
    ('karen.realpe@gmail.com','12345','Cliente'),
    ('Juan.Vazquez@gmail.com','12345','Administrador');


insert into Clientes(nombres,apellidos,telefono,direccion,correo,idUsuario)
values 
    ('Karen','Realp','312 455799595','Calle 55 34-34','karen.realpe@gmail.com',1),
    ('Andres','Andres Zapata','312 4557466','Calle 83 25-34','karen.realpe@gmail.com',null),
    ('Sara','Lopez','312 455356595','Calle 55 25-34','Sara.lopez@gmail.com',null),
    ('Juan','Paez','312 45535342','Calle 80 24-31','Juan.Paez@gmail.com',null),
    ('Ferderico','Saenz','312 23455667','Carrera 20 91-14','Ferderico.Saenz@gmail.com',null),
    ('Juan','Vasquez','315 2345677','Calle 40 11-15','Juan.Vazquez@gmail.com',2);