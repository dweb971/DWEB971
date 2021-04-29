<h2>Gestion utilisateurs</h2>

<ul>
    <li>
        <a href="" class="btn btn-primary" id="liste">Liste utilisateurs</a>
    </li>
    <li>
        <a href="" class="btn btn-success" id="addU">Ajouter un utilisateur</a>
    </li>
</ul>
<div class="liste" id="l">
    <h3>Liste utilisateur</h3>
</div>
<div class="addU" id="aU">
    <h3>Ajouter utilisateur</h3>
    <form method="POST" action="https://<?php echo $_SERVER['HTTP_HOST']; ?>/backendd/validation.php">
                <div class="form-group">
                        <label for="">NOM : *</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="nom" placeholder="NOM" minlength="1" maxlength="1000" required>
                        <small id="" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Prénom : *</label>
                        <input type="text" class="form-control" id="" aria-describedby="" name="prenom" placeholder="Prénom" minlength="2" maxlength="1984" required>
                        <small id="" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone : *</label>
                        <input type="tel" class="form-control" id="" aria-describedby="" name="telephone" placeholder="Téléphone" minlength="10" maxlength="15" required>
                        <small id="" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Date de naissance : *</label>
                        <input type="date" class="form-control" id="" aria-describedby="" name="naissance" placeholder="date de naissance" minlength="12" maxlength="12" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="email" minlength="7" maxlength="5977" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password" minlength="6" maxlength="10" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="hidden" name="nomForm" value="add">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

</div>
<script>
let liste = document.getElementById("l");
let addU = document.getElementById("aU");

liste.style.display = "none";
addU.style.display = "none";

let aListe = document.getElementById("liste");
aListe.addEventListener("click", function(event){
    event.preventDefault();
    event.stopPropagation();

    liste.style.display = "block";
    addU.style.display = "none";
});

let ajouter = document.getElementById("addU");
ajouter.addEventListener("click", function(event){
    event.preventDefault();
    event.stopPropagation();

    liste.style.display = "none";
    addU.style.display = "block";
});

</script>