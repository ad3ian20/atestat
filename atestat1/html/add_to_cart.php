<?php
require 'db.php';

header('Content-Type: application/json'); // Asigura-te ca header-ul pentru JSON este setat

$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Date invalide']);
    exit;
}

$name = $data['name'];
$price = $data['price'];
$quantity = $data['quantity'];

try {
    $stmt = $pdo->prepare('INSERT INTO cart (name, price, quantity) VALUES (?, ?, ?)');
    $stmt->execute([$name, $price, $quantity]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
