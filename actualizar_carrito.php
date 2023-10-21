<?php
session_start();

if (isset($_SESSION['carrito'])) {
    $carrito_count = array_sum($_SESSION['carrito']);
    echo $carrito_count;
} else {
    echo "0";
}
?>
