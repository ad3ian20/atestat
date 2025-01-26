<?php
include('db.php');

// Verifica daca formularul a fost trimis prin metoda POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preia datele din formular
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Verifica daca toate câmpurile sunt completate
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        // Verifica daca exista deja un mesaj cu acelasi email sau numar de telefon
        $checkQuery = "SELECT * FROM contact_messages WHERE email = ? OR phone = ?";
        $stmt = $pdo->prepare($checkQuery);
        $stmt->execute([$email, $phone]);
        $existingMessage = $stmt->fetch();

        // Debugging: Output the found message (if any)
        if ($existingMessage) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Ai mai trimis un mesaj cu acest email sau numar de telefon.',
                'existingMessage' => $existingMessage // Output the existing record
            ]);
            exit();
        }

        // Pregate?te interogarea SQL pentru a insera datele în baza de date
        $query = "INSERT INTO contact_messages (name, email, phone, message, created_at) VALUES (?, ?, ?, ?, NOW())";

        // Executa interogarea
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute([$name, $email, $phone, $message]);

            // Raspuns succes
            echo json_encode([
                'status' => 'success',
                'message' => 'Mesajul a fost trimis cu succes! Mul?umim pentru contact.'
            ]);
            exit();
        } catch (PDOException $e) {
            // Raspuns eroare
            echo json_encode([
                'status' => 'error',
                'message' => 'Ne cerem scuze, dar mesajul nu a putut fi trimis. Eroare: ' . $e->getMessage()
            ]);
            exit();
        }
    } else {
        // Raspuns eroare - câmpuri incomplete
        echo json_encode([
            'status' => 'error',
            'message' => 'Te rugam sa completezi toate câmpurile formularului.'
        ]);
        exit();
    }
}
?>