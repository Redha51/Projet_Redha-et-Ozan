<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModels.php');

class User extends CoreModel {

    protected $id;
    protected $email;
    protected $lastName;
    protected $firstName;
    protected $password;
    protected $birthday;
    protected $create_at;

    // Création d'un user
    public function register (){
        $query='INSERT INTO user VALUES(0,
                                    :user_firstname,
                                    :user_lastname,
                                    :user_email,
                                    sha2(:user_password,512),
                                    :user_birthday)';                        
        $result=$this->pdo->prepare($query);
        $result->execute(array(':user_firstname'=>$this->getFirstName(),
                               ':user_lastname'=>$this->getLastname(),
                               ':user_email'=>$this->getEmail(),
                               ':user_password'=>$this->getPassword(),
                               ':user_birthday'=>$this->getBirthday(),
                                ));
    }
    
    // Concordance entre le Mail et le Mdp
    
    public function connexion($email, $password) {
            $query="SELECT *
                    FROM user
                    WHERE user_email='$email' AND user_password=SHA2('$password',512)";
            $result=$this->pdo->prepare($query);
            $result->bindParam("user_email", $email, PDO::PARAM_STR);
            $result->bindParam("user_password", $password, PDO::PARAM_STR);
            $result->execute();
            $final=$result->fetch();
            unset($final["user_password"]);
            unset($final[4]);
            var_dump($final);
            if($final):
                $_SESSION['isConnected'] = $final;
                echo "Vous êtes connecté !";
            else:
                echo "Données Invalide";
            return $final;
            endif;
        }
        
        public static function isConnected(){
            if(!empty($_SESSION['isConnected'])){
                $connected = true;
            } else {
                $connected = false;
            }
            return $connected;
        }

        // Pour rendre un email unique

        public function verifMail($email){
            $query='SELECT COUNT(user_email) FROM user WHERE user_email=:email';
            $result=$this->pdo->prepare($query);
            $result->execute(array(':email'=>$email));
            $final=$result->fetch();
            return $final;
            
        }

        public function getId(){
            return $this->id;
        }

        public function setEmail($email){
          if($this->verifMail($email)):
                $this->email=$email;
                return $this;
        else:
           echo 'Cette email existe déjà';
            endif;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setLastName($lastName){
            $this->lastName=$lastName;
            return $this;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setFirstName($firstName){
            $this->firstName=$firstName;
            return $this;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function setPassword($password){
            if  (strlen($password) >= 6 
                && strtolower($password) != ($password) 
                && strtoupper($password) != ($password)):
                $this->password=$password;
                return $this->password;
            else:
                echo '<p class="alert alert-danger" role="alert">Le mot de passe doit avoir au moins 6 caratères, une majuscule,une minuscule !</p>';
            endif;
            
        }

        public function getPassword(){
            return $this->password;
        }

        public function setBirthday($birthday){
            $this->birthday=$birthday;
            return $this->birthday;
        }

        public function getBirthday(){
            return $this->birthday;
        }

        public function getCreateAt(){
            return $this->create_at;
        }
}
?>