let form = document.getElementById("valFrm");

form.addEventListener("submit", function (event) {

    // etudier location.href = form.attr('action')
    //event.preventDefault();

  }, false);





function afficher_nom(){
                
    let titreH1 = document.getElementById("titreH1");
    //titreH1.innerText = "Janvier";

    // pointer sur la liste
    let selectMois = document.getElementById("selectedM");
    console.log(selectMois);

    // recuperer index de la selection
    let moisIndex = selectMois.selectedIndex;

    // mise a jour balise h1 grace index selection
    //console.log(selectMois[moisIndex].innerHTML);
    titreH1.innerText = selectMois[moisIndex].innerHTML;

}
/*
let valFrm = document.getElementById("valFrm");
valFrm.addEventListener("click", function(e){
    
    console.log(e);

    let nom = document.getElementById('nomFrm');
    let prenom = document.getElementById('prenomFrm');

    // autres champs du formulaire
    let civ = document.getElementById("civFrm");
    let tel = document.getElementById("telFrm");
    let visite = document.getElementById("visiteFrm");

    // executer notre fonction rdv
    rdv(civ, nom, prenom, tel, visite);
} );
*/



function rdv(civ, nom, prenom, tel, visite){
    let civM = civ.value;
    let nomM = nom.value;
    let prenomM = prenom.value;
    let telM = tel.value;
    let visiteM = visite.value;


    // test d'affichage
    //alert("Voici mes coordonnées : "+nomM+" "+prenomM);
    
    if( civM == "Choisir civilité"){
        civ.classList.add("errorBG");
    } else {
        civ.classList.remove("errorBG");
    }

    if(nomM == ""){
        nom.classList.add("errorBG");
        nom.parentNode.children[1].classList.remove("off");
        
    } else {
        nom.classList.remove("errorBG");
        nom.parentNode.children[1].classList.add("off");
    }

    if(prenomM == ""){
        prenom.classList.add("errorBG");
        prenom.parentNode.children[1].classList.remove("off");
        
    } else {
        prenom.classList.remove("errorBG");
        prenom.parentNode.children[1].classList.add("off");
    }

    if(telM == ""){
        tel.classList.add("errorBG");
        tel.parentNode.children[1].classList.remove("off");
        
    } else {
        tel.classList.remove("errorBG");
        tel.parentNode.children[1].classList.add("off");
    }

    if( visiteM == "Raison de la visite"){
        visite.classList.add("errorBG");
    } else {
        visite.classList.remove("errorBG");
    }

    
}
