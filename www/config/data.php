<?php
session_start();
session_regenerate_id(true); 

function getDBConnection() {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=mysql';
        $user = '';
        $password = '';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
    return $pdo;
}

function checkAdmin() {
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        header("Location: login.php");
        exit();
    }
}

function checkCSRF($token) {
    if (!isset($_SESSION['csrf_token']) || empty($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
        die("CSRF token invalide");
    }
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function sanitize($data) {
    return htmlspecialchars(trim($data ?? ''), ENT_QUOTES, 'UTF-8');
}

function ajouterArticle($titre, $article, $auteur, $image) {
    $pdo = getDBConnection();
    $sql = "INSERT INTO article (title, content, author, image, date) VALUES (:titre, :article, :auteur, :image, NOW())";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'titre' => $titre,
        'article' => $article,
        'auteur' => $auteur,
        'image' => $image ?? 'default.jpg'
    ]);
}

function modifierArticle($id, $titre, $article, $auteur, $image) {
    $pdo = getDBConnection();
    $sql = "UPDATE article SET title = :titre, content = :article, author = :auteur, image = :image WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'id' => $id,
        'titre' => $titre,
        'article' => $article,
        'auteur' => $auteur,
        'image' => $image ?? 'default.jpg'
    ]);
}

function supprimerArticle($id) {
    checkAdmin();
    $pdo = getDBConnection();
    $sql = "DELETE FROM article WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => intval($id)]);
}

function getArticles() {
    $pdo = getDBConnection();
    $sql = "SELECT id, title, LEFT(content, 50) AS resume, date, author, image FROM article ORDER BY date DESC";
    return $pdo->query($sql)->fetchAll();
}

function getArticle($id) {
    $pdo = getDBConnection();
    $sql = "SELECT * FROM article WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => intval($id)]);
    return $stmt->fetch();
}

function authentifierAdmin($email, $password) {
    $pdo = getDBConnection();
    $sql = "SELECT id, nom, prenom, password FROM admin WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $admin = $stmt->fetch();

    if (!$admin) {
        return false; 
    }

    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_nom'] = $admin['nom'];
        $_SESSION['admin_prenom'] = $admin['prenom'];
        return true;
    }
    
    return false;
}

function ajouterAdmin($nom, $prenom, $email, $password) {
    $pdo = getDBConnection();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $hashedPassword
    ]);
}

function supprimerAdmin($id) {
    checkAdmin();
    $pdo = getDBConnection();
    $sql = "DELETE FROM admin WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => intval($id)]);
}

function modifierAdmin($id, $nom, $prenom, $email, $password = null) {
    $pdo = getDBConnection();
    $params = ['id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email];

    $sql = "UPDATE admin SET nom = :nom, prenom = :prenom, email = :email";
    
    if (!empty($password)) {
        $sql .= ", password = :password";
        $params['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql .= " WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute($params);
}


function getAdmins() {
    $pdo = getDBConnection();
    $sql = "SELECT id, nom, prenom, email FROM admin ORDER BY id DESC";
    return $pdo->query($sql)->fetchAll();
}

function uploadImage($file) {
    if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
        return 'default.jpg';
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file["tmp_name"]);

    if (!in_array($mimeType, $allowedTypes)) {
        die("Erreur : Type de fichier non autorisé.");
    }

    $relativePath = "uploads/";
    $targetDir = __DIR__ . "/../" . $relativePath;

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $fileName = bin2hex(random_bytes(16)) . '.' . pathinfo($file["name"], PATHINFO_EXTENSION);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return "https://alexisdev.alwaysdata.net/" . $relativePath . $fileName;
    }

    return 'default.jpg';
}

function emailExiste($email, $id = null) {
    $pdo = getDBConnection();

    if (!$pdo) {
        die("Erreur : Connexion à la base de données non disponible.");
    }

    if ($id) {
        $sql = "SELECT COUNT(*) FROM admin WHERE email = ? AND id != ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $id]);
    } else {
        $sql = "SELECT COUNT(*) FROM admin WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
    }

    return $stmt->fetchColumn() > 0;
}

?>