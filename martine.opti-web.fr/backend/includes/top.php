<div class="nav-collapse collapse navbar-inverse-collapse">
    <?php
       switch ($page) {
           case 'Connexion':
?>
    <ul class="nav pull-right">
        <li><a href="forgot.php">
                Oubliez mot de passe
            </a></li>
    </ul>
    <?php 
               break;
               case 'Oubliez mot de passe':
                ?>
                <ul class="nav pull-right">
                        <li><a href="index.php">
                                Connexion
                        </a></li>
                </ul>
    <?php 
               break;
               case 'Dashboard':
                ?>
                <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><?php echo $action = (empty($_SESSION['connexion'])) ? '*******' : $_SESSION["email"];?> </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="dashboard.php?key=logout">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
    <?php 
                                               break;
           
           default:
               # code...
               break;
       }
    ?>
</div><!-- /.nav-collapse -->