<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModel.php');

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
        if(!empty($this->firstName) && !empty($this->lastName) && !empty($this->email)
        && !empty($this->password) && !empty($this->birthday)):
            if($this->verifMail($this->email) < 1):
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
                               ':user_birthday'=>$this->getBirthday()
                                ));
            echo 'Vous avez été enregistré !(Redirection)';
            else:
                echo 'Cette email existe déjà';
            endif;
                endif;
                                
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
            if($final):
                $_SESSION['isConnected'] = $final;
                header("refresh:2 ;url='indexAccount.php'");
                echo "Vous êtes connecté !";
            return $final;
            else:
                echo 'Données Invalides';
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

        public static function secureAcces(){
            if (empty($_SESSION)):
                header('location:index.php');
                exit();
            endif;
        }

        public function getUserId(){
            return $this->id;
        }

        public function changeEmail($id, $email){
            $query="UPDATE user set user_email='$email' WHERE user_id='$id'";
            $result=$this->pdo->prepare($query);
            $result->bindParam("user_email", $email, PDO::PARAM_STR);
            $result->execute();
        }

         // Pour rendre un email unique

         public function verifMail($email){
            $query='SELECT user_email FROM user WHERE user_email=:email';
            $result=$this->pdo->prepare($query);
            $result->execute(array(':email'=>$email));
            $final=$result->fetch();
            return $final;
            
        }

        public function setEmail($email){
        if(!empty($email)):
                $this->email=$email;
                return $this->email;
            else:
            echo 'Veuillez renseignez un email <br>';
        endif;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setLastName($lastName){
            var_dump($lastName);
            if(!empty($lastName) && !preg_match("~[0-9]~",$lastName)):
                $this->lastName = $lastName;
                return $this->lastName;
            elseif(empty($lastName)):
                echo 'Veuillez mettre un lastname <br>';
            else:
                echo 'Le lastname ne peut pas contenir de chiffre <br>';
            endif;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setFirstName($firstName){
            if(!empty($firstName) && !preg_match("~[0-9]~",$firstName)):
                $this->firstName = $firstName;
                return $this->firstName;
            elseif(empty($firstName)):
                echo 'Veuillez mettre un Firstname <br>';
            else:
                echo 'Le firstname ne peut pas contenir de chiffre <br>';
            endif;
        }

        public function getFirstName(){
            return $this->firstName;
        }

        public function changePassword($id, $password, $oldpassword){
            $query="SELECT user_password
                    FROM user
                    WHERE user_password=SHA2('$oldpassword',512)";
            $result=$this->pdo->prepare($query);
            $result->bindParam("user_password", $oldpassword, PDO::PARAM_STR);
            $result->execute();
            $final=$result->fetch();
            if($final == TRUE):
                $query2="UPDATE user SET user_password=SHA2('$password',512) WHERE user_id='$id'";
                $result2=$this->pdo->prepare($query2);
                $result2->bindParam("user_password", $password, PDO::PARAM_STR);
                $result2->execute();
                echo 'Mot de passe changé';
            else:
                echo 'Ancien mot de passe incorrecte';
            endif;
            
        }

        public function setPassword($password){
            if(!empty($password)):
                if(strlen($password) >= 6 
                    && strtolower($password) != ($password) 
                    && strtoupper($password) != ($password)):
                    $this->password=$password;
                    return $this->password;
                else:
                    echo 'Le mot de passe doit avoir au moins 6 caratères, une majuscule,une minuscule !';
                endif;
            else:
                echo 'Veuillez renseignez un mot de passe';
            endif;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setBirthday($birthday){
            if(!empty($birthday)):
                $this->birthday=$birthday;
                return $this->birthday;
            else:
                echo 'Veuillez renseignez votre date de naissance <br>';
            endif;
            
        }

        public function getBirthday(){
            return $this->birthday;
        }

        public function getCreateAt(){
            return $this->create_at;
        }
}
?>