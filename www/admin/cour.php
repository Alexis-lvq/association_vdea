<?php
require_once '../config/data.php';
checkAdmin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/png/" href="../img/favicon_admin.png">
    <title>Administration - Gestion des cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Cours</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4">Liste des cours</h1>
        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>
        <a href="createCour.php" class="btn btn-primary mb-3">Ajouter un cours</a>
        <table class="table table-bordered">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php 
            $articles = $pdo->query("SELECT * FROM cours")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($articles as $article) : ?>
                <tr>
                    <td><?= $article['titre'] ?></td>
                    <td><?= $article['description'] ?></td>
                    <td><img src="<?= $article['image'] ?>" width="100"></td>
                    <td>
                        <a href="editCour.php?id=<?= $article['id'] ?>" class="btn btn-warning mb-3">Modifier</a>
                        <a href="deleteCour.php?id=<?= $article['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
