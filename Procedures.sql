USE FacturacionRestaurante
GO
--Tabla Usuarios
CREATE PROCEDURE Acce.UDP_tblUsuarios_Insert
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
CREATE PROCEDURE Acce.UDP_tblUsuarios_Update
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
CREATE PROCEDURE Acce.UDP_tblUsuarios_Delete
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

CREATE PROCEDURE Acce.UDP_tblUsuarios_Validacion
	@Usua_Usuario  NVARCHAR(50),
	@Usua_Pass		NVARCHAR(50)
AS
BEGIN
	SELECT * FROM Acce.tblUsuarios WHERE Usua_Usuario = @Usua_Usuario AND Usua_Pass = @Usua_Pass
END
GO

CREATE PROCEDURE Acce.UDP_tblUsuarios_Mostrar
AS
BEGIN
	SELECT	Usuario.Usua_Id,
			CONCAT(Empleado.Emp_Nombres,' ',Empleado.Emp_Apellidos) Nombre,
			Usuario.Usua_Usuario,
			Usuario.Usua_Pass
	FROM Acce.tblUsuarios AS Usuario
	INNER JOIN Gnrl.tblEmpleados AS Empleado ON Usuario.Emp_Id = Empleado.Emp_Id
	WHERE Usua_Estado = 1
END
GO

--Tabla Paises

CREATE PROCEDURE Gnrl.UDP_tblPaises_Insert
    @Pais_Descripcion   NVARCHAR(50),
    @Pais_UsuarioCreacion   INT   
AS
BEGIN
    INSERT INTO Gnrl.tblPaises (Pais_Descripcion, Pais_UsuarioCreacion, Pais_FechaCreacion)
    VALUES(@Pais_Descripcion, @Pais_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.UDP_tblPaises_Update
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
CREATE PROCEDURE Gnrl.UDP_tblPaises_Delete
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
CREATE PROCEDURE Gnrl.UDP_tblPaises_Mostrar
AS
BEGIN
	SELECT Pais_Id,Pais_Descripcion FROM Gnrl.tblPaises
	WHERE Pais_Estado = 1
END


GO

--Tabla Ciudades

CREATE PROCEDURE Gnrl.UDP_tblCiudades_Insert
    @Ciud_Descripcion   NVARCHAR(50),
    @Pais_Id            INT,
    @Ciud_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblCiudades (Ciud_Descripcion, Pais_Id, Ciud_UsuarioCreacion)
    VALUES (@Ciud_Descripcion, @Pais_Id, @Ciud_UsuarioCreacion)
END
GO
CREATE PROCEDURE Gnrl.UDP_tblCiudades_Upgrade
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
CREATE PROCEDURE Gnrl.UDP_tblCiudades_Delete
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

CREATE PROCEDURE Gnrl.UDP_tblCiudades_Mostrar
AS
BEGIN
	SELECT	Ciud.Ciud_Id,
			Ciud_Descripcion,
			Pais.Pais_Descripcion
	FROM Gnrl.tblCiudades AS Ciud INNER JOIN Gnrl.tblPaises AS Pais ON Pais.Pais_Id = Ciud.Pais_Id
	WHERE Ciud.Ciud_Estado = 1
END

GO

--Tabla Proveedores

CREATE PROCEDURE Gnrl.UDP_tblProveedores_Insert
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
CREATE PROCEDURE Gnrl.UDP_tblProveedores_Update
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
CREATE PROCEDURE Gnrl.UDP_tblProveedores_Delete
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

CREATE PROCEDURE Gnrl.UDP_tblProveedores_Mostrar
AS
BEGIN
	SELECT	Prov.Prov_Id,
			Prov.Prov_Descripcion,
			Prov.Prov_Tel,
			Ciud.Ciud_Descripcion,
			Pais.Pais_Descripcion
	FROM Gnrl.tblProveedores AS Prov
	INNER JOIN Gnrl.tblCiudades AS Ciud ON Ciud.Ciud_Id = Prov.Prov_Ciudad
	INNER JOIN Gnrl.tblPaises AS Pais  ON Pais.Pais_Id = Ciud.Pais_Id
	WHERE Prov.Prov_Estado = 1
END
GO
--Tabla Clientes 
CREATE PROCEDURE Gnrl.UDP_tblClientes_Insert
    @Clie_Identidad     NVARCHAR(15),
    @Clie_Nombres       NVARCHAR(50),
    @Clie_Apellidos     NVARCHAR(50),
    @Clie_Sexo          CHAR(1),
    @Clie_Tel           NVARCHAR(20),
    @Clie_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblClientes (Clie_Identificacion, Clie_Nombres, Clie_Apellidos,Clie_Sexo, Clie_Tel, Clie_UsuarioCreacion, Clie_FechaCreacion)
    VALUES (@Clie_Identidad, @Clie_Nombres, @Clie_Apellidos, @Clie_Sexo, @Clie_Tel, @Clie_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.UDP_tblClientes_Update
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
    SET Clie_Identificacion = @Clie_Identidad,
        Clie_Nombres = @Clie_Nombres, 
        Clie_Apellidos = @Clie_Apellidos, 
        Clie_Sexo = @Clie_Sexo,
        Clie_Tel = @Clie_Tel,
        Clie_UsuarioModifica = @Clie_UsuarioModifica,
        Clie_FechaModifica = CURRENT_TIMESTAMP
    WHERE Clie_Id = @Clie_Id
END
GO  
CREATE PROCEDURE Gnrl.UDP_tblClientes_Delete
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

CREATE PROCEDURE Gnrl.UDP_tblClientes_Mostrar
AS
BEGIN
	SELECT Clie_Id,
			Clie_Identificacion,
			CONCAT(Clie_Nombres,' ',Clie_Apellidos) Nombre,
			CASE Clie_Sexo
			WHEN 'F' THEN 'Femenino'
			WHEN 'M' THEN 'Masculino'
			END Sexo,
			Clie_Tel
	FROM Gnrl.tblClientes AS Clie
	WHERE Clie.Clie_Estado = 1
END
GO
--Tabla Comunidades
CREATE PROCEDURE Gnrl.UDP_tblComunidades_Insert
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
CREATE PROCEDURE Gnrl.UDP_tblComunidades_Update
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
CREATE PROCEDURE Gnrl.UDP_tblComunidades_Delete
    @Comu_Id    INT,
    @Comu_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblComunidades
    SET Comu_Estado = 0,
        Comu_UsuarioModifica = @Comu_UsuarioModifica,
        Comu_FechaModifica = CURRENT_TIMESTAMP
    WHERE Comu_Id = @Comu_Id
END
GO
CREATE PROCEDURE Gnrl.UDP_tblComunidades_Mostrar
AS
BEGIN
	SELECT	Comu_Id,
			Comu_Descripcion,
			Ciud.Ciud_Descripcion,
			Comu_TarifaEnvio
	FROM Gnrl.tblComunidades AS Comu
	INNER JOIN Gnrl.tblCiudades AS Ciud ON Ciud.Ciud_Id = Comu.Ciud_Id
	WHERE Comu_Estado = 1
END
GO

--Tabla Estados Civiles

CREATE PROCEDURE Gnrl.UDP_tblEstadoCiviles_Insert
    @EsCi_Descrip   VARCHAR(50),
    @EsCi_UsuarioCreacion INT
AS
BEGIN
    INSERT INTO Gnrl.tblEstadoCiviles (EsCi_Descrip, EsCi_UsuarioCreacion, EsCi_FechaCreacion)
    VALUES (@EsCi_Descrip,@EsCi_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.UDP_tblEstadoCiviles_Update
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
CREATE PROCEDURE Gnrl.UDP_tblEstadoCiviles_Delete
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

CREATE PROCEDURE Gnrl.UDP_tblEstadosCiviles_Mostrar
AS
BEGIN
	SELECT EsCi_Id,EsCi_Descrip
	FROM Gnrl.tblEstadoCiviles
	WHERE EsCi_Estado = 1
END
GO

--Tabla Roles

CREATE PROCEDURE Gnrl.UDP_tblRoles_Insert
    @Rol_Descripcion NVARCHAR(50),
    @Rol_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Gnrl.tblRoles (Rol_Descripcion, Rol_UsuarioCreacion, Rol_FechaCreacion)
    VALUES (@Rol_Descripcion, @Rol_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.UDP_tblRoles_Update
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
CREATE PROCEDURE Gnrl.UDP_tblRoles_Delete
    @Rol_Id     INT,
    @Rol_UsuarioModifica INT
AS 
BEGIN
    UPDATE tblRoles
    SET Rol_Estado = 0,
        Rol_UsuarioModifica = @Rol_UsuarioModifica,
        Rol_FechaModifica = CURRENT_TIMESTAMP
    WHERE Rol_Id = @Rol_Id
END
GO
CREATE PROCEDURE Gnrl.UDP_tblRoles_Mostrar
AS
BEGIN
	SELECT Rol_Id, Rol_Descripcion FROM Gnrl.tblRoles
	WHERE Rol_Estado = 1
END
GO

--Tabla Empleados

CREATE PROCEDURE Gnrl.UDP_tblEmpleados_Insert
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
CREATE PROCEDURE Gnrl.UDP_tblEmpleados_Update
    @Emp_Id         INT,
    @Emp_Identidad  VARCHAR(13),
    @Emp_Nombres    NVARCHAR(50),
    @Emp_Apellidos  NVARCHAR(50),
    @Emp_Sexo       CHAR(1),
    @Emp_Edad       INT,
    @EsCi_Id        INT,
    @Emp_Correo     NVARCHAR(50),
    @Rol_Id         INT,
    @Emp_UsuarioModifica INT,
    @Emp_FechaModifica DATE
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
CREATE PROCEDURE Gnrl.UDP_tblEmpleados_Delete
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

CREATE PROCEDURE Gnrl.UDP_tblEmpleados_Mostrar
AS
BEGIN
	SELECT Empleado.Emp_Id,
			Empleado.Emp_Identidad,
			CONCAT(Empleado.Emp_Nombres,' ',Empleado.Emp_Apellidos) Nombre,
			CASE Empleado.Emp_Sexo
			WHEN 'M' THEN 'Masculino'
			WHEN 'F' THEN 'Femenino'
			END Sexo,
			Empleado.Emp_Edad,
			EsCi.EsCi_Descrip,
			Empleado.Emp_Correo,
			Rol.Rol_Descripcion
	FROM Gnrl.tblEmpleados AS Empleado
	INNER JOIN Gnrl.tblEstadoCiviles AS EsCi ON EsCi.EsCi_Id = Empleado.EsCi_Id
	INNER JOIN Gnrl.tblRoles AS Rol ON Rol.Rol_Id = Empleado.Rol_Id
	WHERE Empleado.Emp_Estado = 1
END
GO
--Tabla Almacenes

CREATE PROCEDURE Inv.UDP_tblAlmacenes_Insert
    @Almc_Descripcion   NVARCHAR(50),
    @Almc_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Inv.tblAlmacenes (Almc_Descripcion, Almc_UsuarioCreacion, Almc_FechaCreacion)
    VALUES (@Almc_Descripcion, @Almc_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Inv.UDP_tblAlmacenes_Update
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
CREATE PROCEDURE Inv.UDP_tblAlmacenes_Delete
    @Almc_Id    INT,
    @Almc_UsuarioModifica INT
AS
BEGIN
    UPDATE Inv.tblAlmacenes
    SET Almc_Estado = 0,
        Almc_UsuarioModifica = @Almc_UsuarioModifica,
        Almc_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Inv.UDP_tblAlmacenes_Mostrar	
AS
BEGIN
	SELECT Almc_Id, Almc_Descripcion
	FROM Inv.tblAlmacenes
	WHERE Almc_Estado = 1
END
GO

--Tabla Ingredientes
CREATE PROCEDURE Inv.UDP_tblIngredientes_ReducirStock
    @Ingr_Id    INT,
    @CantidaAUtilizar INT
AS 
BEGIN
    DECLARE @Stock INT
    SET @Stock = (SELECT Ingr_Stock FROM Inv.tblIngredientes WHERE Ingr_Id = @Ingr_Id)

    UPDATE Inv.tblIngredientes
    SET Ingr_Stock = @Stock - @CantidaAUtilizar
    WHERE Ingr_Id = @Ingr_Id

END
GO
CREATE PROCEDURE Inv.UDP_tblIngredientes_Insert
    @Ingr_Descripcion   NVARCHAR(50),
    @Ingr_Stock         INT,
    @Ingr_FechaCaducidad DATE,
    @Ingr_Estatus       CHAR(1),
    @Almc_Id            INT,
    @Ingr_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Inv.tblIngredientes (Ingr_Descripcion, Ingr_Stock, Ingr_FechaCaducidad, Ingr_Estatus, Almc_Id, Ingr_UsuarioCreacion, Ingr_FechaCreacion)
    VALUES (@Ingr_Descripcion, @Ingr_Stock, @Ingr_FechaCaducidad, @Ingr_Estatus, @Almc_Id, @Ingr_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO


CREATE PROCEDURE Inv.UDP_tblIngredientes_Update
    @Ingr_Id            INT,
    @Ingr_Descripcion   INT,
    @Ingr_Stock         INT,
    @Prov_Id            INT,
    @Ingr_FechaCaducidad DATE,
    @Ingr_Estatus       CHAR(1),
    @Almc_Id            INT,
    @Ingr_UsuarioModifica INT
AS 
BEGIN
    UPDATE Inv.tblIngredientes
    SET Ingr_Descripcion = @Ingr_Descripcion,
        Ingr_Stock = @Ingr_Stock,
        Ingr_FechaCaducidad = @Ingr_FechaCaducidad,
        Ingr_Estatus = @Ingr_Estatus,
        Almc_Id = @Almc_Id,
        Ingr_UsuarioModifica = @Ingr_UsuarioModifica,
        Ingr_FechaModifica = CURRENT_TIMESTAMP
    WHERE Ingr_Id = @Ingr_Id
END
GO
CREATE PROCEDURE Inv.UDP_tblIngredientes_Delete
    @Ingr_Id    INT,
    @Ingr_UsuarioModifica INT
AS 
BEGIN
    UPDATE Inv.tblIngredientes
    SET Ingr_Estado = 0,
        Ingr_UsuarioModifica = @Ingr_UsuarioModifica,
        Ingr_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Inv.UDP_tblIngredientes_Mostrar
AS
BEGIN
	SELECT INGR.Ingr_Id, INGR.Ingr_Descripcion, INGR.Ingr_Stock, CAST(INGR.Ingr_FechaCaducidad AS varchar(20)) AS Ingr_FechaCaducidad, 
			CASE
				WHEN INGR.Ingr_Estatus = 'B' THEN 'BUENO'
				WHEN INGR.Ingr_Estatus = 'V' THEN 'VENCIDO'
			END AS [Ingr_Estatus],
			ALMC.Almc_Descripcion
			
	FROM Inv.tblIngredientes AS INGR
	INNER JOIN Inv.tblAlmacenes AS ALMC ON ALMC.Almc_Id = INGR.Almc_Id
	WHERE Ingr_Estado = 1
END
GO

--Tabla Menus

CREATE PROCEDURE Gnrl.UDP_tblMenus_Insert
    @Menu_Descripcion   NVARCHAR(50),
    @Menu_Precio        MONEY,
    @Menu_UsuarioCreacion INT
AS 
BEGIN
    INSERT INTO Gnrl.tblMenus (Menu_Descripcion, Menu_Precio, Menu_UsuarioCreacion, Menu_FechaCreacion)
    VALUES (@Menu_Descripcion, @Menu_Precio, @Menu_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Gnrl.UDP_tblMenus_Update
    @Menu_Id            INT,
    @Menu_Descripcion   NVARCHAR(50),
    @Menu_Precio        MONEY,
    @Menu_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblMenus
    SET Menu_Descripcion = @Menu_Descripcion,
        Menu_Precio = @Menu_Precio,
        Menu_UsuarioModifica = @Menu_UsuarioModifica,
        Menu_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Gnrl.UDP_tblMenus_Delete
    @Menu_Id    INT,
    @Menu_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblMenus
    SET Menu_Estado = 0,
        Menu_UsuarioModifica = @Menu_UsuarioModifica,
        Menu_FechaModifica = CURRENT_TIMESTAMP
END
GO

CREATE PROCEDURE Gnrl.UDP_tblMenus_Mostrar
AS
BEGIN
	SELECT Menu_Id, Menu_Descripcion, Menu_Precio FROM Gnrl.tblMenus
	WHERE Menu_Estado = 1
END
GO


--Tabla Menu Detalles

CREATE PROCEDURE Gnrl.UDP_tblMenuDetalles_Insert
    @Menu_Id		INT,
	@Ingr_Id		INT,
	@MenuDe_Cantidad INT,
	@MenuDe_UsuarioCreacion	INT
AS 
BEGIN

		INSERT INTO Gnrl.tblMenuDetalles (Menu_Id, Ingr_Id, MenuDe_Cantidad, MenuDe_UsuarioCreacion, MenuDe_FechaCreacion)
		VALUES (@Menu_Id, @Ingr_Id, @MenuDe_Cantidad, @MenuDe_UsuarioCreacion, CURRENT_TIMESTAMP)
    
END
GO
CREATE PROCEDURE Gnrl.tblMenuDetalles_Update
    @MenuDe_Id        INT,
    @Menu_Id		INT,
	@Ingr_Id		INT,
	@MenuDe_Cantidad INT,
    @MenuDe_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblMenuDetalles
    SET Menu_Id = @Menu_Id,
        Ingr_Id = @Ingr_Id,
        MenuDe_Cantidad = @MenuDe_Cantidad,
        MenuDe_UsuarioModifica = @MenuDe_UsuarioModifica,
        MenuDe_FechaModifica = CURRENT_TIMESTAMP
    WHERE MenuDe_Id = @MenuDe_Id  
END
GO
CREATE PROCEDURE Gnrl.UDP_tblMenuDetalles_Delete
    @MenuDe_Id        INT,
    @MenuDe_UsuarioModifica INT
AS 
BEGIN
    UPDATE Gnrl.tblMenuDetalles
    SET MenuDe_Estado = 0,
        MenuDe_UsuarioModifica = @MenuDe_UsuarioModifica,
        MenuDe_FechaModifica = CURRENT_TIMESTAMP
END
GO 
CREATE PROCEDURE Gnrl.UDP_tblMenuDetalles_Mostrar
AS
BEGIN
	SELECT	MenuDe_Id,
			Menu.Menu_Descripcion,
			Ingr.Ingr_Descripcion,
			MenuDe_Cantidad
	FROM Gnrl.tblMenuDetalles AS MenuDe
	INNER JOIN Gnrl.tblMenus AS Menu ON Menu.Menu_Id = MenuDe.Menu_Id
	INNER JOIN Inv.tblIngredientes AS Ingr ON Ingr.Ingr_Id = MenuDe.Ingr_Id
	WHERE MenuDe.MenuDe_Estado = 1
END
GO


--Tabla Compras

CREATE PROCEDURE Inv.UDP_tblCompras_Insert
    @Comp_Fecha     DATE,
	@Comp_NoOrden   NVARCHAR(6),
	@Comp_IVA		INT,
	@Comp_UsuarioCreacion	 INT
AS 
BEGIN
    INSERT INTO Inv.tblCompras (Comp_Fecha, Comp_NoOrden, Comp_IVA, Comp_UsuarioCreacion, Comp_FechaCreacion)
    VALUES (@Comp_Fecha, @Comp_NoOrden, @Comp_IVA, @Comp_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Inv.UDP_tblCompras_Update
    @Comp_Id        INT,
    @Comp_Fecha     DATE,
	@Comp_NoOrden   NVARCHAR(6),
	@Comp_IVA		INT,
    @Comp_UsuarioModifica INT
AS 
BEGIN
    UPDATE Inv.tblCompras
    SET Comp_Fecha = Comp_Fecha,
        Comp_NoOrden = Comp_NoOrden,
        Comp_IVA = Comp_IVA,
        Comp_UsuarioModifica = Comp_UsuarioModifica,
        Comp_FechaModifica = CURRENT_TIMESTAMP
    WHERE Comp_Id = @Comp_Id
END
GO
CREATE PROCEDURE Inv.UDP_tblCompras_Delete
    @Comp_Id        INT,
    @Comp_UsuarioModifica INT
AS 
BEGIN
    UPDATE Inv.tblCompras
    SET Comp_Estado = 0,
        Comp_UsuarioModifica = @Comp_UsuarioModifica,
        Comp_FechaModifica = CURRENT_TIMESTAMP
    WHERE Comp_Id = @Comp_Id  
END
GO
CREATE PROCEDURE Inv.UDP_tblCompras_Mostrar
AS
BEGIN
	SELECT COMP.Comp_Id, CAST(COMP.Comp_Fecha AS nvarchar(50)) AS [Comp_Fecha] , COMP.Comp_NoOrden, COMP.Comp_IVA, PROV.Prov_Descripcion
	FROM Inv.tblCompras AS COMP 
	INNER JOIN Inv.tblCompraDetalles AS CODE ON CODE.Comp_Id = COMP.Comp_Id
	INNER JOIN Inv.tblIngredientes AS INGR ON INGR.Ingr_Id = CODE.Ingr_Id
	INNER JOIN Gnrl.tblProveedores AS PROV ON PROV.Prov_Id = COMP.Prov_Id
	WHERE COMP.Comp_Estado = 1
END
GO


--Tabla Compras Detalles

CREATE PROCEDURE Inv.UDP_tblCompraDetalles_Insert
    @Comp_Id		INT,
    @Ingr_Id		INT,
	@CompDe_PrecioCompra MONEY,
	@CompDe_Cantidad INT,
	@CompDe_UsuarioCreacion	 INT
AS 
BEGIN

		INSERT INTO Inv.tblCompraDetalles (Comp_Id, Ingr_Id, CompDe_PrecioCompra, CompDe_Cantidad, CompDe_UsuarioCreacion, CompDe_FechaCreacion)
		VALUES (@Comp_Id, @Ingr_Id, @CompDe_PrecioCompra, @CompDe_Cantidad, @CompDe_UsuarioCreacion, CURRENT_TIMESTAMP)

    END
GO

CREATE PROCEDURE Inv.UDP_tblCompraDetalles_Update
    @CompDe_Id      INT,
	@Comp_Id		INT,
	@Ingr_Id		INT,
	@CompDe_PrecioCompra MONEY,
	@CompDe_Cantidad INT,
    @CompDe_UsuarioModifica INT
AS 
BEGIN
    UPDATE Inv.tblCompraDetalles
    SET Comp_Id = @Comp_Id,
        Ingr_Id = @Ingr_Id,
        CompDe_PrecioCompra = @CompDe_PrecioCompra,
        CompDe_Cantidad = @CompDe_Cantidad,
        CompDe_UsuarioModifica = @CompDe_UsuarioModifica,
        CompDe_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Inv.UDP_tblCompraDetalles_Delete
    @CompDe_Id      INT,
    @CompDe_UsuarioModifica INT
AS 
BEGIN
    UPDATE Inv.tblCompraDetalles
    SET CompDe_Estado = 0,
        CompDe_UsuarioModifica = @CompDe_UsuarioModifica,
        CompDe_FechaModifica = CURRENT_TIMESTAMP
    WHERE CompDe_Id = @CompDe_Id
END
GO 
CREATE PROCEDURE Inv.UDP_tblCompraDetalles_Mostrar
AS
BEGIN
	SELECT CODE.CompDe_Id,COMP.Comp_NoOrden, INGR.Ingr_Descripcion, CODE.CompDe_PrecioCompra, CODE.CompDe_Cantidad
	FROM Inv.tblCompraDetalles AS CODE
	INNER JOIN Inv.tblCompras AS COMP ON COMP.Comp_Id = CODE.Comp_Id
	INNER JOIN Inv.tblIngredientes AS INGR ON INGR.Ingr_Id = CODE.Ingr_Id
	WHERE CODE.CompDe_Estado = 1
END
GO


--Tabla Ventas

CREATE PROCEDURE Vent.UDP_tblVentas_Insert
    @Clie_Id	    INT,
	@Vent_Fecha     DATETIME,
	@Emp_Id         INT,
	@Vent_NoOrden   NVARCHAR(6),
	@Vent_IVA       INT,
	@Vent_Descuento MONEY,
	@Vent_Servicio  CHAR(1),
	@Vent_Observaciones NVARCHAR(50),
	@Vent_UsuarioCreacion	 INT
AS 
BEGIN
    INSERT INTO Vent.tblVentas 
    (Clie_Id,Vent_Fecha, Emp_Id, Vent_NoOrden, Vent_IVA, Vent_Descuento, Vent_Servicio, Vent_Observaciones, Vent_UsuarioCreacion ,Vent_FechaCreacion)
    VALUES (@Clie_Id, @Vent_Fecha, @Emp_Id, @Vent_NoOrden, @Vent_IVA, @Vent_Descuento, @Vent_Servicio, @Vent_Observaciones, @Vent_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO

CREATE PROCEDURE Vent.UDP_tblVentas_Update
    @Vent_Id        INT,
    @Clie_Id	    INT,
	@Vent_Fecha     DATETIME,
	@Emp_Id         INT,
	@Vent_NoOrden   NVARCHAR(6),
	@Vent_IVA       INT,
	@Vent_Descuento MONEY,
	@Vent_Servicio  CHAR(1),
	@Vent_Observaciones NVARCHAR(50),
    @Vent_UsuarioModifica INT
AS 
BEGIN
    UPDATE Vent.tblVentas
    SET Clie_Id = @Clie_Id,
        Vent_Fecha = @Vent_Fecha,
        Emp_Id = @Emp_Id,
        Vent_NoOrden = @Vent_NoOrden,
        Vent_IVA = @Vent_IVA,
        Vent_Descuento = @Vent_Descuento,
        Vent_Servicio = @Vent_Servicio,
        Vent_Observaciones = @Vent_Observaciones,
        Vent_UsuarioModifica = @Vent_UsuarioModifica,
        Vent_FechaModifica = CURRENT_TIMESTAMP
    WHERE Vent_Id = @Vent_Id
END
GO
CREATE PROCEDURE Vent.UDP_tblVentas_Delete
    @Vent_Id    INT,
    @Vent_UsuarioModifica INT
AS 
BEGIN
    UPDATE Vent.tblVentas
    SET Vent_Estado = 0,
        Vent_UsuarioModifica = @Vent_UsuarioModifica,
        Vent_FechaModifica = CURRENT_TIMESTAMP
    WHERE Vent_Id = @Vent_Id
END
GO
CREATE PROCEDURE Vent.UDP_tblVentas_Mostrar
AS
BEGIN
	SELECT	VENT.Vent_Id, CONCAT_WS(' ', CLIE.Clie_Nombres, CLIE.Clie_Apellidos) AS [Vent_Cliente],
			CAST(VENT.Vent_Fecha AS VARCHAR(20)) AS [Vent_Fecha], CONCAT_WS(' ', EMPL.Emp_Nombres,EMPL.Emp_Apellidos) AS [Vent_Empleado],
			VENT.Vent_NoOrden, VENT.Vent_IVA, VENT.Vent_Descuento,
			CASE  
				WHEN VENT.Vent_Servicio = 'L' THEN 'Local'
				WHEN VENT.Vent_Servicio = 'D' THEN 'Delivery'
				WHEN VENT.Vent_Servicio = 'A' THEN 'Autoservicio'
			END AS [Vent_Servicio],
			VENT.Vent_Observaciones

	FROM Vent.tblVentas AS VENT
	INNER JOIN Gnrl.tblClientes AS CLIE ON CLIE.Clie_Id = VENT.Clie_Id
	INNER JOIN Gnrl.tblEmpleados AS EMPL ON EMPL.Emp_Id = VENT.Emp_Id
	WHERE Vent.Vent_Estado = 1
END
GO

CREATE PROCEDURE Vent.UDP_tblVentas_MostrarCabecera
 @VentNoOrden NVARCHAR(6)
AS
BEGIN
	SELECT	CONCAT_WS(' ', CLIE.Clie_Nombres, CLIE.Clie_Apellidos) AS Cliente,
			CASE  
				WHEN VENT.Vent_Servicio = 'L' THEN 'Local'
				WHEN VENT.Vent_Servicio = 'D' THEN 'Delivery'
				WHEN VENT.Vent_Servicio = 'A' THEN 'Autoservicio'
			END AS Servicio
	FROM Vent.tblVentas AS VENT
	INNER JOIN Gnrl.tblClientes AS CLIE ON CLIE.Clie_Id = VENT.Clie_Id
	WHERE Vent.Vent_Estado = 1 AND Vent.Vent_NoOrden =  @VentNoOrden
END




--Tabla Venta Detalles
--EN EL VENTAS DETALLES INSERT HAY QUE HACER LA VALIDACION DE QUE SI LOS INGREDIENTES ESTAN EN 0, NO DEJE HACER LA COMPRA
CREATE PROCEDURE Vent.UDP_tblVentaDetalles_Insert
	@Vent_Id			INT,
	@Menu_Id			INT,
	@VentDe_Cantidad	INT,
	@VentDe_UsuarioCreacion	 INT
AS 
BEGIN
	DECLARE @Ingr_Id INT
	SET @Ingr_Id = (SELECT Ingr_Id FROM Gnrl.tblMenuDetalles WHERE Menu_Id = @Menu_Id)

	DECLARE @CantidadUtil INT
	SET @CantidadUtil = (SELECT MenuDe_Cantidad FROM Gnrl.tblMenuDetalles  WHERE Menu_Id = @Menu_Id)

	DECLARE @STOCK INT
	SET @STOCK = (SELECT Ingr_Stock FROM Inv.tblIngredientes WHERE Ingr_Id = @Ingr_Id)

	IF(@STOCK - (@CantidadUtil * @VentDe_Cantidad) >= 0)
	BEGIN

		INSERT INTO Vent.tblVentaDetalles (Vent_Id, Menu_Id, VentDe_Cantidad, VentDe_UsuarioCreacion)
		VALUES(@Vent_Id, @Menu_Id, @VentDe_Cantidad, @VentDe_UsuarioCreacion)



	END
END



GO
CREATE PROCEDURE Vent.UDP_tblVentaDetalles_Update
    @VentDe_Id      INT,
    @Menu_Id	    INT,
	@VentDe_Cantidad INT,
    @VentDe_UsuarioModifica INT
AS 
BEGIN
    UPDATE Vent.tblVentaDetalles
    SET Menu_Id = @Menu_Id,
        VentDe_Cantidad = @VentDe_Cantidad,
        VentDe_UsuarioModifica = @VentDe_UsuarioModifica,
        VentDe_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Vent.UDP_tblVentaDetalles_Delete
    @VentDe_Id      INT,
    @VentDe_UsuarioModifica INT
AS 
BEGIN
    UPDATE Vent.tblVentaDetalles
    SET VentDe_Estado = 0,
        VentDe_UsuarioModifica = @VentDe_UsuarioModifica,
        VentDe_FechaModifica = CURRENT_TIMESTAMP
    WHERE VentDe_Id = @VentDe_Id
END
GO
CREATE PROCEDURE Vent.UDP_tblVentaDetalles_Mostrar
@Vent_NoOrden NVARCHAR(6)
AS
BEGIN
	SELECT VEDE.VentDe_Id, VENT.Vent_NoOrden, MENU.Menu_Descripcion, MENU.Menu_Precio,VEDE.VentDe_Cantidad,VENT.Vent_IVA
	FROM Vent.tblVentaDetalles AS VEDE
	INNER JOIN Vent.tblVentas AS VENT ON VENT.Vent_Id = VEDE.Vent_Id
	INNER JOIN Gnrl.tblMenus AS MENU ON MENU.Menu_Id = VEDE.Menu_Id
	WHERE VentDe_Estado = 1 AND VENT.Vent_NoOrden = @Vent_NoOrden
END
GO
EXEC Vent.UDP_tblVentaDetalles_Mostrar

--Tabla Domicilio Detalles

CREATE PROCEDURE Vent.UDP_tblDomicilioDetalles_Insert '#546345'
    @Vent_Id    INT,
	@Emp_Id     INT,
	@Comu_Id    INT,
	@VentDol_UsuarioCreacion	 INT
AS 
BEGIN
    INSERT INTO Vent.tblDomicilioDetalles (Vent_Id, Emp_Id, Comu_Id, VentDol_UsuarioCreacion, VentDol_FechaCreacion)
    VALUES (@Vent_Id, @Emp_Id, @Comu_Id, @VentDol_UsuarioCreacion, CURRENT_TIMESTAMP)
END
GO
CREATE PROCEDURE Vent.UDP_tblDomicilioDetalles_Update
    @VentDol_Id INT,
    @Vent_Id    INT,
	@Emp_Id     INT,
	@Comu_Id    INT,
    @VentDol_UsuarioModifica INT
AS
BEGIN
    UPDATE Vent.tblDomicilioDetalles
    SET Vent_Id = Vent_Id,
        Emp_Id = @Emp_Id,
        Comu_Id = @Comu_Id,
        VentDol_UsuarioModifica = @VentDol_UsuarioModifica,
        VentDol_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Vent.UDP_tblDomicilioDetalles_Delete
    @VentDol_Id     INT,
    @VentDol_UsuarioModifica INT
AS 
BEGIN
    UPDATE Vent.tblDomicilioDetalles
    SET VentDol_Estado = 0,
        VentDol_UsuarioModifica = @VentDol_UsuarioModifica,
        VentDol_FechaModifica = CURRENT_TIMESTAMP
END
GO
CREATE PROCEDURE Vent.UDP_tblDomicilioDetalles_Mostrar
AS
BEGIN
	SELECT DODE.VentDol_Id,VENT.Vent_NoOrden, CONCAT_WS(' ', EMPL.Emp_Nombres, EMPL.Emp_Apellidos) AS [Nombre], CIUD.Ciud_Descripcion, COMU.Comu_Descripcion, COMU.Comu_TarifaEnvio
	FROM Vent.tblDomicilioDetalles AS DODE
	INNER JOIN Vent.tblVentas AS VENT ON VENT.Vent_Id = DODE.Vent_Id
	INNER JOIN Gnrl.tblEmpleados AS EMPL ON EMPL.Emp_Id = DODE.Emp_Id
	INNER JOIN Gnrl.tblComunidades AS COMU ON COMU.Comu_Id = DODE.Comu_Id
	INNER JOIN Gnrl.tblCiudades AS CIUD ON CIUD.Ciud_Id = COMU.Ciud_Id
	WHERE DODE.VentDol_Estado = 1
END
GO

