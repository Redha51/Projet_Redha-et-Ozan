<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');



$opee = new Operation();
$modifOpId = $_POST['modifOp'];
$operation = $opee->findOperationById($modifOpId);

$type = new Type();
$cate = new Categorie();
//$ope =$type->selectTypeById($operation[2]);

$_SESSION['modifoperation'] = true;


//var_dump($operation);


// if(isset($_POST['amount']) && isset($_POST['type']) && isset($_POST['categorie'])
// && isset($_POST['payment']) && isset($_POST['dateOp']) && isset($_POST['comment'])):


//     $ope = new Operation();

//     $ope->setAmount($_POST['amount']);
//     $ope->setDate($_POST['dateOp']);
//     $ope->setComment($_POST['comment']);
//     $ope->newOperation();
// endif;
?>

<form method="post">
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Modification opération</h2>
        </div>
    </div>
            <div class="row">
                <form class="col m8 offset-m2 s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="amount" type="number" min=0  class="form-input" value="<?= $operation[1]?>">
                            <label for="amount">Montant de l'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="type">
                    
                            <option value="" selected>
                                <?php
                                 //$ope;
                                 $type->selectTypeById($operation[2]);
                                ?>
                            </option>

                            <?php
                                $type->selectType();
                            ?>

                            </select>
                            <label for="type">Type d'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="categorie">
                            <option value="" disabled selected>
                            <?php
                                $cate->selectCateById($operation[8]);
                            ?>
                            </option>

                            <?php
                                $cate->selectCate();
                            ?> 
                            </select>
                            <label for="categorie">Categorie d'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="payment">
                            <option value="" disabled selected>Choisir votre type de paiement</option>
                            <?php
                                $pay = new Payment();
                                $pay->selectPayment();
                            ?>
                            </select>
                            <label for="amount">Type de paiement</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="dateOp" type="text" class="datepicker" value="<?= $operation[3]?>">
                            <label for="dateOp">Date de l'opération</label>
                        </div>
                        <div class="input-field col s12">
                        <textarea id="comment" class="materialize-textarea" name="comment" data-length="200"><?= $operation[4]?></textarea>
                          <label for="comment">Commentaire</label>
                        </div>
                        <div class="row">
                            <div class="col m12">
                            <p class="right-align"><button class="btn waves-effect waves-light right-align" type="submit">Modifier mon opération
                        </button></p>
                            </div>
                        </div>

<?php

require_once('Views/partials/footer.php');

?>