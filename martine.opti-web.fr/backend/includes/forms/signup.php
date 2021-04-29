<div class="module module-login span4 offset4">
    <form class="form-vertical needs-validation" method="POST" action="validation.php"  novalidate>
        <div class="module-head">
            <h3>Ajouter un utilisateur</h3>
        </div>
        <div class="module-body">
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="email" id="fmail" name="fmail" placeholder="Votre adresse email" minlength="10" maxlength="35" required>
                    <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Merci d'indiquer un email valide !!!
                </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="password" id="fpasse" name="fpasse" placeholder="Votre mot de passe" minlength="6" maxlength="10" required>
                    <p>Mot de passe de 6 à 10 caractères...</p>
                    <div class="valid-feedback">
                    Merci..
                </div>
                <div class="invalid-feedback">
                    Vous n'avez pas indiqué de mot de passe!!!
                </div>
                </div>
            </div>
        </div>
        <div class="module-foot">
            <div class="control-group">
                <div class="controls clearfix">
                    <button type="submit" class="btn btn-primary pull-right"  name="fname" value="fsignup">Ajouter</button>

                </div>
            </div>
        </div>
    </form>
</div>
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