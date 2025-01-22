<?php
session_start();
include('db.php');  // Conectarea la baza de date

// Obține ID-ul utilizatorului din sesiune (dacă există)
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;  // Default la 1 dacă nu e logat

// Preia produsele din coș pentru utilizatorul curent
$stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
$stmt->execute([$userId]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Trimite produsele din coș ca răspuns JSON
echo json_encode(['success' => true, 'cart' => $cartItems]);
?>
