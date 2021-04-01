            /*
            // liste date du jour
            let semaine = [11, 12, 13, 14, 15, 16, 17];

            // taille tableau
            let nbrSemaine = semaine.length;

            // tableau html
            let tabHTML = document.getElementById("sem");
            console.log(tabHTML.tBodies[0].rows[0].cells);

            // cible la 3ème ligne tab html
            let rowTabHTML = tabHTML.rows[3];

            // test remplacement chaine de tableau
            let ligne = tabHTML.insertRow(3);
            

            
            // boucle test
            for(let i=0; i < nbrSemaine; i++) {

                // add colonne
                let cels = ligne.insertCell(i);
                //cels.innerHTML += 1;

                // lister le contenu
                for(let j = 0; j < nbrSemaine; j++){
                    // add content
                    if(i == j){
                        cels.innerHTML = semaine[j];

                        //console.log(j+" "+i);

                        // couleur date du jour
                        if( semaine[i] == jour.getDate() ){
                            cels.className = "date_jour";
                        } else {
                            cels.className = "";
                        }
                    }
                }

            }
*/
            // liste date du jour
           /* let semaine = [11, 12, 13, 14, 15, 16, 17];

            // taille tableau
            let nbrSemaine = semaine.length;

            let tr = document.getElementById("tr");
            let td = tr.cells;

            // compter les cellules
            let nbrTD = td.length;

            // date complete
            let jour = new Date();

            for(let i=0; i < nbrTD; i++){
                
                for(let s=0; s < nbrSemaine; s++){
                    td[s].innerHTML = semaine[s];

                    // couleur date du jour
                    if( semaine[s] == jour.getDate() ){
                            td[s].className = "date_jour";
                        } else {
                            td[s].className = "";
                        }
                }
            }
     */


            /*
            // date du mois
            let dates = [];
            for(let m=1; m <= 30; m++){
                dates.push(m);
            }
            console.log(dates); 
            */
    /*
            // jours de la semaine
            let jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
*/

            // test mois
            /*
                logique humaine
                janvier => 31
            */
            /*

            let mois = ["Janvier" , "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
            
            let selectedM = document.getElementById("selectedM");
            //console.log(selectedM.length);

            let nbrOptions = selectedM.length;

            for(let i=0; i< nbrOptions; i++){
                //console.log(selectedM[i].innerHTML);
            }
*/
            // functions
/*
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
*/


/*
Author : dweb2021
Name script : scripts
Year script : 2021
Pseudo : Martine
*/




// ecouteur

/*
    DOMContentLoaded // chargement d'une page complete
*/
document.addEventListener("DOMContentLoaded", function(){
    // date du mois en cours
    const dt = new Date();
    const ms = dt.getMonth();
    const jr = dt.getDay();

    let allMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    for(let m=0; m<allMois.length;m++){
        
        if( m == ms ){
            //console.log(allMois[m]);

            calendrier(allMois[m], dt.getFullYear);
            document.getElementById("selectedM").selectedIndex = ms;

            //console.log(document.getElementById("selectedM").selectedIndex);
        }
    }

});

const selectedM = document.getElementById("selectedM");
selectedM.addEventListener("change", function () {

    // index mois selectionne
    let indexMoisSelect = selectedM.selectedIndex;
    let mois = selectedM[indexMoisSelect].innerHTML;

    // cree une date et obtenir l'annee en cours
    let annee = new Date();

    // exexuter function calendrier
    calendrier(mois, annee.getFullYear());


});


// my calendar
function calendrier(mois, annee) {
    let nbrJourMois;
    let agenda = document.getElementById("agenda");
    let nbrRows = agenda.rows.length;
    //let bissextille = [2020, 2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052];
    let bissextille = [2020];
    let lastYears = "";

    //console.log(agenda.rows[1].cells.length);

    /* console.log(bissextille);
     bissextille.push(2020);
     console.log(bissextille);
     bissextille.push(2024);
     console.log(bissextille);*/

    for (let b = 0; b < bissextille.length; b++) {

        if (b != 20) {
            bissextille.push(bissextille[b] + 4);
            //console.log(bissextille);
        }
    }


    switch (mois) {
        case "Janvier":

            // recuperer 1er jour du mois
            var firstDay = ecrireDate(0, annee);

            // nombre de jours dans le mois
            nbrJourMois = 31;

            // construction tableau html
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Février":
            

            // annee bissextille
            for (i = 0; i < bissextille.length; i++) {

                if (bissextille[i] == annee) {
                    lastYears = bissextille[i];
                }
            }
            //console.log(lastYears);

            if (lastYears == annee) {
                nbrJourMois = 29;
            } else {
                nbrJourMois = 28;
            }

            // recuperer 1er jour du mois
            var firstDay = ecrireDate(1, annee);

            tableauHTML(nbrRows, agenda, nbrJourMois,  firstDay);
            break;

        case "Mars":
            var firstDay = ecrireDate(2, annee);
            nbrJourMois = 31;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Avril":
            var firstDay = ecrireDate(3, annee);
            nbrJourMois = 30;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Mai":
            var firstDay = ecrireDate(4, annee);
            nbrJourMois = 31;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Juin":
            var firstDay = ecrireDate(5, annee);
            nbrJourMois = 30;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Juillet":
            var firstDay = ecrireDate(6, annee);
            nbrJourMois = 31;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Août":
            var firstDay = ecrireDate(7, annee);
            nbrJourMois = 31;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Septembre":
            var firstDay = ecrireDate(8, annee);
            nbrJourMois = 30;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Octobre":
            var firstDay = ecrireDate(9, annee);
            nbrJourMois = 31;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        case "Novembre":
            var firstDay = ecrireDate(10, annee);
            nbrJourMois = 30;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

        default:
            var firstDay = ecrireDate(11, annee);
            nbrJourMois = 31;
            tableauHTML(nbrRows, agenda, nbrJourMois, firstDay);
            break;

    }



}

//  changer nom variable tableauHTML
function tableauHTML(lignes, agenda, jours, firstDay) {

    // boucle sur tableau html pour avoir trs et th et tds
    let j = 0;

    for (let l = 0; l < lignes; l++) {

        let nbrTD = agenda.rows[l].cells.length;

        for (t = 0; t < nbrTD; t++) {

            // entete tableau
            if (l != 0) {

                j++;
                if(firstDay === 0){ // dimanche

                    // 1ere ligne tr
                    if (l == 1) {

                        j++;


                        if(t <= 5 ){
                            ecrireJours(agenda.rows[l].cells[t], j, "");
                        }

                        if( t == 6){

                            j=1;
                            ecrireJours(agenda.rows[l].cells[t], j, jours);

                        }

                       
                    }


                }

                if(firstDay === 1){ // lundi

                    // 1ere ligne tr
                    if (l == 1) {

                        // 1ere colonne td
                        ecritureTableau(t, j, agenda.rows[l].cells[t], jours)
                    }

                }

                if(firstDay === 2){ // mardi

                    // 1ere ligne tr
                    if (l == 1) {

                        if(t == 0 ){
                            ecrireJours(agenda.rows[l].cells[t], j, "");
                        }

                        if( t == 1){

                            j=1;
                            ecrireJours(agenda.rows[l].cells[t], j, jours);

                        }

                        if(t > 1){
                            ecrireJours(agenda.rows[l].cells[t], j, jours);
                        }
                        
                    }

                }

                if(firstDay === 3){ // mercredi

                    // 1ere ligne tr
                    if (l == 1) {

                        if(t == 0 ){
                            ecrireJours(agenda.rows[l].cells[t], j, "");
                        }

                        if( t == 1){
                            ecrireJours(agenda.rows[l].cells[t], j, "");

                        }

                        if(t == 2){
                            j=1;
                            ecrireJours(agenda.rows[l].cells[t], j, jours);
                        }

                        if(t > 2){
                            ecrireJours(agenda.rows[l].cells[t], j, jours);
                        }
                        
                    }

                }


                if(firstDay === 4){ // jeudi

                    // 1ere ligne tr
                    if (l == 1) {

                        if(t <= 2 ){
                            ecrireJours(agenda.rows[l].cells[t], j, "");
                        }

                        if( t == 3){
                            j=1;
                            ecrireJours(agenda.rows[l].cells[t], j, jours);

                        }

                        if(t > 3){
                            ecrireJours(agenda.rows[l].cells[t], j, jours);
                        }

    
                    }

                }

                //
                if(firstDay === 5){  // vendredi
                    //console.log(firstDay);


                    // 1ere ligne tr
                    if (l == 1) {

                        if(t <= 3 ){
                            ecrireJours(agenda.rows[l].cells[t], j, "");
                        }

                        if( t == 4){
                            j=1;
                            ecrireJours(agenda.rows[l].cells[t], j, jours);

                        }

                    
                        if( t > 4){
                            ecrireJours(agenda.rows[l].cells[t], j, jours);
                        }

                        
                    }


                } 

                if(firstDay === 6){ // samedi

                    // 1ere ligne tr
                    if (l == 1) {

                        if(t <= 4 ){
                            ecrireJours(agenda.rows[l].cells[t], j, "");
                        }

                        if( t == 5){
                            j=1;
                            ecrireJours(agenda.rows[l].cells[t], j, jours);

                        }

                        if(t == 6){
                            ecrireJours(agenda.rows[l].cells[t], j, jours);
                        }

                        
                    }

                }


                // 2eme ligne tr
                if (l == 2) {
                    
                    // 1ere colonne td
                    if (t == 0) {
                        //agenda.rows[l].cells[t].innerHTML = j;
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 1) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 2) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 3) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 4) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 5) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 6) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }


                }

                // 3eme ligne tr
                if (l == 3) {

                    // 1ere colonne td
                    if (t == 0) {
                        //agenda.rows[l].cells[t].innerHTML = j;
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 1) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 2) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 3) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 4) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 5) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 6) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                }

                // 4eme ligne tr
                if (l == 4) {

                    // 1ere colonne td
                    if (t == 0) {
                        //agenda.rows[l].cells[t].innerHTML = j;
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 1) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 2) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 3) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 4) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 5) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 6) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                }

                // 5eme ligne tr
                if (l == 5) {

                    // 1ere colonne td
                    if (t == 0) {
                        //agenda.rows[l].cells[t].innerHTML = j;
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 1) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 2) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 3) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 4) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 5) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                    if (t == 6) {
                        ecrireJours(agenda.rows[l].cells[t], j, jours);
                    }

                }

            }

        }

    }


}

function ecrireDate(m, annee){
    let jour = new Date(Date.UTC(annee, m, 1, 4, 0, 0, 0));  
    // heure universelle +4h pour heure local 00h00

    //console.log(jour);

    // recuperer et afficher date 
    return jour.getDay();
}


function ecrireJours(colonne, jour, jourMois) {

    if (jour > jourMois) {
        // ecrire jour
        colonne.innerHTML = "";

    } else {
        // ecrire jour
        colonne.innerHTML = jour;
    }


}



//
function ecritureTableau(t, j, tableauHTML, nbrJourMois){

    // 1ere colonne td
    if (t == 0) {
        //agenda.rows[l].cells[t].innerHTML = j;
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

    if (t == 1) {
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

    if (t == 2) {
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

    if (t == 3) {
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

    if (t == 4) {
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

    if (t == 5) {
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

    if (t == 6) {
        ecrireJours(tableauHTML, j, nbrJourMois);
    }

}