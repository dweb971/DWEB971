<?php

/**
 * 
 */
class AdminRM
{

    // proprietes
    private $_email;
    private $_password;
    private $_profil;
    private $_connectDB;
    private $_object;
    private $_message;





    // methodes
    public function __construct($dbconnect)
    {
        $this->set_connectDB($dbconnect->pdo);

        date_default_timezone_set('America/Guadeloupe');
    }


    public function add_user(array $data)
    {

        $this->set_email(strtolower($this->nettoyer($data["fmail"])));
        $this->set_password(password_hash($this->nettoyer($data["fpasse"]), PASSWORD_DEFAULT));

        
        $dates = date("Y-m-d H:i:s");

        // plus rapide
        $m = $this->get_email();
        $p = $this->get_password();
        $pr = 'admin';


        // requete insert
        $requeteI = "INSERT INTO user (email, password, profil, date_add, date_update) 
        VALUES ('" . $m . "', '" . $p . "', '" . $pr . "', '" . $dates . "', '" . $dates . "')";

        try {
            $dbh = $this->get_connectDB()->query($requeteI);
            //print_r($dbh->rowCount());

            // print_r($this->get_connectDB()->lastInsertId());

            if ($this->get_connectDB()->lastInsertId() != 0) {
                $url = $_SERVER["HTTP_HOST"];
                header('Location: https://' . $url . '/backend/index.php');
                exit;
            } else {
            }
        } catch (PDOException $Exception) {
            // Note The Typecast To An Integer!
            //throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }
    }

    public function passe_new(array $data)
    {

        $this->set_email(strtolower($this->nettoyer($data["fmail"])));

        $reqS = "SELECT * FROM user WHERE email = '" . $this->get_email() . "'";
        $dbh = $this->get_connectDB()->query($reqS);

        // test sur nbr resultat
        if ($dbh->rowCount() === 0) {
            //throw new Exception("<pre>ATTENTION, aucune résultat correspondant l'adresse email indiqué </pre>");

            /**
             * session
             * redirection dashboard
             */
            $url = $_SERVER["HTTP_HOST"];
            header('Location: https://' . $url . '/backend/index.php');
            exit;

        }

        $dates = date("Y-m-d H:i:s");

        //new passe
        $code = $this->generate_passe(true);
        //$code = "azertyuiop123";
        $this->set_password(password_hash($code,PASSWORD_DEFAULT));
        $email = $this->get_email();
        $newP = $this->get_password();
        

        $reqUp = "UPDATE user SET password = '".$newP."', date_update = '".$dates."' WHERE email = '".$email."';";
        $dbh = $this->get_connectDB()->query($reqUp);

        if($dbh->rowCount() === 1)
        {
            // envoi message
            $this->set_object("Demande de mot de passe.");
            $this->set_message(wordwrap("Bonjour, voici votre nouveau mot de passe : $code,  ". "\r\n"."Votre webmaster vous remercie...", 70, "\r\n"));

            $this->envoi_email($email, $this->get_object(), $this->get_message());


        } else {
                    // erreur
        }




    }


    public function envoi_email($destinataire, $sujet, $msg)
    {
        // Envoi du mail

        $to      = $destinataire;
        $headers = 'From: webmaster@testrsma.gp' . "\r\n" .
        'Reply-To: webmaster@testrsma.gp' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        if(mail($to, $sujet, $msg, $headers) == true)
        {
            // redirection page connexion
            $url = $_SERVER["HTTP_HOST"];
            header('Location: https://' . $url . '/backend/reponse.php');
            exit;

        }  else {

        }

        
    }

    public function nettoyer($chaine)
    {
        // securite
        $chaine = trim(strip_tags($chaine));
        return $chaine;
    }

    public function generate_passe(bool $generer)
    {
        if($generer === true){
           
            $base = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789@%#&";
            $base = str_shuffle($base);

            $p = str_split($base, 10);
            $index = rand(0,5);

            return $p[$index];

        } else {
            // redirection
        }



    }







    // getter / setter

    /**
     * Get the value of _email
     */
    public function get_email()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */
    public function set_email($_email)
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * Get the value of _password
     */
    public function get_password()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */
    public function set_password($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of _profil
     */
    public function get_profil()
    {
        return $this->_profil;
    }

    /**
     * Set the value of _profil
     *
     * @return  self
     */
    public function set_profil($_profil)
    {
        $this->_profil = $_profil;

        return $this;
    }

    /**
     * Get the value of _connectDB
     */
    public function get_connectDB()
    {
        return $this->_connectDB;
    }

    /**
     * Set the value of _connectDB
     *
     * @return  self
     */
    public function set_connectDB($_connectDB)
    {
        $this->_connectDB = $_connectDB;

        return $this;
    }

    /**
     * Get the value of _object
     */ 
    public function get_object()
    {
        return $this->_object;
    }

    /**
     * Set the value of _object
     *
     * @return  self
     */ 
    public function set_object($_object)
    {
        $this->_object = $_object;

        return $this;
    }

    /**
     * Get the value of _message
     */ 
    public function get_message()
    {
        return $this->_message;
    }

    /**
     * Set the value of _message
     *
     * @return  self
     */ 
    public function set_message($_message)
    {
        $this->_message = $_message;

        return $this;
    }
}
