<?php
      session_start();
      if(empty($_SESSION["id"])) {
        header("location: index.php");
      }

      require("modelo/database_productos.php");

      $db= new Database();
      $con = $db ->conectar();
      $sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
      $sql->execute();
      //CON fetchAll llamamos a todos los productos guardados en la tabla que esta en la base de datos
      /*Con PDO::FECTH_ASSOC se encarga de que los productos 
      sigan en orden del nombre, osea los va asociar mediante el nombre de cada columna*/
      $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
            require("controlador/carrito.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundol</title>
    <link rel="stylesheet" href="css/estilos.css">
    <!--======Llamando tailwind=====-->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <header>
        
<nav style="background-color: #222222;"  class="flex items-center justify-between flex-wrap bg-white border-gray-200 dark:bg-emerald-950 grid sm:grid-cols-2 lg:grid-cols-4 py-3">

    <div class="flex items-center flex-shrink-0 text-white mr-6 justify-end">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="font-semibold text-xl tracking-tight">Kundol</span>
      </div>
      
      <!--=======MENU HAMBURGUESA======-->
      <div class="block lg:hidden justify-end">
        <button id='boton' class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
      </div>
      <!--=========MENU GENERAL========-->
      <div id='menu' class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden ">

        <div class="text-sm lg:flex-grow lg:pl-5">
          <a href="pagina.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Inicio
          </a>
          <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Tienda
          </a>
          <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Productos
          </a>
          <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Elementos
          </a>
          <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Paginas
          </a>
          <a href="controlador/controlador_cerrar_sesion.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Salir
          </a>
        </div>
        <div>
          
        </div>
      </div>
      <!--=========Carrito compra========-->
      <div class="flex justify-end mr-36">
        <div class="nombre-logeo" style="width: 170px; height: 30px; background-color: red;">
            <div class="text-white text-center">
              <p class="text-white">Carrito <?php echo $carrito_count; ?></p>
            </div>
        </div>
      </div>

      <!--=========Nombre del usuario========-->
      <div class="flex justify-end mr-36">
        <div class="nombre-logeo" style="width: 170px; height: 30px; background-color: red;">
            <div class="text-white text-center">
                <?php
                 echo $_SESSION["nombre"] ." ". $_SESSION["apellido"];
                ?>
            </div>
        </div>
      </div>
  </nav>
    </header>
    <!--========MAIN CONTENIDO=========-->
    <main>
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-4">Productos</h1>
        <table class="min-w-full table-auto border border-collapse">
    <thead>
        <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Nombre</th>
            <th class="px-4 py-2 border">Precio</th>
            <th class="px-4 py-2 border">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $producto) : ?>
            <tr>
                <td class="px-4 py-2 border"><?php echo $producto['id']; ?></td>
                <td class="px-4 py-2 border"><?php echo $producto['nombre']; ?></td>
                <td class="px-4 py-2 border"><?php echo $producto['precio']; ?></td>
                <td class="px-4 py-2 border">
                    <form method="post" action="">
                        <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div>
</main>


    <!--============= FIN DE NEWSLETER=================-->
    <!--============= FOOTER =================-->
    <footer class="footer">
      <div class="container mx-auto">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-3">
          <div class="texto-footer flex justify-center mx-3 ">
            <p>© 2019 Company, Inc. Privacy • Terms</p>
          </div>
          <div class="iconos-redes flex justify-center">
            <i class='bx bxl-facebook-circle'></i>
            <i class='bx bxl-instagram' ></i>
            <i class='bx bxl-twitter' ></i>
          </div>
        </div>
      </div>
    </footer>
    <!--============= FIN DE FOOTER =================-->
    </main>
</body>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="js/script.js"></script>
<script src="js/jquery-3.6.4.js"></script>
<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
<script>

</script>
</html>