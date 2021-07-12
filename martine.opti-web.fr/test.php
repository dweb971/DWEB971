<form action='<?php echo "https://".$_SERVER["HTTP_HOST"]."/traitement.php"; ?>' method="POST" class="php-email-form needs-validation" novalidate>
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
        <div class="col-md-6 form-group">
            <input type="date" name="fnaissance" class="form-control" id="fnaissance" placeholder="Date de naissance *" required  />
            <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer votre date de naissance !!!
                </div>
        </div>
        <div class="col-md-6 form-group">
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
    <div class="text-center"><button type="submit" class="btn btn-primary mb-2">Submit</button></div>
    
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