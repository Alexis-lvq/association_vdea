<?php
require_once "include/header.php";
require_once "config/data.php";
$articles = getArticles();
$pdo = getDBConnection();
?>

<main>

    <div class="background">
        <h1 class="reveal">Danse avec VDEA</h1>
        <h4 class="reveal">Vouneuil Danse et Expression Artistique</h4>
    </div>

    <div class="container-fluid d-flex justify-content-center" style="max-width: 1600px;">

    <div class="cours d-flex flex-column align-items-center justify-content-center text-center w-100" style="min-height: 100vh;">
    <div class="row w-100">
        <div class="col">
            <h2 class="mb-5 mt-5">Nos cours</h2>
            <p class="mb-5">Chez VDEA, nous proposons des cours adaptés à tous, dès l'âge de 4 ans.
            Danse classique, modern’ jazz, barre à terre, chaque discipline a sa propre énergie, mais toutes partagent la même exigence et les mêmes valeurs.</p>
            <a href="cours.php" class="btn btn-primary mb-3 me-3">Cours</a>
            <a href="cours.php" class="btn btn-reserver mb-3 ms-3">Tarifs</a>
        </div>
    </div> 

    <?php
    $stmt = $pdo->prepare("SELECT * FROM cours ORDER BY id DESC LIMIT 3");
    $stmt->execute();
    $cours = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="row d-flex justify-content-center align-items-center mt-5 w-100">
        <?php foreach ($cours as $cour): ?>
        <div class="col-md-4 d-flex justify-content-center mb-4">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                    <img src="<?= htmlspecialchars($cour['image']) ?>" class="card-img-top img-fluid" alt="Image du cours">
                    <h3 class="card-title mt-3"><?= htmlspecialchars($cour['titre']) ?></h3>
                    </div>
                    <div class="flip-card-back d-flex">
                    <h3><?= html_entity_decode($cour['titre']) ?></h3>
                    <p class="card-text"><?= html_entity_decode($cour['description']) ?></p>
                    <a onclick="window.location.href='cours.php#<?php echo $cour['id'] ?>';" class="btn btn-secondary">Lire plus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    

    <div class="row association justify-content-center mt-5">
        <div class="row d-flex justify-content-center align-items-center reveal">
            <div class="col-sm-12 col-lg-6">
                <h2 class="mb-5 text-center">L'association</h2>
                <p class="text-center">Depuis plus de 20 ans, VDEA est un lieu où la danse devient un véritable moyen d’expression et d’épanouissement. Ici, chacun grandit à son rythme, porté par la rigueur, la bienveillance et le plaisir du mouvement.
                Dès le plus jeune âge, l’apprentissage passe par le jeu, puis évolue vers un travail collectif où l’on apprend à se dépasser et à transmettre des émotions.</p>
            </div>
            <div class="col-sm-12 col-lg-6">
                    <img src="img/main.webp" class="img-fluid" alt="image association">
            </div>
        </div> 
    </div>

    <div class="row spectacle mt-5">
        <div class="fluid d-flex justify-content-center" style="max-width: 1600px;">
            <div class="row justify-content-center align-items-center reveal">
            <div class="col-sm-12 col-lg-6 order-2 order-lg-1">
                <img src="img/tristesse.webp" class="img-fluid" alt="image spectacle">
            </div>
            <div class="col-sm-12 col-lg-6 text-center order-1 order-lg-2">
                <h2 class="mb-5">Nos spectacles</h2>
                <p class="mb-5">Chaque année, VDEA imagine un spectacle unique, mêlant danse, narration et émotion. À travers des mises en scène soignées et des chorégraphies travaillées, nos danseurs offrent des représentations où rigueur et créativité s’unissent pour transporter le public.</p>
                <a href="spectacle.php" class="btn btn-primary mb-5 mb-lg-3 me-lg-3">Découvrir</a>
                <a href="spectacle.php" class="btn btn-reserver mb-5 mb-lg-3 me-lg-3">Réserver</a>
            </div>
            </div>
        </div>
    </div>

        
    <div class="actu">
        <div class="col text-center mt-5">
        <h2 class="mb-5">Actualités</h2>
        <p class="mb-5">Retrouvez dans cette rubrique toute l’actualité de VDEA : événements, spectacles, inscriptions et moments forts de l’année. Restez informés des dernières nouveautés et plongez dans les coulisses de notre association.</p>
        </div>
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <?php foreach (array_slice($articles, 0, 3) as $article): ?>
        <div class="col d-flex justify-content-center mb-5">
            <div class="card card-custom" style="width: 18rem;">
            <?php if (!empty($article['image'])): ?>
                <img src="<?= htmlspecialchars($article['image']); ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($article['title']); ?>">
            <?php else: ?>
                Pas d'image
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($article['title']); ?></h5>
                <p class="card-text"><?= htmlspecialchars($article['resume']); ?></p>
                <p class="card-text"><?= "Publié le : " . htmlspecialchars(date("d/m/Y", strtotime($article['date']))); ?></p>
                <p class="card-text"><?= htmlspecialchars($article['author']); ?></p>
                <a href="item.php?id=<?= $article['id']; ?>" class="btn btn-primary">Lire plus</a>
            </div>
            </div>
        </div>  
        <?php endforeach; ?>
    </div>

    <div class="partenaires mt-0 pt-0">
        <div class="col text-center mt-5">
            <h2 class="mb-5">Nos partenaires</h2>
        <div class="logos">
        <div class="logo_items">
            <img src="img/logo_isfac.webp" class="img-fluid">
            <img src="img/logo_creps.webp" class="img-fluid">
            <img src="img/logo_poitiers.webp" class="img-fluid">
            <img src="img/logo_vouneuil.webp" class="img-fluid">
        </div>
        <div class="logo_items">
            <img src="img/logo_isfac.webp" class="img-fluid">
            <img src="img/logo_creps.webp" class="img-fluid">
            <img src="img/logo_poitiers.webp" class="img-fluid">
            <img src="img/logo_vouneuil.webp" class="img-fluid"> 
        </div>             
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Projet numérique pour VDEA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ce site web fictif, ainsi que l'ensemble de la stratégie de communication qui l'accompagne, ont été développés dans le cadre d'un challenge en équipe à l'ISFAC de Poitiers, du 19 au 21 février 2025. Nous étions un groupe de participants issus de différentes spécialités, ce qui nous a permis de collaborer pour créer un projet global, combinant création digitale, stratégie de communication et expérience utilisateur.</p>
                <p>Un grand merci à Enora, Chloé, Océane, Pauline, Marine, Margaux, Lola, Justine, Dorian, Enzo, Matteo et Eliott pour leur implication et leur travail collectif dans la réalisation de ce projet.</p>
                <p>Nous tenons également à remercier les organisateurs, les formateurs, les membres de l'association VDEA, ainsi que l'ISFAC pour avoir rendu cette expérience possible et pour leur soutien tout au long du projet.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
        </div>
    </div>

</main>

<?php
require_once "include/footer.php";
?>