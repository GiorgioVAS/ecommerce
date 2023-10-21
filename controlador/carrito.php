<?php

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Manejar la acción de agregar al carrito
if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    // Agregar el producto al carrito
    if (array_key_exists($product_id, $_SESSION['carrito'])) {
        $_SESSION['carrito'][$product_id] += 1;
    } else {
        $_SESSION['carrito'][$product_id] = 1;
    }
}

// Mostrar la cantidad de productos en el carrito
$carrito_count = count($_SESSION['carrito']);
?>
