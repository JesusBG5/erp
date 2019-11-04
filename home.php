<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<header>
		ERP
	</header>
	<nav>
		<ul>
			<a href="?s=prov"><li>Proveedor</li></a>
			<a href="?s=clie"><li>Cliente</li></a>
			<a href="?s=mat"><li>Material</li></a>
			<a href="?s=pro"><li>Producto</li></a>
		</ul>
	</nav>
	<?php 
		if(isset($_GET["s"])){
			$seccion = $_GET["s"];
			switch ($seccion) {
				case 'prov':
					require_once("php/vista-proveedor.php");
				break;
			}
		}
	 ?>
</body>
</html>