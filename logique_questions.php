<?php
session_start();

// Paramètres de connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'quiz_bulles_de_star_wars';

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer la catégorie et la difficulté depuis l'URL et les stocker en session
if (!isset($_SESSION['catégorie']) && isset($_GET['catégorie'])) {
    $_SESSION['catégorie'] = $_GET['catégorie'];
}
if (!isset($_SESSION['difficulté']) && isset($_GET['difficulté'])) {
    $_SESSION['difficulté'] = $_GET['difficulté'];
}

// Vérification que la catégorie et la difficulté sont bien présentes
if (!isset($_SESSION['catégorie']) || !isset($_SESSION['difficulté'])) {
    echo "Erreur : Catégorie ou difficulté manquante. Veuillez revenir à la page de sélection.";
    exit(); // Arrêt du script
}

$categorie = $_SESSION['catégorie'];
$difficulte = $_SESSION['difficulté'];

// Sélectionner les questions si elles ne sont pas déjà en session
if (!isset($_SESSION['questions'])) {
    $sql = "SELECT id, intitulé, reponse_1, reponse_2, reponse_3, reponse_4, bonne_reponse, type
            FROM questions
            WHERE catégorie = ? AND difficulté = ?
            ORDER BY RAND()
            LIMIT 5";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }
    $stmt->bind_param("ss", $categorie, $difficulte);
    $stmt->execute();
    if (!$stmt->execute()) {
        die("Erreur d'exécution de la requête : " . $stmt->error);
    }
    $result = $stmt->get_result();
    if (!$result) {
        die("Erreur de récupération du résultat : " . $stmt->error);
    }
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['questions'] = $questions;
    $_SESSION['question_index'] = 0;
    $_SESSION['questions_posees_id'] = [];
}

// Incrémenter l'index après avoir affiché la réponse de la question précédente
if (isset($_SESSION['reponse_affichee']) && $_SESSION['reponse_affichee'] === true) {
    $_SESSION['question_index']++;
    unset($_SESSION['reponse_affichee']); // Réinitialiser 'réponse affichée'
}

// Récupérer l'index de la question actuelle
$questionIndex = $_SESSION['question_index'] ?? 0;

// Vérifier si l'index est valide
if ($questionIndex >= count($_SESSION['questions'])) {
    // Rediriger vers la page de fin de quiz lorsque toutes les questions sont passées
    header("Location: ecran_remerciement.php");
    exit();
}

// Récupérer la question actuelle
$questionActuelle = $_SESSION['questions'][$questionIndex] ?? null;

if ($questionActuelle === null) {
    echo "Erreur : La question actuelle n'existe pas ou l'index est hors limites.";
    exit();
}

$typeQuestion = $questionActuelle['type'] ?? 'QCM'; // Valeur par défaut si le type est absent.

// Vérifier si la question actuelle a déjà été posée
if (isset($_SESSION['questions_posees_id']) && in_array($questionActuelle['id'], $_SESSION['questions_posees_id'])) {
    // La question a déjà été posée, passer à la suivante
    $_SESSION['question_index']++;
    header("Location: " . $_SERVER['PHP_SELF']); // Rafraîchir la page pour charger la nouvelle question
    exit();
}

// Ajouter l'ID de la question actuelle au tableau des questions posées
$_SESSION['questions_posees_id'][] = $questionActuelle['id'];

// Déterminer si c'est la dernière question
$derniereQuestionPHP = ($questionIndex == count($_SESSION['questions']) - 1);

// Fermer la connexion à la base de données car elle n'est plus nécessaire pour l'affichage des questions
$conn->close();

switch ($typeQuestion) {
    case 'QCM':
        include 'question_qcm.php';
        break;
    case 'Vrai ou Faux':
        include 'question_vrai_faux.php';
        break;
    case 'Réponse Libre':
        include 'question_reponse_libre.php';
        break;
    default:
        echo "Type de question inconnu. Veuillez contacter l'administrateur.";
        exit();
}
?>