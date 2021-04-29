<?php 
    if($page == "confirmer")
    {
?>
        <div class="module module-login span4 offset4">
            <div class="alert alert-success" role="alert">
                <p></p>
                <p>Vous venez de demander un nouveau mot de passe.</p>
                <p>Il se trouve dans votre message.</p>
                <p></p>
            </div>

        </div>

<?php 
    }

    if(isset($_GET["msg"])){
?>
            <div class="alert alert-danger span4 offset4" role="alert">
                <p></p>
                <p>Il y a une erreur sur votre login ou votre mot de passe</p>
                <p>......</p>
                <p></p>
            </div>
<?php 

    }
?>

<div class="module module-login span4 offset4">
    <form class="form-vertical needs-validation" method="POST"
        action='<?php echo "https://".$_SERVER["HTTP_HOST"]."/backend/validation.php"; ?>' novalidate>
        <div class="module-head">
            <h3>Connexion</h3>
        </div>
        <div class="module-body">
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="email" id="fmail" name="fmail" placeholder="Votre adresse email" value="" 
                        required>
                    <div class="valid-feedback">
                        Merci..
                    </div>
                    <div class="invalid-feedback">
                        Merci d'indiquer votre email pour vous connecter!!!
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" type="password" id="fpasse" name="fpasse" placeholder="Votre mot de passe"
                        required>
                    <div class="invalid-feedback">
                        Vous devez indiquer votre mot de passe!!!!
                    </div>
                </div>
            </div>
        </div>
        <div class="module-foot">
            <div class="control-group">
                <div class="controls clearfix">
                    <button type="submit" class="btn btn-primary pull-right" name="fname"
                        value="fconnexion">Connexion</button>

                </div>
            </div>
        </div>
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
</div>