<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard - <?php echo $_SESSION["nom"]." ".$_SESSION["prenom"]; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <?php 
        
        $m = $_GET["m"];

        switch ($m) {
          case 'exo':
            # code...
            print_r($_GET);
            break;

            case 'use':
              # code...
              include("mains/user.php");
              break;

          default:
            # code...
            
            break;
        }

      ?>


    </main>