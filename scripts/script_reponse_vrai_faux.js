document.addEventListener('DOMContentLoaded', function() {
    const afficherReponse = document.querySelector('.reponse');
    const cellulesTableau = document.querySelectorAll('table td');
    let changerTexteBouton = false;

    const communiquerEntreScripts = new BroadcastChannel('messageScripts');

    function afficherBonneReponse() {
        if (!changerTexteBouton) {
            cellulesTableau.forEach(cellule => {
                const choix = cellule.dataset.reponse;
                if (choix !== bonneReponsePHP) {
                    cellule.style.display = 'none';
                } else {
                    // Optionnel : centrer la bonne réponse
                    cellule.style.textAlign = 'center';
                    cellule.style.width = '50%';
                }
            });

            // Changer le texte du bouton en "Question suivante" ou en "Terminer le quiz"
            if (derniereQuestionPHP) {
                afficherReponse.textContent = 'Terminer le quiz';
            } else {
                afficherReponse.textContent = 'Question suivante';
            }
            changerTexteBouton = true;
        } else {
            // Rediriger vers la prochaine question
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