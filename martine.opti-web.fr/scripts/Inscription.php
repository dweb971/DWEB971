<?php 
/*

*/

class Inscription
{
    // PROPRIETE
    private $_civ;
    private $_nom;
    private $_prenom;
    private $_naissance;
    private $_lieu;
    private $_email;
    private $_adresse;
    private $_cp;
    private $_ville;
    private $_formation;
    private $_diplome;
    private $_nomDiplome;    // nom diplome obtenu
    private $_jdc;
    private $_rsma;
    private $_rsmaI; // info complementaire
    private $_rgpd;
    private $_connectDB;







    // METHODES
    public function __construct($dbconnect)
    {
        $this->set_connectDB($dbconnect->pdo);

    }

    public function stagiaire(array $data)
    {
        //print_r($this->get_connectDB());
        $this->set_civ($this->nettoyer($data["fciv"]));
        $this->set_nom($this->nettoyer(strtoupper($data["fnom"])));
        $this->set_prenom($this->nettoyer(ucfirst($data["fprenom"])));
        $this->set_lieu($this->nettoyer($data["flieu"]));
        $this->set_adresse($this->nettoyer($data["fadresse"]));
        $this->set_cp($this->nettoyer($data["fcp"]));
        $this->set_ville($this->nettoyer($data["fville"]));
        $this->set_formation($this->nettoyer($data["fformation"]));
        $this->set_diplome($this->nettoyer($data["fdiplome"]));
        $this->set_nomDiplome($this->nettoyer($data["fdiplomeN"]));
        $this->set_email(strtolower($this->nettoyer($data["femail"])));
       
        $this->set_rsma($this->nettoyer($data["frsma"]));
       

        if(!isset($data["fjdc"])){
            $this->set_jdc(0);
        } else {
            $this->set_jdc($this->nettoyer($data["fjdc"]));
        }

        if(!isset($data["frgpd"])){
            $this->set_rgpd(0);
        } else {
            $this->set_rgpd($this->nettoyer($data["frgpd"]));
        }

        if(!isset($data["finfo"])){
            $this->set_rsmaI("");
        } else {
            $this->set_rsmaI($this->nettoyer($data["finfo"]));
        }

        // test date naissaissance
        if( $this->testDate($this->nettoyer($data["fnaissance"])) == true){

            $this->set_naissance($this->nettoyer($data["fnaissance"]));

            // pour insert data
            $this->insert_data($this->get_civ(),$this->get_nom(), $this->get_prenom(), $this->get_naissance(), $this->get_lieu(), $this->get_adresse(),
            $this->get_cp(), $this->get_ville(),$this->get_formation(), $this->get_diplome(), $this->get_nomDiplome(), $this->get_jdc(), $this->get_rsma(), 
            $this->get_rsmaI(), $this->get_rgpd(),$this->get_email());

        } else {

            try {
                throw new Exception("Erreur sur la date de naissance, ce n'est pas le bon format.", 30);
            } catch(Exception $e) {
                echo "<pre>The exception code is: " . $e->getCode()." ".$e->getMessage()." : ". $data["fnaissance"]."</pre>";
            }
            
        }


    }

    public function insert_data($civ, $nom, $prenom, $dateN, $lieu, $adresse, $cp, $ville, $formation, $diplome, $nomD, $jdc, $rsma, $rsmaI, $rgpd, $mail){

        if(isset($civ, $nom, $prenom, $dateN, $lieu, $adresse, $cp, $ville, $formation, $nomD, $jdc, $rsma, $rsmaI, $rgpd, $mail)){

            date_default_timezone_set('America/Guadeloupe');
            $dates = date("Y-m-d H:i:s");

            echo $civ, $nom, $prenom, $dateN, $lieu, $adresse, $cp, $ville, $formation, $diplome, $jdc, $nomD, $rsma, $rsmaI, $rgpd, $mail;

            // requet insert
            $requete = "INSERT INTO inscription (sexe, nom, prenom, date_naissance, lieu_naissance, adresse, code_postal, ville, rgpd, date_add, date_update) 
            VALUES ('".$civ."', '".$nom."', '".$prenom."', '".$dateN."', '".$lieu."', '".$adresse."', '".$cp."', '".$ville."' ,'".$rgpd."' ,'".$dates."', '".$dates."')";

            $dbh = $this->get_connectDB()->query($requete);

            // insert in user table
            if($this->get_connectDB()->lastInsertId() != 0){

               $id = $this->get_connectDB()->lastInsertId();

               $reqI = "INSERT INTO questionnaire (idINSC, formation, diplome, nom_diplome, jdc, rsma, info_complementaire, date_add, date_update) 
               VALUES ('".$id."', '".$formation."', '".$diplome."', '".$nomD."', '".$jdc."', '".$rsma."', '".$rsmaI."', '".$dates."', '".$dates."')";

               $dbh = $this->get_connectDB()->query($reqI);

                if($this->get_connectDB()->lastInsertId() != 0) {

                    $this->get_connectDB()->lastInsertId();

                    // non utilise
                   /* $passU = password_hash($this->nettoyer($nom.$prenom.$dates), PASSWORD_DEFAULT);

                   $reqIU = "INSERT INTO user (idINSC, email, password, profil, date_add, date_update) 
                    VALUES ('".$id."', '".$mail."', '".$passU."', 'visiteur' ,'".$dates."', '".$dates."');";

                    if($this->get_connectDB()->query($reqIU)){
                        //echo "<p>Vous inscription est réussi, vous allez recevoir un email pour commercer votre test. </p>";
                        //* This will give an error. Note the output
                        //* above, which is before the header() call 
                       $url = $_SERVER["HTTP_HOST"];
                        header('Location: https://'.$url.'/merci.php');
                        exit; 
                    }*/

                    $url = $_SERVER["HTTP_HOST"];
                    header('Location: https://'.$url.'/merci.php');
                    exit; 

                } else {

                    // error insert
                    try {
                        throw new Exception("Erreur est survenu lors de votre insertion sur la table 'questionnaire' !!!", 50);
                    } catch(Exception $event) {
                        // lever une exception = attraper une erreur et l'afficher
                        echo '<pre>ERREUR : '.$event->getCode().' '.$event->getMessage().'</pre>';
                    }

                }

            } else {
                // error insert
                try {
                    throw new Exception("Erreur est survenu lors de votre insertion, il y a un doublon sur ".$this->get_nom()." ".$this->get_prenom()." ".$this->get_naissance()." !!!", 40);
                } catch(Exception $event) {
                    // lever une exception = attraper une erreur et l'afficher
                    echo '<pre>ERREUR : '.$event->getCode().' '.$event->getMessage().'</pre>';
                }

            }


        }

    }

    public function testDate($dateNaissance)
    {
        return preg_match( '`^\d{4}-\d{1,2}-\d{1,2}$`' , $dateNaissance );
    }

    public function nettoyer($chaine){
        // 
        $chaine = trim(strip_tags($chaine));
        return $chaine;
    }





    // GETTER / SETTER


    /**
     * Get the value of _nom
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _prenom
     */ 
    public function get_prenom()
    {
        return $this->_prenom;
    }

    /**
     * Set the value of _prenom
     *
     * @return  self
     */ 
    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }

    /**
     * Get the value of _naissance
     */ 
    public function get_naissance()
    {
        return $this->_naissance;
    }

    /**
     * Set the value of _naissance
     *
     * @return  self
     */ 
    public function set_naissance($_naissance)
    {
        $this->_naissance = $_naissance;

        return $this;
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
     * Get the value of _rsma
     */ 
    public function get_rsma()
    {
        return $this->_rsma;
    }

    /**
     * Set the value of _rsma
     *
     * @return  self
     */ 
    public function set_rsma($_rsma)
    {
        $this->_rsma = $_rsma;

        return $this;
    }

    /**
     * Get the value of _rgpd
     */ 
    public function get_rgpd()
    {
        return $this->_rgpd;
    }

    /**
     * Set the value of _rgpd
     *
     * @return  self
     */ 
    public function set_rgpd($_rgpd)
    {
        $this->_rgpd = $_rgpd;

        return $this;
    }

    /**
     * Get the value of _civ
     */ 
    public function get_civ()
    {
        return $this->_civ;
    }

    /**
     * Set the value of _civ
     *
     * @return  self
     */ 
    public function set_civ($_civ)
    {
        $this->_civ = $_civ;

        return $this;
    }

    /**
     * Get the value of _lieu
     */ 
    public function get_lieu()
    {
        return $this->_lieu;
    }

    /**
     * Set the value of _lieu
     *
     * @return  self
     */ 
    public function set_lieu($_lieu)
    {
        $this->_lieu = $_lieu;

        return $this;
    }

    /**
     * Get the value of _adresse
     */ 
    public function get_adresse()
    {
        return $this->_adresse;
    }

    /**
     * Set the value of _adresse
     *
     * @return  self
     */ 
    public function set_adresse($_adresse)
    {
        $this->_adresse = $_adresse;

        return $this;
    }

    /**
     * Get the value of _cp
     */ 
    public function get_cp()
    {
        return $this->_cp;
    }

    /**
     * Set the value of _cp
     *
     * @return  self
     */ 
    public function set_cp($_cp)
    {
        $this->_cp = $_cp;

        return $this;
    }

    /**
     * Get the value of _ville
     */ 
    public function get_ville()
    {
        return $this->_ville;
    }

    /**
     * Set the value of _ville
     *
     * @return  self
     */ 
    public function set_ville($_ville)
    {
        $this->_ville = $_ville;

        return $this;
    }

    /**
     * Get the value of _jdc
     */ 
    public function get_jdc()
    {
        return $this->_jdc;
    }

    /**
     * Set the value of _jdc
     *
     * @return  self
     */ 
    public function set_jdc($_jdc)
    {
        $this->_jdc = $_jdc;

        return $this;
    }

    /**
     * Get the value of _formation
     */ 
    public function get_formation()
    {
        return $this->_formation;
    }

    /**
     * Set the value of _formation
     *
     * @return  self
     */ 
    public function set_formation($_formation)
    {
        $this->_formation = $_formation;

        return $this;
    }

    /**
     * Get the value of _diplome
     */ 
    public function get_diplome()
    {
        return $this->_diplome;
    }

    /**
     * Set the value of _diplome
     *
     * @return  self
     */ 
    public function set_diplome($_diplome)
    {
        $this->_diplome = $_diplome;

        return $this;
    }

    /**
     * Get the value of _nomDiplome
     */ 
    public function get_nomDiplome()
    {
        return $this->_nomDiplome;
    }

    /**
     * Set the value of _nomDiplome
     *
     * @return  self
     */ 
    public function set_nomDiplome($_nomDiplome)
    {
        $this->_nomDiplome = $_nomDiplome;

        return $this;
    }

    /**
     * Get the value of _rsmaI
     */ 
    public function get_rsmaI()
    {
        return $this->_rsmaI;
    }

    /**
     * Set the value of _rsmaI
     *
     * @return  self
     */ 
    public function set_rsmaI($_rsmaI)
    {
        $this->_rsmaI = $_rsmaI;

        return $this;
    }
}