<?php

    if(!empty($_POST["registro"])){
        if(empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["usuario"]) or empty($_POST["password"])){
            
        echo'<div>Uno de los campos están vacios</div>';

        }else{

            //pasamos los valores name en un post el post es como un objeto que acompaña y hace que la informacion este oculta
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $usuario = $_POST["usuario"];
            $clave = $_POST["password"];
            $sql =$conexion->query("insert into usuario(nombres,apellidos,usuario,clave)values('$nombre','$apellido','$usuario','$clave')");
            if($sql == 1){
                echo '¡Usuario registro exictosamente!';
            }else{
                echo 'Error al registrar el usuario';
            }
        }

    }

?>