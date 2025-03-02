<?php
require_once "include/header.php";
?>

<main> 

    <div class="container-fluid" style="max-width: 1600px;">

        <div class="row d-flex flex-column">
            <div class="col d-flex justify-content-center mt-5">
            <h1 class="mt-5 text-center">Contactez-nous!</h1>
            </div>
            <div class="col d-flex justify-content-center mt-3">
            <p>Une question sur nos cours, les inscriptions, nos spectacles ou autres ?
            Nous sommes à votre écoute !</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card w-100" style="text-align: center; border-radius: 0;">
                <div class="card-body">
                    <span class="card-title"><img class="mb-3" src="img/location-dot-solid.svg" alt="" style="width: 3Opx; height: auto;"></span>
                    <h3 class="card-title">Ou nous retrouver ?</h3>
                    <p class="card-text">Tous nos cours se déroulent au CREPS de Boivre à Vouneuil sous Biard.</p>
                </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card w-100" style="text-align: center; border-radius: 0;">
                <div class="card-body">
                    <span class="card-title"><img class="mb-3" src="img/map-solid.svg" alt="" style="width: 3Opx; height: auto;"></span>
                    <h3 class="card-title">Adresse</h3>
                    <p class="card-text">12 rue Tamaris</p>
                    <p class="card-text">86580 Vouneuil sous Biard</p>
                </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card w-100" style="text-align: center; border-radius: 0;">
                <div class="card-body">
                    <span class="card-title"><img class="mb-3" src="img/phone-solid.svg" alt="" style="width: 3Opx; height: auto;"></span>
                    <h3 class="card-title">Telephone</h3>
                    <p class="card-text">+33 60 00 00 00</p>
                </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card w-100" style="text-align: center; border-radius: 0;">
                <div class="card-body">
                    <span class="card-title"><img class="mb-3" src="img/envelope-solid.svg" alt="" style="width: 3Opx; height: auto;"></span>
                    <h3 class="card-title">E-mail</h3>
                    <p class="card-text">alexisleveque.dev@icloud.com</p>
                    <p class="card-text">86580 Vouneuil sous Biard</p>
                </div>
                </div>
            </div>
        </div>

        <div clas="row">
            <div class="col d-flex justify-content-center mt-5">
            <h2>Contact</h2>
            </div>
        </div>
        <div class="row contact" style="flex-grow: 1;">
            <div class="col d-flex justify-content-center align-items-center">
            <form id="myForm" class="needs-validation" novalidate autocomplete="on">
                <div class="mb-3 d-flex flex-column">
                    <div class="form-group mb-3">
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

        <div class="row d-flex">
            <div class="col d-flex justify-content-center">
                <h2 class="mb-5 mt-5">Suivez nous sur nos réseaux sociaux</h2>
            </div>
        </div>
        <div class="row d-flex reseaux mb-5">
            <div class="col d-flex justify-content-center mb-5 reveal">
                <img src="img/facebook.webp" class="img-fluid" alt="image facebook" style="width: 400px; height: auto;">
            </div>
            <div class="col d-flex justify-content-center mb-5 reveal">
                <img src="img/insta.webp" class="img-fluid" alt="image instagram" style="width: 400px; height: auto;">
            </div>
            <div class="col d-flex justify-content-center mb-5 reveal">
                <img src="img/tiktock.webp" class="img-fluid" alt="image tiktok" style="width: 400px; height: auto;">
            </div>
        </div>

    </div>

</main>

<?php
require_once "include/footer.php";
?>