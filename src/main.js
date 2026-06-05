import './scss/main.scss';

// Importation automatique de TOUTES les images d'un coup
import.meta.glob('./images/**/*.{png,jpg,jpeg,svg,webp}', { eager: true });


function CalculateProductTotal(productNode) {
    let prixUnique = productNode.querySelector('.prix-uniq').textContent;
    let prixGlobal = productNode.querySelector('.prix-qty').textContent;
    let prixGlobalElement = productNode.querySelector('.prix-qty');
    let productqty = productNode.querySelector('.product-qty').value;
    let sousTotal = document.querySelector('#sousTotal').textContent;
    let sousTotalElement = document.querySelector('#sousTotal');
    let ttc = document.querySelector('#ttc').textContent;
    let ttcElement = document.querySelector('#ttc');
    let transport = document.querySelector('#transport').textContent;
    // console.log('ok' + sousTotal);

    let prixGlobalNew = parseFloat(prixUnique.replace(',', '.')) * parseInt(productqty);
    // console.log(parseFloat(prixUnique.replace(',', '.')));
    prixGlobalElement.textContent = prixGlobalNew.toFixed(2);

    let sousTotalNew = 0;
    document.querySelectorAll('.panier-produits').forEach(produit => {
        let prixProduit = produit.querySelector('.prix-qty').textContent;
        sousTotalNew += parseFloat(prixProduit.replace(',', '.'));
    });
    sousTotalElement.textContent = sousTotalNew.toFixed(2);

    let ttcNew = sousTotalNew + parseFloat(transport.replace(',', '.'));
    ttcElement.textContent = ttcNew.toFixed(2);

}


document.addEventListener('DOMContentLoaded', () => {
    /*MENU*/
    const openNav = document.getElementById('navTrigger');
    openNav.addEventListener("click", function (event) {
        // console.log('ok');
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

            // console.log('Bouton cliqué !', event.target);

            const filtre = bouton.nextElementSibling;
            filtre.classList.toggle('show');

        });
    });

    /*CAROUSEL*/
    if (document.querySelector('.controls')) {
    // L'élément existe, exécuter le code ici

    const slide = document.querySelector(".slide-img");
    const slideContainer = document.querySelector(".controls");
    const slideWidth = slide.clientWidth;
    // console.log(slide);
    const previousBtn = document.querySelector(".previous");
    const forwardBtn = document.querySelector(".forwards");
    if(forwardBtn){
    forwardBtn.addEventListener("click", function () {
        // console.log(slideWidth);
        slideContainer.scrollBy(slideWidth, 0);
    })}

    if(previousBtn){
    previousBtn.addEventListener("click", function () {
        slideContainer.scrollBy(slideWidth * -1, 0);
    })}

    if(slide){
    slide.addEventListener('load', () => {
        const liWidth = document.querySelector('.slide-img').clientWidth;
        // console.log("Largeur après chargement :", liWidth);
    });
    }}

    /*BOUTON QUANTITE - details*/
    document.querySelectorAll('.count-add').forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.produit-count');
            const max = parseInt(input.max);
            let value = parseInt(input.value);
        console.log(max + ' ' + value);

            if (value < max) {
                input.value = value + 1;
                updateTotal();
            }
        });
    });

    document.querySelectorAll('.count-minus').forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.produit-count');
            const min = parseInt(input.min);
            let value = parseInt(input.value);

            if (value > min) {
                input.value = value - 1;
                updateTotal();
            }
        });
    });




    /*BOUTON QUANTITE - panier*/
    

    document.querySelectorAll('.qty-count--add').forEach(btn => {
        btn.addEventListener('click', function () {
            // console.log('btn+1')
            const input = this.parentElement.querySelector('.product-qty');
            const current = parseInt(input.value);
            const max = parseInt(input.max);
            const modal = document.querySelector('.modal');

            // console.log();
            if (current < max) {
                input.value = current + 1;
            }
            
            CalculateProductTotal(this.parentElement.parentElement.parentElement);
            modal.style.display='block';
        });
    });

    document.querySelectorAll('.qty-count--minus').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.product-qty');
            const modal = document.querySelector('.modal');

            if (input.value > 1) input.value--;
            CalculateProductTotal(this.parentElement.parentElement.parentElement);
            modal.style.display='block';
        });
    });
    /*Mise à jour des changements de quantité*/
    const modal = document.querySelector('.modal');
    const update = document.querySelector('.modal-update');
    if(modal){
    document.querySelector('.modal-update').addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('form').submit();
    });
    }
    



});