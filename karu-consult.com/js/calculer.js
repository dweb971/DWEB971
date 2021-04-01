/*
@author : Martine
@script : Calculatrice adaptation
@year : 2021


*/



//console.log(bouton.children[1].children[0].innerText);

// chargement page
window.addEventListener("load", function(e){
    // test sur tous les bouton
    let boutons = document.getElementsByTagName("button");
    

    

    for(let i=0; i < boutons.length; i++){
        boutons[i].addEventListener("click", calculer); // renvoi bouton clique sur eventement load
    }

});



function calculer(e){



    console.log(e.target.innerText);

    // declaration variable
    let input = document.getElementById("resultat");
    



    // le calcul
    if(e.target.innerText === "C"){
        input.innerText = "";

    } else {
        // le resultat
        input.innerText += e.target.innerText;


    }



    


}