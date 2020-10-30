<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');
?>

<form method="post">
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Nouvelle opération</h2>
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
                            <option value="1">Entrée d'argent</option>
                            <option value="2">Retrait d'argent</option>
                            </select>
                            <label for="type">Type d'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="categorie">
                            <option value="" disabled selected>Choisir votre catégorie d'opération</option>
                            <option value="1">Test 1</option>
                            <option value="2">Test 2</option>
                            <option value="3">Test 3</option>
                            <option value="4">Test 4</option>
                            </select>
                            <label for="categorie">Categorie d'opération</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="payment">
                            <option value="" disabled selected>Choisir votre type de paiement</option>
                            <option value="1">Test 1</option>
                            <option value="2">Test 2</option>
                            <option value="3">Test 3</option>
                            <option value="4">Test 4</option>
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

if(isset($_POST['amount']) && isset($_POST['type']) && isset($_POST['categorie'])
&& isset($_POST['payment']) && isset($_POST['dateOp']) && isset($_POST['comment'])):

    $ope = new Operation();
    $cate = new Categorie();
    $pay = new Payment();

    $ope->setAmount($_POST['amount']);
    $ope->setType($_POST['type']);
    $cate->setCateName($_POST['categorie']);
    $pay->setPaymentName($_POST['payment']);
    $ope->setDate($_POST['dateOp']);
    $ope->setComment($_POST['comment']);
    $ope->newOperation();
endif;

require_once('Views/partials/footer.php');

?>