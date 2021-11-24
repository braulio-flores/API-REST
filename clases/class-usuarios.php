<?php
    class Usuario 
    {
        private $nombre;
        private $apellido;
        private $fechaNacimiento;
        private $pais;        

        public function __construct($nombre,$apellido,$fechaNacimiento,$pais){
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->fechaNacimiento = $fechaNacimiento;
                $this->pais = $pais;
                
        }

        public function toString(){
                return "Mi nombre es ".$this->nombre;
        }
        // CRUD
        public function guardarUsuario(){
                $contenido = file_get_contents("../data/usuarios.json");
                $usuarios = json_decode($contenido,true);
                // CUANDO USAMOS UN CORCHETE VACIO NOS DA EL INDICE 
                // DEL ULTIMO REGISTRO $usuarios[]
                $usuarios[] = array(
                        "nombre"=> $this->nombre,
                        "apellido"=> $this->apellido,
                        "fechaNacimiento"=> $this->fechaNacimiento,
                        "pais"=> $this->pais
                );
                // Esto se hace para evitar lo siguiente
                // usuarios["nombre"] = $this->nombre;
                // usuarios["apellido"] = $this->apellido;
                // etc...
                // SE GENERA UN ARREGLO AOCIATIVO DE PHP 
                $archivo = fopen("../data/usuarios.json","w"); //SEGUDO PARAMETRO ES EL METODO DE APERTURA W PARA WRITE 
                fwrite($archivo,json_encode($usuarios));
                fclose($archivo);
        }
        public static function obtenerUsuarios(){
                $contenido = file_get_contents("../data/usuarios.json");
                echo $contenido;
        }

        public static function obtenerUsuario($indice){
                $contenido = file_get_contents("../data/usuarios.json");
                $usuarios = json_decode($contenido,true);
                echo json_encode($usuarios[$indice]);
        }

        public static function actualizarUsuario($indice,$newNombre,$newApellido,$newFechaNacimiento,$newPais){
                $contenido = file_get_contents("../data/usuarios.json");
                $usuarios = json_decode($contenido,true);
                $usuarios[$indice] = array(
                        "nombre"=> $newNombre,
                        "apellido"=> $newApellido,
                        "fechaNacimiento"=> $newFechaNacimiento,
                        "pais"=> $newPais
                );
                $archivo = fopen("../data/usuarios.json","w"); //SEGUDO PARAMETRO ES EL METODO DE APERTURA W PARA WRITE 
                fwrite($archivo,json_encode($usuarios));
                fclose($archivo);
        }
        public static function eliminarUsuario($indice){
                $contenido = file_get_contents("../data/usuarios.json");
                $usuarios = json_decode($contenido,true);
                array_splice($usuarios,$indice,1);
                $archivo = fopen("../data/usuarios.json","w"); //SEGUDO PARAMETRO ES EL METODO DE APERTURA W PARA WRITE 
                fwrite($archivo,json_encode($usuarios));
                fclose($archivo);
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of fechaNacimiento
         */ 
        public function getFechaNacimiento()
        {
                return $this->fechaNacimiento;
        }

        /**
         * Set the value of fechaNacimiento
         *
         * @return  self
         */ 
        public function setFechaNacimiento($fechaNacimiento)
        {
                $this->fechaNacimiento = $fechaNacimiento;

                return $this;
        }

        /**
         * Get the value of pais
         */ 
        public function getPais()
        {
                return $this->pais;
        }

        /**
         * Set the value of pais
         *
         * @return  self
         */ 
        public function setPais($pais)
        {
                $this->pais = $pais;

                return $this;
        }
    }
    
?>