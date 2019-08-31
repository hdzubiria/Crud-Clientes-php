-------------------
-- ValidarUsuario
-------------------
DELIMITER $$
CREATE PROCEDURE ValidarUsuario(IN usuario varchar(100),IN pass varchar(100))
BEGIN
    SELECT * FROM Usuario where nombre=Usuario and password=pass;
END$$
DELIMITER ;

call ValidarUsuario('karen.realpe@gmail.com','12345');

-------------------
-- ObtenerClientes
-------------------
DELIMITER $$
CREATE PROCEDURE ObtenerClientes()
BEGIN
    SELECT * FROM Clientes;
END$$
DELIMITER ;

Call ObtenerUsuarios();

-------------------
-- CrearCliente
-------------------
DELIMITER $$
CREATE PROCEDURE CrearCliente(
    IN pNombres varchar(100),
    IN pApellidos varchar(100),
    IN pTelefono varchar(100),
    IN pDireccion varchar(100),
    IN pCorreo varchar(100)
)
BEGIN
    INSERT INTO Clientes(nombres,apellidos,telefono,direccion,correo) 
    VALUES (pnombres,papellidos,ptelefono,pdireccion,pcorreo_electronico);
END$$
DELIMITER ;

Call CrearCliente('Angela','Martinez','312 23455667','Carrera 20 91-14','Anglea.Martinez@gmail.com');

-------------------
-- ObtenerCliente
-------------------
DELIMITER $$
CREATE PROCEDURE ObtenerCliente(IN pId int)
BEGIN
    SELECT * 
    FROM Clientes
    WHERE id = pId;
END$$
DELIMITER ;

Call ObtenerUsuario(1);

-------------------
-- ActualizarCliente
-------------------
DELIMITER $$
CREATE PROCEDURE ActualizarCliente(
    IN pNombres varchar(100),
    IN pApellidos varchar(100),
    IN pTelefono varchar(100),
    IN pDireccion varchar(100),
    IN pCorreo varchar(100),
    IN pId int
)
BEGIN
    UPDATE Clientes 
        SET nombres=pnombres,
            apellidos=papellidos,
            telefono=ptelefono,
            direccion=pdireccion,
            correo=pcorreo 
    WHERE id=pId;
END$$
DELIMITER ;

Call ActualizarCliente('Angela','Martinez','312 23455667','Carrera 20 91-14','Anglea.Martinez@gmail.com',);

-------------------
-- BorrarCliente
-------------------
DELIMITER $$
CREATE PROCEDURE BorrarCliente(IN pId int)
BEGIN
    DELETE 
    FROM Clientes
    WHERE id = pId;
END$$
DELIMITER ;

Call BorrarCliente(5);