<section>
<?php 
	if(!isset($_POST["idM"])){
 ?>
	<form action="" method="post">
Nombre: <input type="text" name="nombre" required><br>
Razón Social: <input type="text" name="rs" required><br>
Correo: <input type="email" name="correo" required><br>
Dirección: <input type="text" name="dir" required><br>
Telefono: <input type="text" name="tel" required> <br>
<div> 
<input type="submit" name="altaPro" value="Ingresar">
</div>
	</form>
	<?php 
	}else{
		require_once("proveedor.php");
		$obj = new Proveedor();
		$res = $obj->buscar($_POST["idM"]);
		$a = $res->fetch_assoc();
	 ?> 
<form action="" method="post">
Nombre: <input type="text" value="<?php echo $a['nombre']; ?>"  name="nombre" required><br>
Razón Social: <input type="text" value="<?php echo $a['razonsocial']; ?>"  name="rs" required><br>
Correo: <input type="email" value="<?php echo $a['correo']; ?>"  name="correo" required><br>
Dirección: <input type="text" value="<?php echo $a['diireccion']; ?>"  name="dir" required><br>
Telefono: <input type="text" value="<?php echo $a['telefono']; ?>"  name="tel" required> <br>
<input type="hidden" name="
" value="<?php echo $_POST['idM'] ?>">
<div>

<input type="submit" name="modificaPro" value="Modificar">
</div>
</form>
	<?php 
		}
		require_once("proveedor.php");
		$obj = new Proveedor();
		if(isset($_POST["idE"])){
			$id= $_POST["idE"];
			$obj->baja($id);
			echo "<script>
		alert('Proveedor Eliminado');
		window.location='home.php?s=prov';
		</script>";
		}
		if(isset($_POST["altaPro"])){
		$n = $_POST["nombre"];
		$rs  = $_POST["rs"];
		$c = $_POST["correo"];
		$d  = $_POST["dir"];
		$t 	=$_POST["tel"];
		$obj->alta($n,$rs,$d,$t,$c);
		echo "<script>
		alert('Proveedor Registrado');
		window.location='home.php?s=prov';
		</script>";
		}
		if(isset($_POST["modificaPro"])){
		$n = $_POST["nombre"];
		$rs  = $_POST["rs"];
		$c = $_POST["correo"];
		$d  = $_POST["dir"];
		$t 	=$_POST["tel"];
		$id 	=$_POST["id"];
		$obj->modificacion($n,$rs,$d,$t,$c,$id);
		echo "<script>
		alert('Proveedor Modificado');
		window.location='home.php?s=prov';
		</script>";
		}
		$resultado = $obj->consulta();
	 ?>
	 <table>
	 	<tr>
	 		<th>Nombre</th>
	 		<th>Razón Social</th>
	 		<th>Correo</th>
	 		<th>Dirección</th>
	 		<th>Teléfono</th>
	 	</tr>
	 	<?php 
	while($fila = $resultado->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$fila["nombre"]."</td>";
		echo "<td>".$fila["razonsocial"]."</td>";
		echo "<td>".$fila["correo"]."</td>";
		echo "<td>".$fila["diireccion"]."</td>";
		echo "<td>".$fila["telefono"]."</td>";
?>
<td id="celdaEliminar">
<form action="" method="post" onsubmit="return confirmar()">
<input type="hidden" name="idE" 
value="<?php echo $fila['id']; ?>">
<input type="image" src="img/eliminar.png">
	</form>
</td>

<td id="celdaModificar">
<form action="" method="post" onsubmit="return confirmarM()">
<input type="hidden" name="idM" 
value="<?php echo $fila['id']; ?>">
<input type="image" src="img/modificar.png">
	</form>
</td>

<?php
		echo "</tr>";
	}		
	 	 ?>
	 </table>
</section>
<script type="text/javascript">
	function confirmar(){
	var algo = confirm("Estas seguro de eliminar?");
	return algo;
	}
	function confirmarM(){
	var algo = confirm("Estas seguro de modificar?");
	return algo;
	}
</script>
<?php 
require_once("grafica.php"); 
?>