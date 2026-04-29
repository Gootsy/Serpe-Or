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

/*CAROUSEL*/
const slide = document.querySelector(".slide-img");
const slideContainer = document.querySelector(".controls");
const slideWidth = slide.clientWidth;

const previousBtn = document.querySelector(".previous");
const forwardBtn = document.querySelector(".forwards");
forwardBtn.addEventListener("click", function(){
    console.log(slideWidth);
    slideContainer.scrollBy(slideWidth,0);
})
previousBtn.addEventListener("click", function(){
    slideContainer.scrollBy(slideWidth * -1,0);
})

/*BOUTON QUANTITE*/
document.querySelectorAll('.qty-count--add').forEach(btn => {
    btn.addEventListener('click', function() {
        console.log('btn+1')
        const input = this.parentElement.querySelector('.product-qty');
        input.value++;
        updateTotal();
    });
});

document.querySelectorAll('.qty-count--minus').forEach(btn => {
    btn.addEventListener('click', function() {
        const input = this.parentElement.querySelector('.product-qty');
        if (input.value > 1) input.value--;
        updateTotal();
    });
});