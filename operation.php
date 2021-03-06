<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');


if(isset($_POST['amount']) && isset($_POST['type']) && isset($_POST['categorie'])
&& isset($_POST['payment']) && isset($_POST['dateOp']) && isset($_POST['comment'])):

    $ope = new Operation();

    $ope->setAmount($_POST['amount']);
    $ope->setDate($_POST['dateOp']);
    $ope->setComment($_POST['comment']);
    $ope->newOperation();
endif;
?>

<form method="post">
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Nouvelle opération</h2>
        </div>
    </div>
            <div class="row">
                <form class="col m8 offset-m2 s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="amount" type="number" min=0  class="form-input">
                            <label for="amount">Montant de l'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="type">
                            <option value="" disabled selected>Choisir votre type d'opération</option>
                            <?php
                                $type = new Type();
                                $type->selectType();
                            ?>
                            </select>
                            <label for="type">Type d'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="categorie">
                            <option value="" disabled selected>Choisir votre catégorie d'opération</option>
                            <?php
                                $catename = new Categorie();
                                $catename->selectCategorie();
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
                            <input name="dateOp" type="text" class="datepicker">
                            <label for="dateOp">Date de l'opération</label>
                        </div>
                        <div class="input-field col s12">
                        <textarea id="comment" class="materialize-textarea" name="comment" data-length="200"></textarea>
                          <label for="comment">Commentaire</label>
                        </div>
                        <div class="row">
                            <div class="col m12">
                            <p class="right-align"><button class="btn waves-effect waves-light right-align" type="submit">Valider mon opération
                        </button></p>
                            </div>
                        </div>

<?php

require_once('Views/partials/footer.php');

?>