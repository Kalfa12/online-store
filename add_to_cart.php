<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['message' => 'Please log in to add products to the cart.']);
    exit();
}
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $productId = $data['productId'];
    $userId = $_SESSION['user_id']; // Ensure the user is logged in

    // Check if the product is already in the cart
    $sql = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        // Update quantity if the product is already in the cart
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $item['id']]);
    } else {
        // Add the product to the cart
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    echo json_encode(['message' => 'Product added to cart!']);
}
?>