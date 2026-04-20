import './scss/main.scss';

// Importation automatique de TOUTES les images d'un coup
import.meta.glob('./images/**/*.{png,jpg,jpeg,svg,webp}', { eager: true });

/*MENU*/
const openNav = document.getElementById('navTrigger');
openNav.addEventListener("click", function (event) {
    console.log('ok');
    const rido = document.getElementById('myNav');
    rido.classList.toggle('curtain');
});

const closeNav = document.getElementById('navClose');
closeNav.addEventListener("click", function (event) {
//console.log('ok');
const rido = document.getElementById('myNav');
    rido.classList.toggle('curtain');
});


/*PRODUIT - FILTRE*/
// 1. Sélectionner tous les éléments (ex: boutons avec la classe .mon-bouton)
const boutons = document.querySelectorAll('.dropbtn');
// 2. Parcourir la liste et ajouter l'écouteur
boutons.forEach((bouton) => {
    // console.log(bouton);
    bouton.addEventListener("click", function (event) {

        console.log('Bouton cliqué !', event.target);

        const filtre = bouton.nextElementSibling;
        filtre.classList.toggle('show');
        
    });
});