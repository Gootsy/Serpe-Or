<?php
session_start();

$type = $_POST['produit_type'];
$id = $_POST['id_plantes'];
$quantity = $_POST['quantity'] ?? 1;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// si déjà dans panier → ajoute quantité
if (isset($_SESSION['cart'][$type][$id])) {
    $_SESSION['cart'][$type][$id] += $quantity;
} else {
    $_SESSION['cart'][$type][$id] = $quantity;
}

header("Location: panier.php");
exit;