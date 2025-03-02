<?php
require_once '../config/data.php';
checkAdmin();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = htmlspecialchars_decode($_POST['titre']);
    $contenu = htmlspecialchars_decode($_POST['article']);
    $auteur = htmlspecialchars_decode($_POST['auteur']);
    $imagePath = "";

    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image']);
    }

    if (ajouterArticle($titre, $contenu, $auteur, $imagePath)) {
        header("Location: actu.php"); 
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'article.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="img/png/" href="../img/favicon_admin.png">
    <title>Administration - Gestion des actualités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un nouvel article</h1>

        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur :</label>
                <input type="text" name="auteur" id="auteur" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="article" class="form-label">Contenu :</label>
                <textarea name="article" id="article" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">✅ Ajouter</button>
        </form>
    </div>
</body>
</html>
