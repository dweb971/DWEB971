/*
    NAME : verif.js
    AUTHOR : AMBROSIO Martine
    DATE : 13 avril 2021
    VERSION : V1
    COMMENTS : Script de mise en forme de donnees
*/

let nom = document.getElementById("fnom");
nom.addEventListener("change", function(){
   nom.value = nom.value.toUpperCase();
});

let prenom = document.getElementById("fprenom");
prenom.addEventListener("change", function(){
    prenom.value = strUcFirst(prenom.value);
});

let lieu = document.getElementById("flieu");
lieu.addEventListener("change", function(){
    lieu.value = strUcFirst(lieu.value);
});

let ville = document.getElementById("fville");
ville.addEventListener("change", function(){
    ville.value = strUcFirst(ville.value);
});

let email = document.getElementById("femail");
email.addEventListener("change", function(){
    email.value = email.value.toLowerCase();
});

// firt letter in uppercase
function strUcFirst(a){return (a+'').charAt(0).toUpperCase()+a.substr(1);}

// afficher ou pas input
let diplome = document.getElementById("fdiplome");
let diplome2 = document.getElementById("fdiplome2");
let nomD = document.getElementById("fdiplomeN");

diplome.addEventListener("click", function(){
    nomD.setAttribute("type", "text");
    nomD.setAttribute("required", "required");

});

diplome2.addEventListener("click", function(){
    nomD.setAttribute("type", "hidden");
    nomD.removeAttribute("required");

});

let infoR = document.getElementById("frsma");
let info = document.getElementById("finfo");

infoR.addEventListener("change", function(){

    console.log(infoR.selectedIndex);


        if(infoR.selectedOptions[0].value == 'mission' || infoR.selectedOptions[0].value == 'association'){
            info.setAttribute("type", "text");
            info.setAttribute("required", "required");

        } else {
            info.setAttribute("type", "hidden");
            info.removeAttribute("required");
        }
});



