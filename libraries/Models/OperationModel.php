<?php

require_once('libraries/Utils/Database.php');
require_once('libraries/Models/CoreModel.php');
require_once('libraries/Models/UserModel.php');
require_once('libraries/Models/CategorieModel.php');
require_once('libraries/Models/PaymentModel.php');



class Operation extends CoreModel
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

        $query='INSERT INTO operation VALUES (0,
                                              :ope_amount,
                                              :ope_type,
                                              :ope_date,
                                              :ope_comment,
                                              :ope_create_at,
                                              :ope_update_at,
                                              :user_id,
                                              :cate_id,
                                              :payment_id)';
        $result=$this->pdo->prepare($query);
        $result->execute(array(':ope_amount'=>$this->getAmount(),
                               ':ope_type'=>$_POST['type'],
                               ':ope_date'=>$this->getDate(),
                               ':ope_comment'=>$this->getComment(),
                               ':ope_create_at'=>$this->getCreate_At(),
                               ':ope_update_at'=>$this->getUpdate_At(),
                               ':user_id'=>$_SESSION['isConnected']['user_id'],
                               ':cate_id'=>$_POST['categorie'],
                               ':payment_id'=>$_POST['payment']
                                ));
        echo '<div class="row" id="alert_box">
        <div class="col s12 m12">
        <div class="card green darken-1">
        <div class="row">
                <div class="col s12 m10">
                <div class="card-content white-text">
                <p>Votre opération à été enregistré avec succès !</p>
                <div class="col s10 m2">
                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>';
    }

    // Pour afficher les opérations
    public function viewOperation(){
        $query="SELECT ope_amount,type.ope_type,categorie.name,
                       payment_type,ope_date,
                       ope_comment,ope_id
                FROM operation
                INNER JOIN type
                    ON type.type_id = operation.type_id
                INNER JOIN categorie
                    ON categorie.id = operation.cate_id
                INNER JOIN payment
                    ON payment.payment_id = operation.payment_id
                ORDER BY ope_date DESC";
        $result=$this->pdo->prepare($query);
        $result->execute();
        $table=$result->fetchAll();
        // var_dump($table);
        // die();
        $aff="";
        echo "<table class='responsive-table'>
        <thead>
          <tr>
              <th>Montant de l'opération</th>
              <th>Type de l'opération</th>
              <th>Catégorie opération</th>
              <th>Type de paiement</th>
              <th>Date de l'opération</th>
              <th>Commentaire</th>
          </tr>
        </thead>
        <tbody>";
            foreach ($table as $value):
                $aff.="<tr>
            <td>".$value[0]."</td>
            <td>".$value[1]."</td>
            <td>".$value[2]."</td>
            <td>".$value[3]."</td>
            <td>".$value[4]."</td>
            <td>".$value[5]."</td>
            <td>
            <form action='operationModif.php' method='post'>
                    <input type='hidden' value=".$value[6]." name='modifOp'/>
                    <button type='submit' name='modif'>Modifier</button>
            </form>
            <form action='' method='post'>
                    <input type='hidden' value=".$value[6]." name='delOp'/>
                    <button type='submit' name='delete'>Supprimer</button>
            </form>
            
          
            </td>
            </tr>";
        endforeach;
        return $aff;
        echo "</tbody>
            </table>";     
    }

    public function findOperationById($id) {
        $query="SELECT * FROM operation WHERE ope_id = '$id'";
        $result=$this->pdo->prepare($query);
        $result->bindParam("ope_id", $id, PDO::PARAM_STR);
        $result->execute();
        $final=$result->fetch();
        return $final;

    }

    public function updateOperation($id){
        // $query="UPDATE operation SET user_password=SHA2('$password',512) WHERE user_id='$id'";
        //         $result2=$this->pdo->prepare($query2);
        //         $result2->bindParam("user_password", $password, PDO::PARAM_STR);
        //         $result2->execute();
    }


    

    public function deleteOperation($id){

        $query="DELETE FROM operation WHERE ope_id ='$id'";
        $result=$this->pdo->prepare($query);
        $result->bindParam("ope_id", $id, PDO::PARAM_STR);
        $result->execute();
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