<?php
    include("modelo/conexion.php");
    require("controlador_registrar_usuario.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Inicio de Sesión</h2>
        <form action="" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" >

            <label for="apellido">Apellidos:</label>
            <input type="text" name="apellido" >

            <label for="user">Usuario:</label>
            <input type="text" name="usuario">

            <label for="password">Contraseña:</label>
            <input type="password" name="password">

            <input type="submit" value="Registrarse" name="registro">
        </form>
    </div>
</body>
</html>
