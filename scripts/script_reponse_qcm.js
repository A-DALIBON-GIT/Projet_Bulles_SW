document.addEventListener('DOMContentLoaded', function() {
    const afficherReponse = document.querySelector('.reponse');
    const cellulesTableau = document.querySelectorAll('table td');
    let changerTexteBouton = false;

    const communiquerEntreScripts = new BroadcastChannel('messageScripts');

    function afficherBonneReponse() {
        if (!changerTexteBouton) {
            // Cacher les mauvaises réponses, garder les bonnes visibles
            cellulesTableau.forEach(cellule => {
                const choix = cellule.dataset.reponse;
                let estBonneReponse = false;
                bonneReponsePHP.forEach(bonneReponse => {
                    if (choix === bonneReponse) {
                        estBonneReponse = true;
                    }
                });
                if (!estBonneReponse) {
                    cellule.style.visibility = 'hidden';
                }
            });
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