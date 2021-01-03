<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModel.php');

class Categorie extends CoreModel {

    protected $id;
    protected $name;


    public function selectCategorie(){
        $query = $this->pdo->query('SELECT id, name FROM categorie ');
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        // var_dump($result);
        // die();
        foreach($result as $row => $element)
        {
            echo '<option value="'.$element['id'].'">'.$element['name'].'</option>';
        }
    }

    public function setCateId($id){
        $this->id=intval($id);
        return $this->id;
    }

    public function getCateId(){
        return $this->id;
    }

    public function setCateName($name){
        $this->name=$name;
        return $this->name;
    }

    public function getCateName(){
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

    public function selectCate(){

        if(!isset($_SESSION['modifoperation']) && !$_SESSION['modifoperation']){
           
        $query = $this->pdo->query('SELECT id,name FROM categorie ');
                $result = $query->fetchALL(PDO::FETCH_ASSOC);
                foreach($result as $row => $element)
                {
                    echo '<option value="'.$element['id'].'">'.$element['name'].'</option>';
                }
        }else{
           
            $query = $this->pdo->query("SELECT id,name FROM categorie WHERE id <> '$this->id'");
            $result = $query->fetchALL(PDO::FETCH_ASSOC);
            foreach($result as $row => $element)
            {
                echo '<option value="'.$element['id'].'">'.$element['name'].'</option>';
            }
        }
       
    }

    public function selectCateById($id){
        $this->id =$id;
        $query="SELECT id,name FROM categorie WHERE id = '$id'";
        $result=$this->pdo->prepare($query);
        $result->bindParam("id", $id, PDO::PARAM_STR);
        $result->execute();
        $final=$result->fetch();
        echo '<option selected value="'.$final['id'].'">'.$final['name'].'</option>';
    }
}