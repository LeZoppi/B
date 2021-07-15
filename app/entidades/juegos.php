<?php   

    class Juegos{
  
        //atributos
        public $titulo;
        public $pathImagen;
        public $descripcion;


        public static function obtenerJuegos()
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("SELECT * FROM `games`");
            $consulta->execute();

            
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'juegos');

        }
    
        public static function CrearJuegos($ju)
        {

            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `games`(`titulo`,`duracion`,`descripcion`,`puntaje`,`imagen`,`anio`,`trailer`) VALUES (?,?,?,?,?,?,?)");
        
            $consulta->execute([$ju->titulo, $ju->duracion,$ju->descripcion, $ju->puntaje,$ju->imagen, $ju->anio,$ju->trailer]);

            return;
        }

        public static function EliminarJuego($ju)
        {

            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("DELETE FROM `games` WHERE id_juego = ? ");
        
            $consulta->execute([$ju->id_juego]);

            return;
        }
        public static function FormModJuego($ju)
        {
    
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta('SELECT * FROM `games` WHERE `id_juego`= ?');

            $consulta->execute([$ju->id_juego]);

            return $consulta->fetchAll(PDO::FETCH_CLASS, 'juegos');
       }
       public static function ModificarJuegos($ju)
       {

            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("UPDATE `games` SET `titulo` = ? , `duracion` = ? , `descripcion` = ? , `puntaje` = ? , `imagen` = ? , `anio` = ? , `trailer` = ? WHERE `id_pelicula` = ? ");
            $consulta->execute([$ju->titulo, $ju->duracion,$ju->descripcion, $ju->puntaje,$ju->imagen, $ju->anio,$ju->trailer,$ju->id_juego]);
            return;
       }
   }
?>