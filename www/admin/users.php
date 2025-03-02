<?php
require_once '../config/data.php'; 
checkAdmin();

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    checkCSRF($_POST['csrf_token']); 

    $nom = sanitize($_POST['nom']);
    $prenom = sanitize($_POST['prenom']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($password)) {
        if (emailExiste($email)) {
            $message = '<div class="alert alert-warning">Cet e-mail est déjà utilisé.</div>';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if (ajouterAdmin($nom, $prenom, $email, $passwordHash)) {
                $message = '<div class="alert alert-success">Administrateur ajouté avec succès !</div>';
            } else {
                $message = '<div class="alert alert-danger">Erreur lors de l\'ajout.</div>';
            }
        }
    } else {
        $message = '<div class="alert alert-warning">Veuillez remplir tous les champs.</div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    checkCSRF($_POST['csrf_token']);

    $id = intval($_POST['id']);
    $nom = sanitize($_POST['nom']);
    $prenom = sanitize($_POST['prenom']);
    $email = sanitize($_POST['email']);
    $password = !empty($_POST['password']) ? sanitize($_POST['password']) : null;

    if (modifierAdmin($id, $nom, $prenom, $email, $password)) {
        $message = '<div class="alert alert-success">Modification réussie !</div>';
    } else {
        $message = '<div class="alert alert-danger">Erreur lors de la modification.</div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    checkCSRF($_POST['csrf_token']);
    $id = intval($_POST['delete']);
    
    if (supprimerAdmin($id)) {
        $message = '<div class="alert alert-success">Administrateur supprimé avec succès !</div>';
    } else {
        $message = '<div class="alert alert-danger">Erreur lors de la suppression.</div>';
    }
}

$users = getAdmins();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Administrateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Gestion des Administrateurs</h2>

        <button class="btn btn-primary" onclick="history.back()" style="margin-bottom: 1rem;">← Retour</button>

        <?= !empty($message) ? $message : ''; ?>

        <div class="card p-4 mb-4">
            <h4>Ajouter un administrateur</h4>
            <form method="POST">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? ''; ?>">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="ajouter" class="btn btn-primary">Ajouter Administrateur</button>
            </form>
        </div>

        <h3 class="mt-4">Liste des Administrateurs</h3>
        <ul class="list-group">
            <?php foreach ($users as $user): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-column flex-md-row">
                    <div>
                        <strong><?= htmlspecialchars($user['nom'] . ' ' . $user['prenom']); ?></strong> - <?= htmlspecialchars($user['email']); ?>
                    </div>
                    <div class="d-flex gap-2 mt-2 mt-md-0">
                        <form method="POST">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? ''; ?>">
                            <input type="hidden" name="delete" value="<?= $user['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?');">🗑 Supprimer</button>
                        </form>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $user['id']; ?>">✏️ Modifier</button>
                    </div>
                </li>

                <div class="modal fade" id="editModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier l'administrateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? ''; ?>">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($user['nom']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($user['prenom']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <button type="submit" name="modifier" class="btn btn-warning">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </ul>

        <a href="logout.php" class="btn btn-danger mt-3 float-end">🔑 Déconnexion</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
