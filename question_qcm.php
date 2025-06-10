<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM</title>
    <link rel="stylesheet" href="styles/style_question_qcm.css">
    <link rel="icon" href="images/logo_BDSW.png" type="image/png">
</head>
<body>
    <img src="images/logo_BDSW.png" alt="Logo Bulles de Star Wars" title="Logo Bulles de Star Wars" class="logo_BDSW">
    <div class="contour">
        <h1>
            Question à Choix Multiples
        </h1>
        <h2>
            <?php echo htmlspecialchars($questionActuelle["intitulé"] ?? ''); ?>
        </h2>
        <table>
            <tr>
                <td class="choix_un" data-reponse="<?php echo htmlspecialchars($questionActuelle["reponse_1"] ?? ''); ?>">
                    <?php echo htmlspecialchars($questionActuelle["reponse_1"] ?? ''); ?>
                </td>
                <td class="choix_deux" data-reponse="<?php echo htmlspecialchars($questionActuelle["reponse_2"] ?? ''); ?>">
                    <?php echo htmlspecialchars($questionActuelle["reponse_2"] ?? ''); ?>
                </td>
            </tr>
            <tr>
                <td class="choix_trois" data-reponse="<?php echo htmlspecialchars($questionActuelle["reponse_3"] ?? ''); ?>">
                    <?php echo htmlspecialchars($questionActuelle["reponse_3"] ?? ''); ?>
                </td>
                <td class="choix_quatre" data-reponse="<?php echo htmlspecialchars($questionActuelle["reponse_4"] ?? ''); ?>">
                    <?php echo htmlspecialchars($questionActuelle["reponse_4"] ?? ''); ?>
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
        const bonneReponseString = <?php echo json_encode($questionActuelle["bonne_reponse"] ?? ''); ?>;
        const bonneReponsePHP = bonneReponseString.split(',').map(item => item.trim());
        const nombreTotalQuestions = <?php echo count($_SESSION['questions']); ?>;
        const questionIndexActuel = <?php echo $_SESSION['question_index'] + 1; ?>;
        const derniereQuestionPHP = <?php echo json_encode($derniereQuestionPHP); ?>;
    </script>
    <script src="scripts/script_timer.js"></script>
    <script src="scripts/script_reponse_qcm.js"></script>
</body>
</html>