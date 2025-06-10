<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la difficulté</title>
    <link rel="stylesheet" href="styles/style_difficultes.css">
    <link rel="icon" href="images/logo_BDSW.png" type="image/png">
</head>
<body>
    <img src="images/logo_BDSW.png" alt="Logo Bulles de Star Wars" title="Logo Bulles de Star Wars" class="logo_BDSW">
    <div class="contour">
        <h1>
            DIFFICULTE
        </h1>
        <table>
            <tr>
                <td>
                    <img src="images/sabre_vert.png" alt="Sabre Laser Vert" title="Sabre Laser Vert" class="lightsaber">
                    <a href="compte_a_rebours.php?catégorie=<?php echo urlencode($_GET['catégorie'] ?? ''); ?>&difficulté=Facile">
                        Facile
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/sabre_bleu.png" alt="Sabre Laser Bleu" title="Sabre Laser Bleu" class="lightsaber">
                    <a href="compte_a_rebours.php?catégorie=<?php echo urlencode($_GET['catégorie'] ?? ''); ?>&difficulté=Moyen">
                        Moyen
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/sabre_violet.png" alt="Sabre Laser Violet" title="Sabre Laser Violet" class="lightsaber">
                    <a href="compte_a_rebours.php?catégorie=<?php echo urlencode($_GET['catégorie'] ?? ''); ?>&difficulté=Difficile" class="violet">
                        Difficile
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/sabre_rouge.png" alt="Sabre Laser Rouge" title="Sabre Laser Rouge" class="lightsaber">
                    <a href="compte_a_rebours.php?catégorie=<?php echo urlencode($_GET['catégorie'] ?? ''); ?>&difficulté=Expert">
                        Expert
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <img src="images/fond_star_wars.png" alt="Fond du site" title="Fond du site" class="fond">
</body>
</html>