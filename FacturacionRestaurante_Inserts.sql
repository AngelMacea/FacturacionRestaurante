--=============================================================================================================================================================
--=============================================================================================================================================================
--INSERTS

INSERT INTO [Acce].[tblUsuarios]([Emp_Id], [Usua_Usuario], [Usua_Pass], [Usua_UsuarioCreacion], [Usua_FechaCreacion])
VALUES	(1,'Luis5','Amat',1,GETDATE()),
		(2,'Zaira34','Godoy',1,GETDATE()),
		(3,'MaríaHeras','Heras',1,GETDATE()),
		(4,'AvelinoCano','Cano',1,GETDATE()),
		(5,'SeverinoMolinero','Molinero',1,GETDATE()),
		(6,'CayetanaAmoros','Amoros',1,GETDATE()),
		(7,'FabiolaTorres','Torres',1,GETDATE())

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

INSERT INTO  [Gnrl].[tblEmpleados]([Emp_Identidad], [Emp_Nombres], [Emp_Apellidos], [Emp_Sexo], [Emp_Edad], [EsCi_Id], [Emp_Correo], [Rol_Id], [Emp_UsuarioCreacion], [Emp_FechaCreacion])
VALUES	('4716971100365','Luis Alfredo','Amat Alcantara','M',34,1,'Luis@gmail.com',1,1,GETDATE()),
		('4916887449964','Zaira','Godoy','F',23,4,'Zaira@gmail.com',3,1,GETDATE()),
		('5457602286227','María','Heras','F',21,3,'Maria@gmail.com',5,1,GETDATE()),
		('5457304286237','Avelino','Cano','M',19,2,'Cano@gmail.com',3,1,GETDATE()),
		('4532323728227','Severino','Molinero','M',25,1,'Severino@gmail.com',2,1,GETDATE()),
		('4929054584722','Cayetana','Amoros','F',24,1,'Cayetana@gmail.com',2,1,GETDATE()),
		('5217335162197','Fabiola','Torres','F',35,2,'Fabiola@gmail.com',4,1,GETDATE()),
		('0501200410339','Abel','Caceres','M',25,1,'Abel@gmail.com',3,1,GETDATE()),
		('5205830204796','Tamara','Sousa','F',21,3,'Tamara@gmail.com',3,1,GETDATE()),
		('4556129603468','Fernanda','Madrid','F',24,1,'Fernanda@gmail.com',4,1,GETDATE())


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

INSERT INTO [Gnrl].[tblMenuDetalles]([Menu_Id], [Ingr_Id], [MenuDe_Cantidad], [MenuDe_UsuarioCreacion], [MenuDe_FechaCreacion])
VALUES	(1,1,2,1,GETDATE()),
		(1,3,1,1,GETDATE()),
		(1,2,1,1,GETDATE()),
		(2,16,1,1,GETDATE()),
		(2,8,2,1,GETDATE()),
		(2,9,1,1,GETDATE()),
		(2,11,2,1,GETDATE()),
		(2,12,2,1,GETDATE()),
		(2,13,1,1,GETDATE()),
		(3,16,1,1,GETDATE()),
		(3,10,2,1,GETDATE()),
		(3,6,2,1,GETDATE()),
		(3,17,4,1,GETDATE()),
		(4,1,1,1,GETDATE()),
		(4,2,2,1,GETDATE()),
		(4,4,2,1,GETDATE()),
		(4,3,1,1,GETDATE()),
		(5,18,1,1,GETDATE()),
		(5,13,1,1,GETDATE()),
		(5,19,1,1,GETDATE()),
		(5,14,1,1,GETDATE()),
		(5,2,2,1,GETDATE()),
		(5,16,2,1,GETDATE()),
		(5,8,1,1,GETDATE())

		
INSERT INTO  [Inv].[tblIngredientes]([Ingr_Descripcion], [Ingr_Stock], [Prov_Id], [Ingr_FechaCaducidad], [Ingr_Estatus], [Almc_Id], [Ingr_UsuarioCreacion], [Ingr_FechaCreacion])
VALUES	('Harina',50,2,'20230605','B',2,1,GETDATE()),
		('Huevo',20,3,'2020903','B',1,1,GETDATE()),
		('Maicena',10,2,'20230405','B',2,1,GETDATE()),
		('Sal',10,1,'20220706','B',3,1,GETDATE()),
		('Carne Molida',40,1,'20220611','B',3,1,GETDATE()),
		('Aceite Ajonjoli',30,2,'20230501','B',10,1,GETDATE()),
		('Ajinomoto',20,2,'20230501','B',4,1,GETDATE()),
		('Ajo',40,3,'20220623','B',5,1,GETDATE()),
		('Jengibre',30,4,'20220930','B',4,1,GETDATE()),
		('Chile',43,2,'20220720','B',3,1,GETDATE()),
		('Pataste',10,6,'20220602','B',2,1,GETDATE()),
		('Zanahoria',20,3,'20220903','B',4,1,GETDATE()),
		('Brocoli',24,4,'20221010','B',5,1,GETDATE()),
		('Salsa Soya',5,1,'20221122','B',6,1,GETDATE()),
		('Culantro',6,6,'20220806','B',7,1,GETDATE()),
		('Cebolla',6,7,'20220803','B',9,1,GETDATE()),
		('Camaron',10,2,'20221020','B',10,1,GETDATE()),
		('Arroz',10,10,'20221004','B',3,1,GETDATE()),
		('Apio',09,10,'20220723','B',4,1,GETDATE())

