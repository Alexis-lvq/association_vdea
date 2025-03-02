<?php 
require_once '../config/data.php';
checkAdmin(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/png/" href="../img/favicon_admin.png">
    <title>Administration - Gestion</title>
    <link href="../styles/styleAccueil.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="container">
                <div class="logo mt-5 d-flex justify-content-center">
                    <img src="../img/logoAdmin.webp" alt="logo VDEA" style="height: 200px; width: auto;">
                </div>
            </div>
        </header>
        <main>
        <div class="container mt-5">
            <h1 class="mb-4">📌 Ecran de gestion Admin</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4 text-center">
                        <h2 class="mb-3">📰 Actualités</h2>
                        <a href="actu.php" class="btn btn-primary">📖 Voir plus</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm p-4 text-center">
                        <h2 class="mb-3">📚 Cours</h2>
                        <a href="cour.php" class="btn btn-success">📖 Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="logout.php" class="btn btn-danger">🔑 Déconnexion</a>
            </div>
        </main>
        <footer>
            <div class="container">
                
            </div>
        </footer>
    </div>
</body>
</html>