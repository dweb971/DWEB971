<?php 
# gestion admin docteur
class Backend
{

    # propriete variable
    private $_email;
    private $_pass;
    private $_DBConnect;





    # methode fonction
    public function __construct($connectOBJ){
        // instance PDO
        $this->set_DBConnect($connectOBJ->pdo);
         
    }
    
    public function login(array $data)
    {
        
        # securite data
        $this->set_email($this->nettoyer(strtolower($data["email"])));
        $e = $this->get_email();

        $this->set_pass($this->nettoyer($data["password"]));
        $p = $this->get_pass();

        $reqS = "SELECT * FROM user WHERE email = '".$e."'";
        $req = $this->get_DBConnect()->prepare($reqS);

        # PDOSTATMENT
        //print_r($req);

        # 
        $req->execute();

        # stock resultat
        $result = $req->fetch(PDO::FETCH_ASSOC);

        # verif password
        if($req->rowCount() === 1)
        {
            if( password_verify($p, $result["password"]))
            {
                echo "passe ok";
            } else {
                echo "passe bad";

            }
        } else {
            echo "pas de résultat ou erreur requete";

        }
    }

    public function new_passe(string $email)
    {
        # securite data
        $this->set_email($this->nettoyer(strtolower($email)));
        $e = $this->get_email();

        $reqS = "SELECT * FROM user WHERE email = '".$e."'";
        $req = $this->get_DBConnect()->prepare($reqS);

        $req->execute();

        # stock resultat
        $result = $req->fetch(PDO::FETCH_ASSOC);

        # verif password
        if($req->rowCount() === 1)
        {
            # envoi email
           $id = $result["id"];
            $o = "Votre nouveau mot de passe.";
            $m = "Bonjour, <a href='https://karu-consult.com/backend/npasse.php?u=".$id."'>cliquez-ici</a> pour recevoir votre nouveau mot de passe.";
            $this->send_email($result["email"], $o, $m);

        } else {
            echo "pas de résultat ou erreur requete";

        }

    }

    public function send_email($email, $o, $m)
    {
        # envoi email

        $to = $email;
        $objet = $o;
        $message = $m;

        echo $to.$objet.$message;

        //mail($to, $objet, $message);

        /*if()
        {

        } else {


        }*/
    }

    public function update_passe(int $id)
    {
        # find id exist
        $reqS = "SELECT * FROM user WHERE id = '".$id."' ";
        $req = $this->get_DBConnect()->prepare($reqS);
        $req->execute();

        if($req->rowCount() === 1)
        {
            # mot de passe
            $p = $this->generate_pass();

            # send password
            $result = $req->fetch(PDO::FETCH_ASSOC);

            $e = $result["email"];
            $o = "Votre mot passe";
            $m = "Bonjour, voici votre nouveau mot de passe : ".$p;
            
            


            # update password in table user
            

        } else {
            

        }



    }

    public function generate_pass()
    {
        $p = "abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ23456789@&=#";
        $p = str_shuffle($p);
        $pP = str_split($p, 11);
        $index = rand(0, 4);

        $password = $pP[$index];

        return $password;
        
    }

    public function nettoyer($chaine){

        // securite
        $chaine = trim(strip_tags($chaine));
        return $chaine;

    }





    # getter/setter

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
     * Get the value of _pass
     */ 
    public function get_pass()
    {
        return $this->_pass;
    }

    /**
     * Set the value of _pass
     *
     * @return  self
     */ 
    public function set_pass($_pass)
    {
        $this->_pass = $_pass;

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