<?php
session_start();
//el empty significa vacio , osea el campo esta vacio
    if(!empty($_POST["ingresar"])) {
            if(empty($_POST["usuario"]) && empty($_POST["contrasena"])){
                    echo 'Los campos estan vacios';
            }else{
                $usuario = $_POST["usuario"];
                $clave = $_POST["contrasena"];
                $sql = $conexion->query(" select * from usuario where usuario='$usuario' and clave='$clave'");
                //Verificamos si el usuario existe o los datos de la tabla
                if($datos=$sql->fetch_object()){
                    //almacenando la id del usuario usando el objeto SESSION
                    $_SESSION["id"]=$datos->id;
                    $_SESSION["nombre"]=$datos->nombres;
                    $_SESSION["apellido"]=$datos->apellidos;
                    header("location:pagina.php");
                }else{
                    echo '<h1>Error al momento de iniciar</h1>';
                }

            }

    }


?>