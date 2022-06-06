--==============================================================================
--==============================================================================
--TRIGGERS
CREATE TABLE [Inv].[tblIngredientes_Historial](
	Ingr_Id					INT,
	Ingr_Descripcion		NVARCHAR(50),
	Ingr_Stock				INT,
	Prov_Id					INT,
	Ingr_FechaCaducidad		DATE,
	Ingr_Estatus			CHAR(1),
	Almc_Id					INT,

	Ingr_UsuarioCreacion	 INT,
	Ingr_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	Ingr_UsuarioModifica	 INT DEFAULT NULL,
	Ingr_Accion				CHAR(1),
	Ingr_FechaModifica		 DATETIME DEFAULT NULL,
	Ingr_Estado				BIT DEFAULT '1',
)
GO
CREATE TRIGGER Inv.TR_tblIngredientes_Insert
ON [Inv].[tblIngredientes]
AFTER INSERT
AS
BEGIN
	INSERT INTO [Inv].[tblIngredientes_Historial]
	SELECT [Ingr_Id], [Ingr_Descripcion], [Ingr_Stock], [Prov_Id], [Ingr_FechaCaducidad], [Ingr_Estatus], [Almc_Id], [Ingr_UsuarioCreacion], [Ingr_FechaCreacion], [Ingr_UsuarioModifica],'I', [Ingr_FechaModifica], [Ingr_Estado]
	FROM inserted
END
GO

CREATE TRIGGER Inv.TR_tblIngredientes_Delete
ON [Inv].[tblIngredientes]
AFTER DELETE
AS
BEGIN
	INSERT INTO [Inv].[tblIngredientes_Historial]
	SELECT [Ingr_Id], [Ingr_Descripcion], [Ingr_Stock], [Prov_Id], [Ingr_FechaCaducidad], [Ingr_Estatus], [Almc_Id], [Ingr_UsuarioCreacion], [Ingr_FechaCreacion], [Ingr_UsuarioModifica],'D', GETDATE(), [Ingr_Estado]
	FROM deleted
END
GO

CREATE TRIGGER Inv.TR_tblIngredientes_Update
ON [Inv].[tblIngredientes]
AFTER UPDATE
AS
BEGIN
	INSERT INTO [Inv].[tblIngredientes_Historial]
	SELECT [Ingr_Id], [Ingr_Descripcion], [Ingr_Stock], [Prov_Id], [Ingr_FechaCaducidad], [Ingr_Estatus], [Almc_Id], [Ingr_UsuarioCreacion], [Ingr_FechaCreacion], [Ingr_UsuarioModifica],'U', GETDATE(), [Ingr_Estado]
	FROM inserted
END
GO

--COMPRAS

CREATE TABLE Inv.tblCompras_Historial(
	Comp_Id INT,
	Comp_Fecha DATE,
	Comp_NoOrden NVARCHAR(6),
	Comp_IVA		INT,
	Comp_UsuarioCreacion	 INT,
	Comp_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	Comp_UsuarioModifica	 INT DEFAULT NULL,
	Comp_Accion				CHAR(1),
	Comp_FechaModifica		 DATETIME DEFAULT NULL,
	Comp_Estado				BIT DEFAULT '1',
);
GO
	CREATE TRIGGER Inv.TR_tblCompras_Insert
	ON [Inv].[tblCompras]
	AFTER INSERT
	AS
	BEGIN
		INSERT INTO [Inv].[tblCompras_Historial]
		SELECT [Comp_Id], [Comp_Fecha], [Comp_NoOrden], [Comp_IVA], [Comp_UsuarioCreacion], [Comp_FechaCreacion], [Comp_UsuarioModifica], 'I', [Comp_FechaModifica], [Comp_Estado]
		FROM inserted
	END
GO
	CREATE TRIGGER Inv.TR_tblCompras_Delete
	ON [Inv].[tblCompras]
	AFTER DELETE
	AS
	BEGIN
		INSERT INTO [Inv].[tblCompras_Historial]
		SELECT [Comp_Id], [Comp_Fecha], [Comp_NoOrden], [Comp_IVA], [Comp_UsuarioCreacion], [Comp_FechaCreacion], [Comp_UsuarioModifica], 'D', GETDATE(), [Comp_Estado]
		FROM deleted
	END
GO
	CREATE TRIGGER Inv.TR_tblCompras_Update
	ON [Inv].[tblCompras]
	AFTER UPDATE
	AS
	BEGIN
		INSERT INTO [Inv].[tblCompras_Historial]
		SELECT [Comp_Id], [Comp_Fecha], [Comp_NoOrden], [Comp_IVA], [Comp_UsuarioCreacion], [Comp_FechaCreacion], [Comp_UsuarioModifica], 'U', GETDATE(), [Comp_Estado]
		FROM inserted
	END
GO

--COMPRA DETALLES
CREATE TABLE [Inv].[tblCompraDetalles_Historial](
	CompDe_Id INT ,
	Comp_Id		INT,
	Ingr_Id		INT,
	CompDe_PrecioCompra MONEY,
	CompDe_Cantidad INT,
	CompDe_UsuarioCreacion	 INT,
	CompDe_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	CompDe_UsuarioModifica	 INT DEFAULT NULL,
	CompDe_Accion				CHAR(1),
	CompDe_FechaModifica		 DATETIME DEFAULT NULL,
	CompDe_Estado				BIT DEFAULT '1'
)
GO
	CREATE TRIGGER Inv.TR_tblCompraDetalles_Insert
		ON [Inv].[tblCompraDetalles]
		AFTER INSERT
		AS
	BEGIN
		DECLARE @Ingr_Id  INT, @Comp_Id INT, @CompDe_Cantidad INT
	SET @Ingr_Id = (SELECT inserted.Ingr_Id FROM inserted)
	SET @Comp_Id = (SELECT inserted.Comp_Id FROM inserted)
	SET @CompDe_Cantidad = (SELECT inserted.CompDe_Cantidad FROM inserted)

	DECLARE @Ingr_Stock INT
	SET @Ingr_Stock = (SELECT Ingr_Stock FROM [Inv].[tblIngredientes] WHERE Ingr_Id = @Ingr_Id) + @CompDe_Cantidad
		
		INSERT INTO [Inv].[tblCompraDetalles_Historial]
		SELECT [CompDe_Id], [Comp_Id], [Ingr_Id], [CompDe_PrecioCompra], [CompDe_Cantidad], [CompDe_UsuarioCreacion], [CompDe_FechaCreacion], [CompDe_UsuarioModifica], 'I', [CompDe_FechaModifica], [CompDe_Estado]
		FROM inserted

		UPDATE [Inv].[tblIngredientes]
		SET Ingr_Stock = @Ingr_Stock
		WHERE Ingr_Id	= @Ingr_Id

	END
GO
	CREATE TRIGGER Inv.TR_tblCompraDetalles_Delete
	ON [Inv].[tblCompraDetalles]
	AFTER DELETE
	AS
	BEGIN
		INSERT INTO [Inv].[tblCompraDetalles_Historial]
		SELECT [CompDe_Id], [Comp_Id], [Ingr_Id], [CompDe_PrecioCompra], [CompDe_Cantidad], [CompDe_UsuarioCreacion], [CompDe_FechaCreacion], [CompDe_UsuarioModifica], 'D', GETDATE(), [CompDe_Estado]
		FROM deleted
	END
GO
	--DUDAS
	CREATE TRIGGER Inv.TR_tblCompraDetalles_Update
		ON [Inv].[tblCompraDetalles]
		AFTER UPDATE
		AS
	BEGIN
		DECLARE @Ingr_Id  INT, @Comp_Id INT, @CompDe_Cantidad INT
		SET @Ingr_Id = (SELECT inserted.Ingr_Id FROM inserted)
		SET @Comp_Id = (SELECT inserted.Comp_Id FROM inserted)
		SET @CompDe_Cantidad = (SELECT inserted.CompDe_Cantidad FROM inserted)

	DECLARE @Ingr_Stock INT
	SET @Ingr_Stock = (SELECT Ingr_Stock FROM [Inv].[tblIngredientes] WHERE Ingr_Id = @Ingr_Id) + @CompDe_Cantidad
		
		INSERT INTO [Inv].[tblCompraDetalles_Historial]
		SELECT [CompDe_Id], [Comp_Id], [Ingr_Id], [CompDe_PrecioCompra], [CompDe_Cantidad], [CompDe_UsuarioCreacion], [CompDe_FechaCreacion], [CompDe_UsuarioModifica], 'U', GETDATE(), [CompDe_Estado]
		FROM inserted

		UPDATE [Inv].[tblIngredientes]
		SET Ingr_Stock = @Ingr_Stock
		WHERE Ingr_Id	= @Ingr_Id
	END
GO

--VENTAS

CREATE TABLE [Vent].[tblVentas_Historial](
	Vent_Id INT,
	Clie_Id	INT,
	Vent_Fecha DATETIME,
	Emp_Id INT,
	Vent_NoOrden NVARCHAR(6),
	Vent_IVA INT,
	Vent_Descuento MONEY,
	Vent_Servicio  CHAR(1),
	Vent_Observaciones NVARCHAR(50),
	Vent_UsuarioCreacion	 INT,
	Vent_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	Vent_UsuarioModifica	 INT DEFAULT NULL,
	Vent_Accion				CHAR(1),
	Vent_FechaModifica		 DATETIME DEFAULT NULL,
	Vent_Estado				BIT DEFAULT '1',
)
GO
CREATE TRIGGER Vent.TR_tblVentas_Insert
ON [Vent].[tblVentas]
AFTER INSERT
AS
BEGIN
	INSERT INTO [Vent].[tblVentas_Historial]
	SELECT [Vent_Id], [Clie_Id], [Vent_Fecha], [Emp_Id], [Vent_NoOrden], [Vent_IVA], [Vent_Descuento], [Vent_Servicio], [Vent_Observaciones], [Vent_UsuarioCreacion], [Vent_FechaCreacion], [Vent_UsuarioModifica],'I', [Vent_FechaModifica], [Vent_Estado]
	FROM inserted
END
GO
CREATE TRIGGER Vent.TR_tblVentas_Delete
ON [Vent].[tblVentas]
AFTER DELETE
AS
BEGIN
	INSERT INTO [Vent].[tblVentas_Historial]
	SELECT [Vent_Id], [Clie_Id], [Vent_Fecha], [Emp_Id], [Vent_NoOrden], [Vent_IVA], [Vent_Descuento], [Vent_Servicio], [Vent_Observaciones], [Vent_UsuarioCreacion], [Vent_FechaCreacion], [Vent_UsuarioModifica],'D', GETDATE(), [Vent_Estado]
	FROM deleted
END
GO
CREATE TRIGGER Vent.TR_tblVentas_Update
ON [Vent].[tblVentas]
AFTER UPDATE
AS
BEGIN
	INSERT INTO [Vent].[tblVentas_Historial]
	SELECT [Vent_Id], [Clie_Id], [Vent_Fecha], [Emp_Id], [Vent_NoOrden], [Vent_IVA], [Vent_Descuento], [Vent_Servicio], [Vent_Observaciones], [Vent_UsuarioCreacion], [Vent_FechaCreacion], [Vent_UsuarioModifica],'U', GETDATE(), [Vent_Estado]
	FROM inserted
END
GO
--VENTA DETALLES

CREATE TABLE [Vent].[tblVentaDetalles_Historial]
(
	VentDe_Id INT,
	Vent_Id	INT,
	Menu_Id		INT,
	VentDe_Cantidad INT,
	VentDe_UsuarioCreacion	 INT,
	VentDe_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	VentDe_UsuarioModifica	 INT DEFAULT NULL,
	VentDe_Accion			CHAR(1),
	VentDe_FechaModifica		 DATETIME DEFAULT NULL,
	VentDe_Estado				BIT DEFAULT '1',
)
GO
CREATE TRIGGER Vent.TR_tblVentaDetalles_Insert
ON [Vent].[tblVentaDetalles]
AFTER INSERT
BEGIN
	


	
END

