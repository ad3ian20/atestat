<?php

include 'db.php';

// Ștergem toate produsele din tabelul cart
$sql = "DELETE FROM cart";

$response = [];
if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $conn->error;
}

echo json_encode($response);
?>
