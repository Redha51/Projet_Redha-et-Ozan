<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModel.php');
require_once('libraries/Models/UserModel.php');
require_once('libraries/Models/CategorieModel.php');
require_once('libraries/Models/PaymentModel.php');



class Operation
{

    protected $id;
    protected $amount;
    protected $type;
    protected $date;
    protected $comment;
    protected $create_at;
    protected $update_at;
    protected $user_id;


    // Création d'une nouvelle opération
    public function newOperation(){

        $user = new User();
        $cate = new Categorie();
        $pay = new Payment();

        $query='INSERT INTO operation VALUES (0,
                                              :$ope_amount,
                                              :$ope_type,
                                              :$ope_date,
                                              :$ope_comment,
                                              :$ope_create_at,
                                              :$ope_update_at,
                                              :$user_id,
                                              :$cate_id,
                                              :$payment_id)';
        $result=$this->pdo->prepare($query);
        $result->execute(array(':ope_amount'=>$this->getAmount(),
                               ':ope_type'=>$this->getType(),
                               ':ope_date'=>$this->getDate(),
                               ':ope_comment'=>$this->getComment(),
                               ':ope_create_at'=>$this->getCreate_At(),
                               ':ope_update_at'=>$this->getUpdate_At(),
                               ':user_id'=>$user->getUserId(),
                               ':cate_id'=>$cate->getCateId(),
                               ':payment_id'=>$pay->getPaymentId(),
                                ));
        echo 'Opération validée!';
    }

    public function findOperation($date) {
        $query="SELECT * FROM operation WHERE ope_date = '$date'";
        $result=$this->pdo->prepare($query);
        $result->bindParam("ope_date", $date, PDO::PARAM_STR);
        $result->execute();
        $final=$result->fetch();
    }

    public function deleteOperation($id){

        $query="DELETE FROM operation WHERE operation_id ='$id'";
        $result=$this->pdo->prepare($query);
        $result->bindParam("operation_id", $id, PDO::PARAM_STR);
        $result->execute();
        $final=$result->fetch();
    }

    public function getId(){
        return $this->id;
    }

    public function setAmount($amount){
        $this->amount=$amount;
        return $this->amount;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function setType($type){
        $this->type=$type;
        return $this->type;
    }

    public function getType(){
        return $this->type;
    }

    public function setDate($date){
        $this->date=$date;
        return $this->date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setComment($comment){
        $this->comment=$comment;
        return $this->comment;
    }

    public function getComment(){
        return $this->comment;
    }

    public function setCreate_At($create){
        $this->create_at=$create;
        return $this->create_at;
    }

    public function getCreate_At(){
        return $this->create_at;
    }

    public function setUpdate_At($update){
        $this->update_at=$update;
        return $this->update_at;
    }

    public function getUpdate_At(){
        return $this->update_at;
    }

}