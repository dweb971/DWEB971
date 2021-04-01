/*
@author : Martine
@script : Recupérer le mois et le jour pour rendez-vous
@year : 2021

*/

function recup_mois_annee(mois, annee) {

    // evenement click sur agenda
    let agenda = document.getElementById("agenda");
    
    agenda.addEventListener("click", function (event) {

        //retirer tous style css
        for(let i=0; i< agenda.childNodes[3].childElementCount; i++){

            console.log(agenda.childNodes[3]);

            for(let td=0; td < agenda.childNodes[3].children[i].childElementCount; td++){

                if(agenda.childNodes[3].children[i].children[td].style.background != ""){
                    agenda.childNodes[3].children[i].children[td].style.background = "";
                }
    
            }
        }

        let rDate = event.target.innerHTML;
        //event.target.classList.add("selectBG");
        //event.target.style.background = "deeppink";
        addStyleTD(event.target);

        // add date in input
        let rdvFrm = document.getElementById("rdvFrm");

        rdvFrm.value = rDate+" "+mois+" "+annee;

        
    });

    // add heure rdv
    let rHeure = document.getElementById("heure");
    rHeure.addEventListener("change", function(){

        let indexHeureSelect = rHeure.selectedIndex;
        let heureFrm = document.getElementById("heureFrm");
        
        heureFrm.value = rHeure[indexHeureSelect].value;

    });

    
    

    
}


function addStyleTD(cellule){

    if(cellule.style.background == ""){
        cellule.style.background = "deeppink";
    } else {
        cellule.style.background = "";
    }
}


