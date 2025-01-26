<?php
include('db.php');
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Co?ul este gol']);
    exit;
}

$cart_items = $_SESSION['cart']; // Co?ul utilizatorului

// Start tranzac?ie
$pdo->beginTransaction();

try {
    // Creeaza o comanda
    $sql = "INSERT INTO orders (order_date) VALUES (NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $order_id = $pdo->lastInsertId();

    // Adauga produsele în comanda
    foreach ($cart_items as $item) {
        $sql = "INSERT INTO order_items (order_id, product_id, product_name, quantity, price) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $order_id, 
            $item['product_id'], 
            $item['product_name'], 
            $item['quantity'], 
            $item['price']
        ]);
    }

    // Gole?te co?ul
    $_SESSION['cart'] = [];

    // Finalizeaza tranzac?ia
    $pdo->commit();

    echo json_encode(['success' => true, 'message' => 'Comanda a fost finalizata!']);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => 'A aparut o eroare']);
}
?>
