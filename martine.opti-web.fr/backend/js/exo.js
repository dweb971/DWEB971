/**
 * 
 */

document.addEventListener('DOMContentLoaded', function(event) {

});



// categorie - matiere
const categorie = document.getElementById("fcategorie");
categorie.addEventListener("change", function(){

    const blocFr = document.getElementById("tfrancais");
    const blocMa = document.getElementById("tmath");

    if(categorie.value == 'francais'){
        // afficher bloc
        blocFr.style.display = "block";
        blocMa.style.display = "none";

        // exercice
        const themeFr = document.getElementById("ftheme");
        const consigneFr = document.getElementById("fconsigne");

        // ajouter required
        themeFr.setAttribute("required", "required");
        

        // afficher bloc de theme
        themeFr.addEventListener("change", function(){
            let trous = document.getElementById("trous");
            let placer = document.getElementById("placer");
            let qcm = document.getElementById("qcm");
            let ouverte = document.getElementById("ouverte");
            let autre = document.getElementById("autre");

            consigneFr.setAttribute("required", 'required');

            switch (themeFr.value) {
                case 'trous':
                    trous.style.display = "block";
                    display_aucun(placer);
                    display_aucun(qcm);
                    display_aucun(ouverte);
                    display_aucun(autre);
                    generer_trous(document.getElementById("ftrou"));
                    break;
                case 'placer' :
                    placer.style.display = "block";
                    display_aucun(trous);
                    display_aucun(qcm);
                    display_aucun(ouverte);
                    display_aucun(autre);
                    break;

                case 'qcm':
                    qcm.style.display = "block";
                    display_aucun(trous);
                    display_aucun(placer);
                    display_aucun(ouverte);
                    display_aucun(autre);
                    break;
                case 'ouverte' :
                    ouverte.style.display = "block";
                    display_aucun(trous);
                    display_aucun(placer);
                    display_aucun(qcm);
                    display_aucun(autre);
                    document.getElementById("fouverteE").setAttribute('required', 'required');
                    break;
                default:
                    autre.style.display = "block";
                    display_aucun(trous);
                    display_aucun(placer);
                    display_aucun(qcm);
                    display_aucun(ouverte);
                    break;
            }
        });
        //console.log(placer);
       // themeFr.removeEventListener("change");

    }

    if(categorie.value == 'math'){
        // afficher bloc
        blocMa.style.display = "block";
        blocFr.style.display = "none";
    } 


    //console.log(categorie.value);

});
//categorie.removeEventListener("change");

function generer_trous(texte)
{
    

    // attention cliquer ensuite a l'extérieur du champs
    // peut etre ne pas garder ecouteur change
    texte.addEventListener("change", function(){
        

        this.addEventListener("dblclick", function(){
            
            console.log(texte);

            let debut = texte.selectionStart;
            let fin = texte.selectionEnd;

            console.log(debut+' '+fin);

            // texte selectionne remplacer par vide.. // a la place vide stocker dans un champs
            // https://stackoverflow.com/questions/17500236/to-copy-the-selected-text-from-a-div-to-a-text-field-on-double-click-the-text/17500323
            texte.value = texte.value.substring(0, debut)+' '+texte.value.substring(fin,texte.value.length); 
            texte.focus();

        });
    });

}

function display_aucun(bloc){
    // cacher bloc ou champs
    bloc.style.display = "none";
}

let addI = document.getElementById("ajouterInput");
let input = document.getElementById("bkinput");
let infoI = document.getElementById("infoI");
addI.addEventListener("click", function(){

    input.style.display = "block";
    infoI.style.display = "block";
    input.innerHTML += input_base();

    //console.log(input);

});

let delI = document.getElementById("deleteInput");
delI.addEventListener("click", function(){

    console.log(input);

    let nbrChild = input.childElementCount;
    if(nbrChild != 0){
        input.removeChild(input.lastChild);
    } else {
        input.innerHTML = "<div class='alert alert-danger' role='alert'>Plus rien a retirer, vous pouvez ajouter un champ de saisie.</div>";
    }


});

// add input for placer
function input_base()
{
    let add_block = '<div class="controls"><input type="text" id="" placeholder="Texte à placer dans l\'ordre" class="span8" name="placer[]" value="" required><div class="invalid-feedback">Renseigner ce champ !!!!</div></div>';

    return add_block;
}

