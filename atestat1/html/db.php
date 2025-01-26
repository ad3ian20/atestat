<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=astulianec1;charset=utf8', 'astulianec1', '54996');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Erori de conectare
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Conexiunea la baza de date a e?uat: ' . $e->getMessage()]);
    exit;
}
?>
