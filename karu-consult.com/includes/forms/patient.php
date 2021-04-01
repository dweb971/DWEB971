<form method="POST" action='<?php echo "https://".$_SERVER["HTTP_HOST"]."/traitement.php"; ?>' id="valFrm" class="needs-validation" novalidate>
    <div class="form-group row">
        <select class="custom-select" name="civFrm" required>
            <option selected value="">Choisir civilité</option>
            <option value="1">Monsieur</option>
            <option value="2">Madame</option>
        </select>
        <div class="invalid-feedback">
                Merci de choisir votre civilite !!!
        </div>
    </div>
    <div class="form-group row">
        <label for="nom" class="col-sm-2 col-form-label">Nom : <span class="obj">(*)</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="" value="" placeholder="NOM" name="nomFrm" maxlength="1000" minlength="1"  required>
            <div class="valid-feedback">
                Merci!
            </div>
            <div class="invalid-feedback">
                Merci d'indiquer votre NOM !!!
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="prenom" class="col-sm-2 col-form-label">Prénom : <span class="obj">(*)</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="" value="" placeholder="Prénom" name="prenomFrm" maxlength="1984" minlength="2" required>
            <div class="valid-feedback">
                Merci!
            </div>
            <div class="invalid-feedback">
                Merci d'indiquer votre Prénom !!!
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="telephone" class="col-sm-2 col-form-label">Téléphone : <span class="obj">(*)</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="" value="" placeholder="Fixe ou Mobile" maxlength="13" name="telFrm" required pattern="[0-9]{10}">
            <p>Format : 0590010203 ou 0690010203</p>
            <div class="valid-feedback">
                Merci!
            </div>
            <div class="invalid-feedback">
                Merci d'indiquer votre numéro de téléphone fixe ou mobile !!!
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="emailFrm" maxlength="5977" minlength="7" value="" placeholder="email@example.com"
                name="emailFrm">
                <div class="valid-feedback">
                    Merci!
                </div>
        </div>
    </div>
    <div class="form-group row">
        <select class="custom-select" name="visiteFrm" required>
            <option selected value="">Raison de la visite : <span class="obj">(*)</span></option>
            <option value="consultation">Consultation</option>
            <option value="ordonnance">Ordonnance</option>
            <option value="vaccin">Vaccin</option>
            <option value="urgence">Urgence</option>
            <option value="autre">Autre</option>
        </select>
        <div class="invalid-feedback">
                Merci d'indiquer la raison de votre visite !!!
        </div>
    </div>
    <div class="form-group row">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" value="1" name="patientFrm">
            <label class="custom-control-label" for="customCheck1">Patient du cabinet : </label>
        </div>
    </div>
    <div>
        <input type="hidden" name="rdvFrm" value="" id="rdvFrm" required>
        <input type="hidden" name="heureFrm" value="" id="heureFrm" required>
        <input type="hidden" name="action" value="rdv" id="action">
    </div>
    <div class="form-group row">
        <button type="button" class="btn btn-success">Annuler</button>
        <button type="submit" class="btn btn-primary" name="validerFrm" value="valider">Valider</button>
    </div>
</form>
<script src="<?php echo "https://".$_SERVER["HTTP_HOST"]."/js/patient.js"; ?>"></script>
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
