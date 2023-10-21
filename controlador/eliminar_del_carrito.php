<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Elimina el producto del carrito
    if (array_key_exists($product_id, $_SESSION['carrito'])) {
        unset($_SESSION['carrito'][$product_id]);
        echo 'Producto eliminado con éxito'; // Puedes devolver una respuesta para confirmar la eliminación
    } else {
        echo 'No se pudo eliminar el producto. Producto no encontrado en el carrito.';
    }
}
?>