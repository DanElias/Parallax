SET DATEFORMAT dmy
------------------ Proveedor -----------------
BULK INSERT eq02.eq02.[proveedor] 
	FROM 'e:\wwwroot\eq02\proveedor.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'	
	)

---------------- Cuenta Contable ----------------
BULK INSERT eq02.eq02.[cuenta_contable] 
	FROM 'e:\wwwroot\eq02\cuentacontable.csv'
	WITH
	(
		CODEPAGE = 'ACP',
		FIELDTERMINATOR = ',',
		ROWTERMINATOR = '\n'	
	)

