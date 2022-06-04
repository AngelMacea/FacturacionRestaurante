USE FacturacionRestaurante
GO
--Tabla Usuarios
CREATE PROCEDURE Acce.tblUsuarios_Insert
    @Emp_Id         INT,
    @Usua_Usuario   NVARCHAR(50),
    @Usua_Pass      NVARCHAR(50),
    @Usua_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Acce.tblUsuarios (Emp_Id,Usua_Usuario,Usua_Pass,Usua_UsuarioCreacion)
    VALUES (@Emp_Id, @Usua_Usuario, @Usua_Pass, @Usua_UsuarioCreacion)
END
GO
CREATE PROCEDURE Acce.tblUsuarios_Update
    @Usua_Id        INT,
    @Emp_Id         INT,
    @Usua_Usuario   NVARCHAR(50),
    @Usua_Pass      NVARCHAR(50),
    @Usua_UsuarioModifica INT
AS
BEGIN
    UPDATE Acce.tblUsuarios
    SET Emp_Id = @Emp_Id,
        Usua_Usuario = @Usua_Usuario,
        Usua_Pass = @Usua_Pass,
        Usua_UsuarioModifica = @Usua_UsuarioModifica,
        Usua_FechaModifica = CURRENT_TIMESTAMP
    WHERE Usua_Id = @Usua_Id
END
GO
CREATE PROCEDURE Acce.tblUsuarios_Delete
    @Usua_Id    INT
AS
BEGIN
    UPDATE Acce.tblUsuarios
    SET Usua_Estado = @Usua_Estado
    WHERE Usua_Id = @Usua_Id
END
GO