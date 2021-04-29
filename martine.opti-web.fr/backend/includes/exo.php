<div class="module">
    <div class="module-head">
        <h3>Création d'un exercice</h3>
        <ol>
            <li>Choisir une matière,</li>
            <li>Choisir une thématique d'exercice correspondante à ma matière selectionnée,</li>
            <li>Ajouter le nombre de champs de saisie nécessaire,</li>
            <li>....,</li>
            <li>Valider la création de l'exercice.</li>
            <li>Champs obligatoire <span class="info">*</span></li>
        </ol>
    </div>
    <div class="module-body">

        <form class="form-horizontal row-fluid needs-validation" method="post"
            action="<?php echo "https://".$_SERVER["HTTP_HOST"]."/backend/validation.php"; ?>" novalidate>
            <div class="control-group">
                <label class="control-label" for="categorie">Matière disponible <span class="info">*</span></label>
                <div class="controls">
                    <?php // prevoir connexion db pour liste  
                    ?>
                    <select tabindex="1" data-placeholder="Choisir une matière" class="span8" name="fcategorie"
                        id="fcategorie" minlength="4" maxlength="8" required>
                        <option value="">Choisir une matière</option>
                        <option value="francais">Français</option>
                        <option value="math">Mathématique</option>
                    </select>
                    <div class="invalid-feedback">
                        Vous n'avez pas séléctionné une matière!!!
                    </div>
                </div>
            </div>

            <div id="tfrancais" class="texo">
                <div class="control-group">
                    <label class="control-label" for="categorie">Thématique : <span class="info">*</span></label>
                    <div class="controls">
                        <?php // prevoir connexion db pour liste  
                        ?>
                        <select tabindex="1" data-placeholder="Choisir une thématique" class="span8" name="ftheme"
                            id="ftheme" minlength="4" maxlength="20">
                            <option value="">Choisir une thématique</option>
                            <option value="trous">Texte à trou</option>
                            <option value="placer">Cliquer / placer</option>
                            <option value="qcm">Question à choix multiple</option>
                            <option value="ouverte">Question ouverte</option>
                            <option value="autre">Autre</option>
                        </select>
                        <div class="invalid-feedback">
                            Vous n'avez pas séléctionné une thématique!!!
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="consigne">Consigne : <span class="info">*</span></label>
                    <div class="controls">
                        <input data-title="A tooltip for the input" type="text" id="fconsigne"
                            placeholder="Consigne de l'exercice" data-original-title="" class="span8 tip"
                            name="fconsigne" minlength="2" maxlength="100">
                        <div class="invalid-feedback">
                            Vous n'avez pas indiqué de consigne pour l'exercice !!!!
                        </div>
                    </div>
                </div>

                <div id="trous" class="optionTheme">
                    
                <div class="control-group">
                    <label class="control-label" for="">Enoncé : <span class="info">*</span></label>
                    <div class="controls">
                        <textarea class="span8" rows="5" name="ftrou" id="ftrou" placeholder="Ecrivez l'énoncé de l'exercice puis indiquer les mots à cacher."></textarea>
                        <div class="fmots" id="fmots">Liste des mots à cacher</div>
                        <div class="invalid-feedback">
                            Ne partez pas sans indiquer l'énoncé de l'exercice !!!!
                        </div>
                    </div>
                </div>

                </div>



                <p class="infoP" id="infoI" style="display:none">Ajouter des champs de saisie en cliquant sur le bouton 'Ajouter un champ de saisie' pour écrire les différentes phrases de l'exercice. </p>
    
                <div id="placer" class="optionTheme">
                    <div class="control-group" >
                        <div id="bkinput" style="display:none">
                            <label class="control-label" for="">Enoncé exercice : <span class="info">*</span></label>
                        </div>
                    </div>
                    <p class="btn btn-success" id="ajouterInput">Ajouter un champ de saisie</p> 
                    <p class="btn btn-danger" id="deleteInput">Supprimer un champ de saisie</p>
                    
                </div>
                <div id="qcm" class="optionTheme">qcm </div>
                <div id="ouverte" class="optionTheme">
                    <div class="control-group">
                        <label class="control-label" for="">Enoncé : <span class="info">*</span></label>
                        <div class="controls">
                            <textarea class="span8" rows="5" name="fouverteE" id="fouverteE"> 
                            Enoncé de l'exercice
                            </textarea>
                            <p>ps: ajouter champs pour les questions</p>
                            <div class="invalid-feedback">
                                Ne partez pas sans indiquer l'énoncé de l'exercice !!!!
                            </div>
                        </div>
                    </div>
            
                </div>

                <div id="autre" class="optionTheme">autre </div>

            </div><!--  tfrancais -->

            <div id="tmath" class="texo">

                math
            </div>



            <!--
            <div class="control-group">
                <label class="control-label" for="basicinput">Tooltip Input</label>
                <div class="controls">
                    <input data-title="A tooltip for the input" type="text" placeholder="Hover to view the tooltip…"
                        data-original-title="" class="span8 tip">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="basicinput">Disabled Input</label>
                <div class="controls">
                    <input type="text" id="basicinput" placeholder="You can't type something here..." class="span8"
                        disabled>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Tooltip Input</label>
                <div class="controls">
                    <input data-title="A tooltip for the input" type="text" placeholder="Hover to view the tooltip…"
                        data-original-title="" class="span8 tip">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Prepended Input</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">#</span><input class="span8" type="text" placeholder="prepend">
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Appended Input</label>
                <div class="controls">
                    <div class="input-append">
                        <input type="text" placeholder="5.000" class="span8"><span class="add-on">$</span>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Dropdown Button</label>
                <div class="controls">
                    <div class="dropdown">
                        <a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Dropdown Button <i
                                class="icon-caret-down"></i></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="#">First Row</a></li>
                            <li><a href="#">Second Row</a></li>
                            <li><a href="#">Third Row</a></li>
                            <li><a href="#">Fourth Row</a></li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="control-group">
                <label class="control-label">Radiobuttons</label>
                <div class="controls">
                    <label class="radio">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                        Option one
                    </label>
                    <label class="radio">
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Option two
                    </label>
                    <label class="radio">
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                        Option three
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Inline Radiobuttons</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                        Option one
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Option two
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                        Option three
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Checkboxes</label>
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" value="">
                        Option one
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="">
                        Option two
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="">
                        Option three
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Inline Checkboxes</label>
                <div class="controls">
                    <label class="checkbox inline">
                        <input type="checkbox" value="">
                        Option one
                    </label>
                    <label class="checkbox inline">
                        <input type="checkbox" value="">
                        Option two
                    </label>
                    <label class="checkbox inline">
                        <input type="checkbox" value="">
                        Option three
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Textarea</label>
                <div class="controls">
                    <textarea class="span8" rows="5"></textarea>
                </div>
            </div>
-->
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary" name="fname" value="fexo">Valider</button>
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
</div>