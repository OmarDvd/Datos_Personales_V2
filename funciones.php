<?php

    function existeUsuario($nombreFichero,$usuario){
       $arrayUsuarios=file($nombreFichero);
       // empiezo i en 1 porque el 0 es [usuario]
       for($i=1;$i<count($arrayUsuarios);$i++){

        // quito la parte del igual y la contraseña para quedarme solo con el usuario
        $cadena=$arrayUsuarios[$i];
        $aCadena=explode("=",$cadena);

        // comparo
        if($aCadena[0]===$usuario){
            return true;
        }
       }
       return false;
    }

    function existeUsuarioContrasena($nombreFichero,$usuario,$contrasena){
        $arrayUsuarios=file($nombreFichero);
        // empiezo i en 1 porque el 0 es [usuario]
        for($i=1;$i<count($arrayUsuarios);$i++){
 
         // quito la parte del igual y la contraseña para quedarme solo con el usuario
         $cadena=$arrayUsuarios[$i];
         $aCadena=explode("=",$cadena);
 
         // comparo
         if($aCadena[0]===$usuario&&$aCadena[1]===$contrasena.PHP_EOL){
             return true;
         }
        }
        return false;
     }



?>