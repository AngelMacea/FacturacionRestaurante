CREATE DATABASE FacturacionRestaurante
GO
USE FacturacionRestaurante
GO

/*
TABLAS:

ACCE:
tblUsuarios:Usua_Id, Emp_Id, Usua_Usuario, Usua_Pass

GNRL: 
tblEmpleados: Emp_Id,Emp_Identidad, Emp_Nombres, Emp_Apellidos, Emp_Sexo, Rol_Id, Emp_Telefono, Emp_Email
	{
		tblRoles: Rol_Id, Rol_Descripcion,
		tblEstadoCiviles: EsCi_Id, EsCi_Descripcion
	}
tblProveedores: Prov_Id, Prov_Descripcion,Prov_Telefono
	{
	tblPaises: Pais_Id, Pais_Descripcion,
	tblCiudades: Ciud_Id, Ciud_Descripcion, Pais_Id
	}
tblClientes:Clie_ID, Clie_Identidad, Clie_Nombres,Clie_Sexo, Clie_Apellidos, Clie_Telefono

tblTipoPagos: TiPago_Id, TiPago_Descripcion
tblComunidades: Com_Id, Com_Descripcion, Ciud_Id, Com_TarifaEnvio

tblMenus: Menu_Id, Menu_Descripcion, Menu_Precio
tblMenuDetalles: MenuDe_Id, Menu_Id, Ingr_Id, Ingr_Cantidad



INV:
tblAlmacenes: Almc_Id, Almc_Descripcion
tblIngredientes: Ingr_Id, Ingr_Descripcion, Ingr_Stock, Prov_Id, Ingr_Caducidad, Almc_Id, Ingr_Estado

tblCompras: Comp_Id, Comp_Fecha, Comp_NoOrden, Comp_IVA
tblCompraDetalles:CompIngr_Id, Comp_Id, Ingr_Id,CompIngr_PrecioCompra, CompIngr_Cantidad

VENT:

tblVentas: Vent_Id,Clie_Id, Vent_Fecha, Emp_Id,Vent_NoOrden, Vent_IVA, Vent_Descuento, Vent_Servicio, Vent_Observaciones
tblVentaDetalles:VentDe_Id, Menu_Id, VentDe_Cantidad
tblDetalleDeliveries:VentDel_Id, Vent_Id, Emp_Id, Com_Id

*/
CREATE SCHEMA Acce
GO
CREATE TABLE Acce.tblUsuarios(
	Usua_Id				INT PRIMARY KEY IDENTITY (1,1),
	Emp_Id				INT, 
	Usua_Usuario		NVARCHAR(50) UNIQUE,
	Usua_Pass			NVARCHAR(50) UNIQUE,
	Usua_UsuarioCreacion	INT,
	Usua_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Usua_UsuarioModifica	INT DEFAULT NULL,
	Usua_FechaModifica		DATETIME DEFAULT NULL,
	Usua_Estado				BIT DEFAULT '1',
);
GO
ALTER TABLE [ACCE].[tblUsuarios]
ADD CONSTRAINT FK_tblUsuarios_tblUsuarios_Usuario_Creacion FOREIGN KEY (Usua_UsuarioCreacion) REFERENCES Acce.tblUsuarios(Usua_Id)
ALTER TABLE [ACCE].[tblUsuarios]
ADD CONSTRAINT FK_tblUsuarios_tblUsuarios_Usuario_Modifica FOREIGN KEY (Usua_UsuarioModifica) REFERENCES Acce.tblUsuarios(Usua_Id)
ALTER TABLE [ACCE].[tblUsuarios]
ADD CONSTRAINT FK_tblUsuarios_tblEmpleados_Emp_Id FOREIGN KEY (Emp_Id) REFERENCES GNRL.tblEmpleados (Emp_Id)
GO

CREATE SCHEMA Gnrl
GO

CREATE TABLE Gnrl.tblPaises(
	Pais_Id				INT PRIMARY KEY IDENTITY(1,1),
	Pais_Descripcion	NVARCHAR(50),
	Pais_UsuarioCreacion	INT,
	Pais_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Pais_UsuarioModifica	INT DEFAULT NULL,
	Pais_FechaModifica		DATETIME DEFAULT NULL,
	Pais_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblPaises_tblUsuarios_Usuario_Creacion FOREIGN KEY (Pais_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblPaises_tblUsuarios_Usuario_Modifica FOREIGN KEY (Pais_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
)

CREATE TABLE Gnrl.tblCiudades(
	Ciud_Id				INT PRIMARY KEY IDENTITY(1,1),
	Ciud_Descripcion	NVARCHAR(50),
	Pais_Id				INT,
	Ciud_UsuarioCreacion	INT,
	Ciud_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Ciud_UsuarioModifica	INT DEFAULT NULL,
	Ciud_FechaModifica		DATETIME DEFAULT NULL,
	Ciud_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblCiudades_tblUsuarios_Usuario_Creacion FOREIGN KEY (Ciud_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblCiudades_tblUsuarios_Usuario_Modifica FOREIGN KEY (Ciud_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblCiudades_tblPaises_Pais_Id FOREIGN KEY (Pais_Id) REFERENCES Gnrl.tblPaises(Pais_Id)
)

CREATE TABLE Gnrl.tblProveedores(
	Prov_Id				INT PRIMARY KEY IDENTITY(1,1),
	Prov_Descripcion	NVARCHAR(50),
	Prov_Tel			NVARCHAR(20),
	Prov_Ciudad			INT,
	Prov_UsuarioCreacion	INT,
	Prov_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Prov_UsuarioModifica	INT DEFAULT NULL,
	Prov_FechaModifica		DATETIME DEFAULT NULL,
	Prov_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblProveedores_tblUsuarios_Usuario_Creacion FOREIGN KEY (Prov_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblProveedores_tblUsuarios_Usuario_Modifica FOREIGN KEY (Prov_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblProveedores_tblCiudades_Prov_Ciudad FOREIGN KEY (Prov_Ciudad) REFERENCES Gnrl.tblCiudades(Ciud_Id),
)

CREATE TABLE Gnrl.tblClientes(
	Clie_Id				INT PRIMARY KEY IDENTITY(1,1),
	Clie_Identificacion NVARCHAR(15),
	Clie_Nombres		NVARCHAR(50),
	Clie_Apellidos		NVARCHAR(50),
	Clie_Sexo			CHAR(1),
	Clie_Tel			NVARCHAR(20),
	Clie_UsuarioCreacion	INT,
	Clie_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Clie_UsuarioModifica	INT DEFAULT NULL,
	Clie_FechaModifica		DATETIME DEFAULT NULL,
	Clie_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblClientes_tblUsuarios_Usuario_Creacion FOREIGN KEY (Clie_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblClientes_tblUsuarios_Usuario_Modifica FOREIGN KEY (Clie_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
)


CREATE TABLE Gnrl.tblComunidades(
	Comu_Id				INT PRIMARY KEY IDENTITY(1,1),
	Comu_Descripcion	NVARCHAR(50),
	Ciud_Id					INT,
	Comu_TarifaEnvio		MONEY,
	Comu_UsuarioCreacion	INT,
	Comu_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Comu_UsuarioModifica	INT DEFAULT NULL,
	Comu_FechaModifica		DATETIME DEFAULT NULL,
	Comu_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblComunidades_tblUsuarios_Usuario_Creacion FOREIGN KEY (Comu_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblComunidades_tblUsuarios_Usuario_Modifica FOREIGN KEY (Comu_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblComunidades_tblPaises_Pais_Id FOREIGN KEY (Ciud_Id) REFERENCES Gnrl.tblCiudades(Ciud_Id)
)

CREATE TABLE Gnrl.tblEstadoCiviles(
	EsCi_Id				INT PRIMARY KEY IDENTITY(1,1),
	EsCi_Descrip		VARCHAR(50),
	EsCi_UsuarioCreacion	INT,
	EsCi_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	EsCi_UsuarioModifica	INT DEFAULT NULL,
	EsCi_FechaModifica		DATETIME DEFAULT NULL,
	EsCi_Estado				BIT DEFAULT '1',
	CONSTRAINT CK_tblEstadoCiviles_Estado CHECK (EsCi_Estado IN (1,0)),
	CONSTRAINT FK_tblEstadoCiviles_tblUsuarios_Usuario_Creacion FOREIGN KEY (EsCi_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblEstadosCiviles_tblUsuarios_Usuario_Modifica FOREIGN KEY (EsCi_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id)
)

CREATE TABLE Gnrl.tblRoles(
	Rol_Id			INT PRIMARY KEY IDENTITY(1,1),
	Rol_Descripcion	NVARCHAR(50),
	Rol_UsuarioCreacion	INT,
	Rol_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Rol_UsuarioModifica	INT DEFAULT NULL,
	Rol_FechaModifica		DATETIME DEFAULT NULL,
	Rol_Estado			BIT DEFAULT '1',
	CONSTRAINT FK_tblCargos_tblUsuarios_Usuario_Creacion FOREIGN KEY (Rol_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblCargos_tblUsuarios_Usuario_Modifica FOREIGN KEY (Rol_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id)
)

CREATE TABLE Gnrl.tblEmpleados(
	Emp_Id				INT PRIMARY KEY  IDENTITY (1,1),
	Emp_Identidad		VARCHAR(20),
	Emp_Nombres			NVARCHAR(50),
	Emp_Apellidos		NVARCHAR(50),
	Emp_Sexo			CHAR (1),
	Emp_Edad			INT,
	EsCi_Id				INT,
	Emp_Correo			NVARCHAR(50),
	Rol_Id			INT,
	Emp_UsuarioCreacion	INT,
	Emp_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Emp_UsuarioModifica	INT DEFAULT NULL,
	Emp_FechaModifica		DATETIME DEFAULT NULL,
	Emp_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblEmpleados_tblUsuarios_Usuario_Creacion FOREIGN KEY (Emp_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblEmpleados_tblUsuarios_Usuario_Modifica FOREIGN KEY (Emp_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT CK_Emp_Sexo CHECK (Emp_Sexo IN ('F','M')),
	CONSTRAINT FK_tblEmpleados_tblRoles_Rol_Id FOREIGN KEY (Rol_Id) REFERENCES Gnrl.tblRoles(Rol_Id)
)
GO

CREATE SCHEMA Inv
GO
CREATE TABLE Inv.tblAlmacenes(
	Almc_Id				 INT PRIMARY KEY  IDENTITY (1,1),
	Almc_Descripcion	 NVARCHAR(50),
	Almc_UsuarioCreacion	 INT,
	Almc_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	Almc_UsuarioModifica	 INT DEFAULT NULL,
	Almc_FechaModifica		 DATETIME DEFAULT NULL,
	Almc_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblAlmacenes_tblUsuarios_Usuario_Creacion FOREIGN KEY (Almc_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblAlmacenes_tblUsuarios_Usuario_Modifica FOREIGN KEY (Almc_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
)

CREATE TABLE Inv.tblIngredientes(
	Ingr_Id INT PRIMARY KEY IDENTITY(1,1),
	Ingr_Descripcion NVARCHAR(50),
	Ingr_Stock			INT,
	Prov_Id				INT,
	Ingr_FechaCaducidad DATE,
	Ingr_Estatus		CHAR(1),
	Almc_Id				INT,
	Ingr_UsuarioCreacion	 INT,
	Ingr_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	Ingr_UsuarioModifica	 INT DEFAULT NULL,
	Ingr_FechaModifica		 DATETIME DEFAULT NULL,
	Ingr_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblIngredientes_tblUsuarios_Usuario_Creacion FOREIGN KEY (Ingr_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblIngredientes_tblUsuarios_Usuario_Modifica FOREIGN KEY (Ingr_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblIngredientes_tblProveedores_Prov_Id FOREIGN KEY (Prov_Id) REFERENCES Gnrl.tblProveedores(Prov_Id),
	CONSTRAINT FK_tblIngredientes_tblAlmacenes_Almc_Id FOREIGN KEY (Almc_Id) REFERENCES Inv.tblAlmacenes(Almc_Id)
)


CREATE TABLE Gnrl.tblMenus(
	Menu_Id INT PRIMARY KEY IDENTITY(1,1),
	Menu_Descripcion NVARCHAR(50),
	Menu_Precio   MONEY,
	Menu_UsuarioCreacion	INT,
	Menu_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	Menu_UsuarioModifica	INT DEFAULT NULL,
	Menu_FechaModifica		DATETIME DEFAULT NULL,
	Menu_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblMenus_tblUsuarios_Usuario_Creacion FOREIGN KEY (Menu_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblMenus_tblUsuarios_Usuario_Modifica FOREIGN KEY (Menu_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
)

CREATE TABLE Gnrl.tblMenuDetalles(
	MenuDe_Id INT PRIMARY KEY IDENTITY(1,1),
	Menu_Id		INT,
	Ingr_Id		INT,
	MenuDe_Cantidad INT,
	MenuDe_UsuarioCreacion	INT,
	MenuDe_FechaCreacion		DATETIME DEFAULT CURRENT_TIMESTAMP,
	MenuDe_UsuarioModifica	INT DEFAULT NULL,
	MenuDe_FechaModifica		DATETIME DEFAULT NULL,
	MenuDe_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblMenuDetalles_tblUsuarios_Usuario_Creacion FOREIGN KEY (MenuDe_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblMenuDetalles_tblUsuarios_Usuario_Modifica FOREIGN KEY (MenuDe_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblMenuDetalles_tblMenus_Menu_Id FOREIGN KEY (Menu_Id) REFERENCES Gnrl.tblMenus(Menu_Id),
	CONSTRAINT FK_tblMenuDetalles_tblMenus_Ingr_Id FOREIGN KEY (Ingr_Id) REFERENCES Inv.tblIngredientes(Ingr_Id)
)

CREATE TABLE Inv.tblCompras(
	Comp_Id INT PRIMARY KEY IDENTITY(1,1),
	Comp_Fecha DATE,
	Comp_NoOrden NVARCHAR(6),
	Comp_IVA		INT,
	Comp_UsuarioCreacion	 INT,
	Comp_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	Comp_UsuarioModifica	 INT DEFAULT NULL,
	Comp_FechaModifica		 DATETIME DEFAULT NULL,
	Comp_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblCompras_tblUsuarios_Usuario_Creacion FOREIGN KEY (Comp_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblCompras_tblUsuarios_Usuario_Modifica FOREIGN KEY (Comp_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
)

CREATE TABLE Inv.tblCompraDetalles(
	CompDe_Id INT PRIMARY KEY IDENTITY(1,1),
	Comp_Id		INT,
	Ingr_Id		INT,
	CompDe_PrecioCompra MONEY,
	CompDe_Cantidad INT,
	CompDe_UsuarioCreacion	 INT,
	CompDe_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	CompDe_UsuarioModifica	 INT DEFAULT NULL,
	CompDe_FechaModifica		 DATETIME DEFAULT NULL,
	CompDe_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblCompraDetalles_tblUsuarios_Usuario_Creacion FOREIGN KEY (CompDe_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblCompraDetalles_tblUsuarios_Usuario_Modifica FOREIGN KEY (CompDe_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
)
GO
CREATE SCHEMA Vent
GO
CREATE TABLE Vent.tblVentas(
	Vent_Id INT PRIMARY KEY IDENTITY(1,1),
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
	Vent_FechaModifica		 DATETIME DEFAULT NULL,
	Vent_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblVentas_tblUsuarios_Usuario_Creacion FOREIGN KEY (Vent_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblVentas_tblUsuarios_Usuario_Modifica FOREIGN KEY (Vent_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblVentas_tblClientes_Clie_Id FOREIGN KEY (Clie_Id) REFERENCES Gnrl.tblClientes (Clie_Id),
	CONSTRAINT CK_Vent_Servicio CHECK (Vent_Servicio IN ('L','A','D')),
	CONSTRAINT FK_tblVentas_tblEmpleados_Emp_Id FOREIGN KEY (Emp_Id) REFERENCES Gnrl.tblEmpleados (Emp_Id)
)

CREATE TABLE Vent.tblVentaDetalles(
	VentDe_Id INT PRIMARY KEY IDENTITY(1,1),
	Menu_Id		INT,
	VentDe_Cantidad INT,
	VentDe_UsuarioCreacion	 INT,
	VentDe_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	VentDe_UsuarioModifica	 INT DEFAULT NULL,
	VentDe_FechaModifica		 DATETIME DEFAULT NULL,
	VentDe_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblVentaDetalles_tblUsuarios_Usuario_Creacion FOREIGN KEY (VentDe_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblVentaDetalles_tblUsuarios_Usuario_Modifica FOREIGN KEY (VentDe_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblVentaDetalles_tblMenus_Menu_Id FOREIGN KEY (Menu_Id) REFERENCES Gnrl.tblMenus(Menu_Id)
)

CREATE TABLE Vent.tblDomicilioDetalles(
	VentDol_Id INT PRIMARY KEY IDENTITY(1,1),
	Vent_Id INT,
	Emp_Id INT,
	Comu_Id INT,
	VentDol_UsuarioCreacion	 INT,
	VentDol_FechaCreacion		 DATETIME DEFAULT CURRENT_TIMESTAMP,
	VentDol_UsuarioModifica	 INT DEFAULT NULL,
	VentDol_FechaModifica		 DATETIME DEFAULT NULL,
	VentDol_Estado				BIT DEFAULT '1',
	CONSTRAINT FK_tblDomicilioDetalles_tblUsuarios_Usuario_Creacion FOREIGN KEY (VentDol_UsuarioCreacion) REFERENCES Acce.tblUsuarios (Usua_Id),
	CONSTRAINT FK_tblDomicilioDetalles_tblUsuarios_Usuario_Modifica FOREIGN KEY (VentDol_UsuarioModifica) REFERENCES Acce.[tblUsuarios] (Usua_Id),
	CONSTRAINT FK_tblDomicilioDetalles_tblVentas_Vent_Id FOREIGN KEY (Vent_Id) REFERENCES Vent.tblVentas(Vent_Id),
	CONSTRAINT FK_tblDomicilioDetalles_tblEmpleados_Emp_Id FOREIGN KEY (Emp_Id) REFERENCES Gnrl.tblEmpleados(Emp_Id),
	CONSTRAINT FK_tblDomicilioDetalles_tblComunidades_Comu_Id FOREIGN KEY (Comu_Id) REFERENCES Gnrl.tblComunidades(Comu_Id),
)



