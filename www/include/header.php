<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/bootstrap.min.css" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
        <link rel="icon" type="img/png/" href="img/favicon.png">
        <title>
            <?php
            $url=$_SERVER['PHP_SELF'];
            if (strstr($url,"index.php")){
            echo "Accueil";
            }
            if (strstr($url,"association.php")){
            echo "Association";
            }
            if (strstr($url,"cours.php")){
            echo "Nos cours";
            }
            if (strstr($url,"spectacle.php")){
                echo "Spectacle";
            }
            if (strstr($url,"actualites.php")){
                echo "Actualités";
            }
            if (strstr($url,"partenaires.php")){
                echo "Partenaires";
            }
            if (strstr($url,"contact.php")){
                echo "Contact";
            }
            ?>
        </title>
    </head>
    <body>
        <header>

            <nav id="navbar" class="navbar navbar-expand-lg navbar-custom bg-body-tertiary">

                <div class="container-fluid d-flex justify-content-center" style="max-width: 1600px;">

                    <a class="navbar-brand" href="index.php"><img src="img/logo.webp" alt="Logo VDEA" style="height: 125px; width: auto;"></a>
                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="association.php">Association</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="cours.php">Cours</a>
                            </li>
                            <a class="nav-link" href="spectacle.php">Spectacle</a>
                            </li>
                            <a class="nav-link" href="actualites.php">Actualités</a>
                            </li>
                            <a class="nav-link" href="partenaires.php">Partenaires</a>
                            </li>
                            <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://www.facebook.com/vouneuildansexpressionartistique?locale=fr" target="_blank">
                                <img src="img/facebook-f-brands.svg" alt="Facebook">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://www.instagram.com/vouneuil_danse_vdea/" target="_blank">
                                <img src="img/instagram-brands.svg" alt="Instagram">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <img src="img/tiktok-brands.svg" alt="Tiktok">
                            </a>
                        </li>  
                    </ul>

                </div>

            </nav>

        </header>