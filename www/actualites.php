<?php
require_once "include/header.php";
require_once "config/data.php";
$articles = getArticles();
?>

<main>

    <div class="container-fluid" style="max-width: 1600px;">

        <div class="row mt-5 news">
            <div class="col text-center">
                <h1 class="mt-5 mb-3">Suivez le rythme de notre actualité !</h1>
                <p>Plongez dans l'univers de notre association et ne manquez aucun temps fort !</p>
            </div>
        </div>
        <div class="row justify-content-center gx-2 gy-3 mt-5 mb-5">
            <?php foreach ($articles as $article): ?>
            <div class="col-md-3 d-flex justify-content-center mb-5 reveal">
                <div class="card card-custom" style="width: 18rem;">
                    <?php if (!empty($article['image'])): ?>
                        <img src="<?= htmlspecialchars($article['image']); ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($article['title']); ?>">
                    <?php else: ?>
                        <p class="text-center">Pas d'image</p>
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($article['title']); ?></h5>
                        <p class="card-text"><?= htmlspecialchars($article['resume']); ?></p>
                        <p class="card-text"><small>Publié le : <?= htmlspecialchars(date("d/m/Y", strtotime($article['date']))); ?></small></p>
                        <p class="card-text"><small><?= htmlspecialchars($article['author']); ?></small></p>
                        <a href="item.php?id=<?= $article['id']; ?>" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            </div>  
            <?php endforeach; ?>
        </div>
        
    </div>

</main>

<?php
require_once "include/footer.php";
?>