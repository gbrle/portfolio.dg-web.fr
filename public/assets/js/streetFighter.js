// STREET FIGHTER TRIP
let buttonGuideStreetFighter = document.getElementById('buttonGuideStreetFighter')
let intro = document.getElementById('introDgFighter')
// Pour l'animation de destruction
let content = document.getElementById('content')

let fighterFixe = document.getElementById('fighterFixe');
let fighterMoquerie = document.getElementById('fighterMoquerie');
let fighterTaperGentillement = document.getElementById('fighterTaperGentillement');
let fighterRafale = document.getElementById('fighterRafale');
let fighterDetruire = document.getElementById('fighterDetruire');
// Execution count Div
let executionCountDiv = document.getElementById('executionCount')
// Execution count Nb
let executionCountNb = document.getElementById('executionCountNb')




document.addEventListener('keydown', (event) => {
    if('Delete' === event.key){
        // Lancement de l'intro
        intro.classList.add('startIntro')
        intro.classList.remove('d-none')

        setTimeout(function(){
            intro.classList.remove('startIntro')
            intro.classList.add('d-none')
            // Apparition bouton Guide
            buttonGuideStreetFighter.classList.remove('d-none')

        }, 4000);
        // Suppression de l'apparition pour la suite
        fighterFixe.classList.remove('d-none')
        fighterFixe.classList.remove('apparition')



        /* ACTION DU FIGHTER */
        document.addEventListener('keydown', (event) => {
            // TOUCHE préssée
            const touche = event.key;

            // RECUPERATION DE L'EMPLACEMENT DU FIGHTER
            let posFighter = fighterFixe.offsetLeft;



            // ----------------------------------->
            // DEPLACEMENTS
            // ----------------------------------->

            // DEPLACEMENT DROITE
            if (touche === 'd') {
                fighterFixe.style.left = (posFighter + 15) + 'px'
                // Mise a jour de l'amplacemet du fighter
                posFighter += 15
            }
            // DEPLACEMENT GAUCHE
            if (touche === 'q') {
                fighterFixe.style.left = (posFighter - 15) + 'px'
                // Mise a jour de l'amplacemet du fighter
                posFighter -= 15
            }
            // SAUT
            if (touche === ' ') {
                fighterFixe.classList.add('d-none')
                fighterFixe.classList.add('saut')
                fighterFixe.classList.remove('d-none')
                setTimeout(function(){
                    fighterFixe.classList.remove('saut')
                }, 1000)

            }



            // ----------------------------------->
            // ACTIONS
            // ----------------------------------->

            // MOQUERIE
            if (touche === 't') {
                fighterFixe.classList.add('d-none')
                fighterMoquerie.style.left = posFighter + 'px'
                fighterMoquerie.classList.remove('d-none')
                setTimeout(function(){
                    fighterMoquerie.classList.add('d-none')
                    fighterFixe.classList.remove('d-none')
                }, 2000)
            }

            // TAPER GENTILLEMENT
            if (touche === 'r') {
                fighterFixe.classList.add('d-none')
                fighterTaperGentillement.style.left = posFighter + 'px'
                fighterTaperGentillement.classList.remove('d-none')
                setTimeout(function(){
                    fighterTaperGentillement.classList.add('d-none')
                    fighterFixe.classList.remove('d-none')
                }, 2000)
            }

            // TAPER RAFALE
            if (touche === 'e') {
                fighterFixe.classList.add('d-none')
                fighterRafale.style.left = posFighter + 'px'
                fighterRafale.classList.remove('d-none')
                setTimeout(function(){
                    fighterRafale.classList.add('d-none')
                    fighterFixe.classList.remove('d-none')
                }, 2000)
            }

            // TAPER DETRUIRE
            if (touche === 'c') {
                ajaxPost('/destruction_of_site', 'empty', function (nBexeecution){
                    executionCountNb.innerText = nBexeecution
                    executionCountDiv.classList.remove('d-none')
                })
                fighterFixe.classList.add('d-none')
                fighterDetruire.style.left = (posFighter-541) + 'px'
                fighterDetruire.classList.remove('d-none')
                content.classList.add('startDestruction')
                setTimeout(function(){
                    // Je redirige vers la page 404
                    location.replace("/wow")
                }, 10000)
            }
        })
    }
})

