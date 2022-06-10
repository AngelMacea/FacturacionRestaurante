--=============================================================================================================================================================
--=============================================================================================================================================================
--INSERTS

INSERT INTO [Acce].[tblUsuarios]([Emp_Id], [Usua_Usuario], [Usua_Pass], [Usua_UsuarioCreacion], [Usua_FechaCreacion])
VALUES	(1,'Luis5','Amat',1,GETDATE()),
		(3,'MaríaHeras','Heras',1,GETDATE()),
		(4,'AvelinoCano','Cano',1,GETDATE()),
		(5,'SeverinoMolinero','Molinero',1,GETDATE())

INSERT INTO [Gnrl].[tblPaises]([Pais_Descripcion], [Pais_UsuarioCreacion], [Pais_FechaCreacion])
VALUES	('Honduras',1,GETDATE()),
		('El Salvador',1,GETDATE()),
		('Costa Rica',1,GETDATE()),
		('Estados Unidos',1,GETDATE()),
		('China',1,GETDATE())

INSERT INTO [Gnrl].[tblCiudades]([Ciud_Descripcion], [Pais_Id], [Ciud_UsuarioCreacion], [Ciud_FechaCreacion])
VALUES	('San Pedro Sula',1,1,GETDATE()),
		('Tegucigalpa',1,1,GETDATE()),
		('La Ceiba',1,1,GETDATE()),
		('San Salvador',2,1,GETDATE()),
		('Miami',4,1,GETDATE()),
		('Nueva York',4,1,GETDATE()),
		('Pekin',5,1,GETDATE()),
		('Shangai',5,1,GETDATE()),
		('San José',3,1,GETDATE())

INSERT INTO [Gnrl].[tblProveedores]([Prov_Descripcion], [Prov_Tel], [Prov_Ciudad], [Prov_UsuarioCreacion], [Prov_FechaCreacion])
VALUES	('MAYAB S.A.','2550-9544',1,1,GETDATE()),
		('DISAR','2509-0007',2,1,GETDATE()),
		('Dinter S.A.','2558-1716',1,1,GETDATE()),
		('Diprocom','3168-4376',3,1,GETDATE()),
		('DISNA','2220-0600',4,1,GETDATE()),
		('Diaco S.A.','7093-6248',4,1,GETDATE())

INSERT INTO [Gnrl].[tblComunidades]([Comu_Descripcion], [Ciud_Id], [Comu_TarifaEnvio], [Comu_UsuarioCreacion], [Comu_FechaCreacion])
VALUES  ('Col. Fesitrahn',1,'35.50',1,GETDATE()),
		('Col. Los Castaños',1,'55.50',1,GETDATE()),
		('Col. Mercedes',1,'55.50',1,GETDATE()),
		('Col. Juan Ramón Molina',1,'35.50',1,GETDATE()),
		('Barrio Guamilito',1,'65.50',1,GETDATE()),
		('Col. La Satelite',1,'85.50',1,GETDATE()),
		('Col. Prado',2,'250.50',2,GETDATE()),
		('Col. Perez',2,'200.50',2,GETDATE()),
		('Col. Las Kawas',2,'300.50',3,GETDATE())


INSERT INTO Gnrl.tblEstadoCiviles (EsCi_Descrip,EsCi_UsuarioCreacion,EsCi_FechaCreacion)
VALUES	('Soltero(a)',1,GETDATE()),
		('Casado(a)',1,GETDATE()),
		('Divorciado(a)',1,GETDATE()),
		('Viudo(a)',1,GETDATE()),
		('Union Libre',1,GETDATE()),
		('Separacion en Proceso',1,GETDATE())

INSERT INTO Gnrl.tblRoles([Rol_Descripcion], [Rol_UsuarioCreacion], [Rol_FechaCreacion])
VALUES	('Admin',1,GETDATE()),
		('Vendedor',1,GETDATE()),
		('Chef',1,GETDATE()),
		('Mesero',1,GETDATE()),
		('Repartidor',1,GETDATE())
				

INSERT INTO  [Gnrl].[tblEmpleados]([Emp_Identidad], [Emp_Nombres], [Emp_Apellidos], [Emp_Sexo], [Emp_Edad], [EsCi_Id], [Emp_Correo], [Rol_Id], [Emp_UsuarioCreacion], [Emp_FechaCreacion])
VALUES	('4716971100365','Luis Alfredo','Amat Alcantara','M',34,1,'Luis@gmail.com',1,1,GETDATE()),
		('4916887449964','Zaira','Godoy','F',23,4,'Zaira@gmail.com',3,1,GETDATE()),
		('5457602286227','María','Heras','F',21,3,'Maria@gmail.com',2,1,GETDATE()),
		('5457304286237','Avelino','Cano','M',19,2,'Cano@gmail.com',2,1,GETDATE()),
		('4532323728227','Severino','Molinero','M',25,1,'Severino@gmail.com',2,1,GETDATE()),
		('4929054584722','Cayetana','Amoros','F',24,1,'Cayetana@gmail.com',4,1,GETDATE()),
		('5217335162197','Fabiola','Torres','F',35,2,'Fabiola@gmail.com',4,1,GETDATE()),
		('0501200410339','Abel','Caceres','M',25,1,'Abel@gmail.com',3,1,GETDATE()),
		('5205830204796','Tamara','Sousa','F',21,3,'Tamara@gmail.com',4,1,GETDATE()),
		('4556129603468','Fernanda','Madrid','F',24,1,'Fernanda@gmail.com',4,1,GETDATE()),
		('0504350410339','Roque ','Martin','M',25,1,'Roque@gmail.com',5,1,GETDATE()),
		('5205640204796','Ibai','Castro','M',21,3,'Ibai@gmail.com',5,1,GETDATE()),
		('4556459603758','Luis','Urbano','M',24,5,'UrbLuis@gmail.com',5,1,GETDATE())



	INSERT INTO Gnrl.tblClientes (Clie_Identificacion, Clie_Nombres, Clie_Apellidos,Clie_Sexo,Clie_Tel,Clie_UsuarioCreacion, Clie_FechaCreacion)
	   VALUES 
	   ('0201200012345','Juan','Velazques','M','34353534',1,GETDATE()),
	   ('0501200217890','Sebastian','Mendoza','M','24242424',1,GETDATE()),
	   ('0501200213452','Luis','Ortega','M','32424242',1,GETDATE()),
	   ('0501200315097','Marvin','Luna','M','3456789765',1,GETDATE()),
	   ('0501200125845','Jose','Lopez','M','4567876545',1,GETDATE()),
	   ('0501200045682','Melisa','Rojas','F','4578655678',1,GETDATE()),
	   ('0501199302145','Luz','Zuniga','F','8976546783',1,GETDATE()),
	   ('0501199825845','Maria','Guzman','F','3567896545',1,GETDATE()),
	   ('0501200211525','Alfredo','Jimenes','M','4567897675',1,GETDATE()),
	   ('0201200112345','Santiago','Argueta','M','3456789087',1,GETDATE()),
	   ('0607200112345','Mel','Paz','M','567457896',1,GETDATE()),
	   ('0506200012345','Eduardo','Rivas','M','3456789098',1,GETDATE()),
	   ('0502200312481','Alejandro','Erazo','M','5678909876',1,GETDATE()),
	   ('0505200206178','Anthony','Fuentes','M','4543456787',1,GETDATE()),
	   ('0601200319784','Elizabeth','Torres','F','4332342345',1,GETDATE()),
	   ('0503200209784','Juan','Bargar','M','43322245',1,GETDATE()),
	   ('0501200208754','Jose','Perez','M','9876567890',1,GETDATE()),
	   ('0501203302470','Angel','Argueta','M','4256765456',1,GETDATE()),
	   ('0306200510432','Meliza','Juarez','F','4567898765',1,GETDATE()),
	   ('0501200410339','Liz','Velazque','F','45678987654',1,GETDATE())


INSERT INTO [Gnrl].[tblMenus]([Menu_Descripcion], [Menu_Precio], [Menu_UsuarioCreacion], [Menu_FechaCreacion])
VALUES	('Wan Tan frito',160,1,GETDATE()),
		('Tacos Chinos',170,1,GETDATE()),
		('Coctel Camaron',220,1,GETDATE()),
		('Wan Tan Camaron',170,1,GETDATE()),
		('Arroz frito vegetales',170,1,GETDATE()),
		('Arroz frito camaron',215,1,GETDATE()),
		('Arroz frito con res/pollo',190,1,GETDATE()),
		('Arroz especial familiar 2lbs.',235,1,GETDATE()),
		('Sopa Wan Tan',160,1,GETDATE()),
		('Sopa Wan Tan Familiar',215,1,GETDATE()),
		('Crema Maiz/pollo',170,1,GETDATE()),
		('Crema Maiz Familiar',215,1,GETDATE()),
		('Chau Min Vegetales',170,1,GETDATE()),
		('Chau Min Camaron',215,1,GETDATE()),
		('Chau Min Res',190,1,GETDATE()),
		('Chau Min Pollo',190,1,GETDATE()),
		('Fideo Arroz especial',220,1,GETDATE()),
		('Fideo Arroz Camarones',235,1,GETDATE()),
		('Fideo Arroz Res',190,1,GETDATE()),
		('Fideo Arroz Pollo',190,1,GETDATE())


		INSERT INTO [Inv].[tblAlmacenes]([Almc_Descripcion], [Almc_UsuarioCreacion], [Almc_FechaCreacion])
VALUES	('Refrigerador',1,GETDATE()),
		('Despensa',1,GETDATE())


INSERT INTO [Gnrl].[tblMenuDetalles]([Menu_Id], [Ingr_Id], [MenuDe_Cantidad], [MenuDe_UsuarioCreacion], [MenuDe_FechaCreacion])
VALUES	(1,1,2,1,GETDATE()),
		(2,3,1,1,GETDATE()),
		(3,5,1,1,GETDATE()),
		(4,2,1,1,GETDATE()),
		(5,6,1,1,GETDATE())




--EL INSERT DE COMPRA DETALLES SE HARIA POR EL PROCEDIMIENTO ALMACENADO PARA QUE EL STOCK AUMENTE Y BAJE

INSERT INTO [Vent].[tblVentas]([Clie_Id], [Vent_Fecha], [Emp_Id], [Vent_NoOrden], [Vent_IVA], [Vent_Descuento], [Vent_Servicio], [Vent_Observaciones], [Vent_UsuarioCreacion], [Vent_FechaCreacion])
VALUES	(3,'20220604',3,'#zFkas',8,0,'L','M3',1,GETDATE()),
		(12,'20220605',4,'#6FlnW',6,0,'L','M1',1,GETDATE()),
		(5,'20220606',5,'#QWSNe',8,0,'D','Calle 12, 1ra Cuadra',1,GETDATE()),
		(1,'20220606',4,'#DSa23',8,0,'L','M2',1,GETDATE())

--EL INSERT DE VENTA DETALLES SE HARIA POR EL PROCEDIMIENTO ALMACENADO PARA QUE EL STOCK AUMENTE Y BAJE


INSERT INTO [Vent].[tblDomicilioDetalles]([Vent_Id], [Emp_Id], [Comu_Id], [VentDol_UsuarioCreacion], [VentDol_FechaCreacion])
VALUES (3,12,1,1,GETDATE())
