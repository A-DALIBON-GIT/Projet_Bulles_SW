document.addEventListener('DOMContentLoaded', function() {
    const compteurElement = document.getElementById('compteur');
    let compteur = parseInt(compteurElement.textContent);
    const params = new URLSearchParams(window.location.search);
    const categorie = params.get('catégorie');
    const difficulte = params.get('difficulté');
    let redirectionUrl = "logique_questions.php";

    if (categorie) {
        redirectionUrl += `?catégorie=${encodeURIComponent(categorie)}`;
    }
    if (difficulte) {
        redirectionUrl += `${categorie ? '&' : '?'}difficulté=${encodeURIComponent(difficulte)}`;
    }

    if (!categorie || !difficulte) {
        console.error("Erreur : Catégorie ou difficulté manquante dans l'URL de compte_a_rebours.php");
        return;
    }

    const intervalId = setInterval(function() {
        compteur--;
        compteurElement.textContent = compteur;

        if (compteur <= 0) {
            clearInterval(intervalId);
            window.location.href = redirectionUrl;
        }
    }, 1000);
});