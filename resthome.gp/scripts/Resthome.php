<?php

/**
 * 
 */
class Resthome
{
    // propriete
    private $_email;
    private $_password;
    private $_connectDB;
    private $_nomR;
    private $_catR;
    private $_ingR;
    private $_persR;   // nbr personne
    private $_instR;   // instruction
    private $_imgR;



    // methode
    public function __construct($db)
    {
        $this->set_connectDB($db->pdo);
    }

    public function delR(int $id)
    {
        // supprimer une recette

    }

    public function addR(array $data)
    {
        

        $this->set_nomR($this->nettoyer($data["recette"]));
        $this->set_ingR($this->nettoyer($data["ingredient"]));
        $this->set_instR($this->nettoyer($data["instruction"]));
        $this->set_imgR($this->nettoyer($data["image"]));          // url
        $this->set_persR($this->nettoyer($data["personne"]));   // nbrpersonne
        $this->set_catR($this->nettoyer($data["categorie"]));  // idcategorie
        $dates = date("Y-m-d H:i:s");  //heure locale de la machine

        $titre = $this->get_nomR();  //
        $idcategorie = $this->get_catR();
        $ingredient = $this->get_ingR();
        $instruction = $this->get_instR();
        $image = $this->get_imgR();
        $p = $this->get_persR();

        $reqI = "INSERT INTO recette (idcategorie, nom_recette, ingredient, instruction, image, nbr_personne, dateAdd, dateUpdate) 
        VALUES('".$idcategorie."','".$titre."', '".$ingredient."', '".$instruction."', '".$image."', '".$p."', '".$dates."', '".$dates."')";

        $dbh = $this->get_connectDB()->query($reqI);
        print_r($dbh);
        exit;

        if($dbh->rowCount() === 1)
        {
            // insert ok
            /* Ceci produira une erreur. Notez la sortie ci-dessus,
            * qui se trouve avant l'appel à la fonction header() */
            header('Location: https://' . $_SERVER["HTTP_HOST"] . '/dashboard.php');
            exit;


        } else {
            // erreur insert
        }

    }

    public function categorie()
    {
        // lister les categories
        $reqS = "SELECT * FROM categorie";
        $dbh = $this->get_connectDB()->query($reqS);

        return $dbh;
    }

    public function login(array $data)
    {

        // securite et mise en forme
        $this->set_email(strtolower($this->nettoyer($data["email"])));
        $this->set_password($this->nettoyer($data["password"]));

        // requete sql SELECT
        $reqS = "SELECT * FROM connexion WHERE email = '" . $this->get_email() . "'";
        $dbh = $this->get_connectDB()->query($reqS);

        if ($dbh->rowCount() === 1) {
            // trouve un resultat // verification password
            foreach ($dbh as $row) {
                if (password_verify($this->get_password(), $row["mot_passe"])) {
                    // redirection dashboard et declaration sessions
                    $_SESSION["email"] = $this->get_email();

                    /* Ceci produira une erreur. Notez la sortie ci-dessus,
                    * qui se trouve avant l'appel à la fonction header() */
                    header('Location: https://' . $_SERVER["HTTP_HOST"] . '/dashboard.php');
                    exit;
                } else {
                    // redirection page connexion et session msg error
                    $_SESSION["msg"] = "<p>Erreur sur votre login ou mot de passe !!!</p>";

                    /* Ceci produira une erreur. Notez la sortie ci-dessus,
                    * qui se trouve avant l'appel à la fonction header() */
                    header('Location: https://' . $_SERVER["HTTP_HOST"] . '/index.php');
                    exit;
                }
            }
        } else {
            // ne trouve pas de resultat

        }
    }

    public function nettoyer($chaine)
    {

        // securite
        $chaine = trim(strip_tags($chaine));
        return $chaine;
    }


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
     * Get the value of _nomR
     */ 
    public function get_nomR()
    {
        return $this->_nomR;
    }

    /**
     * Set the value of _nomR
     *
     * @return  self
     */ 
    public function set_nomR($_nomR)
    {
        $this->_nomR = $_nomR;

        return $this;
    }

    /**
     * Get the value of _catR
     */ 
    public function get_catR()
    {
        return $this->_catR;
    }

    /**
     * Set the value of _catR
     *
     * @return  self
     */ 
    public function set_catR($_catR)
    {
        $this->_catR = $_catR;

        return $this;
    }

    /**
     * Get the value of _ingR
     */ 
    public function get_ingR()
    {
        return $this->_ingR;
    }

    /**
     * Set the value of _ingR
     *
     * @return  self
     */ 
    public function set_ingR($_ingR)
    {
        $this->_ingR = $_ingR;

        return $this;
    }

    /**
     * Get the value of _persR
     */ 
    public function get_persR()
    {
        return $this->_persR;
    }

    /**
     * Set the value of _persR
     *
     * @return  self
     */ 
    public function set_persR($_persR)
    {
        $this->_persR = $_persR;

        return $this;
    }

    /**
     * Get the value of _instR
     */ 
    public function get_instR()
    {
        return $this->_instR;
    }

    /**
     * Set the value of _instR
     *
     * @return  self
     */ 
    public function set_instR($_instR)
    {
        $this->_instR = $_instR;

        return $this;
    }

    /**
     * Get the value of _imgR
     */ 
    public function get_imgR()
    {
        return $this->_imgR;
    }

    /**
     * Set the value of _imgR
     *
     * @return  self
     */ 
    public function set_imgR($_imgR)
    {
        $this->_imgR = $_imgR;

        return $this;
    }
}
