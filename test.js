let envoi = document.getElementById('btn-envoi');

envoi.addEventListener('click', testDonnees);

function testDonnees(e){
    /*Si (if...) les données ne remplissent pas certaines conditions, renvoie un
    message et empêche l'action par défaut du clic = l'envoie du formulaire*/
    alert('Envoi du formulaire bloqué');
    e.preventDefault();
}
