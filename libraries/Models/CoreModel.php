<?php

require_once('libraries/Utils/Database.php');

abstract class CoreModel {

    protected $pdo;

    public function __construct()
    {
        $this->pdo=Database::getPdo();
    }  

    // public function findUser($email) {
    //     $query="SELECT * FROM user WHERE user_email = '$email'";
    //     $result=$this->pdo->prepare($query);
    //     $result->bindParam("user_email", $email, PDO::PARAM_STR);
    //     $result->execute();
    //     $final=$result->fetch();
    // }

    public function deleteUser($email) {
        $query="DELETE FROM user WHERE user_email ='$email'";
        $result=$this->pdo->prepare($query);
        $result->bindParam("user_email", $email, PDO::PARAM_STR);
        $result->execute();
        $final=$result->fetch();
        return $final;
    }
}


?>