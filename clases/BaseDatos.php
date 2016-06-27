<?php
	
	//agregar campo TAPA en la tabla publicacion (dbRedaccion)
	
	class BaseDatos{	
		private $conexion = 'localhost';
		private $usuario = 'root';
		private $clave = '';
		private $db = 'dbRedaccion';
		private $enlace;

		function __construct($conexion,$usuario,$clave,$db){
			$this->conexion=$conexion;
			$this->usuario=$usuario;
			$this->clave=$clave;
			$this->db=$db;
			$this->conectarBaseDatos();
			
		}
		
		private function conectarBaseDatos(){
			
			$this->enlace=mysqli_connect($this->conexion,$this->usuario,$this->clave,$this->db) OR DIE ("Error: No es posible establecer la conexión");

		}
		
		public function getEnlace(){
			return $this->enlace;
		}
		
		/*
		public function obtenerUsuario($usuario){
			if(!$usuario==''){
				$where="WHERE nombre like '".$usuario."%'";
			}else{
				$where="";
			}
			
			$sql="SELECT *
				  FROM usuarios ".$where;
				  
			if($resultado=mysqli_query($this->enlace,$sql)){
				while($fila=mysqli_fetch_assoc($resultado)){
				return $fila;
				}
			}
		}
		
		$nombreUsuario=$bd->obtenerUsuario()
		
		public function agregarFila($sql){
			$resultado=mysqli_query($this->enlace,$sql);
			if($resultado==false){
				return false;
			}
			else{
				return true;
			}
		}
		*/
	}
	
?>