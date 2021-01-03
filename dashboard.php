<?php
session_start();
require_once('Views/partials/head.php');
require_once('libraries/autoload.php');
?>
<div class="container">
    <div class="row">
        <div class="col l8 m8 sm8 s12">
                <a href="operation.php" id="btnoperation" class="waves-effect waves-light btn" type="btn">Créer une nouvelle opération</a>
        </div>
    </div>
</div><br><br>
<?php


    $viewOpe = new Operation();
    $aff = $viewOpe->viewOperation();
    if(isset($_POST['delete'])){
        $opId = $_POST['delOp'];
        $viewOpe->deleteOperation($opId);
    }
    echo $aff;
?>

<?php
require_once('Views/partials/footer.php');
?>