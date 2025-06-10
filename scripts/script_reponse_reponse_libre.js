document.addEventListener('DOMContentLoaded', function() {
    const afficherReponse = document.querySelector('.reponse');
    const questionIntitule = document.querySelector('h2:not(.reponse)');
    const contourDiv = document.querySelector('.contour');
    let changerTexteBouton = false;

    const cadre = document.createElement('div');
    cadre.classList.add('cadre_interieur');
    contourDiv.insertBefore(cadre, afficherReponse);

    const communiquerEntreScripts = new BroadcastChannel('messageScripts');

    function afficherBonneReponse() {
        if (!changerTexteBouton) {
            cadre.textContent = bonneReponsePHP; // Afficher la bonne réponse récupérée de PHP
            cadre.classList.add('afficher_cadre_interieur');

            // Changer le texte du bouton en "Question suivante" ou en "Terminer le quiz"
            if (derniereQuestionPHP) {
                afficherReponse.textContent = 'Terminer le quiz';
            } else {
                afficherReponse.textContent = 'Question suivante';
            }
            changerTexteBouton = true;
            // Indiquer en session que la réponse a été affichée
            fetch('set_reponse_affichee.php');
        } else {
            // Passer à la question suivante en rechargeant la page
            window.location.href = window.location.pathname;
        }
    };

    afficherReponse.addEventListener('click', afficherBonneReponse);

    communiquerEntreScripts.onmessage = (event) => {
        if (event.data && event.data.type === 'fin_du_timer') {
            console.log('Message recu via BroadcastChannel.');
            afficherBonneReponse();
        }
    }
});