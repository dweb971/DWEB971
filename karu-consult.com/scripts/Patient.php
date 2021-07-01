<?php 

class Patient
{
    
    //proprietes -> variables
    private $_daterdv;
    private $_heure;
    private $_civilite;
    private $_nom;
    private $_prenom;
    private $_tel;
    private $_email;
    private $_visite;  // raison de la visite
    private $_patient; // patient du cabinet

    private $_DBConnect;




    // methodes
    public function __construct($connectOBJ){
       // instance PDO
       $this->set_DBConnect($connectOBJ->pdo);
        
    }


    public function prise_rdv(array $data)
    {
        //print_r($this->get_DBConnect());   

        // affectation donnees
        $this->set_civilite($this->nettoyer($data["civFrm"]));
        $this->set_prenom(ucfirst($this->nettoyer($data["prenomFrm"])));
        $this->set_nom(strtoupper($this->nettoyer($data["nomFrm"])));
        $this->set_tel($this->nettoyer($data["telFrm"]));
        $this->set_email(strtolower($this->nettoyer($data["emailFrm"])));
        $this->set_visite($this->nettoyer($data["visiteFrm"]));

        # test patient cabinet o/n
        if( !isset($data["patientFrm"]) ){
            $this->set_patient(0);
        } else {
            $this->set_patient($this->nettoyer($data["patientFrm"]));
        } # end $data["patientFrm"]

        $this->set_daterdv($this->nettoyer($data["rdvFrm"]));
        $this->set_heure($this->nettoyer($data["heureFrm"]));

        // test sur telephone
        //echo $this->insert_data();
        $dates = date("Y-m-d H:i:s");

        # test si patient existe deja
        $reqSP = "SELECT id, nom, prenom FROM patient 
        WHERE nom = '".$this->get_nom()."' AND prenom = '".$this->get_prenom()."' ";

        $req = $this->get_DBConnect()->prepare($reqSP);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);

        if( $req->rowCount() != 0 ){

            $idPatient = $result["id"];

            $reqIR = "INSERT INTO rendez_vous (idPatient, visite, patient, date_rdv, heure_rdv, dateAdd, dateUpdate) 
            VALUES ('".$idPatient."', '".$this->get_visite()."', '".$this->get_patient()."', 
            '".$this->get_daterdv()."', '".$this->get_heure()."', '".$dates."', '".$dates."')"; # requete insert rendez_vous

            $dbh = $this->get_DBConnect()->query($reqIR);

            print_r($reqIR);


        } else {

            // requet insert
        $reqIP = "INSERT INTO patient (civilite, nom, prenom, telephone, email, dateAdd, dateUpdate) 
        VALUES ('".$this->get_civilite()."', '".$this->get_nom()."', '".$this->get_prenom()."', '".$this->get_tel()."',
        '".$this->get_email()."', '".$dates."', '".$dates."')";     # requete insert patient


        $dbh = $this->get_DBConnect()->query($reqIP);
            $idPatient = $this->get_DBConnect()->lastInsertId() ;

            if (isset($idPatient)) {
                # insert rdv
            $reqIR = "INSERT INTO rendez_vous (idPatient, visite, patient, date_rdv, heure_rdv, dateAdd, dateUpdate) 
            VALUES ('".$idPatient."', '".$this->get_visite()."', '".$this->get_patient()."', 
            '".$this->get_daterdv()."', '".$this->get_heure()."', '".$dates."', '".$dates."')"; # requete insert rendez_vous

            $dbh = $this->get_DBConnect()->query($reqIR);

                print_r($reqIR);
            } else {
                echo "erreur select idppatient";
            } # end $idpatient
        
            print_r($idPatient);
       

        } # end rowCount


    }

    public function cherche_date_heure($date, $heure)
    {
        // affiche date/heure
        // echo "le rdv est pour le $date à $heure.";

        # cherche date/heure dans table rendez_vous
        $requete = "SELECT date_rdv, heure_rdv FROM rendez_vous 
        WHERE date_rdv = '".$date."' AND heure_rdv = '".$heure."'";

        $reqSD = $this->get_DBConnect()->prepare($requete);
        $resultat = $reqSD->execute();

        # si 1 resultat
        if($reqSD->rowCount() != 0){
            
            # date pas disponible
            echo "<p>Rendez-vous impossible, choisir une autre date ou une autre heure!</p>";
        }


    }




    public function insert_data($pdo){


        if( preg_match('/[0-9]+/', $this->get_tel() ) == true ){
            
            return $this->get_tel();

        } else {
            return false;
        }
    }

    public function nettoyer($chaine){

        // securite
        $chaine = trim(strip_tags($chaine));
        return $chaine;

    }

  





    // getter / setter


    /**
     * Get the value of _daterdv
     */ 
    public function get_daterdv()
    {
        return $this->_daterdv;
    }

    /**
     * Set the value of _daterdv
     *
     * @return  self
     */ 
    public function set_daterdv($_daterdv)
    {
        $this->_daterdv = $_daterdv;

        return $this;
    }

    /**
     * Get the value of _heure
     */ 
    public function get_heure()
    {
        return $this->_heure;
    }

    /**
     * Set the value of _heure
     *
     * @return  self
     */ 
    public function set_heure($_heure)
    {
        $this->_heure = $_heure;

        return $this;
    }

    /**
     * Get the value of _civilite
     */ 
    public function get_civilite()
    {
        return $this->_civilite;
    }

    /**
     * Set the value of _civilite
     *
     * @return  self
     */ 
    public function set_civilite($_civilite)
    {
        $this->_civilite = $_civilite;

        return $this;
    }

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
     * Get the value of _tel
     */ 
    public function get_tel()
    {
        return $this->_tel;
    }

    /**
     * Set the value of _tel
     *
     * @return  self
     */ 
    public function set_tel($_tel)
    {
        $this->_tel = $_tel;

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
     * Get the value of _visite
     */ 
    public function get_visite()
    {
        return $this->_visite;
    }

    /**
     * Set the value of _visite
     *
     * @return  self
     */ 
    public function set_visite($_visite)
    {
        $this->_visite = $_visite;

        return $this;
    }

    /**
     * Get the value of _patient
     */ 
    public function get_patient()
    {
        return $this->_patient;
    }

    /**
     * Set the value of _patient
     *
     * @return  self
     */ 
    public function set_patient($_patient)
    {
        $this->_patient = $_patient;

        return $this;
    }

    /**
     * Get the value of _DBConnect
     */ 
    public function get_DBConnect()
    {
        return $this->_DBConnect;
    }

    /**
     * Set the value of _DBConnect
     *
     * @return  self
     */ 
    public function set_DBConnect($_DBConnect)
    {
        $this->_DBConnect = $_DBConnect;

        return $this;
    }
}


?>
