<?php
// session de connexion
session_start();

if (!isset($_SESSION["email"])) {
    // redirection vers page connexion
    /* Ceci produira une erreur. Notez la sortie ci-dessus,
    * qui se trouve avant l'appel à la fonction header() */
    header('Location: https://' . $_SERVER["HTTP_HOST"] . '/index.php');
    exit;
} else {
    // 
    require("scripts/Connect.php");
    require("scripts/Resthome.php");
    $db = new Connect();
    $resthome = new Resthome($db);
?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.80.0">
        <title>RESTHOME - Dashboard</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/starter-template/">



        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <main role="main" class="container">

            <div class="starter-template">
                <a href="index.php">
                    <h1><?php echo $_SESSION["email"]; ?></h1> Cliquez-ici pour vous déconnecter.
                </a>

                <div class="container" style="margin-top: 100px">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Ajouter une recette</a>
                                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Générer menu de la semaine</button>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            <!-- ajouter un menu -->
                                            <form method="POST" action="traitement.php" >
                                                <div class="form-group">
                                                    <label for="categorie">Choisir une catégorie</label>
                                                    <select name="categorie" id="categorie" class="form-control">
                                                    <?php
                                                    $cat = $resthome->categorie();

                                                    foreach($cat as $categories)
                                                    {
                                                    ?>
                                                        <option value="<?php echo $categories["id"]; ?>"><?php echo $categories["categorie"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recette">Nom de la recette *</label>
                                                    <input type="text" class="form-control" id="recette" aria-describedby="recette" name="recette" value="" minlength="5" maxlength="100" required>
                                                    <small id="recetteHelp" class="form-text text-muted">Nom de la recette.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ingredient">Ingrédients *</label>
                                                    <textarea class="form-control" id="ingredient" rows="3" name="ingredient" value="" minlength="10" maxlength="1000" required></textarea>
                                                    <small id="recetteHelp" class="form-text text-muted">Liste des ingrédients.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="instruction">Instructions *</label>
                                                    <textarea class="form-control" id="instruction" rows="3" name="instruction" value="" minlength="10" maxlength="5096" required></textarea>
                                                    <small id="recetteHelp" class="form-text text-muted">Liste des ingrédients.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Photo de la recette *</label>
                                                    <input type="text" class="form-control" id="image" aria-describedby="image" name="image" value="" minlength="20" maxlength="255" required>
                                                    <small id="imageHelp" class="form-text text-muted">URL de la photo de la recette.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="personne">Nbe personnes *</label>
                                                    <select class="form-control" id="personne" name="personne" required minlength="1" maxlength="2">
                                                        <option value="" selected>Choisir le nbr de personnes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                    <small id="personneHelp" class="form-text text-muted">URL de la photo de la recette.</small>
                                                </div>
                                                <input type="hidden" name="form" value="addR">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">
                                            Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- fin template  -->

        </main><!-- /.container -->

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    </body>

    </html>
<?php
} // fin de if

?>