<?php

class usuarioController
{
    public function CrearUsuario($request, $response, $args)
    {
        $listaDeParametros = $request->getParsedBody();

        $usuario = new Usuario();
        $usuario->nombre = $listaDeParametros['nombre'];
        $usuario->contrasenia = $listaDeParametros['contrasena'];

        Usuario::crearUsuario($usuario);
        $response->getBody()->write(json_encode($usuario));

        return $response;
    }

    public function retornarUsuario($request, $response, $args)
    {
        $listaDeParametros = $request->getParsedBody();
       

        $usuario = new Usuario();
        $usuario->nombre = $listaDeParametros['nombre'];
        $usuario->contrasenia = $listaDeParametros['contrasena'];

        Usuario::retornarUsuario($usuario);
      

        return $response;
    }
}
?>