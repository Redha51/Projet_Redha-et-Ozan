<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModel.php');


class Payment extends CoreModel {

    protected $id;
    protected $name;

    public function selectPayment(){
        $query = $this->pdo->query('SELECT payment_id, payment_type FROM payment ');
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        // var_dump($result);
        // die();
        foreach($result as $row => $element)
        {
            echo '<option value="'.$element['payment_id'].'">'.$element['payment_type'].'</option>';
        }
    }

    public function setPaymentId($id){
        $this->id=$id;
        return $this->id;
    }

    public function getPaymentId(){
        return $this->id;
    }

    public function setPaymentName($name){
        $this->name=$name;
        return $this->name;
    }

    public function getPaymentName(){
        return $this->name;
    }

    public function setCreate_At($create_at){
        $this->create_at=$create_at;
        return $this->create_at;
    }

    public function getCreate_At(){
        return $this->create_at;
    }

    public function setUpdate_At($update_at){
        $this->update_at=$update_at;
        return $this->update_at;
    }

    public function getUpdate_At(){
        return $this->update_at;
    }
}