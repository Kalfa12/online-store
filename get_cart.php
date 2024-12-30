<?php
session_start();
require_once 'db.php';

$userId = $_SESSION['user_id']; // Ensure the user is logged in

$sql = "SELECT cart.id, products.name, products.price, products.image, cart.quantity 
        FROM cart 
        JOIN products ON cart.product_id = products.id 
        WHERE cart.user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $userId]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cartItems);
?>