<?php 
/**
 * 
 */
class AdminDA extends AdminRM
{
    // propriete





    // methodes
    public function connexion(array $data){

        date_default_timezone_set('America/Guadeloupe');
        $dates = date("Y-m-d H:i:s");

        $this->set_email(strtolower($this->nettoyer($data["fmail"])));
        $this->set_password($this->nettoyer($data["fpasse"]));


        $reqS = "SELECT email, password, profil FROM user WHERE email = '".$this->get_email()."'";
        $dbh = $this->get_connectDB()->query($reqS);
        
        // test sur nbr resultat
        if ($dbh->rowCount() === 0) {
            throw new Exception("<pre>ATTENTION, aucune résultat correspondant l'adresse email indiqué </pre>");
        }

        // passe a la suite
        try {

            // password
            foreach($dbh as $row){
               // print_r($row);
    
                if (password_verify($this->get_password(), $row["password"])) {
                    echo 'Password is valid!';

                    if($row["profil"] == 'admin'){
                        // admin    
                        $_SESSION["admin"] = "admin";
                        $_SESSION["connexion"] = "connecte";
                        $_SESSION["email"] = $row["email"];

                         /**
                         * session
                         * redirection dashboard
                         */
                        $url = $_SERVER["HTTP_HOST"];
                        header('Location: https://'.$url.'/backend/dashboard.php');
                        exit;



                    } else if($row["profil"] == 'prof') {
                        // prof

                    } else {
                        // visiteur
                    }

                   

                } else {
                    echo 'Invalid password.';

                    /**
                     * session message erreur
                     * redirection connexion
                     */
                    $url = $_SERVER["HTTP_HOST"];
                    header('Location: https://' . $url . '/backend/index.php?msg=bad');
                    exit;



                }
            }
    

        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }



    }











    // getter /  setter



   
}
