<?php
session_start();  // Pornim sesiunea

header('Content-Type: application/json'); // Asiguram ca raspunsul este �n format JSON

$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['product_id'])) {
    echo json_encode(['success' => false, 'error' => 'Date invalide']);
    exit;
}

$product_id = $data['product_id'];

// Verificam daca exista un co? �n sesiune
if (isset($_SESSION['cart'])) {
    // Cautam produsul �n co? ?i �l eliminam
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $product_id) {
            unset($_SESSION['cart'][$key]);  // Eliminam produsul
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexam array-ul
            echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
            exit;
        }
    }
}

// Daca produsul nu a fost gasit
echo json_encode(['success' => false, 'message' => 'Produsul nu exista �n co?.']);
?>
