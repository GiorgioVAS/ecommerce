<!DOCTYPE html>
<html lang="es">
<?php

    include("modelo/conexion.php");
    include("controlador_verificador.php")
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="login">
    <div class="container">
        <div class="formulario">
            <div>
                <h2 class="texto">Iniciar Sesión</h2>
            </div>
            <br><br>
                <form action="" method="post" >
                    <label for="usuario" class="texto">Usuario:</label><br>
                    <br>
                    <input type="text" id="usuario" name="usuario" class="bloque" required>
                    <br><br>
                    <label for="contrasena" class="texto">Contraseña:</label>
                    <br><br>
                    <input type="password" id="contrasena" name="contrasena" class="bloque" required>
                    <br><br>
                    <div>
                        <input class="ingresar"  type="submit" name="ingresar" value="Iniciar Sesión">
                    </div>
                    <br>
                    <div class="registro">
                        <a href="registro_usuario.php">Registrate</a>
                    </div>
                    
                </form>
                
        </div>
        <br>
        
    </div>
    </main>
    

</body>
</html>


