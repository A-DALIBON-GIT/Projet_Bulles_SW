<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecran de remerciement</title>
    <link rel="stylesheet" href="styles/style_index_et _remerciement.css">
    <link rel="icon" href="images/logo_BDSW.png" type="image/png">
</head>
<body>
    <?php
        session_start();

        // Réinitialiser le quiz
        unset($_SESSION['catégorie']);
        unset($_SESSION['difficulté']);
        unset($_SESSION['questions']);
        unset($_SESSION['question_index']);
        unset($_SESSION['questions_posees_id']);
        unset($_SESSION['reponse_affichee']);
    ?>
    <img src="images/logo_BDSW.png" alt="Logo Bulles de Star Wars" title="Logo Bulles de Star Wars" class="logo_BDSW">
    <div class="contour">
        <h1>
            Merci<br>
            d'avoir<br>
            joué !
        </h1>
        <h2>
            <a href="index.html">
                Retour à l'accueil
            </a>
        </h2>
    </div>
    <img src="images/fond_star_wars.png" alt="Fond du site" title="Fond du site" class="fond">
</body>
</html>