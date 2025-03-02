<?php
require_once '../config/data.php';
checkAdmin(); 

$pdo = getDBConnection(); 

if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Cours introuvable.");
}

$id = intval($_GET['id']); 
$stmt = $pdo->prepare("SELECT * FROM cours WHERE id = ?");
$stmt->execute([$id]);
$cours = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cours) {
    die("Cours introuvable.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $imagePath = $cours['image']; 


    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image'], $cours['image']); 
    }

    $stmt = $pdo->prepare("UPDATE cours SET titre=?, description=?, image=? WHERE id=?");
    $stmt->execute([$titre, $description, $imagePath, $id]);

    header("Location: cour.php"); 
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier un Cours</h1>

        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">

            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?= $cours['titre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" class="form-control" rows="4" required><?= $cours['description']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Image actuelle :</label><br>
                <?php if (!empty($cours['image'])): ?>
                    <img src="<?= htmlspecialchars($cours['image']); ?>" class="img-thumbnail" style="width: 150px; height: auto;" alt="Image actuelle">
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

