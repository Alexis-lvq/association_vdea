<?php
require_once '../config/data.php';
checkAdmin();

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM cours WHERE id=?");
    $stmt->execute([$_GET['id']]);
    header('Location: cour.php');
}
?>