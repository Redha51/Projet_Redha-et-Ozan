<?php

class Type extends CoreModel {

protected $id;
protected $ope_type;



    public function selectType(){

        if(!isset($_SESSION['modifoperation']) && !$_SESSION['modifoperation']){
           
        $query = $this->pdo->query('SELECT type_id,ope_type FROM type ');
                $result = $query->fetchALL(PDO::FETCH_ASSOC);
                foreach($result as $row => $element)
                {
                    echo '<option value="'.$element['type_id'].'">'.$element['ope_type'].'</option>';
                }
        }else{
           
            $query = $this->pdo->query("SELECT type_id,ope_type FROM type WHERE type_id <> '$this->id'");
            $result = $query->fetchALL(PDO::FETCH_ASSOC);
            foreach($result as $row => $element)
            {
                echo '<option value="'.$element['type_id'].'">'.$element['ope_type'].'</option>';
            }
        }
       
    }
    public function selectTypeById($id){
          $this->id =$id;
          $query="SELECT type_id,ope_type FROM type WHERE type_id = '$id'";
          $result=$this->pdo->prepare($query);
          $result->bindParam("type_id", $id, PDO::PARAM_STR);
          $result->execute();
          $final=$result->fetch();
          echo '<option selected value="'.$final['type_id'].'">'.$final['ope_type'].'</option>';
    }
}