<?php

class juegosController{

        public function RetornarJuegos($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();

            $jsonjuegos = Juegos::obtenerJuegos();
            $response->getBody()->Write(json_encode($jsonjuegos));
            return $response ->withHeader('Content-Type', 'application/json');

        }
        public function Alta($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();
        

                $juegos = new Juegos();
                $juegos->id_juego = $listaDeParametros['id_juego'];
                $juegos->titulo = $listaDeParametros['titulo'];
                $juegos->duracion = $listaDeParametros['duracion'];
                $juegos->descripcion = $listaDeParametros['descripcion'];
                $juegos->puntaje = $listaDeParametros['puntaje'];
                $juegos->imagen = $listaDeParametros['imagen'];
                $juegos->anio = $listaDeParametros['anio'];
                $juegos->trailer = $listaDeParametros['trailer'];

                Juegos::CrearJuegos($juegos);
                $response->getBody()->write(json_encode($juegos));

                return $response;
        }
        public function obtenerFormMod($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();
            $juegos = new Juegos();
            $juegos->id_juego = $listaDeParametros['id_juego'];

            $jsonjuegos = Juegos::FormModJuego($juegos);

            $response->getBody()->Write(json_encode($jsonjuegos));
            return $response ->withHeader('Content-Type', 'application/json');


        }
        public function ModJuego($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();

            $juegos = new Juegos();
            $juegos->titulo = $listaDeParametros['titulo'];
            $juegos->duracion = $listaDeParametros['duracion'];
            $juegos->descripcion = $listaDeParametros['descripcion'];
            $juegos->puntaje = $listaDeParametros['puntaje'];
            $juegos->imagen = $listaDeParametros['imagen'];
            $juegos->anio = $listaDeParametros['anio'];
            $juegos->trailer = $listaDeParametros['trailer'];
            $juegos->id_juego = $listaDeParametros['id_juego'];

            Juegos::ModificarJuegos($juegos);
            $response->getBody()->write("Se ha modificado un juego");

            return $response;

        }
        public function DeleteJuego($request, $response, $args){
            $listaDeParametros = $request->getParsedBody();
            $juegos =  new Juegos();
            $juegos->id_juego =  $listaDeParametros['id_juego'];

            Juegos::EliminarJuego($juegos);
            $response->getBody()->Write("Se ha eliminado un Juego");
            return $response;

        }


}

?>