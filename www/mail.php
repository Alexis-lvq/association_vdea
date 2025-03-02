<?php
    header('Content-Type: application/json; charset=UTF-8');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));
        if (empty($name) || empty($email) || empty($message)) {
            echo json_encode(['success' => false, 'message' => 'Tous les champs sont obligatoires.']);
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Email non valide.']);
            exit;
        }
        $to = 'alexisleveque.dev@icloud.com';
        $subject = 'Nouveau message de ' . $name;
        $body = "Nom: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";
        if (mail($to, $subject, $body, $headers)) {
            echo json_encode(['success' => true, 'message' => "\u{1F60A} Votre message a été envoyé avec succès! \u{1F44D}"]);
        } else {
            echo json_encode(['success' => false, 'message' => "\u{1F62D} Une erreur est survenue lors de l\'envoi de votre message! \u{274C}"]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Méthode de requête invalide.']);
    }
?>

