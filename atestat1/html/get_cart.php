<?php
include('db.php');
session_start();

// Logarea sesiunii pentru depanare
error_log("Sesiune cart: " . print_r($_SESSION['cart'], true));

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Ini?ializare co?
}

$cart_items = $_SESSION['cart']; // Ob?inem co?ul utilizatorului
error_log("Cart items: " . print_r($cart_items, true));  // Verificare pentru datele co?ului

$product_details = [];

// Verifica daca sunt produse  n co?
if (count($cart_items) > 0) {
    foreach ($cart_items as $item) {
        // Corectam interogarea pentru tabela corespunzatoare produselor
        $sql = "SELECT id, name, price FROM cart WHERE id = ?";  // Folosim tabelul 'products'
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$item['product_id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $product['quantity'] = $item['quantity'];  // Adaugam cantitatea
            $product_details[] = $product;  // Adaugam produsul  n lista de detalii
        } else {
            error_log("Produsul cu ID-ul " . $item['product_id'] . " nu a fost gasit  n baza de date.");
        }
    }
} else {
    error_log("Co?ul este gol.");
}

// Verifica ce produse au fost gasite
error_log("Detalii produse: " . print_r($product_details, true));

// Raspuns JSON catre client
echo json_encode(['success' => true, 'cart' => $product_details]);
?>
