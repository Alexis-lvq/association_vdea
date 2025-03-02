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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = htmlspecialchars_decode($_POST['titre']);
    $contenu = htmlspecialchars_decode($_POST['article']);
    $auteur = htmlspecialchars_decode($_POST['auteur']);
    $imagePath = $article['image']; 

    if (!empty($_FILES['image']['name'])) {
        $newImage = uploadImage($_FILES['image']);
        if ($newImage) {
            $imagePath = $newImage; 
        }
    }

    if (modifierArticle($id, $titre, $contenu, $auteur, $imagePath)) {
        header("Location: actu.php"); 
        exit();
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier l'article</h1>

        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="ancienne_image" value="<?= htmlspecialchars($article['image']); ?>">

            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?= htmlspecialchars($article['title']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur :</label>
                <input type="text" name="auteur" id="auteur" class="form-control" value="<?= htmlspecialchars($article['author']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="article" class="form-label">Contenu :</label>
                <textarea name="article" id="article" class="form-control" rows="5" required><?= htmlspecialchars($article['content']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Image actuelle :</label><br>
                <?php if (!empty($article['image'])): ?>
                    <img src="<?= htmlspecialchars($article['image']); ?>" class="img-thumbnail" style="width: 150px; height: auto;" alt="Image actuelle">
                <?php else: ?>
                    <p>Aucune image disponible.</p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Nouvelle image :</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">✅ Modifier</button>
        </form>
    </div>
</body>
</html>



