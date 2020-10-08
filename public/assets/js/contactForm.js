// Décompte  caractères
// On selectionne l'element textarea et l'élement p#counterBlock
let textarea = document.querySelector('#messageContact');
let blockCount = document.getElementById('counterBlock');

function count() {
    // la fonction count calcule la longueur de la chaîne de caractère contenue dans le textarea
    let count = 2000-textarea.value.length;
    // et affche cette valeur dans la balise p#counterBlock grâce à innerHTML
    blockCount.innerHTML = count;

    // si le count descend sous 0 on ajoute la class red à la balise p#counterBlock
    if(count<0) {
        blockCount.classList.add("red");
    }
    else if(count>=0) {
        blockCount.classList.remove("red");
    }
    else{}
}

// on pose un écouteur d'évènement keyup sur le textarea.
// On déclenche la fonction count quand l'évènement se produit et au chargement de la page
textarea.addEventListener('keyup', count);
count();