<?php
	
	//agregar campo TAPA en la tabla publicacion (dbRedaccion)
	
	class BaseDatos{	
		private $conexion = '';
		private $usuario = '';
		private $clave = '';
		private $db = '';
		private $enlace;

		function __construct(){
			include('datos.php');
			$this->conexion = $conexion;
			$this->usuario = $usuario;
			$this->clave = $clave;
			$this->db = $db;	
			$this->conectarBaseDatos();
		}
		
		private function conectarBaseDatos(){
			
			$this->enlace=mysqli_connect($this->conexion,$this->usuario,$this->clave,$this->db) OR DIE ("Error: No es posible establecer la conexión");
			mysqli_set_charset($this->enlace,'utf8');
		}
		
		public function getEnlace(){
			return $this->enlace;
		}
		
	}
	
?>