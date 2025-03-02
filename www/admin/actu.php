<?php
require_once '../config/data.php';
checkAdmin(); 
$articles = getArticles(); 
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
        <h1 class="mb-4">Gestion des articles</h1>
        
        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>
        <a href="add.php" class="btn btn-success mb-3">➕ Ajouter un article</a>
        <a href="users.php" class="btn btn-info mb-3">👤 Gérer les administrateurs</a>
        <a href="logout.php" class="btn btn-danger mb-3 float-end">🔑 Déconnexion</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Descritpion</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= htmlspecialchars($article['id']); ?></td>
                    <td>
                        <?php if (!empty($article['image'])): ?>
                            <img src="<?= htmlspecialchars($article['image']); ?>" class="img-thumbnail" style="width: 100px; height: 70px; object-fit: cover;" alt="Image">
                        <?php else: ?>
                            <span class="text-muted">Pas d'image</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($article['title']); ?></td>
                    <td><?= htmlspecialchars($article['resume']); ?></td>
                    <td><?= htmlspecialchars($article['author']); ?></td>
                    <td><?= htmlspecialchars($article['date']); ?></td>
                    <td>
                        <a href="modify.php?id=<?= intval($article['id']); ?>" class="btn btn-warning btn-sm mb-3">✏️ Modifier</a>
                        <a href="delete.php?id=<?= htmlspecialchars($article['id']); ?>" 
                        class="btn btn-danger btn-sm" 
                        onclick="return confirm('Êtes-vous sûr ?');">🗑 Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>