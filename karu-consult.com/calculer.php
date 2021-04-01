<?php  $page = "Accueil";   ?>
<?php
include("includes/head.php");

?>
<div class="container">
    <div class="row">
    <div class="col-4"></div>
        <div class="col-4">
            <h1>Calculette</h1>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p id="resultat" class="form-control resultat"></p>
                    </div>
                </div>
                <div id="bouton">
                <div class="row">
                    <div class="col"><button class="btn btn-outline-danger">C</button></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"><button class="btn btn-light" >/</button></div>
                </div>
                <div class="row">
                    <div class="col"><button class="btn btn-light" data-index-number="7">7</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number="8">8</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number="9">9</button></div>
                    <div class="col"><button class="btn btn-light" data-index-signe="x">x</button></div>
                </div>
                <div class="row">
                    <div class="col"><button class="btn btn-light" data-index-number="4">4</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number="5">5</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number="6">6</button></div>
                    <div class="col"><button class="btn btn-light" data-index-signe="-">-</button></div>
                </div>
                <div class="row">
                    <div class="col"><button class="btn btn-light" data-index-number="1">1</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number="2">2</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number="3">3</button></div>
                    <div class="col"><button class="btn btn-light" data-index-signe="+">+</button></div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"><button class="btn btn-light" data-index-number="0">0</button></div>
                    <div class="col"><button class="btn btn-light" data-index-number=",">,</button></div>
                    <div class="col"><button class="btn btn-outline-success" data-index-signe="=">=</button></div>
                </div>
                </div>
                <div class="row">
                    <div class="col-12"></div>
                </div>
            </div>
            
        </div>
    <div class="col-4"></div>
    </div>
</div>
<script src="js/calculer.js"></script>
<?php
    include("includes/footer.php");
 ?>