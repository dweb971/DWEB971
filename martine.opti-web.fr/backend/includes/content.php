<?php include("includes/sidebar.php");  ?>

<div class="span9">
    <div class="content">
            <?php 
                
               $action = $_GET['key'];
                switch ($action) {
                    case 'exo':
                        # code...
                        include("includes/exo.php");
                        break;
                    case 'listexo':
                            # code...
                            include("includes/listexo.php");
                            break;
                            
                    default:
                        # code...
                        include("includes/accueil.php");
                        break;
                }
            
            ?>

    </div>
    <!--/.content-->
</div>
<!--/.span9-->