<?php
require_once '../config/data.php';
checkAdmin();
$pdo = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $imagePath = null; 

    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image']);
    }

    $stmt = $pdo->prepare("INSERT INTO cours (titre, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$titre, $description, $imagePath]);

    header('Location: cour.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Cours</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4">Ajouter un Cours</h1>

        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>

        <form method="POST" enctype="multipart/form-data" class="border p-4 rounded bg-light shadow-sm">
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" placeholder="Titre" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
