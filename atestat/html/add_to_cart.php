<?php
// Configurare conexiune MySQL
$servername = "localhost"; // serverul MySQL
$username = "root"; // utilizatorul MySQL
$password = ""; // parola MySQL
$dbname = "numele_bazei_de_date"; // numele bazei de date

// Crează conexiunea
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Obține datele trimise prin POST
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name']) && isset($data['price']) && isset($data['quantity'])) {
    $name = $conn->real_escape_string($data['name']);
    $price = $conn->real_escape_string($data['price']);
    $quantity = $conn->real_escape_string($data['quantity']);

    // Creează interogarea pentru a insera datele în tabelul 'your_table_name'
    $sql = "INSERT INTO your_table_name (name, price, quantity) VALUES ('$name', '$price', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        // Dacă inserarea a avut succes
        echo json_encode(['success' => true]);
    } else {
        // Dacă a apărut o eroare
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Datele nu au fost trimise corect.']);
}

// Închide conexiunea
$conn->close();
?>
