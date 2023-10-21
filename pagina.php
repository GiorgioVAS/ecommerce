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
        <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
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
              <a href="checkout.php"><p class="text-white">Carrito <?php echo $carrito_count; ?></p></a>
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
      <!--=========CAROUSEL===========-->
      <div class="carousel">
        <div class="carousel-slide">
          <img src="img/fondozap1.png" alt="Image 1">

          <div class="caja-contenido2">
            <h2 class="text-xs sm:text-sm md:text-2xl lg:text-3xl xl:text-4xl">Productos de Calidad</h2>
            <p class="text-xs text-white sm:text-sm md:text-2xl lg:text-3xl xl:text-4xl">Articulos de Deporte<br>Zapatillas</p>
            <button class="p-2 bg-red-600 reunded-5 mt-3 text-white sm:text-sm md:text-md lg:text-lg xl:text-2xl text-xs">Ver mas</button>
          </div>

        </div>
        <div class="carousel-slide">
          <img src="img/fondozap2.png" alt="Image 2">
        </div>
        <div class="carousel-slide">
          <img src="img/fondozap3.png" alt="Image 3">
        </div>
        <div class="carousel-indicators"></div>
      </div>
      
      
      
      

<!--=======CONTENEDOR DE BLOQUES==========-->
    <div class="conteiner mx-auto pt-2">
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 gap-2">

        <div style="background-color: #222222;"  class=" mx-3 caja grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
              <div class="figura">
              <div class="caja-contenido">
                <h2>50% de Descuento</h2>
                <p>Futbol Colección</p>
                <button class="p-2 bg-red-600 reunded-5 mt-3 text-white">Ver Mas</button>
              </div>
              </div>
            </div>

            <div style="background-color: #222222;"  class=" mx-3 caja grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
                <div class="figura">
                  <h2>Polos Adidas</h2>
                  <p>37% de Descuentos</p>
                  <button class="p-2 bg-red-600 reunded-5 mt-3 text-white">Ver Colección</button>
                </div>
                
            </div>

            <div style="background-color: #222222;" class="mx-3 caja grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
              <div class="caja-contenido mx-20"> 
                <h2>Otros Deportes</h2>
                <p>Volley, Basket<br>Y mas</p>
                <button class="p-2 bg-red-600 reunded-5 mt-3 text-white">Buscar</button>
              </div>
            </div>
        </div>
    </div>
    <!--==========NEW PRODUCTS=============-->
    <section class="container mx-auto px-4 py-4 products">
        <div class="row grid md:grid-cols-1 lg:grid-cols-2 gap-5 py-6">
          <div>
          <h2 class="text-white">Nuevos Productos</h2>
          <p style="color: #D6D6D6">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
          </div>
          <div class="block1 pt-3 lg:pr-13">
            <a class="active" href="#">Ver Todos</a>         
          </div>
        </div>

        <div id="indicators-carousel" class="relative md:w-full carousel flex md:h-4/6 xl:h-5/6 row row-cols-1" data-carousel="static">

        <div class="md:relative carousel-track overflow-hidden rounded-lg md:h-auto md:h-full lg:h-full">

            
          <div class=" grid grid-cols-2 overflow-hidden sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-6 duration-700 ease-in-out " >
          
          <?php foreach ($resultado as $row) { ?>

          <div class="content ">
          
          <?php
           
           $id = $row['id'];
           $imagen = "img/productos/" .$id . "/deporte.png";

         if(!file_exists($imagen)){
           $imagen = "img/fondo.png";
         }

          ?> 

            <img src="<?php echo $imagen; ?>" alt="Img">   
            <div class="post-content py-5">
              <h3 style="color: #7B7D79;" class="sm:text-sm md:text-lg"></h3>
              <p class="text-white sm:text-sm md:text-lg"><?php echo $row['nombre']; ?></p>
              <div class="price">
                <span class="new-price">$<?php echo $row['precio'];?></span>      
              </div>
              <!-- Agregar un botón para agregar al carrito -->
              <form method="post">
                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                            <input type="submit" name="add_to_cart" class="px-7 py-2 bg-red-600 reunded-2 mt-3 text-white text-lg boton" value="Agregar al Carrito">
              </form>
            </div>
          </div>

          <!--<div class="content ">
            <img src="img/prod-1.jpg" alt="Img">   
            <div class="post-content py-5">
              <h3 style="color: #7B7D79;" class="sm:text-sm md:text-lg"></h3>
              <p class="text-white sm:text-sm md:text-lg">guantes para ciclista</p>
              <div class="price">
                <span class="new-price">$119</span>
                <span class="old-price">$182</span>      
              </div>
            </div>
          </div>-->
          
          <?php  } ?>

          </div> 

          
        </div>
    </section>
    <!--=============Special Offers=================-->
    <section class="special flex lg:align-center">
      <div class="container mx-auto flex items-center  md:justify-center justify-center">
        <div class="caja-contenido3 sm:text-center md:text-center "> 
          <h2>Ofertas Especiales</h2>
          <p>Revisa nuestro catalogo de Oferta</p>
          <p class="text-center text-sm">¡Aprovecha nuestras ofertas especiales para esta temporada! Encuentra descuentos de hasta el 50% en una amplia selección de productos.</p>
          <button class="px-7 py-2 bg-red-600 reunded-2 mt-3 text-white text-lg boton">Descubrelo Ahora</button>
        </div>
      </div>
    </section>

    <!--=============WOOD ADIRONDACK=================-->
    <section class="wood-adirondak">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 pt-20">
          <div> <img src="img/Prod-Bicicleta.png" width="800" height="300"></div>
          <div class="mx-4 text-justify">
            <h4 class="text-red text-lg">Ofertas Mensuales</h4>
            <h2 class="text-white">¡Solo validas hasta el final del mes!</h2>
            <p class="text-base">Descubre nuestras ofertas mensuales y encuentra los mejores precios en una amplia selección de productos.</p>
            <br>
            <div class="price">
              <span class="new-price">S/250</span>
              <span class="old-price">S/199</span>                   
            </div>
          <button class="px-3 py-1 bg-red-600 reunded-2 mt-3 text-white text-lg boton">ADD TO CART</button>
        </div>
          </div>
        </div>
      </div>
    </section>

   
    
   
    <!--============= FIN DE NEWS FEED=================-->
    <!--============= FIN DE NEWSLETER=================-->
     <!--=============NEWS FEED=================-->
     <div class="news-feed container mx-auto ">
      
      <div class="pt-20 mx-5 sm:mx-4 md:mx-6 lg:mx-6 xl:mx-6">
        <h1 class="text-white">Noticias</h1>
        <p>¡Enterante de nuestras Novedades!</p>
      </div>

      <div id="indicators-carousel" class="relative carousel carousel-height full mx-4 sm:mx-4 md:mx-0 lg:mx-0 my-0 " data-carousel="static">
        
        <div class="md:relative carousel-track  overflow-hidden rounded-lg mx-8 sm:mx-5 md:mx-8 wood-contenedor">
          
        <div class="carousel-item overflow-hidden mt-8 mx-0 grid grid-cols-1 sm:grid-cols-3 sm:mx-0 md:mx-0 md:grid-cols-3  lg:grid-cols-3 lg:mx-0 xl:mx-0 gap-3 duration-700 ease-in-out" data-carousel-item="active">
        <div class="block-feed ">
          <img src="img/Plazanorte.jpg" alt="imagen">
          <div class="post-content pt-4">
            <div class="meta top">
              <span class="post-by"><i class='bx bx-calendar' style='color:#848688'></i><a href="#"> 18 Octubre, 2018</a></span>
              <span class="post-date pl-4"><i class='bx bxs-message-rounded' style='color:#848688' ></i>7 Comentarios</span>
            </div>
            <h2 class="title text-white"><a href="#">Nueva Sucursal en Plaza Norte</a></h2>
            <div class="meta bottom pt-4 mr-4 text-justify lg:mr-8 xl:mr-24">
              <span class="post-comments">
                <a href="#">
                  Nuestra nueva sucursal se encuentra operativa Y
                  esta ofreciendo descuentos por apertura, ¡Aprovecha y
                  visitanos!</a>
              </span>	
            </div>
          </div>
        </div>

        <div class="block-feed">
          <img src="img/AdidasLogo.jpeg" alt="">
          <div class="post-content pt-4">
            <div class="meta top">
              <span class="post-by"><i class='bx bx-calendar' style='color:#848688'></i><a href="#"> 14 Octubre, 2023</a></span>
              <span class="post-date pl-4"><i class='bx bxs-message-rounded' style='color:#848688' ></i>4 comentarios</span>
            </div>
            <h2 class="title text-white"><a href="#">Partners Oficiales de Adidas</a></h2>
            <div class="meta bottom pt-4 mr-4 text-justify lg:mr-8 xl:mr-24">
              <span class="post-comments">
                <a href="#">
                  Nos complace anunciar que a partir
                  del dia de hoy somos distribuidores
                  oficiales de la marca ADIDAS en Peru. </a>
              </span>	
            </div>
          </div>
        </div>
        <div class="block-feed">
          <img src="img/PeruVenezuelapartido.jpg" alt="">
          <div class="post-content pt-4">
            <div class="meta top">
              <span class="post-by"><i class='bx bx-calendar' style='color:#848688'></i><a href="#"> 12 Octubre, 2023</a></span>
              <span class="post-date pl-4"><i class='bx bxs-message-rounded' style='color:#848688' ></i>9 comentarios</span>
            </div>
            <h2 class="title text-white"><a href="#">Sorteo Entradas Eliminatorias 2026</a></h2>
            <div class="meta bottom pt-4 mr-4 text-justify lg:mr-8 xl:mr-24">
              <span class="post-comments">
                <a href="#">
                  Por compras mayores a 200 soles entras en un
                  sorteo por dos tickets al partido de Peru
                  en contra de Venezuela este 21 de Noviembre</a>
              </span>	
            </div>
          </div>
        </div>
          </div>

          
          </div>
          <!-- Slider indicators -->
          <div class="absolute z-30 flex space-x-3 -translate-x-1/2 md:bottom-2 lg:bottom-5  left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <br>
           </div>
      </div>
    </div>
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
</html>