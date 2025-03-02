<?php
require_once "include/header.php";
?>

<main>

    <div class="container-fluid cours" style="max-width: 1600px;">

        <div class="row justify-content-center mt-5 courst">
            <div class="text-center mb-5">
                <h1 class="mb-5">Nos Cours</h1>
                <p>Chez VDEA, nous proposons des cours adaptés à tous, dès l'âge de 4 ans.  
                Danse classique, modern’ jazz, barre à terre, chaque discipline a sa propre énergie,  
                mais toutes partagent la même exigence et les mêmes valeurs.</p>
                <p><span>Tous les cours se déroulent au CREPS de Boivre.</span></p>
            </div>
        </div>

        <div class="row align-items-center mb-5 reveal">
            <div class="col-12 col-md-6">
                <h2 class="mb-5">Modern JAZZ</h2>
                <p>Le modern’ jazz est une danse qui allie travail rythmique et exigence technique, tout en laissant place à l'expression et à la liberté de mouvement.
                Connue pour son harmonie entre fluidité et dynamisme, elle mêle des éléments de danse classique et contemporaine, avec parfois des touches acrobatiques.
                Chaque cours permet de développer la coordination, la souplesse du corps et la précision des gestes et mouvements.
                Avec des enchaînements mêlant vitesse, suspensions et ancrage au sol, cette danse est à la fois puissante et expressive</p>
                <p>Jazz 1 (CE2 - CM2) → Mardi 18h00 - 19h00 / Jazz 2 (6ème - 5ème) → Vendredi 18h15 - 19h15</p> 
            </div>
            <div class="col-12 col-md-6">
                <img src="img/moderne_jazz.webp" class="img-fluid" alt="Modern JAZZ">
            </div>
        </div>

        <div class="row align-items-center mb-5 reveal">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <img src="img/classique.webp" class="img-fluid" alt="Classique">
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <h2 id="5" class="mb-5">Classique</h2>
                <p>La danse classique est une discipline qui allie rigueur, technique et grâce. Elle repose sur des bases précises, comme les pliés, les sauts et les tours, qui permettent de développer souplesse, posture et coordination.
                Les danseuses commencent par travailler sur demi-pointes avant d’évoluer vers les pointes, tandis que les garçons se concentrent sur les sauts et les pirouettes. Chaque mouvement est pensé pour s’inscrire dans la musique, apportant fluidité et harmonie à l’ensemble.
                C’est une danse exigeante, mais accessible à tous ceux qui aiment le travail précis et la recherche de perfection, dans un cadre bienveillant où chacun progresse à son rythme.</p>
                <p>Débutant (à partir de 8 ans) - Mardi 17h00 - 18h00</p>
            </div>
        </div>

        <div class="row align-items-center mt-5 mb-5 reveal">
            <div class="col-12 col-md-6">
                <h2 id="6" class="mb-5">Barre à terre</h2>
                <p>La barre à terre s’inspire des exercices d’échauffement de la danse classique, mais se pratique entièrement au sol. Cette discipline allie renforcement musculaire, stretching et travail postural, sans impact sur les articulations.
                Accessible à tous et à tout âge, elle permet de tonifier les muscles en profondeur, notamment les abdominaux, les jambes et le dos, tout en améliorant la souplesse et la posture.
                Idéale pour ceux qui souhaitent renforcer leur corps en douceur, la barre à terre est un excellent complément à la danse ou à toute autre activité physique, tout en apportant un véritable moment de bien-être.</p>
                <p>À partir de 15 ans - Vendredi 20h30 - 21h15</p>
            </div>
            <div class="col-12 col-md-6">
                <img src="img/barre_a_terre.webp" class="img-fluid" alt="Barre à terre">
            </div>
        </div>

        <div class="row align-items-center mb-5 reveal">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <img src="img/eveil-a-la-danse.webp" class="img-fluid" alt="Eveil à la danse">
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <h2 id="7" class="mb-5">Éveil à la danse</h2>
                <p>Dès 4 ans, l’éveil à la danse est une première approche ludique du mouvement.
                À travers le jeu, les enfants apprennent à prendre conscience de leur corps, de l’espace et des autres, tout en développant leur écoute musicale et leur coordination.
                Chaque séance est pensée pour stimuler leur créativité et leur motricité, tout en leur inculquant en douceur le respect, l’attention et la rigueur.
                Sans contrainte technique, ils découvrent le plaisir de bouger, d’explorer et de s’exprimer à travers la danse, dans un cadre bienveillant et adapté à leur âge.</p>
                <p>Éveil à la danse (à partir de 4 ans) - Vendredi 17h30 - 18h15</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center mb-5">
                <h2 class="mt-5 mb-3">Nos Cours</h2>
                <p>Pour toute question ou demande d’information sur nos cours, n’hésitez pas à nous contacter. Nous serons ravis de vous renseigner et de vous accompagner dans votre inscription. Remplissez simplement le formulaire ci-dessous, et nous vous répondrons dans les plus brefs délais.</p>
            </div>
        </div>
        <div class="row contact" style="flex-grow: 1;">
            <div class="col d-flex justify-content-center align-items-center">
            <form id="myForm" class="needs-validation" novalidate autocomplete="on">
                <div class="mb-3 d-flex flex-column">
                    <div class="form-group mb-5">
                    <label id="hidden_label" for="formControlInput1" class="form-label">Votre nom *</label>
                    <input type="text" class="form-control-lg w-100" id="formControlInput1" name="name" placeholder="Votre nom *" autocomplete="name" required>
                    <div class="invalid-feedback">Veuillez entrer un nom valide.</div>
                    </div>
                    <div class="form-group mb-3">
                    <label id="hidden_label" for="formControlInput2" class="form-label">Votre email *</label>
                    <input type="email" class="form-control-lg w-100" id="formControlInput2" name="email" placeholder="Votre email *" autocomplete="email" required>
                    <div class="invalid-feedback">Veuillez entrer un email valide.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label id="hidden_label" for="formControlTextarea" class="form-label">Votre message *</label>
                    <textarea class="form-control-lg w-100" id="formControlTextarea" rows="6" name="message" placeholder="Votre message *" required></textarea>
                    <div class="invalid-feedback">Veuillez entrer un message.</div>
                </div>
                <div class="form-check d-flex align-items-start">
                <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault" required>
                <label class="form-check-label mt-1" for="flexCheckDefault">
                    <span>En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre de ma demande de contact.</span>
                </label>
                </div>
                <div id="responseMessage" class="alert d-none mt-3" role="alert"></div>
                <div class="col mt-3 mb-5">
                    <button id="send" class="btn btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center mb-5 reveal">
                <h1 class="mb-5">Adhésion & Inscriptions</h1>
                <p>L’inscription à VDEA se fait pour une année complète et comprend 2 cours d’essai pour vous permettre de découvrir nos disciplines. Les tarifs s’appliquent à l’année et ne peuvent être calculés à l’unité.
                Une permanence sera organisée mi-septembre (date à venir) pour ceux qui souhaitent régler en trois fois.
                Cette facilité de paiement reste une modalité, l’adhésion étant due pour l’année complète.</p>
                <p  class="mb-5"><span>Adhésion valable du 26 août 2024 au 31 octobre 2025.</span></p>
                <a href="#" class="btn btn-primary mb-5">Réserver</a>
                <p>Chez VDEA, nous sommes fiers d’accueillir chaque adhérent avec un pack offert à chaque inscription. En rejoignant l’association, vous recevez un tote bag, une gourde et un t-shirt aux couleurs de VDEA. Afficher fièrement votre appartenance à notre association.</p>
            </div>
        </div>

        <div class="row d-flex photos_cours mb-5">
            <div class="col d-flex justify-content-center mb-5">
                <img src="img/t-shirt.webp" class="img-fluid" alt="t-shirt" style="width: 300px; height: auto;">
            </div>
            <div class="col d-flex justify-content-center mb-5">
                <img src="img/water_bottle_mockup_02 copie.webp" class="img-fluid" alt="gourde" style="width: 300px; height: auto;">
            </div>
            <div class="col d-flex justify-content-center mb-5">
                <img src="img/sac-cabas.webp" class="img-fluid" alt="sac-cabas" style="width: 300px; height: auto;">
            </div>
        </div>

    </div>

</main>

<?php
require_once "include/footer.php";
?>