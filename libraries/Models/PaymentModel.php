<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModel.php');


class Payment{

    protected $id;
    protected $name;
    protected $create_at;
    protected $update_at;

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