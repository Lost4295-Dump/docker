// On utilise querySelector Pour selectionner le composant dont on va changer le contenu et le bouton qui activera ce changement
const div = document.querySelector("#data-to-replace");
const button = document.querySelectorAll("button");
const check = document.querySelector("#check");

// On crée une fonction qui va permettre la mise à jour de notre element de la DOM
function fetchContent(i) {
    // On fait la requête vers l'API:
    // Protocole: http
    // hostname: localhost (alias 'api' de docker-compose inaccessible depuis le client)
    // port: 8081 (Exposé pour l'API)
    // chemin: index.php/hello (Pour n'avoir que "hello", il faut utiliser le rewrite engine de Apache)
    let url;
    let urltabs = [
        "http://localhost:8081/index.php/hello",
        "http://localhost:8081/index.php/world",
        "http://localhost:8081/index.php/friend",
        "http://localhost:8081/index.php/catto",
        "http://localhost:8081/index.php/doggo"
    ]
    if (check.checked) {
        url = urltabs[i] + "?familiar=true"
    } else {
        url = urltabs[i]
    }
    if (url != undefined) {
        fetch(url)
            .then((res) => {
                // Parser le retour de la requête en JSON
                res.json().then((content) => {
                    // Afficher le contenu du retour de la requête
                    div.innerHTML = content.message;
                });
            })
            // Afficher l'erreur s'il y en a une
            .catch((err) => console.log(err));
    }
}

// Mettre la fonction sur le bouton pour le faire lancer l'appel API
//Savoir quel bouton est cliqué

button.forEach(function (element, index) {
    element.addEventListener('click', function () { fetchContent(index) });
});
