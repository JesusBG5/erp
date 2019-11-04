<?php 
	require_once("conexion.php");
	class Proveedor extends Conexion{

		public function alta($nombre,$rs,$dir,$tel,$correo){
			$this->sentencia = "INSERT INTO proveedores VALUES (null,'$nombre','$rs','$correo','$dir','$tel')";
			$this->ejecutar_sentencia();
		}

		public function baja($id){
			$this->sentencia = "DELETE FROM proveedores WHERE id=$id";
			$this->ejecutar_sentencia();
		}

		public function consulta(){
			$this->sentencia = "SELECT * FROM proveedores";
			return $this->obtener_sentencia();
		}

		public function buscar($id){
			$this->sentencia = "SELECT * FROM proveedores WHERE id=$id";
			return $this->obtener_sentencia();
		}

		public function modificacion($nombre,
			$rs,$dir,$tel,$correo,$id){
			$this->sentencia = "UPDATE proveedores SET nombre='$nombre', razonsocial='$rs', diireccion='$dir', telefono='$tel', correo='$correo' WHERE id='$id'";
			$this->ejecutar_sentencia();
		}

		public function datosProducto(){
			$this->sentencia = "SELECT existencia FROM productos";
			$res = $this->obtener_sentencia();
			$datos = "";
			while($fila = $res->fetch_assoc()){
				$datos = $datos.$fila["existencia"].",";
			}
			$datos = substr($datos, 0, strlen($datos)-1);
			echo $datos;
		}

		public function etiquetasProducto(){
			$this->sentencia = "SELECT nombre FROM productos";
			$res = $this->obtener_sentencia();
			$datos = "";
			while($fila = $res->fetch_assoc()){
				$datos.="'".$fila["nombre"]."',";
			}
			$datos = substr($datos, 0, strlen($datos)-1);
			echo $datos;
		}
	}
 ?>





 