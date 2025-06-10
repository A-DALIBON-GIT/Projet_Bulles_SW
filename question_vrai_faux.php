<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrai ou Faux ?</title>
    <link rel="stylesheet" href="styles/style_question_vrai_faux.css">
    <link rel="icon" href="images/logo_BDSW.png" type="image/png">
</head>
<body>
    <img src="images/logo_BDSW.png" alt="Logo Bulles de Star Wars" title="Logo Bulles de Star Wars" class="logo_BDSW">
    <div class="contour">
        <h1>
            Vrai ou Faux ?
        </h1>
        <h2>
            <?php echo htmlspecialchars($questionActuelle["intitulé"] ?? ''); ?>
        </h2>
        <table>
            <tr>
                <td class="choix_un" data-reponse="VRAI">
                    <?php echo htmlspecialchars($questionActuelle["reponse_1"] ?? 'VRAI'); ?>
                </td>
                <td class="choix_deux" data-reponse="FAUX">
                    <?php echo htmlspecialchars($questionActuelle["reponse_2"] ?? 'FAUX'); ?>
                </td>
            </tr>
        </table>
        <div class="timer">
            <div class="barre"></div>
        </div>
        <h2 class="reponse">
            Afficher la réponse
        </h2>
    </div>
    <img src="images/fond_star_wars.png" alt="Fond du site" title="Fond du site" class="fond">
    <script>
        const bonneReponsePHP = <?php echo json_encode(htmlspecialchars($questionActuelle["bonne_reponse"] ?? '')); ?>;
        const nombreTotalQuestions = <?php echo count($_SESSION['questions']); ?>;
        const questionIndexActuel = <?php echo $_SESSION['question_index'] + 1; ?>;
        const derniereQuestionPHP = <?php echo json_encode($derniereQuestionPHP); ?>;
    </script>
    <script src="scripts/script_timer.js"></script>
    <script src="scripts/script_reponse_vrai_faux.js"></script>
</body>
</html>