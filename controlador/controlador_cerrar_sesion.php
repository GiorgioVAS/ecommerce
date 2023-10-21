<?php

//Con este codigo lo que haremos sera arrancar osea nos llevara a la pagina ya registrado mediante el logeo
session_start();

//anula nuestra sesion y eso hace que nuestro login se borre y al momento de ingresar tengamos que colocar nuestro login primero
session_destroy();

//Nos devuelve hacia el archivo al momento de cerrar sesion o si no colocamos bien los datos de nuestro usuario
header("location:../index.php");


?>