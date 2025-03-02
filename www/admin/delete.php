<?php
require_once '../config/data.php';
checkAdmin(); 


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Article non trouvé.");
}

$id = intval($_GET['id']); 
$article = getArticle($id); 

if (!$article) {
    die("Article introuvable.");
}


if (supprimerArticle($id)) {
    header("Location: actu.php");
    exit();
} else {
    die("Erreur lors de la suppression de l'article.");
}
?>
