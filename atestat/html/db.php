<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shop';

// Conectare la baza de date
$conn = new mysqli($host, $username, $password, $dbname);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}
?>
