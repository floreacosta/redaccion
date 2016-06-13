<?php

	class BaseDatos{
		
		private $conexion;
		private $usuario;
		private $clave;
		private $db;
		private $enlace;
		
		
		function __construct($conexion,$usuario,$clave,$db){
			$this->conexion=$conexion;
			$this->usuario=$usuario;
			$this->clave=$clave;
			$this->db=$db;
			$this->conectarBaseDatos();
		}
		
		private function conectarBaseDatos(){
			
			$this->enlace=mysqli_connect($this->conexion,$this->usuario,$this->clave,$this->db)
			OR DIE ("Error: No es posible establecer la conexión");
			
		}
		
	}
	
?>