<form method="POST" action='<?php echo "https://".$_SERVER["HTTP_HOST"]."/traitement.php"; ?>' class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-12 form-group">
            <select name="fciv" id="fciv" class="form-control" required maxlength="1">
                <option value="" selected>Sexe</option>
                <option value="0">Masculin</option>
                <option value="1">Féminin</option>
            </select>
            <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci de choisir dans la liste déroulante !!!
                </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            <input type="text" name="fnom" class="form-control" id="fnom" placeholder="NOM *" data-rule="minlen:1"
                data-msg="Indiquer votre nom" minlength="2" maxlength="1000" required />
                <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre NOM !!!
                </div>
        </div>
        <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="fprenom" id="fprenom" placeholder="Prénom *" data-rule="prenom"
                data-msg="Indiquer votre prénom" required minlength="2" maxlength="1984" />
                <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre Prénom !!!
                </div>
        </div>
    </div>
    <div class="form-row">
        
        <div class="col-md-12 form-group">
            <input type="email" class="form-control" name="femail" id="femail" placeholder="Adresse email *" data-rule="email"
                data-msg="Indiquer votre adresse email" required />
                <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre email !!!
                </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 form-group">
            <label for="">Date de naissance</label>
            <input type="date" name="fnaissance" class="form-control" id="fnaissance" placeholder="Date de naissance *" required  />
            <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre date de naissance !!!
                </div>
        </div>
        <div class="col-md-6 form-group">
        <label for="">Lieu de naissance</label>
            <input type="text" class="form-control" name="flieu" id="flieu" placeholder="Lieu de naissance *" data-rule="lieu naissance"
                data-msg="Indiquer votre lieu de naissance" required />
                <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre lieu de naissance !!!
                </div>
        </div>
        
    </div>

    <div class="form-row">
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" name="fadresse" id="fadresse" placeholder="Adresse complète : *" data-rule="votre adresse"
                data-msg="Indiquer votre adresse" required maxlength="150" minlength="10" />
            <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre adresse !!!
                </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="fcp" id="fcp" placeholder="Code postal *" data-rule="Code postal"
                data-msg="Indiquer votre code postal" required maxlength="5" minlength="5" />
            <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre code postal !!!
                </div>
        </div>
        <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="fville" id="fville" placeholder="Ville *" data-rule="Ville"
                data-msg="Indiquer votre ville" required maxlength="20" minlength="10" />
            <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre ville !!!
                </div>
        </div>
    </div>

    <div class="form-row">
        
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" name="fformation" id="fformation" placeholder="Quelle formation désirez-vous suivre ? *" data-rule="formation"
                data-msg="Indiquer la formation que vous désirez suivre" required minlength="10" maxlength="50" />
                <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                Indiquer la formation que vous désirez suivre !!!
                </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-12 form-group">

        <label class="form-check-label" for="">
                    Possédez-vous un diplôme * ? (Si oui lequel ?) 
        </label>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fdiplome" name="fdiplome" class="custom-control-input" value="1" required>
            <label class="custom-control-label" for="fdiplome">Oui :</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fdiplome2" name="fdiplome" class="custom-control-input" value="0" required>
            <label class="custom-control-label fdiplome2" for="fdiplome2">Non</label>
            <div class="invalid-feedback">Merci d'indiquer si oui ou non vous avez un diplôme !!!!</div>
        </div>
        <div id="diplome">
            <input type="hidden" name="fdiplomeN" id="fdiplomeN" class="form-control" placeholder="indiquer votre diplôme." maxlength="20">
        </div>


            
                <div class="valid-feedback">
                    Merci..
                </div>

        </div>
        
    </div>



    <div class="form-row">
        <div class="col-md-12 form-group">
            <label class="form-check-label" for="" title="Journée Défense et Citoyenneté">
                Avez-vous fait votre JDC ? 
            </label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="fjdc" name="fjdc" class="custom-control-input" value="1" maxlength="1" required>
                <label class="custom-control-label" for="fjdc">Oui</label>
                
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="fjdc2" name="fjdc" class="custom-control-input" value="0" maxlength="1" required>
                <label class="custom-control-label fjdc2" for="fjdc2">Non </label>
                <div class="invalid-feedback">Indiquer si oui ou non vous avez votre JDC !!!!</div>
            </div>
            
            <div class="valid-feedback">
                    Merci..
             </div>
        </div>
    
        <div class="col-md-12 form-group">
            <select class="custom-select" name="frsma" id="frsma" required>
                <option value="" selected>Où avez-vous connu le RSMA ? * </option>
                <option value="jdc">par la JDC</option>
                <option value="mission">par la mission locale : (Laquelle ?)</option>
                <option value="pole_emploi">Pôle emploi</option>
                <option value="information">par une information au collège ou au lycée</option>
                <option value="famille">par la famille</option>
                <option value="ami_amie">par un(e) ami(e)</option>
                <option value="association">par une association : (Laquelle ?)</option>
                <option value="forum">par un forum</option>
                <option value="journal_tv">par le Journal ou la télévision</option>
                <option value="radio">Radio</option>
                <option value="site_rsma">Site rsma</option>
                <option value="recherche">Moteur recherche</option>
                <option value="autre">Autre</option>
            </select>
            <div id="info">
                <input type="hidden" name="finfo" id="finfo" class="form-control" placeholder="Indiquer laquelle...." maxlength="20">
                <div class="invalid-feedback">
                    Merci d'indiquer laquelle ? !!!
                </div>
            </div>
                <div class="invalid-feedback">
                    Merci d'indiquer ou avez-vous connu le RSMA !!!
                </div>
        </div>
    </div>


    <div class="form-row">
        <div class="col-md-6 form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="frgpd" name="frgpd" value="1">
                <label class="custom-control-label" for="frgpd" >Accepter nos règles concernant vos données personnelles <a href="rgpd.php" title="nos règles RGPD" target="_blank">RGPD</a></label>
            </div>
        </div>

    </div>
    
    <center><div class="text-center"><button type="submit" class="btn btn-primary" name="finscription">INSCRIPTION</button></center>
</form>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="js/verif.js"></script>