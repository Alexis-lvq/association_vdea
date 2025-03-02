<?php
require_once "include/header.php";
require_once "config/data.php";
$id = intval($_GET['id']);
$article = getArticle($id);
?>

<main>

    <div class="container-fluid" style="max-width: 1600px;">

        <div class="row mt-5">
            <div class="col text-center">
                <h2 class="mt-5 mb-5"><?= htmlspecialchars($article['title']); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mb-5">
                <?php if (!empty($article['image'])): ?>
                    <img src="<?= htmlspecialchars($article['image']); ?>" class="card-img-top img-fluid" style="height: 500px; object-fit: cover;" alt="Image">
                <?php else: ?>
                    <p>Pas d'image</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col mb-5">
                <p class="card-text"><?= nl2br(htmlspecialchars($article['content'])); ?></p>
            </div>
        </div>


        <div class="row d-flex justify-content-center mb-5">
            <div class="col-12 mb-3 col-md-3 d-flex justify-content-center">
                <p class="card-text"><?= "publié le : " . htmlspecialchars(date("d/m/Y", strtotime($article['date']))); ?></p>
            </div>
            <div class="col-12 mb-3 col-md-3 d-flex justify-content-center">
                <p class="card-text"><?= "par : " . htmlspecialchars($article['author']); ?></p>
            </div>
            <div class="col-12 mb-3 col-md-3 d-flex justify-content-center">
                <a href="actualites.php" class="btn btn-primary">Retour</a>
            </div>
        </div>

    </div>

</main>

<?php
require_once "include/footer.php";
?>
