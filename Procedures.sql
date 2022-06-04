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
    @Usua_Id    INT,
    @Usua_UsuarioModifica INT
AS
BEGIN
    UPDATE Acce.tblUsuarios
    SET Usua_Estado = 0,
        Usua_UsuarioModifica = @Usua_UsuarioModifica,
        Usua_FechaModifica = CURRENT_TIMESTAMP
    WHERE Usua_Id = @Usua_Id
END
GO

--Tabla Paises

CREATE PROCEDURE Gnrl.tblPaises_Insert
    @Pais_Descripcion   NVARCHAR(50),
    @Pais_UsuarioCreacion   INT   
AS
BEGIN
    INSERT INTO Gnrl.tblPaises (Pais_Descripcion, Pais_UsuarioCreacion, Pais_FechaCreacion)
    VALUES(@Pais_Descripcion, @Pais_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblPaises_Update
    @Pais_Id    INT,
    @Pais_Descripcion NVARCHAR(50),
    @Pais_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblPaises
    SET Pais_Descripcion = @Pais_Descripcion,
        Pais_UsuarioModifica = @Pais_UsuarioModifica,
        Pais_FechaModifica = CURRENT_TIMESTAMP
    WHERE  Pais_Id = @Pais_Id
END
GO
CREATE PROCEDURE Gnrl.tblPaises_Delete
    @Pais_Id    INT,
    @Pais_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblPaises
    SET Pais_Estado = 0,
        Pais_UsuarioModifica = @Pais_UsuarioModifica,
        Pais_FechaModifica = CURRENT_TIMESTAMP
    WHERE Pais_Id = @Pais_Id
END
GO

--Tabla Ciudades

CREATE PROCEDURE Gnrl.tblCiudades_Insert
    @Ciud_Descripcion   NVARCHAR(50),
    @Pais_Id            INT,
    @Ciud_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblCiudades (Ciud_Descripcion, Pais_Id, Ciud_UsuarioCreacion)
    VALUES (@Ciud_Descripcion, @Pais_Id, @Ciud_UsuarioCreacion)
END
GO
CREATE PROCEDURE Gnrl.tblCiudades_Upgrade
    @Ciud_Id    INT,
    @Ciud_Descripcion NVARCHAR(50),
    @Pais_Id    INT,
    @Ciud_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblCiudades
    SET Ciud_Descripcion = @Ciud_Descripcion,
        Pais_Id = @Pais_Id,
        Ciud_UsuarioModifica = @Ciud_UsuarioModifica,
        Ciud_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Gnrl.tblCiudades_Delete
    @Ciud_Id    INT,
    @Ciud_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblCiudades
    SET Ciud_Estado = 0,
        Ciud_UsuarioModifica = @Ciud_UsuarioModifica,
        Ciud_FechaModifica = CURRENT_TIMESTAMP
    WHERE Ciud_Id = @Ciud_Id
END
GO

--Tabla Proveedores

CREATE PROCEDURE Gnrl.tblProveedores_Insert
    @Prov_Descripcion   NVARCHAR(50),
    @Prov_Tel           NVARCHAR(20),
    @Prov_Ciudad        INT,
    @Prov_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblProveedores (Prov_Descripcion, Prov_Tel, Prov_Ciudad, Prov_UsuarioCreacion, Prov_FechaCreacion)
    VALUES (@Prov_Descripcion, @Prov_Tel, @Prov_Ciudad, @Prov_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblProveedores_Update
    @Prov_Id    INT,
    @Prov_Descripcion NVARCHAR(50),
    @Prov_Tel   NVARCHAR(50),
    @Prov_Ciudad INT, 
    @Prov_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblProveedores
    SET Prov_Descripcion = @Prov_Descripcion,
        Prov_Tel = @Prov_Tel,
        Prov_Ciudad = @Prov_Ciudad,
        Prov_UsuarioModifica = @Prov_UsuarioModifica,
        Prov_FechaModifica = CURRENT_TIMESTAMP
    WHERE Prov_Id = @Prov_Id
END
GO
CREATE PROCEDURE Gnrl.tblProveedores_Delete
    @Prov_Id    INT,
    @Prov_UsuarioModifica INT

AS
BEGIN
    UPDATE Gnrl.tblProveedores
    SET Prov_Estado = 0,
        Prov_UsuarioModifica = @Prov_UsuarioModifica,
        Prov_FechaModifica = CURRENT_TIMESTAMP
    WHERE Prov_Id = @Prov_Id
END
GO

--Tabla Clientes 
CREATE PROCEDURE Gnrl.tblClientes_Insert
    @Clie_Identidad     NVARCHAR(15),
    @Clie_Nombres       NVARCHAR(50),
    @Clie_Apellidos     NVARCHAR(50),
    @Clie_Sexo          CHAR(1),
    @Clie_Tel           NVARCHAR(20),
    @Clie_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblClientes (Clie_Identidad, Clie_Nombres, Clie_Apellidos,Clie_Sexo, Clie_Tel, Clie_UsuarioCreacion, Clie_FechaCreacion)
    VALUES (@Clie_Identidad, @Clie_Nombres, @Clie_Apellidos, @Clie_Sexo, @Clie_Tel, @Clie_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblClientes_Update
    @Clie_Id    INT,
    @Clie_Identidad NVARCHAR(15),
    @Clie_Nombres   NVARCHAR(50),
    @Clie_Apellidos NVARCHAR(50),
    @Clie_Sexo      CHAR(1),
    @Clie_Tel       NVARCHAR(20),
    @Clie_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblClientes
    SET Clie_Identidad = @Clie_Identidad,
        Clie_Nombres = @Clie_Nombres, 
        Clie_Apellidos = @Clie_Apellidos, 
        Clie_Sexo = @Clie_Sexo,
        Clie_Tel = @Clie_Tel,
        Clie_UsuarioModifica = @Clie_UsuarioModifica,
        Clie_FechaModifica = CURRENT_TIMESTAMP
    WHERE Clie_Id = @Clie_Id
END
GO  
CREATE PROCEDURE Gnrl.tblClientes_Delete
    @Clie_Id    INT,
    @Clie_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblClientes
    SET Clie_Estado = 0,
        Clie_UsuarioModifica = @Clie_UsuarioModifica,
        Clie_FechaModifica = CURRENT_TIMESTAMP
    WHERE Clie_Id = @Clie_Id
END
GO
--Tabla Comunidades
CREATE PROCEDURE Gnrl.tblComunidades_Insert
    @Comu_Descripcion   NVARCHAR(50),
    @Ciud_Id            INT,
    @Comu_TarifaEnvio   MONEY,
    @Comu_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblComunidades (Comu_Descripcion, Ciud_Id, Comu_TarifaEnvio, Comu_UsuarioCreacion,Comu_FechaCreacion)
    VALUES  (@Comu_Descripcion, @Ciud_Id, @Comu_TarifaEnvio, @Comu_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblComunidades_Update
    @Comu_Id    INT,
    @Comu_Descripcion   NVARCHAR(50),
    @Ciud_Id            INT,
    @Comu_TarifaEnvio   MONEY,
    @Comu_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblComunidades
    SET Comu_Descripcion = @Comu_Descripcion,
        Ciud_Id = @Ciud_Id,
        Comu_TarifaEnvio = @Comu_TarifaEnvio,
        Comu_UsuarioModifica = @Comu_UsuarioModifica,
        Comu_FechaModifica = CURRENT_TIMESTAMP
    WHERE Comu_Id = @Comu_Id
END
GO
CREATE PROCEDURE Gnrl.tblComunidades_Delete
    @Comu_Id    INT,
    @Comu_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblComunidades
    SET Comu_Estado = 0,
        Comu_UsuarioModifica = @Comu_UsuarioModificam,
        Comu_FechaModifica = CURRENT_TIMESTAMP
    WHERE Comu_Id = @Comu_Id
END
GO

--Tabla Estados Civiles

CREATE PROCEDURE Gnrl.tblEstadoCiviles_Insert
    @EsCi_Descrip   VARCHAR(50),
    @EsCi_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblEstadoCiviles (EsCi_Descrip, EsCi_UsuarioCreacion, EsCi_FechaCreacion)
    VALUES (@EsCi_Descrip,@EsCi_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblEstadoCiviles_Update
    @EsCi_Id    INT,
    @EsCi_Descrip VARCHAR(50),
    @EsCi_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblEstadoCiviles
    SET EsCi_Descrip = @EsCi_Descrip,
        EsCi_UsuarioModifica = @EsCi_UsuarioModifica,
        EsCi_FechaModifica = CURRENT_TIMESTAMP
    WHERE EsCi_Id = @EsCi_Id
END
GO 
CREATE PROCEDURE Gnrl.tblEstadoCiviles_Delete
    @EsCi_Id    INT,
    @EsCi_UsuarioModifica NVARCHAR(50)
AS 
BEGIN
    UPDATE Gnrl.tblEstadoCiviles
    SET EsCi_Estado = 0,
        EsCi_UsuarioModifica = @EsCi_UsuarioModifica,
        EsCi_FechaModifica = CURRENT_TIMESTAMP
    WHERE EsCi_Id = @EsCi_Id
END
GO

--Tabla Roles

CREATE PROCEDURE Gnrl.tblRoles_Insert
    @Rol_Descripcion NVARCHAR(50),
    @Rol_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Gnrl.tblRoles (Rol_Descripcion, Rol_UsuarioCreacion, Rol_FechaCreacion)
    VALUES (@Rol_Descripcion, @Rol_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblRoles_Update
    @Rol_Id     INT,
    @Rol_Descripcion NVARCHAR(50),
    @Rol_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblRoles
    SET Rol_Descripcion = @Rol_Descripcion,
        Rol_UsuarioModifica = @Rol_UsuarioModifica,
        Rol_FechaModifica =  CURRENT_TIMESTAMP
    WHERE Rol_Id = @Rol_Id
END
GO
CREATE PROCEDURE Gnrl.tblRoles_Delete
    @Rol_Id     INT,
    @Rol_UsuarioModifica INT
AS 
BEGIN
    UPDATE tblRoles
    SET Rol_Estado = 0,
        Rol_UsuarioModifica = @Rol_UsuarioModifica,
        Rol_FechaModifica = @Rol_FechaModifica
    WHERE Rol_Id = @Rol_Id
END
GO

--Tabla Empleados

CREATE PROCEDURE Gnrl.tblEmpleados_Insert
    @Emp_Identidad  VARCHAR(13),
    @Emp_Nombres    NVARCHAR(50),
    @Emp_Apellidos  NVARCHAR(50),
    @Emp_Sexo       CHAR(1),
    @Emp_Edad       INT,
    @EsCi_Id        INT,
    @Emp_Correo     NVARCHAR(50),
    @Rol_Id         INT,
    @Emp_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Gnrl.tblEmpleados (Emp_Identidad, Emp_Nombres, Emp_Apellidos, Emp_Sexo, Emp_Edad, EsCi_Id,Emp_Correo, Rol_Id, Emp_UsuarioCreacion, Emp_FechaCreacion)
    VALUES(@Emp_Identidad ,@Emp_Nombres, @Emp_Apellidos, @Emp_Sexo, @Emp_Edad, @EsCi_Id, @Emp_Correo, @Rol_Id, @Emp_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.tblEmpleados_Update
    @Emp_Id         INT,
    @Emp_Identidad  VARCHAR(13),
    @Emp_Nombres    NVARCHAR(50),
    @Emp_Apellidos  NVARCHAR(50),
    @Emp_Sexo       CHAR(1),
    @Emp_Edad       INT,
    @EsCi_Id        INT,
    @Emp_Correo     NVARCHAR(50),
    @Rol_Id         INT,
    @Emp_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblEmpleados
    SET @Emp_Identidad = @Emp_Identidad,
        @Emp_Nombres = @Emp_Nombres,
        @Emp_Apellidos = @Emp_Apellidos,
        @Emp_Sexo = @Emp_Sexo,
        @Emp_Edad = @Emp_Edad,
        @EsCi_Id = @EsCi_Id,
        @Emp_Correo = @Emp_Correo,
        @Rol_Id = @Rol_Id,
        @Emp_UsuarioModifica = @Emp_UsuarioModifica,
        @Emp_FechaModifica = CURRENT_TIMESTAMP
    WHERE Emp_Id = @Emp_Id
END
GO
CREATE PROCEDURE Gnrl.tblEmpleados_Delete
    @Emp_Id     INT,
    @Emp_UsuarioModifica INT
AS
BEGIN
    UPDATE Gnrl.tblEmpleados
    SET Emp_Estado = 0,
        Emp_UsuarioModifica = @Emp_UsuarioModifica,
        Emp_FechaModifica = CURRENT_TIMESTAMP
END
GO

--Tabla Almacenes

CREATE PROCEDURE Inv.tblAlmacenes_Insert
    @Almc_Descripcion   NVARCHAR(50),
    @Almc_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Inv.tblAlmacenes (Almc_Descripcion, Almc_UsuarioCreacion, Almc_FechaCreacion)
    VALUES (@Almc_Descripcion, @Almc_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Inv.tblAlmacenes_Update
    @Almc_Id    INT,
    @Almc_Descripcion NVARCHAR(50),
    @Almc_UsuarioModifica INT
AS
BEGIN
    UPDATE Inv.tblAlmacenes
    SET Almc_Descripcion = @Almc_Descripcion,
        Almc_UsuarioModifica = @Almc_UsuarioModifica,
        Almc_FechaModifica = CURRENT_TIMESTAMP
    WHERE Almc_Id = @Almc_Id
END
GO 
CREATE PROCEDURE Inv.tblAlmacenes_Delete
    @Almc_Id    INT,
    @Almc_UsuarioModifica INT
AS
BEGIN
    UPDATE Inv.tblAlmacenes
    SET Almc_Estado = 0,
        Almc_Descripcion = @Almc_Descripcion,
        Almc_UsuarioModifica = @Almc_UsuarioModifica,
        Almc_FechaModifica = CURRENT_TIMESTAMP
END
GO