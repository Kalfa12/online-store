<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $cartId = $data['cartId'];

    $sql = "DELETE FROM cart WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $cartId]);

    echo json_encode(['message' => 'Product removed from cart!']);
}
?>